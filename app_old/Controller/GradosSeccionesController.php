<?php
App::uses('AppController', 'Controller');
/**
 * GradosSecciones Controller
 *
 * @property GradosSeccione $GradosSeccione
 * @property PaginatorComponent $Paginator
 */
class GradosSeccionesController extends AppController {

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
		$this->GradosSeccione->recursive = 0;
		$this->set('gradosSecciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GradosSeccione->exists($id)) {
			throw new NotFoundException(__('Invalid grados seccione'));
		}
		$options = array('conditions' => array('GradosSeccione.' . $this->GradosSeccione->primaryKey => $id));
		$this->set('gradosSeccione', $this->GradosSeccione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    ///aqui creo los nombre de los grados para reg en esta tabla
                    $datos = $this->request->data;
                    //echo debug($datos);
                    $g_id =$this->request->data['GradosSeccione']['grado_id'];
                    $s_id =$this->request->data['GradosSeccione']['seccion_id'];
                    $grados = $this->GradosSeccione->Grado->find('all', array('conditions'=>array('Grado.id'=> $g_id)));
                    $seccions = $this->GradosSeccione->Seccion->find('all', array('conditions'=>array('Seccion.id'=> $s_id)));
                    $g = $grados['0']['Grado']['descripcion'];
                    $s = $seccions['0']['Seccion']['descripcion'];
                    //debug($seccions);
                    $desc = $g."-".$s;
                    //echo $desc;
			$this->GradosSeccione->create();
                         $this->request->data['GradosSeccione']['descripcion'] = $desc;
                         $this->request->data['GradosSeccione']['cupos_asignado'] = 0;
			if ($this->GradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('Los cupos han sido creados.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grados seccione could not be saved. Please, try again.'));
			}
		}
		$grados = $this->GradosSeccione->Grado->find('list');
		$seccions = $this->GradosSeccione->Seccion->find('list');
		$alumnos = $this->GradosSeccione->Alumno->find('list');
		$personas = $this->GradosSeccione->Persona->find('list');
		$this->set(compact('grados', 'seccions', 'alumnos', 'personas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GradosSeccione->exists($id)) {
			throw new NotFoundException(__('Invalid grados seccione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('The grados seccione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grados seccione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GradosSeccione.' . $this->GradosSeccione->primaryKey => $id));
			$this->request->data = $this->GradosSeccione->find('first', $options);
		}
		$grados = $this->GradosSeccione->Grado->find('list');
		$seccions = $this->GradosSeccione->Seccion->find('list');
		$alumnos = $this->GradosSeccione->Alumno->find('list');
		$personas = $this->GradosSeccione->Persona->find('list');
		$this->set(compact('grados', 'seccions', 'alumnos', 'personas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GradosSeccione->id = $id;
		if (!$this->GradosSeccione->exists()) {
			throw new NotFoundException(__('Invalid grados seccione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GradosSeccione->delete()) {
			$this->Session->setFlash(__('El Registro ha sido Eliminado con exito...'));
		} else {
			$this->Session->setFlash(__('The grados seccione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        
                public function alumnos($id = null) {
                    /*$sesion = $this->Session->read('Auth'); 
                    //debug($sesion);
                    $id_prof = $sesion['User']['id'];*/
                    //echo $id;
                     $data = $this->GradosSeccione->Persona->find('all', array('conditions'=>array('Persona.user_id'=> $id)));
                    //debug($data);
                    foreach ($data as $info):
                        //debug($info);
                    endforeach;
                  $al = $info['GradosSeccione']['0']['id'];
                $this->GradosSeccione->AlumnosGradosSeccione->recursive = -1;
                $alumnos = $this->GradosSeccione->AlumnosGradosSeccione->find('list', array('fields'=>array('AlumnosGradosSeccione.alumno_id'),'conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=> $al)));
                //debug($alumnos);
                if(!empty($alumnos)){
                
                $this->GradosSeccione->Alumno->recursive = -1;
                $listado = $this->GradosSeccione->Alumno->find('all', array('fields'=>
                    array('Alumno.cedula_escolar','Alumno.nombre','Alumno.apellido','Alumno.fecha_nacimiento' ,'Alumno.telefono_habitacion')), array('conditions'=>array('Alumno.id'=> $alumnos)));
                //debug($listado);
                $this->set(compact('listado' , $this->Paginator->paginate()));
                }
                else
                {
                    echo "<script>alert('Usted no tiene estudiantes asignados');"
                    . "document.location=('/preescolar/personas/principal');</script>";
                }
	}

        
                }
