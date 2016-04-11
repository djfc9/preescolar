<?php
App::uses('AppController', 'Controller');
/**
 * ComplicacionesEmbarazos Controller
 *
 * @property ComplicacionesEmbarazo $ComplicacionesEmbarazo
 * @property PaginatorComponent $Paginator
 */
class ComplicacionesEmbarazosController extends AppController {

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
		$this->ComplicacionesEmbarazo->recursive = 0;
		$this->set('complicacionesEmbarazos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ComplicacionesEmbarazo->exists($id)) {
			throw new NotFoundException(__('Invalid complicaciones embarazo'));
		}
		$options = array('conditions' => array('ComplicacionesEmbarazo.' . $this->ComplicacionesEmbarazo->primaryKey => $id));
		$this->set('complicacionesEmbarazo', $this->ComplicacionesEmbarazo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ComplicacionesEmbarazo->create();
			if ($this->ComplicacionesEmbarazo->save($this->request->data)) {
				$this->Session->setFlash(__('The complicaciones embarazo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The complicaciones embarazo could not be saved. Please, try again.'));
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
		if (!$this->ComplicacionesEmbarazo->exists($id)) {
			throw new NotFoundException(__('Invalid complicaciones embarazo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ComplicacionesEmbarazo->save($this->request->data)) {
				$this->Session->setFlash(__('The complicaciones embarazo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The complicaciones embarazo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ComplicacionesEmbarazo.' . $this->ComplicacionesEmbarazo->primaryKey => $id));
			$this->request->data = $this->ComplicacionesEmbarazo->find('first', $options);
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
		$this->ComplicacionesEmbarazo->id = $id;
		if (!$this->ComplicacionesEmbarazo->exists()) {
			throw new NotFoundException(__('Invalid complicaciones embarazo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ComplicacionesEmbarazo->delete()) {
			$this->Session->setFlash(__('The complicaciones embarazo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The complicaciones embarazo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
