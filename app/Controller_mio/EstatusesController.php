<?php
App::uses('AppController', 'Controller');
/**
 * Estatuses Controller
 *
 * @property Estatus $Estatus
 * @property PaginatorComponent $Paginator
 */
class EstatusesController extends AppController {

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
		$this->Estatus->recursive = 0;
		$this->set('estatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Estatus->exists($id)) {
			throw new NotFoundException(__('Invalid estatus'));
		}
		$options = array('conditions' => array('Estatus.' . $this->Estatus->primaryKey => $id));
		$this->set('estatus', $this->Estatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estatus->create();
			if ($this->Estatus->save($this->request->data)) {
				$this->Session->setFlash(__('The estatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estatus could not be saved. Please, try again.'));
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
		if (!$this->Estatus->exists($id)) {
			throw new NotFoundException(__('Invalid estatus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Estatus->save($this->request->data)) {
				$this->Session->setFlash(__('The estatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estatus could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Estatus.' . $this->Estatus->primaryKey => $id));
			$this->request->data = $this->Estatus->find('first', $options);
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
		$this->Estatus->id = $id;
		if (!$this->Estatus->exists()) {
			throw new NotFoundException(__('Invalid estatus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Estatus->delete()) {
			$this->Session->setFlash(__('The estatus has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estatus could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
