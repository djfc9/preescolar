<?php
App::uses('AppController', 'Controller');
/**
 * AlumnosProblemasAprendizajes Controller
 *
 * @property AlumnosProblemasAprendizaje $AlumnosProblemasAprendizaje
 * @property PaginatorComponent $Paginator
 */
class AlumnosProblemasAprendizajesController extends AppController {

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
		$this->AlumnosProblemasAprendizaje->recursive = 0;
		$this->set('alumnosProblemasAprendizajes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlumnosProblemasAprendizaje->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos problemas aprendizaje'));
		}
		$options = array('conditions' => array('AlumnosProblemasAprendizaje.' . $this->AlumnosProblemasAprendizaje->primaryKey => $id));
		$this->set('alumnosProblemasAprendizaje', $this->AlumnosProblemasAprendizaje->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlumnosProblemasAprendizaje->create();
			if ($this->AlumnosProblemasAprendizaje->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos problemas aprendizaje has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos problemas aprendizaje could not be saved. Please, try again.'));
			}
		}
		$problemaAprendizajes = $this->AlumnosProblemasAprendizaje->ProblemaAprendizaje->find('list');
		$alumnos = $this->AlumnosProblemasAprendizaje->Alumno->find('list');
		$this->set(compact('problemaAprendizajes', 'alumnos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AlumnosProblemasAprendizaje->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos problemas aprendizaje'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AlumnosProblemasAprendizaje->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos problemas aprendizaje has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos problemas aprendizaje could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlumnosProblemasAprendizaje.' . $this->AlumnosProblemasAprendizaje->primaryKey => $id));
			$this->request->data = $this->AlumnosProblemasAprendizaje->find('first', $options);
		}
		$problemaAprendizajes = $this->AlumnosProblemasAprendizaje->ProblemaAprendizaje->find('list');
		$alumnos = $this->AlumnosProblemasAprendizaje->Alumno->find('list');
		$this->set(compact('problemaAprendizajes', 'alumnos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AlumnosProblemasAprendizaje->id = $id;
		if (!$this->AlumnosProblemasAprendizaje->exists()) {
			throw new NotFoundException(__('Invalid alumnos problemas aprendizaje'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlumnosProblemasAprendizaje->delete()) {
			$this->Session->setFlash(__('The alumnos problemas aprendizaje has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alumnos problemas aprendizaje could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
