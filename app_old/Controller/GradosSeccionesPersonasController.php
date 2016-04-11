<?php
App::uses('AppController', 'Controller');
/**
 * GradosSeccionesPersonas Controller
 *
 * @property GradosSeccionesPersona $GradosSeccionesPersona
 * @property PaginatorComponent $Paginator
 */
class GradosSeccionesPersonasController extends AppController {

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
		$this->GradosSeccionesPersona->recursive = 2;
		$this->set('gradosSeccionesPersonas', $this->Paginator->paginate());
               // $id_gradoSeccion = $this->GradosSeccionesPersona->find('list');
                //$descripcion = $this->GradosSeccionesPersona->GradosSeccione->find('list'/*, array('fields'=>array('GradosSeccione.descripcion')),array('conditions'=>array('GradosSeccione.id'=> $id_gradoSeccion))*/);
               // $descripcion = $this->GradosSeccionesPersona->GradosSeccione->find('all');
                //echo debug($descripcion);
                
        }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GradosSeccionesPersona->exists($id)) {
			throw new NotFoundException(__('Invalid grados secciones persona'));
		}
		$options = array('conditions' => array('GradosSeccionesPersona.' . $this->GradosSeccionesPersona->primaryKey => $id));
		$this->set('gradosSeccionesPersona', $this->GradosSeccionesPersona->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GradosSeccionesPersona->create();
			if ($this->GradosSeccionesPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The grados secciones persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grados secciones persona could not be saved. Please, try again.'));
			}
		}
		$personas = $this->GradosSeccionesPersona->Persona->find('list');
                $gradosSecciones = $this->GradosSeccionesPersona->GradosSeccione->find('list');
               // $gradosSeccione = $this->->GradosSeccione->find('list');
		$this->set(compact('personas', 'gradosSecciones'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GradosSeccionesPersona->exists($id)) {
			throw new NotFoundException(__('Invalid grados secciones persona'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GradosSeccionesPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The grados secciones persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grados secciones persona could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GradosSeccionesPersona.' . $this->GradosSeccionesPersona->primaryKey => $id));
			$this->request->data = $this->GradosSeccionesPersona->find('first', $options);
		}
		$personas = $this->GradosSeccionesPersona->Persona->find('list');
		$this->set(compact('personas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GradosSeccionesPersona->id = $id;
		if (!$this->GradosSeccionesPersona->exists()) {
			throw new NotFoundException(__('Invalid grados secciones persona'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GradosSeccionesPersona->delete()) {
			$this->Session->setFlash(__('The grados secciones persona has been deleted.'));
		} else {
			$this->Session->setFlash(__('The grados secciones persona could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
