<?php
App::uses('AppController', 'Controller');
/**
 * TipoPersonas Controller
 *
 * @property TipoPersona $TipoPersona
 * @property PaginatorComponent $Paginator
 */
class TipoPersonasController extends AppController {

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
		$this->TipoPersona->recursive = 0;
		$this->set('tipoPersonas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TipoPersona->exists($id)) {
			throw new NotFoundException(__('Invalid tipo persona'));
		}
		$options = array('conditions' => array('TipoPersona.' . $this->TipoPersona->primaryKey => $id));
		$this->set('tipoPersona', $this->TipoPersona->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipoPersona->create();
			if ($this->TipoPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo persona could not be saved. Please, try again.'));
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
		if (!$this->TipoPersona->exists($id)) {
			throw new NotFoundException(__('Invalid tipo persona'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TipoPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo persona could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TipoPersona.' . $this->TipoPersona->primaryKey => $id));
			$this->request->data = $this->TipoPersona->find('first', $options);
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
		$this->TipoPersona->id = $id;
		if (!$this->TipoPersona->exists()) {
			throw new NotFoundException(__('Invalid tipo persona'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TipoPersona->delete()) {
			$this->Session->setFlash(__('The tipo persona has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipo persona could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
