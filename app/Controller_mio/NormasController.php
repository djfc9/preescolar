<?php
App::uses('AppController', 'Controller');
/**
 * Normas Controller
 *
 * @property Norma $Norma
 * @property PaginatorComponent $Paginator
 */
class NormasController extends AppController {

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
		$this->Norma->recursive = 0;
		$this->set('normas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Norma->exists($id)) {
			throw new NotFoundException(__('Invalid norma'));
		}
		$options = array('conditions' => array('Norma.' . $this->Norma->primaryKey => $id));
		$this->set('norma', $this->Norma->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Norma->create();
			if ($this->Norma->save($this->request->data)) {
				$this->Session->setFlash(__('The norma has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The norma could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->Norma->Alumno->find('list');
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
		if (!$this->Norma->exists($id)) {
			throw new NotFoundException(__('Invalid norma'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Norma->save($this->request->data)) {
				$this->Session->setFlash(__('The norma has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The norma could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Norma.' . $this->Norma->primaryKey => $id));
			$this->request->data = $this->Norma->find('first', $options);
		}
		$alumnos = $this->Norma->Alumno->find('list');
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
		$this->Norma->id = $id;
		if (!$this->Norma->exists()) {
			throw new NotFoundException(__('Invalid norma'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Norma->delete()) {
			$this->Session->setFlash(__('The norma has been deleted.'));
		} else {
			$this->Session->setFlash(__('The norma could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
