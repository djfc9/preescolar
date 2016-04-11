<?php
App::uses('AppController', 'Controller');
/**
 * ControlesPediatricos Controller
 *
 * @property ControlesPediatrico $ControlesPediatrico
 * @property PaginatorComponent $Paginator
 */
class ControlesPediatricosController extends AppController {

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
		$this->ControlesPediatrico->recursive = 0;
		$this->set('controlesPediatricos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ControlesPediatrico->exists($id)) {
			throw new NotFoundException(__('Invalid controles pediatrico'));
		}
		$options = array('conditions' => array('ControlesPediatrico.' . $this->ControlesPediatrico->primaryKey => $id));
		$this->set('controlesPediatrico', $this->ControlesPediatrico->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ControlesPediatrico->create();
			if ($this->ControlesPediatrico->save($this->request->data)) {
				$this->Session->setFlash(__('The controles pediatrico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The controles pediatrico could not be saved. Please, try again.'));
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
		if (!$this->ControlesPediatrico->exists($id)) {
			throw new NotFoundException(__('Invalid controles pediatrico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ControlesPediatrico->save($this->request->data)) {
				$this->Session->setFlash(__('The controles pediatrico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The controles pediatrico could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ControlesPediatrico.' . $this->ControlesPediatrico->primaryKey => $id));
			$this->request->data = $this->ControlesPediatrico->find('first', $options);
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
		$this->ControlesPediatrico->id = $id;
		if (!$this->ControlesPediatrico->exists()) {
			throw new NotFoundException(__('Invalid controles pediatrico'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ControlesPediatrico->delete()) {
			$this->Session->setFlash(__('The controles pediatrico has been deleted.'));
		} else {
			$this->Session->setFlash(__('The controles pediatrico could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
