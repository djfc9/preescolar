<?php
App::uses('AppController', 'Controller');
/**
 * Evaluacions Controller
 *
 * @property Evaluacion $Evaluacion
 * @property PaginatorComponent $Paginator
 */
class EvaluacionsController extends AppController {

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
		$this->Evaluacion->recursive = 0;
		$this->set('evaluacions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Evaluacion->exists($id)) {
			throw new NotFoundException(__('Invalid evaluacion'));
		}
		$options = array('conditions' => array('Evaluacion.' . $this->Evaluacion->primaryKey => $id));
		$this->set('evaluacion', $this->Evaluacion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Evaluacion->create();
			if ($this->Evaluacion->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluacion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluacion could not be saved. Please, try again.'));
			}
		}
		$asignaturas = $this->Evaluacion->Asignatura->find('list');
		$alumnos = $this->Evaluacion->Alumno->find('list');
		$this->set(compact('asignaturas', 'alumnos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Evaluacion->exists($id)) {
			throw new NotFoundException(__('Invalid evaluacion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Evaluacion->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluacion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluacion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Evaluacion.' . $this->Evaluacion->primaryKey => $id));
			$this->request->data = $this->Evaluacion->find('first', $options);
		}
		$asignaturas = $this->Evaluacion->Asignatura->find('list');
		$alumnos = $this->Evaluacion->Alumno->find('list');
		$this->set(compact('asignaturas', 'alumnos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Evaluacion->id = $id;
		if (!$this->Evaluacion->exists()) {
			throw new NotFoundException(__('Invalid evaluacion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Evaluacion->delete()) {
			$this->Session->setFlash(__('The evaluacion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The evaluacion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
