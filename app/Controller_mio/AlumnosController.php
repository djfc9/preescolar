<?php
App::uses('AppController', 'Controller');
/**
 * Alumnos Controller
 *
 * @property Alumno $Alumno
 * @property PaginatorComponent $Paginator
 */
class AlumnosController extends AppController {

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
		$this->Alumno->recursive = 0;
		$this->set('alumnos', $this->Paginator->paginate());
	}
        public function index_1() {
		$this->Alumno->recursive = 0;
		$this->set('alumnos', $this->Paginator->paginate());
	}
        //fincion utilizada para buscar los alumnos en el filtro de alumnos/index 
        	public function index_lista($cedula) 
                {
                $this->layout ="ajax";    
                $this->Alumno->recursive = 0;
                //echo $cedula;
                $options = array('conditions' => array('Alumno.cedula_escolar' => /*'11209568332' */$cedula));
		$this->set('alumnos', $this->Alumno->find('all', $options), $this->Paginator->paginate());
		//$this->set('alumnos', $this->Paginator->paginate());
                }
                
                public function preinscritos(){
                $this->Alumno->recursive = 0;
                $options = array('conditions' => array('Alumno.estatu_id' => 1), 'order'=>'Alumno.fecha_nacimiento ASC');
		$this->set('alumnos', $this->Paginator->paginate() , $this->Alumno->find('all', $options));   
                }
                public function lista_preinscritos(){
                  $this->Alumno->recursive = 0;
                $options = array('conditions' => array('Alumno.estatu_id' => '1'), 'order'=>'Alumno.fecha_nacimiento ASC');
		$this->set('alumnos', $this->Alumno->find('all', $options));   
                //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A4'));
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('preinscritos_pdf');  
                }
                
                public function inscritos(){
                $this->Alumno->recursive = 0;
                $options = array('conditions' => array('Alumno.estatu_id' => 2), 'order'=>'Alumno.fecha_nacimiento ASC');
		$this->set('alumnos', $this->Alumno->find('all', $options), $this->Paginator->paginate());   
                }
                public function retirar($id = null){
                 /* if (!$this->Alumno->exists($id)) {
			throw new NotFoundException(__('Invalid alumno'));
		}*/
		if ($this->request->is(array('post', 'put'))) {
                    //$datos = $this->request->data;
                   //echo debug($datos);
			if ($this->Alumno->save($this->request->data)) {
				$this->Session->setFlash(__('El alumno ha sido Retirado con exito!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El alumno no ha sido Retirado, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Alumno.' . $this->Alumno->primaryKey => $id));
			$this->request->data = $this->Alumno->find('first', $options);
		}
		$estados = $this->Alumno->Estado->find('list');
		$municipios = $this->Alumno->Municipio->find('list');
		$parroquias = $this->Alumno->Parroquia->find('list');
		//$gradosSecciones = $this->Alumno->GradosSeccione->find('list');
		$estatus = $this->Alumno->Estatu->find('list');
		$sexos = $this->Alumno->Sexo->find('list');
		$normas = $this->Alumno->Norma->find('list');
		$personas = $this->Alumno->Persona->find('list');
                $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=> $id)));
                //echo debug($alumno);
		$this->set(compact('estados','alumno', 'municipios', 'parroquias', 'gradosSecciones', 'estatus', 'sexos', 'normas', 'personas'));  
                }
                public function constancias(){
                    
                }
                public function index_lista_reportes($cedula) 
                {
                $this->layout ="ajax";    
                $this->Alumno->recursive = 0;
                //echo $cedula;
                $options = array('conditions' => array('Alumno.cedula_escolar' => $cedula, 'OR'=>array('Alumno.estatu_id' =>array(2,4))));
		$this->set('alumnos', $this->Alumno->find('all', $options), $this->Paginator->paginate());
		//$this->set('alumnos', $this->Paginator->paginate());
                }
                public function c_asistencia($id){
                      Configure::write('debug', '0');
                   $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
                    foreach ($alumno as $lista):
               $estatus = $lista['Alumno']['estatu_id'];
               $grupo = $lista['GradosSeccione']['0']['descripcion'];
        endforeach; 
        if($estatus ===2 && !empty($grupo)){

                    // echo debug($alumno);
                    //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A5'));
                    $this->set('alumno', $alumno);
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('c_estudio_pdf');  
                    }else
                    {
                       echo "Alumno no existe o no esta incrito aun.";
                       echo "<script>alert('Alumno no existe o no esta incrito aun.'); document.location=('/preescolar/alumnos/constancias');</script>";
                      // return $this->redirect(array('action' => 'constancias'));
                    }
                }
                public function c_estudio($id){
                    Configure::write('debug', '0');
                   $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
                    foreach ($alumno as $lista):
               $estatus = $lista['Alumno']['estatu_id'];
               $grupo = $lista['GradosSeccione']['0']['descripcion'];
        endforeach; 
        if($estatus ===2 && !empty($grupo)){

                    // echo debug($alumno);
                    //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A5'));
                    $this->set('alumno', $alumno);
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('c_estudio_pdf');  
                    }else
                    {
                       echo "Alumno no existe o no esta incrito aun.";
                       echo "<script>alert('Alumno no existe o no esta incrito aun.'); document.location=('/preescolar/alumnos/constancias');</script>";
                      // return $this->redirect(array('action' => 'constancias'));
                    }
                }
                public function c_ced_escolar($id){
                   Configure::write('debug', '0');
                   $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
                    foreach ($alumno as $lista):
               $estatus = $lista['Alumno']['estatu_id'];
               $grupo = $lista['GradosSeccione']['0']['descripcion'];
        endforeach; 
         if($estatus ===2 || $estatus ===4 && !empty($grupo)){

                    // echo debug($alumno);
                    //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A5'));
                    $this->set('alumno', $alumno);
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('c_ced_escolar_pdf');   
                    }else
                    {
                       echo "Alumno no existe o no esta incrito aun.";
                       echo "<script>alert('Alumno no existe o no esta incrito aun.'); document.location=('/preescolar/alumnos/constancias');</script>";
                      // return $this->redirect(array('action' => 'constancias'));
                    }
                     
                }
                public function c_solvencia($id){
                     Configure::write('debug', '0');
                   $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
                    foreach ($alumno as $lista):
               $estatus = $lista['Alumno']['estatu_id'];
               $grupo = $lista['GradosSeccione']['0']['descripcion'];
        endforeach; 
         if($estatus ===2 || $estatus ===4 && !empty($grupo)){

                    //echo debug($alumno);
                    //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A5'));
                    $this->set('alumno', $alumno);
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('c_solvencia_pdf');  
                    }else
                    {
                       echo "Alumno no existe o no esta incrito aun.";
                       echo "<script>alert('Alumno no existe o no esta incrito aun.'); document.location=('/preescolar/alumnos/constancias');</script>";
                      // return $this->redirect(array('action' => 'constancias'));
                    }
                }
                public function c_inscripcion($id){
                     Configure::write('debug', '0');
                    $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
                    foreach ($alumno as $lista):
                    $estatus = $lista['Alumno']['estatu_id'];
                    $grupo = $lista['GradosSeccione']['0']['descripcion'];
                    endforeach; 
                    if($estatus ===2 && !empty($grupo)){
                    // echo debug($alumno);
                    //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A5'));
                    $this->set('alumno', $alumno);
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('c_inscripcion_pdf'); 
                    }else
                    {
                       echo "Alumno no existe o no esta incrito aun.";
                       echo "<script>alert('Alumno no existe o no esta incrito aun.'); document.location=('/preescolar/alumnos/constancias');</script>";
                      // return $this->redirect(array('action' => 'constancias'));
                    }
                }
                public function c_conducta($id){
                    Configure::write('debug', '0');
                   $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
                    foreach ($alumno as $lista):
               $estatus = $lista['Alumno']['estatu_id'];
               $grupo = $lista['GradosSeccione']['0']['descripcion'];
        endforeach; 
        if($estatus ===2 || $estatus ===4 && !empty($grupo)){

                    //echo debug($alumno);
                    //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A5'));
                    $this->set('alumno', $alumno);
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('c_conducta_pdf');  
                    }else
                    {
                       echo "Alumno no existe o no esta incrito aun.";
                       echo "<script>alert('Alumno no existe o no esta incrito aun.'); document.location=('/preescolar/alumnos/constancias');</script>";
                      // return $this->redirect(array('action' => 'constancias'));
                    }
                    
                }
                public function c_retiro($id){
                    Configure::write('debug', '0');
                    //$alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
                    $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id, 'Alumno.estatu_id'=>4)));
                    foreach ($alumno as $lista):
                    $estatus = $lista['Alumno']['estatu_id'];
                    $grupo = $lista['GradosSeccione']['0']['descripcion'];
                    endforeach; 
                     if($estatus ===2 || $estatus ===4 && !empty($grupo)){

                    //echo debug($alumno);
                    //Import /app/Vendor/Fpdf
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    //Assign layout to /app/View/Layout/pdf.ctp
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    //Set fpdf variable to use in view
                    $this->set('fpdf', new FPDF('P','mm','A5'));
                    $this->set('alumno', $alumno);
                    //render the pdf view (app/View/[view_name]/pdf.ctp)
                    $this->render('c_retiro_pdf');  
                    }else
                    {
                       echo "Alumno no existe o no se ha formalizado su retiro aun.";
                       echo "<script>alert('Alumno no existe o no se ha formalizado su retiro aun.'); document.location=('/preescolar/alumnos/constancias');</script>";
                      // return $this->redirect(array('action' => 'constancias'));
                    }
                    
                }
                /*
        public function index1($id) {
		$this->Alumno->AlumnosPersona->recursive = 1;
                $iden = $this->Alumno->AlumnosPersona->find('all', array('fields'=>array('AlumnosPersona.alumno_id', 'AlumnosPersona.id'),
                    'conditions'=>array('AlumnosPersona.persona_id'=> $id)));
                foreach ($iden as $alum):
                   $alumno_id = $alum['AlumnosPersona']['alumno_id'];
                 
                $alumnos = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=> $alumno_id)));
		$this->set('alumnos', $this->Paginator->paginate());
                endforeach;
                debug($alumnos);
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Alumno->exists($id)) {
			throw new NotFoundException(__('Invalid alumno'));
		}
		$options = array('conditions' => array('Alumno.' . $this->Alumno->primaryKey => $id));
		$this->set('alumno', $this->Alumno->find('first', $options));
                $ficha_salud = $this->Alumno->Salud->find('all', array('conditions'=>array('Salud.alumno_id'=> $id)));
                //echo debug($ficha_salud);
                $this->set('ficha_salud', $ficha_salud);
                
                }

/**
 * add method
 *
 * @return void
 */
	public function add($id) {
		if ($this->request->is('post')) {
			$this->Alumno->create();
                        $cedula_e = $this->request->data['Alumno']['cedula_escolar'];
                       /* $datos = $this->request->data;
                        echo debug($datos);*/
                         $nombre = strtoupper($this->request->data['Alumno']['nombre']) ;
                         $this->request->data['Alumno']['nombre']= $nombre;
                         $nombre1 = strtoupper($this->request->data['Alumno']['segundo_nombre']) ;
                         $this->request->data['Alumno']['segundo_nombre']= $nombre1;
                        $apellido = strtoupper($this->request->data['Alumno']['apellido']) ;
                        $this->request->data['Alumno']['apellido'] = $apellido;
                        $apellido1 = strtoupper($this->request->data['Alumno']['segundo_apellido']) ;
                        $this->request->data['Alumno']['segundo_apellido'] = $apellido1;
                        $dir = strtoupper($this->request->data['Alumno']['direccion']) ;
                        $this->request->data['Alumno']['direccion'] = $dir;
                        $dir_n = strtoupper($this->request->data['Alumno']['lugar_nacimiento']) ;
                        $this->request->data['Alumno']['lugar_nacimiento'] = $dir_n;
			if ($this->Alumno->saveAll($this->request->data)) {
				$this->Session->setFlash(__('El alumno ha sido guardado con exito!.'));
				return $this->redirect(array('controller'=>'saluds','action' => 'add', $cedula_e));
			} else {
				$this->Session->setFlash(__('El alumno no ha sido Guardado. Por favor, intente de nuevo.'));
			}
		}
		$estados = $this->Alumno->Estado->find('list', array('order'=>'Estado.id ASC'));
		$municipios = $this->Alumno->Municipio->find('list');
		$parroquias = $this->Alumno->Parroquia->find('list');
		//$gradosSecciones = $this->Alumno->GradosSeccione->find('list');
		$estatus = $this->Alumno->Estatu->find('list');
		$sexos = $this->Alumno->Sexo->find('list');
		$normas = $this->Alumno->Norma->find('list');
                $posicion = $this->Alumno->Posicion->find('list');
                $nucleo = $this->Alumno->Persona->find('all',array('conditions' =>array('Persona.nucleo_familiar_ref' => $id)));
                //debug($nucleo);
		$personas = $this->Alumno->Persona->find('list',array('conditions' =>array('Persona.user_id' => $id)));
                $representante = $this->Alumno->Persona->find('all',array('conditions' =>array('Persona.user_id' => $id)));
                //debug($representante);
                $id = $representante['0']['Persona']['user_id'];
                //$representante['0']['Persona']['norma_convivencia'];
                if($representante['0']['Persona']['norma_convivencia'] == 0){
                    echo "<script>"
                    . "document.location=('/preescolar/personas/normas/$id');"
                            . "</script>";  
                }else{
                $this->Alumno->Persona->recursive = -1;
                $madre = $this->Alumno->Persona->find('all', array('container'=>array('TipoPersona'), 'conditions' =>array('Persona.nucleo_familiar_ref' => $id)));
                //$madre = $this->Alumno->Persona->find('all',array('contain'=>array('TipoPersona','conditions' =>array('Persona.nucleo_familiar_ref' => $id))));
                /*foreach ($madre as $madre):
                    debug($madre);
                endforeach;
//echo debug($madre);*/
                if(empty($madre))
                {
                    echo "<script>alert('Debe completar el nucleo familiar antes que a los Hijos');"
                    . "document.location=('/preescolar/personas/nucleo_familiar/$id');"
                            . "</script>";  
                }
                $this->set(compact('posicion','representante','estados', 'municipios', 'parroquias', 'gradosSecciones', 'estatus', 'sexos', 'normas', 'personas', 'nucleo'));
        }
        
                }
               // funcion utilizada para rellenar el select de posiciones en el nacimiento del niño
                public function posiciones($id) {
                  Configure::write('debug', '0');
                    $this->layout = 'ajax'; 
                    $posiciones = $this->Alumno->Posicion->find('list', array('conditions'=>array('Posicion.id <=' => $id))); 
                    //echo debug($posiciones);
                    $this->set('posiciones', $posiciones);  
                }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Alumno->exists($id)) {
			throw new NotFoundException(__('Invalid alumno'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alumno->save($this->request->data)) {
				$this->Session->setFlash(__('El alumno ha sido Guardado con exito!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El alumno no ha sido Modificado, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Alumno.' . $this->Alumno->primaryKey => $id));
			$this->request->data = $this->Alumno->find('first', $options);
		}
		$estados = $this->Alumno->Estado->find('list');
		$municipios = $this->Alumno->Municipio->find('list');
		$parroquias = $this->Alumno->Parroquia->find('list');
		//$gradosSecciones = $this->Alumno->GradosSeccione->find('list');
		$estatus = $this->Alumno->Estatu->find('list');
		$sexos = $this->Alumno->Sexo->find('list');
		$normas = $this->Alumno->Norma->find('list');
		$personas = $this->Alumno->Persona->find('list');
                $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=> $id)));
                //echo debug($alumno);
		$this->set(compact('estados','alumno', 'municipios', 'parroquias', 'gradosSecciones', 'estatus', 'sexos', 'normas', 'personas'));
	}

        	public function edit_all($id = null) {
		if (!$this->Alumno->exists($id)) {
			throw new NotFoundException(__('Invalid alumno'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alumno->saveAll($this->request->data)) {
				$this->Session->setFlash(__('El alumno ha sido Guardado con exito!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El alumno no ha sido Modificado, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Alumno.' . $this->Alumno->primaryKey => $id));
			$this->request->data = $this->Alumno->find('first', $options);
		}
		$estados = $this->Alumno->Estado->find('list');
		$municipios = $this->Alumno->Municipio->find('list');
		$parroquias = $this->Alumno->Parroquia->find('list');
		//$gradosSecciones = $this->Alumno->GradosSeccione->find('list');
		$estatus = $this->Alumno->Estatu->find('list');
		$sexos = $this->Alumno->Sexo->find('list');
		$normas = $this->Alumno->Norma->find('list');
		$personas = $this->Alumno->Persona->find('list', array('order'=>'Persona.nombre ASC'));
                $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=> $id)));
                //echo debug($alumno);
		$this->set(compact('estados','alumno', 'municipios', 'parroquias', 'gradosSecciones', 'estatus', 'sexos', 'normas', 'personas'));
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Alumno->id = $id;
		if (!$this->Alumno->exists()) {
			throw new NotFoundException(__('Invalid alumno'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Alumno->delete()) {
			$this->Session->setFlash(__('The alumno has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alumno could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
          public function viewpdf($cedula) {
      $alumno = $this->Alumno_persona->Alumno->find('all', array('conditions'=>array('Alumno.cedula'=>$cedula)));
      echo debug($alumno);
    //Import /app/Vendor/Fpdf
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('P','mm','A4'));
    //pass data to view
    $this->set('data', 'Hello, PDF world');
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('pdf');
}
        
//select dependientes
   public function lista_municipios($id)
        {
            Configure::write('debug', '0');
           $this->layout = 'ajax';
           $municipios = $this->Alumno->Municipio->find('list', array('conditions'=>array('Municipio.estado_id' => $id ))); 
                    $this->set('municipios', $municipios);
            //echo debug($municipios);
        }
        public function lista_parroquias($id)
        {
           Configure::write('debug', '0');
            $this->layout = 'ajax'; 
           $parroquias = $this->Alumno->Parroquia->find('list', array('conditions'=>array('Parroquia.municipio_id' => $id))); 
           $this->set('parroquias', $parroquias);
		   //echo debug($parroquia);
        }

         public function lista()
        {
          $this->Alumno->recursive = 0;
	  $this->set('alumnos', $this->Paginator->paginate());
           /*$alumnos = $this->Alumno->find('all'); 
           $this->set('alumnos', $alumnos);*/
		   //echo debug($parroquia);
        }
        
        public function view_alumno()
        {

                $ficha_salud = $this->Alumno->Salud->find('all');
                //echo debug($ficha_salud);
                $this->set('ficha_salud', $ficha_salud);
                
                
        } 
        
        public function validar_inscripcion()
        { 
            //Año escolar
            $ano1=date("Y");
            $ano2=date("Y")+1;
            $ano_escolar=$ano1.'- '.$ano2;
            //Configure::write('debug', '0');
		if ($this->request->is(array('post', 'put'))) {
                    //$datos = $this->request->data;
                    //debug($datos);
                  /*$alumno= $this->request->data['Alumno']['id'];
                   
                   $id= $this->request->data['GradosSeccione']['GradosSeccione']['0'];
                   $this->Alumno->GradosSeccione->recursive = -1;
                   $cupos = $this->Alumno->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id' => $id), 'fields'=>array('GradosSeccione.cupos_asignados')));
                    //debug($cupos);
                    foreach ($cupos as $disponibles):
                        $disponibles = $disponibles['GradosSeccione']['cupos_asignados'];
                        $restantes = $disponibles +1;
                    endforeach;
                    
                    // con esto verifico si ya el alumno estaba inscrito y si estaba entonces le resta libera su cupo y luego lo asigna 
                    // a la nueva seccion
                                  $this->Alumno->AlumnosGradosSeccione->recursive = -1;
                                 $verificar_si_estaba_inscrito = $this->Alumno->AlumnosGradosSeccione->find('all', array('conditions'=>array('AlumnosGradosSeccione.alumno_id' => $alumno)));
                                 foreach ($verificar_si_estaba_inscrito as $ver):
                                 $inscrito = $ver['AlumnosGradosSeccione']['alumno_id'];
                                 $grado_seccion_id = $ver ['AlumnosGradosSeccione']['grados_seccione_id'];
                                 endforeach;
                                 if(!empty($inscrito)){
                                    $grado_y_seccion_anterior = $this->Alumno->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id' => $grado_seccion_id), 'fields'=>array('GradosSeccione.cupos_asignados')));
                                    $restar = $grado_y_seccion_anterior['0']['GradosSeccione']['cupos_asignados'] -1;
                                    $this->Alumno->AlumnosGradosSeccione->query("Update grados_secciones set cupos_asignados = $restar where id = $grado_seccion_id");
                                 }
                                 */
                    ///hasta aqui el proceso de actualizacion si el alumno esta inscrito
                    //
                    if ($this->Alumno->saveAll($this->request->data)) { 
                   
                    //             de aqui en adelante le asigno la nueva seccion al alumno y resto uno en los              
                                //$this->Alumno->GradosSeccione->query('Update' => array('GradosSeccione.cupos_asignados' = $restantes),'conditions'=>array('GradosSeccione.cupos_asignados'=>$id));
				//$this->Alumno->AlumnosGradosSeccione->query("Update alumnos_grados_secciones set ano_escolar = $ano1 where alumno_id = $alumno");
                                //$this->Alumno->GradosSeccione->query("Update grados_secciones set cupos_asignados = $restantes where id = $id");
                                $this->Session->setFlash(__('Los requisitos que el alumno cumple ha sido registrados Satisfactoriamente!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('Los requisitos que el alumno cumple no ha sido Registrados, Por favor, Intente nuevamente.'));
			}
		} else {
			
			$this->request->data = $this->Alumno->find('list');
		}
                $alumno = $this->Alumno->find('list');
		//$estatus = $this->Alumno->Estatu->find('list', array('fields'=>array('Estatu.id', 'Estatu.nombre'), 'order'=>'Estatu.id ASC', 'conditions'=>array('Estatu.id '=> '2')));
                $requisitos = $this->Alumno->Requisito->find('list');
                //$cup = $this->Alumno->GradosSeccione->find('list', array('fields'=>array('GradosSeccione.cupos')));
                //foreach ($cup as $can):
                //endforeach;
                //$gradosSecciones = $this->Alumno->GradosSeccione->find('list', array('conditions'=>array('GradosSeccione.cupos_asignados <' => $can)));
                $this->set(compact('alumno','requisitos', 'gradosSecciones',  'estatus'));
                
                //debug($cupos);
            
        }
       /* public function trae_cupos($id){  
         $this->layout = 'ajax';
         $this->Alumno->GradosSeccione->recursive = -1;
         $cupos = $this->Alumno->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id' => $id), 'fields'=>array('GradosSeccione.cupos_asignados')));
         $this->set('cupos', $cupos);
        }*/




        public function validar_reinscripcion()
		{
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alumno->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Los requisitos que el alumno cumple ha sido registrados Satisfactoriamente!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El alumno no ha sido Reinscrito, Por favor, Intente nuevamente.'));
			}
		} else {
			
			$this->request->data = $this->Alumno->find('list');
		}
		$gradosSecciones = $this->Alumno->GradosSeccione->find('list');
		$estatus = $this->Alumno->Estatu->find('list', array('fields'=>array('Estatu.id', 'Estatu.nombre'), 'order'=>'Estatu.id ASC', 'conditions'=>array('Estatu.id'=> '3')));
                $requisitos = $this->Alumno->Requisito->find('list', array('conditions'=>array('NOT'=>array('Requisito.id !='=>array(3,5,6,7,8)))));
		//echo debug($requisitos);
                $this->set(compact('alumno','requisitos', 'gradosSecciones', 'estatus'));
	 
            
        }
        
        public function inscribir()
        { 
            //Año escolar
            $ano1=date("Y");
            $ano2=date("Y")+1;
            $ano_escolar=$ano1.'- '.$ano2;
            Configure::write('debug', '0');
		if ($this->request->is(array('post', 'put'))) {
                    /*$datos = $this->request->data;
                    debug($datos);*/

                  $alumno= $this->request->data['Alumno']['id'];
                   
                   $id= $this->request->data['GradosSeccione']['GradosSeccione']['0'];
                   $this->Alumno->GradosSeccione->recursive = -1;
                   $gradosSecciones = $this->Alumno->GradosSeccione->find('first', array('conditions'=>array('GradosSeccione.id'=> $id)));
                   //echo debug($gradosSecciones);
                   $cupos = $gradosSecciones['GradosSeccione']['cupos'];
                   $disponibles = $gradosSecciones['GradosSeccione']['cupos_asignados'];
                   $restantes = $cupos - $disponibles;
                   if($restantes == 0)
                        {
                        echo "<script>alert('Esta seccion no tiene cupos disponibles, Seleccione otra.'); document.location('/preescolar/alumnos/inscribir');</script>";
                        }
                   $cupos = $this->Alumno->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id' => $id), 'fields'=>array('GradosSeccione.cupos_asignados')));
                    //debug($cupos);
                    foreach ($cupos as $disponibles):
                        $disponibles = $disponibles['GradosSeccione']['cupos_asignados'];
                        $restantes = $disponibles +1;
                    endforeach;
                    
                    // con esto verifico si ya el alumno estaba inscrito y si estaba entonces le resta libera su cupo y luego lo asigna 
                    // a la nueva seccion
                                  $this->Alumno->AlumnosGradosSeccione->recursive = -1;
                                 $verificar_si_estaba_inscrito = $this->Alumno->AlumnosGradosSeccione->find('all', array('conditions'=>array('AlumnosGradosSeccione.alumno_id' => $alumno)));
                                 foreach ($verificar_si_estaba_inscrito as $ver):
                                 $inscrito = $ver['AlumnosGradosSeccione']['alumno_id'];
                                 $grado_seccion_id = $ver ['AlumnosGradosSeccione']['grados_seccione_id'];
                                 endforeach;
                                 if(!empty($inscrito)){
                                    $grado_y_seccion_anterior = $this->Alumno->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id' => $grado_seccion_id), 'fields'=>array('GradosSeccione.cupos_asignados')));
                                    $restar = $grado_y_seccion_anterior['0']['GradosSeccione']['cupos_asignados'] -1;
                                    $this->Alumno->query("Update grados_secciones set cupos_asignados = $restar where id = $grado_seccion_id");
                                 }
                                 
                    ///hasta aqui el proceso de actualizacion si el alumno esta inscrito
                    //
                    if ($this->Alumno->saveAll($this->request->data)) { 
                   
                    //             de aqui en adelante le asigno la nueva seccion al alumno y resto uno en los              
                                //$this->Alumno->GradosSeccione->query('Update' => array('GradosSeccione.cupos_asignados' = $restantes),'conditions'=>array('GradosSeccione.cupos_asignados'=>$id));
				$this->Alumno->AlumnosGradosSeccione->query("Update alumnos_grados_secciones set ano_escolar = $ano1 where alumno_id = $alumno");
                                $this->Alumno->GradosSeccione->query("Update grados_secciones set cupos_asignados = $restantes where id = $id");
                                $this->Session->setFlash(__('El alumno ha sido Inscrito Satisfactoriamente!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El alumno no ha sido Inscrito, Por favor, Intente nuevamente.'));
			}
		} else {
			
			$this->request->data = $this->Alumno->find('list');
		}
                $alumno = $this->Alumno->find('list');
		$estatus = $this->Alumno->Estatu->find('list', array('fields'=>array('Estatu.id', 'Estatu.nombre'), 'order'=>'Estatu.id ASC', 'conditions'=>array('Estatu.id '=> '2')));
                $requisitos = $this->Alumno->Requisito->find('list');
                $cup = $this->Alumno->GradosSeccione->find('list', array('order'=>'GradosSeccione.cupos ASC','fields'=>array('GradosSeccione.cupos')));
                //echo debug($cup);
                foreach ($cup as $can):
                    //echo $can;
                //$gradosSecciones = $this->Alumno->GradosSeccione->find('list', array('order'=>'GradosSeccione.descripcion DESC','conditions'=>array('GradosSeccione.cupos_asignados <' => $can)));
                 //$this->set(compact('alumno','requisitos', 'gradosSecciones',  'estatus'));
                endforeach;
                //$gradosSecciones = $this->Alumno->GradosSeccione->find('list');
               $gradosSecciones = $this->Alumno->GradosSeccione->find('list', array('order'=>'GradosSeccione.descripcion DESC','conditions'=>array('GradosSeccione.cupos_asignados <' => $can)));
               $this->set(compact('alumno','requisitos', 'gradosSecciones',  'estatus'));
                
                //debug($cupos);
            
        }
        public function cupos_disponibles_en_secciones($id){
            $this->layout ='ajax';
            Configure::write('debug', '0');
            $this->Alumno->GradosSeccione->recursive = -1;
            $gradosSecciones = $this->Alumno->GradosSeccione->find('first', array('conditions'=>array('GradosSeccione.id'=> $id)));
            //echo debug($gradosSecciones);
            $this->set('gradosSecciones', $gradosSecciones);
        }

        public function buscar_alumno($cedula)
        {
            $this->layout ='ajax';
            $alum_busqueda = $this->Alumno->find('all', array('conditions'=>array('Alumno.cedula_escolar'=>$cedula)));
		//echo debug($alum_busqueda);
                $this->set('datos', $alum_busqueda);
        }
        public function buscar_alumno_1($cedula)
        {
            $this->layout ='ajax';
            $alum_busqueda = $this->Alumno->find('all', array('conditions'=>array('Alumno.cedula_escolar'=>$cedula, 'Alumno.confirmar <>'=> 0)));
		//echo debug($alum_busqueda);
                $this->set('datos', $alum_busqueda);
        }
        public function buscar_alumno_retirar($cedula)
        {
            $this->layout ='ajax';
            $alum_busqueda = $this->Alumno->find('all', array('conditions'=>array('Alumno.cedula_escolar'=>$cedula, 'Alumno.confirmar <>'=> 0)));
		//echo debug($alum_busqueda);
                $this->set('datos', $alum_busqueda);
        }

        
        public function bd()
        {
               $gradosSecciones = $this->Alumno->GradosSeccione->find('list');
		//echo debug($gradosSecciones);
                $this->set(compact('gradosSecciones'));
        }
        public function bd_generar($id)
        {
               $gradosSecciones = $this->Alumno->GradosSeccione->find('list');
		//echo debug($gradosSecciones);
                $this->set(compact('gradosSecciones'));
        }
        
        public function lista_autorizados()
        {
            
        }
        public function mostrar_lista_autorizados($cedula)
        {
            $this->layout = 'ajax';
            //$this->Alumno->recursive = -1;
            $alumno = $this->Alumno->find('all', array('conditions'=>array('Alumno.cedula_escolar'=> $cedula)));
            //echo debug($alumno);
            foreach ($alumno as $datos):
               // debug($datos);
            $id = $datos['Alumno']['id'];
            if ($id == 0)
            {
                echo "Cedula incorecta, verifique e intente nuevamente";
                  echo "<script>alert('Cedula incorecta, verifique e intente nuevamente');"
                    . "document.location=('/preescolar/alumnos/lista_autorizados/');"
                            . "</script>"; 
            }
            endforeach;
                $id_persona = $this->Alumno->AlumnosPersona->find('list', array('fields'=>array('AlumnosPersona.persona_id'),'conditions'=>array('AlumnosPersona.alumno_id'=> $id)));
                $personas = $this->Alumno->Persona->find('all', array('conditions'=> array('Persona.id'=>$id_persona)));
                $this->set(compact('alumno', 'personas'));
        }
        

        
        
         public function viajes() {
                $gradosSeccione = $this->Alumno->GradosSeccione->find('list', array('fields'=>array('GradosSeccione.id','GradosSeccione.descripcion')));
                $this->set('gradosSec', $gradosSeccione);
                //echo debug($gradosSeccione);
	}
        public function viajess($id) {
                Configure::write('debug', '0');
                $this->layout ='ajax';
                $this->Alumno->GradosSeccione->recursive = -1;
                $gs = $this->Alumno->AlumnosGradosSeccione->find('list', array('fields'=>array('AlumnosGradosSeccione.alumno_id'),'conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id)));
                //echo debug($gs);
                 if(empty($gs))
                {
                    echo "<script>alert('Seleccion sin Alumnos');"
                    . "document.location=('/preescolar/alumnos/viajes/');"
                            . "</script>";  
                }
                /*
                foreach ($gs as $gs1):
                        $id_alumno = $gs1['AlumnosGradosSeccione']['alumno_id'];
                echo debug($id_alumno);
                endforeach; */
                $this->Alumno->AlumnosNorma->recursive = -1;
                $alumnos_id = $this->Alumno->AlumnosNorma->find('list', array('fields'=>array('AlumnosNorma.alumno_id'),'conditions'=>array('AlumnosNorma.alumno_id'=>$gs, 'AlumnosNorma.norma_id'=>'1')));
                //echo debug($alumnos_id);
                $this->Alumno->recursive = -1;
                $alumnos = $this->Alumno->find('all',array('conditions'=>array('Alumno.id'=> $alumnos_id)));
                //debug($alumnos);
                $this->set(compact('alumnos', 'id'));
	}
        public function viajes_pdf($id){
            $this->Alumno->GradosSeccione->recursive = -1;
                $gs = $this->Alumno->AlumnosGradosSeccione->find('list', array('fields'=>array('AlumnosGradosSeccione.alumno_id'),'conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id)));
                /*foreach ($gs as $gs1):
                        $id_alumno = $gs1['AlumnosGradosSeccione']['alumno_id'];
                endforeach; */
                $this->Alumno->AlumnosNorma->recursive = -1;
                $alumnos_id = $this->Alumno->AlumnosNorma->find('list', array('fields'=>array('AlumnosNorma.alumno_id'),'conditions'=>array('AlumnosNorma.alumno_id'=>$gs, 'AlumnosNorma.norma_id'=>'1')));
                $this->Alumno->recursive = 1;
                $alumnos = $this->Alumno->find('all',array('conditions'=>array('Alumno.id'=> $alumnos_id)));
                $descripcion= $alumnos['0']['GradosSeccione']['0']['descripcion'];
                //debug($alumnos);
                $this->set(compact('alumnos', 'descripcion'));
                //Import /app/Vendor/Fpdf
                App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                //Assign layout to /app/View/Layout/pdf.ctp
                $this->layout = 'pdf'; //this will use the pdf.ctp layout
                //Set fpdf variable to use in view
                $this->set('fpdf', new FPDF('P','mm','A4'));
                 //pass data to view
                $this->set('data', 'Hello, PDF world');
                //render the pdf view (app/View/[view_name]/pdf.ctp)
                $this->render('viajes_fpdf');
                                    }
                                  

        public function fotografias() {
                $gradosSeccione = $this->Alumno->GradosSeccione->find('list', array('fields'=>array('GradosSeccione.id','GradosSeccione.descripcion')));
                $this->set('gradosSec', $gradosSeccione);
                }
                
        public function fotografiass($id) {
            Configure::write('debug', '0');
                $this->layout ='ajax';
                $this->Alumno->GradosSeccione->recursive = -1;
                $gs = $this->Alumno->AlumnosGradosSeccione->find('list', array('fields'=>array('AlumnosGradosSeccione.alumno_id'),'conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id)));
                 if(empty($gs))
                {
                    echo "<script>alert('Seleccion sin Alumnos');"
                    . "document.location=('/preescolar/alumnos/viajes/');"
                            . "</script>";  
                }
                /*foreach ($gs as $gs1):
                        $id_alumno = $gs1['AlumnosGradosSeccione']['alumno_id'];
                endforeach; */
                $this->Alumno->AlumnosNorma->recursive = -1;
                $alumnos_id = $this->Alumno->AlumnosNorma->find('list', array('fields'=>array('AlumnosNorma.alumno_id'),'conditions'=>array('AlumnosNorma.alumno_id'=>$gs, 'AlumnosNorma.norma_id'=>'2')));
                $this->Alumno->recursive = -1;
                $alumnos = $this->Alumno->find('all',array('conditions'=>array('Alumno.id'=> $alumnos_id)));
                //debug($alumnos);
                $this->set(compact('alumnos', 'id'));
        }
        public function fotografias_pdf($id) {
                $this->Alumno->GradosSeccione->recursive = -1;
                $gs = $this->Alumno->AlumnosGradosSeccione->find('list', array('fields'=>array('AlumnosGradosSeccione.alumno_id'),'conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id)));
                /*foreach ($gs as $gs1):
                        $id_alumno = $gs1['AlumnosGradosSeccione']['alumno_id'];
                endforeach; */
                $this->Alumno->AlumnosNorma->recursive = -1;
                $alumnos_id = $this->Alumno->AlumnosNorma->find('list', array('fields'=>array('AlumnosNorma.alumno_id'),'conditions'=>array('AlumnosNorma.alumno_id'=>$gs, 'AlumnosNorma.norma_id'=>'2')));
                $this->Alumno->recursive = 1;
                $alumnos = $this->Alumno->find('all',array('conditions'=>array('Alumno.id'=> $alumnos_id)));
                $descripcion= $alumnos['0']['GradosSeccione']['0']['descripcion'];
                //debug($alumnos);
                $this->set(compact('alumnos', 'descripcion'));
                //Import /app/Vendor/Fpdf
                App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                //Assign layout to /app/View/Layout/pdf.ctp
                $this->layout = 'pdf'; //this will use the pdf.ctp layout
                //Set fpdf variable to use in view
                $this->set('fpdf', new FPDF('P','mm','A4'));
                 //pass data to view
                $this->set('data', 'Hello, PDF world');
                //render the pdf view (app/View/[view_name]/pdf.ctp)
                $this->render('fotografias_fpdf');
                                    }
             //funcion utilizada para generar el reporte de autorizados de los niños por grado y seccion en el modulo de administracion y direccion
       public function autorizados(){
           $gradosSeccione = $this->Alumno->GradosSeccione->find('list', array('fields'=>array('GradosSeccione.id','GradosSeccione.descripcion')));
                $this->set('gradosSec', $gradosSeccione);
       }   
       
        public function autorizados_rep($id){
            $this->set('id', $id);
            Configure::write('debug', '0');
                $this->layout ='ajax';
                //echo $id;
                $a = $this->Alumno->AlumnosGradosSeccione->find('list', array('fields'=>array('AlumnosGradosSeccione.alumno_id'),'conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id)));
                //$a = $this->Alumno->find('all', array('contain'=> array('Persona','conditions'=>array('GradosSeccione.id'=> $id))));
                $alumnos = $this->Alumno->find('all', array('conditions'=>array('Alumno.id'=> $a)));
                //$id_personas = $this->Alumno->AlumnosPersona->find('list', array('fields'=>array('AlumnosPersona.persona_id'),'conditions'=>array('AlumnosPersona.alumno_id'=>$a)));
                //$personas = $this->Alumno->Persona->find('all', array('conditions'=>array('Persona.id'=> $id_personas)));
                //echo debug($personas); 
                $this->set('alumnos', $alumnos);
                }
       public function autorizadoss_pdf($id){
                 $a = $this->Alumno->find('all', array('contain'=> array('Persona','conditions'=>array('GradosSeccione.id'=> $id))));
                 $this->set('alumnos', $a);
                 App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                //Assign layout to /app/View/Layout/pdf.ctp
                $this->layout = 'pdf'; //this will use the pdf.ctp layout
                //Set fpdf variable to use in view
                $this->set('fpdf', new FPDF('L','mm','A4'));
                 //pass data to view
                $this->set('data', 'Hello, PDF world');
                //render the pdf view (app/View/[view_name]/pdf.ctp)
                $this->render('autorizados_fpdf');
                 
                }
            
   //funcion para sacar el listado general de alumnos y representantes por ente             
   public function dbpdf_rh(){
            //$gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('contain'=>array('Alumno','AlumnosPersona','conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id))));
 //           $gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('order'=>'Alumno.apellido ASC'));
             $alumnos = $this->Alumno->query("SELECT 
  distinct (alumnos.cedula_escolar), 
 alumnos.apellido as aalumno, 
  alumnos.nombre as nalumno, 
  alumnos.sexo_id, 
  personas.nombre as nrepresentante, 
  personas.apellido as arepresentante,
  personas.entes, 
  grados_secciones.descripcion as grado, 
  tipo_personas.descripcion as parentesco
FROM 
  public.alumnos, 
  public.personas, 
  public.alumnos_personas, 
  public.grados_secciones, 
  public.alumnos_grados_secciones, 
  public.personas_tipo_personas, 
  public.tipo_personas
WHERE 
  alumnos.id = alumnos_personas.alumno_id AND
  personas.id = alumnos_personas.persona_id AND
  personas.id = personas_tipo_personas.persona_id AND
  alumnos_grados_secciones.alumno_id = alumnos.id AND
  alumnos_grados_secciones.grados_seccione_id = grados_secciones.id AND
  personas_tipo_personas.tipo_persona_id = tipo_personas.id AND
  personas.representante = 'Si' AND 
  personas.autorizado = 'Si' AND 
  alumnos.estatu_id = 2 
  
 
ORDER BY
 alumnos.cedula_escolar;");
			//echo debug($gradosSecciones); personas.entes = '0' grados_secciones.descripcion
   //         foreach ($gradosSecciones as $datos):
            //echo debug($datos);
     //       $id_g_s = $datos['AlumnosGradosSeccione']['grados_seccione_id'];
       //     endforeach;
       //     $nombre_gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id'=>$id_g_s)));
            $this->set(compact('alumnos'));
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('L','mm','A4'));
    //pass data to view
   // $this->set('data', 'Hello, PDF world');
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('pdf_rh');
            
        }

        
        
                }///cierre del controller

                
                /*array('fields'=>array('Alumno.nombre', 'Alumno.apellido','Alumno.id' ,'Alumno.cedula_escolar', */ 