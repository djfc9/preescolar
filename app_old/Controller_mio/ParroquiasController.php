<?php
App::uses('AppController', 'Controller');
/**
 * Parroquias Controller
 *
 * @property Parroquia $Parroquia
 * @property PaginatorComponent $Paginator
 */
class ParroquiasController extends AppController {

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
		$this->Parroquia->recursive = 0;
		$this->set('parroquias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parroquia->exists($id)) {
			throw new NotFoundException(__('Invalid parroquia'));
		}
		$options = array('conditions' => array('Parroquia.' . $this->Parroquia->primaryKey => $id));
		$this->set('parroquia', $this->Parroquia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parroquia->create();
			if ($this->Parroquia->save($this->request->data)) {
				$this->Session->setFlash(__('The parroquia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parroquia could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Parroquia->Estado->find('list');
		$municipios = $this->Parroquia->Municipio->find('list');
		$this->set(compact('estados', 'municipios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Parroquia->exists($id)) {
			throw new NotFoundException(__('Invalid parroquia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parroquia->save($this->request->data)) {
				$this->Session->setFlash(__('The parroquia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parroquia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parroquia.' . $this->Parroquia->primaryKey => $id));
			$this->request->data = $this->Parroquia->find('first', $options);
		}
		$estados = $this->Parroquia->Estado->find('list');
		$municipios = $this->Parroquia->Municipio->find('list');
		$this->set(compact('estados', 'municipios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Parroquia->id = $id;
		if (!$this->Parroquia->exists()) {
			throw new NotFoundException(__('Invalid parroquia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parroquia->delete()) {
			$this->Session->setFlash(__('The parroquia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parroquia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
