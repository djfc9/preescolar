<?php
App::uses('AppController', 'Controller');
/**
 * Fichas Controller
 *
 * @property Ficha $Ficha
 * @property PaginatorComponent $Paginator
 */
class FichasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ficha->recursive = 0;
		$this->set('fichas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ficha->exists($id)) {
			throw new NotFoundException(__('Invalid ficha'));
		}
		$options = array('conditions' => array('Ficha.' . $this->Ficha->primaryKey => $id));
		$this->set('ficha', $this->Ficha->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = NULL) {
		if ($this->request->is('post')) {
			$this->Ficha->create();
                        $data = $this->request->data;
                        //debug($data);
			if ($this->Ficha->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The ficha has been saved.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('The ficha could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->Ficha->Alumno->find('list', array('conditions'=>array('Alumno.id'=>$id)));
		$this->set(compact('alumnos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ficha->exists($id)) {
			throw new NotFoundException(__('Invalid ficha'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ficha->save($this->request->data)) {
				$this->Session->setFlash(__('The ficha has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ficha could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ficha.' . $this->Ficha->primaryKey => $id));
			$this->request->data = $this->Ficha->find('first', $options);
		}
		$alumnos = $this->Ficha->Alumno->find('list');
		$this->set(compact('alumnos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ficha->id = $id;
		if (!$this->Ficha->exists()) {
			throw new NotFoundException(__('Invalid ficha'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ficha->delete()) {
			$this->Session->setFlash(__('The ficha has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ficha could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        
                
 public function viewpdf($id = null) {
     
      $alumno = $this->Persona->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
      //$this->Persona->AlumnosPersona->recursive = 2;
      $autorizados = $this->Persona->AlumnosPersona->find('all', array('conditions'=>array('AlumnosPersona.alumno_id'=>$id)));
      //echo debug($autorizados);
    //Import /app/Vendor/Fpdf
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('pdf', new FPDF('P','mm','A4')
   
           );
    //pass data to view
    $this->set('data', $alumno);
    $this->set('autoriza', $autorizados);
    $miCabecera = array('Nombre', 'Apellido', 'Matrícula', 'Edad', 'Estado Civil', 'Peso (kg)', 'Estatura (m)'); 
    $this->set('micabecera', $miCabecera);
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('pdf');
    
}

public function justificativos()
{
    $alumnos = $this->Ficha->Alumno->find('list');
		$this->set(compact('alumnos'));
}
public function justificativos_especiales()
{
    $alumnos = $this->Ficha->Alumno->find('list');
		$this->set(compact('alumnos'));
}

public function reposos()
{
    $alumnos = $this->Ficha->Alumno->find('list');
		$this->set(compact('alumnos'));
}

public function lis_autorizados($cedula_escolar)
{
    Configure::write('debug', '0');
    $this->layout ='ajax';
    $info_alumno = $this->Ficha->Alumno->find('all', array('conditions'=>array('Alumno.cedula_escolar'=> $cedula_escolar)));
   
    //echo debug($info_alumno);
    if(!empty($info_alumno))
    {
    foreach ($info_alumno as $datos):
        $id = $datos['Alumno']['id'];
    endforeach;
     $representante = $this->Ficha->Alumno->AlumnosPersona->find('list' , array('fields'=>array('AlumnosPersona.persona_id'),'conditions'=>
        array('AlumnosPersona.alumno_id'=> $id)));
    $autorizados = $this->Ficha->Alumno->Persona->find('list', array('conditions'=>
        array('Persona.id'=> $representante)));
    //echo debug($autorizados);
    $this->set(compact('autorizados'));
    }else
    {
        echo "<script>alert('Busqueda no produjo resultados o la Cédula Escolar no Existe');"
        . "document.location=('/preescolar/fichas/justificativos');</script>";
    }
}
public function reposos_pdf()
{
     $a = $this->request->data;
   debug($a);
   $año = $a['Ficha']['fecha']['year'];
   $mes = $a['Ficha']['fecha']['month'];
   $dias = $a['Ficha']['fecha']['day'];
   $fecha = $año."-".$mes."-".$dias; //aqui ordeno la fecha en el formato que sera mostrado
   
   //id del alumno referenciado....
   $id_alumno = $a['Ficha']['alumno_id'];
   
   ///tiempo que durara el reposo
   $tiempo = $a['Ficha']['dias'];
   
   ///motivo del reposo
   $motivo = $a['Ficha']['por'];
   
   $this->Ficha->Alumno->recursive = -1;
   $alumnos = $this->Ficha->Alumno->find('first', array('conditions'=>array('Alumno.id'=> $id_alumno)));
   //echo debug($alumnos);
    $this->set(compact('alumnos', 'tiempo','motivo', 'fecha'));
    //Import /app/Vendor/Fpdf
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('P','mm','A4'));
    //pass data to view
    $this->set('data', 'Hello, PDF world');
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('reposospdf');
}    
public function justificativos_pdf()
{
   $a = $this->request->data;
   //debug($a);
   $año = $a['Ficha']['fecha']['year'];
   $mes = $a['Ficha']['fecha']['month'];
   $dias = $a['Ficha']['fecha']['day'];
   $fecha = $año."-".$mes."-".$dias; //aqui ordeno la fecha en el formato que sera mostrado
   
   //id de da persona a quien sera emitida la justificacion
   $persona = $a['ListaAutorizados']['0'];
   
   //id del alumno referenciado....
   $id_alumno = $a['Ficha']['Alumno']['cedula_escolar'];
   
   ///Desde
   $hora = $a['Ficha']['desde']['hour'];
   $minuto = $a['Ficha']['desde']['min'];
   $segundos = $a['Ficha']['desde']['meridian'];
   $desde = $hora.":".$minuto.":".$segundos; //aqui junto el formato de tiempo
   
   
   //////hasta
   $hora = $a['Ficha']['hasta']['hour'];
   $minuto = $a['Ficha']['hasta']['min'];
   $segundos = $a['Ficha']['hasta']['meridian'];
   $hasta = $hora.":".$minuto.":".$segundos; //aqui junto el formato de tiempo
   
   $this->Ficha->Alumno->Persona->recursive = -1;
   $autorizados = $this->Ficha->Alumno->Persona->find('all', array('conditions'=>
        array('Persona.id'=> $persona)));
   
  //echo debug($autorizados);
   $this->Ficha->Alumno->recursive = -1;
   $alumnos = $this->Ficha->Alumno->find('all', array('conditions'=>array('Alumno.cedula_escolar'=> $id_alumno)));
   //echo debug($alumnos);
    $this->set(compact('alumnos', 'autorizados', 'hasta', 'desde', 'fecha'));
    //Import /app/Vendor/Fpdf
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
   $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('P','mm','A4'));
    //pass data to view
    //$this->set('data', 'Hello, PDF world');
    //render the pdf view (app/View/[view_name]/pdf.ctp)
   $this->render('justificativospdf');
    
} 
public function justificativos_pdf_especiales()
{
   $a = $this->request->data;
   //debug($a);
   $año = $a['Ficha']['fecha']['year'];
   $mes = $a['Ficha']['fecha']['month'];
   $dias = $a['Ficha']['fecha']['day'];
   $fecha = $año."-".$mes."-".$dias; //aqui ordeno la fecha en el formato que sera mostrado
   
   //id de da persona a quien sera emitida la justificacion
   $persona = $a['ListaAutorizados']['0'];
   
   //id del alumno referenciado....
   $id_alumno = $a['Ficha']['Alumno']['cedula_escolar'];
   
   ///Desde
   $hora = $a['Ficha']['desde']['hour'];
   $minuto = $a['Ficha']['desde']['min'];
   $segundos = $a['Ficha']['desde']['meridian'];
   $desde = $hora.":".$minuto.":".$segundos; //aqui junto el formato de tiempo
   
   
   //////hasta
   $hora = $a['Ficha']['hasta']['hour'];
   $minuto = $a['Ficha']['hasta']['min'];
   $segundos = $a['Ficha']['hasta']['meridian'];
   $hasta = $hora.":".$minuto.":".$segundos; //aqui junto el formato de tiempo
   
   $this->Ficha->Alumno->Persona->recursive = -1;
   $autorizados = $this->Ficha->Alumno->Persona->find('all', array('conditions'=>
        array('Persona.id'=> $persona)));
   
  //echo debug($autorizados);
   $this->Ficha->Alumno->recursive = -1;
   $alumnos = $this->Ficha->Alumno->find('all', array('conditions'=>array('Alumno.cedula_escolar'=> $id_alumno)));
   //echo debug($alumnos);
    $this->set(compact('alumnos', 'autorizados', 'hasta', 'desde', 'fecha'));
    //Import /app/Vendor/Fpdf
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
   $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('P','mm','A4'));
    //pass data to view
    //$this->set('data', 'Hello, PDF world');
    //render the pdf view (app/View/[view_name]/pdf.ctp)
   $this->render('justificativosespeciales');
    
}


                }
