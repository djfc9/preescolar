<?php
App::uses('AppController', 'Controller');
/**
 * TipoPartos Controller
 *
 * @property TipoParto $TipoParto
 * @property PaginatorComponent $Paginator
 */
class TipoPartosController extends AppController {

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
		$this->TipoParto->recursive = 0;
		$this->set('tipoPartos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TipoParto->exists($id)) {
			throw new NotFoundException(__('Invalid tipo parto'));
		}
		$options = array('conditions' => array('TipoParto.' . $this->TipoParto->primaryKey => $id));
		$this->set('tipoParto', $this->TipoParto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipoParto->create();
			if ($this->TipoParto->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo parto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo parto could not be saved. Please, try again.'));
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
		if (!$this->TipoParto->exists($id)) {
			throw new NotFoundException(__('Invalid tipo parto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TipoParto->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo parto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo parto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TipoParto.' . $this->TipoParto->primaryKey => $id));
			$this->request->data = $this->TipoParto->find('first', $options);
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
		$this->TipoParto->id = $id;
		if (!$this->TipoParto->exists()) {
			throw new NotFoundException(__('Invalid tipo parto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TipoParto->delete()) {
			$this->Session->setFlash(__('The tipo parto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipo parto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
