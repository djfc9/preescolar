<?php
App::uses('AppController', 'Controller');
/**
 * AlumnosPersonas Controller
 *
 * @property AlumnosPersona $AlumnosPersona
 * @property PaginatorComponent $Paginator
 */
class AlumnosPersonasController extends AppController {

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
		$this->AlumnosPersona->recursive = 0;
		$this->set('alumnosPersonas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlumnosPersona->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos persona'));
		}
		$options = array('conditions' => array('AlumnosPersona.' . $this->AlumnosPersona->primaryKey => $id));
		$this->set('alumnosPersona', $this->AlumnosPersona->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlumnosPersona->create();
			if ($this->AlumnosPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos persona could not be saved. Please, try again.'));
			}
		}
		$personas = $this->AlumnosPersona->Persona->find('list');
		$alumnos = $this->AlumnosPersona->Alumno->find('list');
		$this->set(compact('personas', 'alumnos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AlumnosPersona->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos persona'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AlumnosPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos persona could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlumnosPersona.' . $this->AlumnosPersona->primaryKey => $id));
			$this->request->data = $this->AlumnosPersona->find('first', $options);
		}
		$personas = $this->AlumnosPersona->Persona->find('list');
		$alumnos = $this->AlumnosPersona->Alumno->find('list');
		$this->set(compact('personas', 'alumnos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AlumnosPersona->id = $id;
		if (!$this->AlumnosPersona->exists()) {
			throw new NotFoundException(__('Invalid alumnos persona'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlumnosPersona->delete()) {
			$this->Session->setFlash(__('The alumnos persona has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alumnos persona could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
