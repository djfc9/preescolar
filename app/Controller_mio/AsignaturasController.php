<?php
App::uses('AppController', 'Controller');
/**
 * Asignaturas Controller
 *
 * @property Asignatura $Asignatura
 * @property PaginatorComponent $Paginator
 */
class AsignaturasController extends AppController {

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
		$this->Asignatura->recursive = 0;
		$this->set('asignaturas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Asignatura->exists($id)) {
			throw new NotFoundException(__('Invalid asignatura'));
		}
		$options = array('conditions' => array('Asignatura.' . $this->Asignatura->primaryKey => $id));
		$this->set('asignatura', $this->Asignatura->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Asignatura->create();
			if ($this->Asignatura->save($this->request->data)) {
				$this->Session->setFlash(__('The asignatura has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asignatura could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Asignatura->exists($id)) {
			throw new NotFoundException(__('Invalid asignatura'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Asignatura->save($this->request->data)) {
				$this->Session->setFlash(__('The asignatura has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asignatura could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asignatura.' . $this->Asignatura->primaryKey => $id));
			$this->request->data = $this->Asignatura->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Asignatura->id = $id;
		if (!$this->Asignatura->exists()) {
			throw new NotFoundException(__('Invalid asignatura'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Asignatura->delete()) {
			$this->Session->setFlash(__('The asignatura has been deleted.'));
		} else {
			$this->Session->setFlash(__('The asignatura could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
