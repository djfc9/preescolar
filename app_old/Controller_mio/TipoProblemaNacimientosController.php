<?php
App::uses('AppController', 'Controller');
/**
 * TipoProblemaNacimientos Controller
 *
 * @property TipoProblemaNacimiento $TipoProblemaNacimiento
 * @property PaginatorComponent $Paginator
 */
class TipoProblemaNacimientosController extends AppController {

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
		$this->TipoProblemaNacimiento->recursive = 0;
		$this->set('tipoProblemaNacimientos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TipoProblemaNacimiento->exists($id)) {
			throw new NotFoundException(__('Invalid tipo problema nacimiento'));
		}
		$options = array('conditions' => array('TipoProblemaNacimiento.' . $this->TipoProblemaNacimiento->primaryKey => $id));
		$this->set('tipoProblemaNacimiento', $this->TipoProblemaNacimiento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipoProblemaNacimiento->create();
			if ($this->TipoProblemaNacimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo problema nacimiento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo problema nacimiento could not be saved. Please, try again.'));
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
		if (!$this->TipoProblemaNacimiento->exists($id)) {
			throw new NotFoundException(__('Invalid tipo problema nacimiento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TipoProblemaNacimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo problema nacimiento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo problema nacimiento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TipoProblemaNacimiento.' . $this->TipoProblemaNacimiento->primaryKey => $id));
			$this->request->data = $this->TipoProblemaNacimiento->find('first', $options);
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
		$this->TipoProblemaNacimiento->id = $id;
		if (!$this->TipoProblemaNacimiento->exists()) {
			throw new NotFoundException(__('Invalid tipo problema nacimiento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TipoProblemaNacimiento->delete()) {
			$this->Session->setFlash(__('The tipo problema nacimiento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipo problema nacimiento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
