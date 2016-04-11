<?php
App::uses('AppController', 'Controller');
/**
 * AlumnosGradosSecciones Controller
 *
 * @property AlumnosGradosSeccione $AlumnosGradosSeccione
 * @property PaginatorComponent $Paginator
 */
class AlumnosGradosSeccionesController extends AppController {

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
		$this->AlumnosGradosSeccione->recursive = 0;
		$this->set('alumnosGradosSecciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlumnosGradosSeccione->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos grados seccione'));
		}
		$options = array('conditions' => array('AlumnosGradosSeccione.' . $this->AlumnosGradosSeccione->primaryKey => $id));
		$this->set('alumnosGradosSeccione', $this->AlumnosGradosSeccione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlumnosGradosSeccione->create();
			if ($this->AlumnosGradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos grados seccione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos grados seccione could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->AlumnosGradosSeccione->Alumno->find('list');
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list');
		$this->set(compact('alumnos', 'gradosSecciones'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AlumnosGradosSeccione->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos grados seccione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AlumnosGradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos grados seccione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos grados seccione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlumnosGradosSeccione.' . $this->AlumnosGradosSeccione->primaryKey => $id));
			$this->request->data = $this->AlumnosGradosSeccione->find('first', $options);
		}
		$alumnos = $this->AlumnosGradosSeccione->Alumno->find('list');
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list');
		$this->set(compact('alumnos', 'gradosSecciones'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AlumnosGradosSeccione->id = $id;
		if (!$this->AlumnosGradosSeccione->exists()) {
			throw new NotFoundException(__('Invalid alumnos grados seccione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlumnosGradosSeccione->delete()) {
			$this->Session->setFlash(__('The alumnos grados seccione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alumnos grados seccione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function bd_alumnos($id) {
            $this->layout ='ajax';
            Configure::write('debug' ,'0');
                $gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('order'=>'Alumno.apellido ASC','conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id)));
		//echo debug($gradosSecciones);
                if(empty($gradosSecciones)){
                    echo "<script>alert('Seleccion sin Alumnos'); document.location=('/preescolar/alumnos/bd'); </script>";
                }
		
		$this->set(compact('alumnos', 'gradosSecciones'));
	}
        
        public function dbpdf($id){
            //$gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('contain'=>array('Alumno','AlumnosPersona','conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id))));
            $gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('order'=>'Alumno.apellido ASC','conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id)));
            //echo debug($gradosSecciones);
            foreach ($gradosSecciones as $datos):
            //echo debug($datos);
            $id_g_s = $datos['AlumnosGradosSeccione']['grados_seccione_id'];
            endforeach;
            $nombre_gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id'=>$id_g_s)));
            $this->set(compact('gradosSecciones','nombre_gradosSecciones'));
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('L','mm','A4'));
    //pass data to view
   // $this->set('data', 'Hello, PDF world');
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('pdf');
            
        }
        
                }
