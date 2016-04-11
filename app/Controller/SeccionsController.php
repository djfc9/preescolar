<?php
App::uses('AppController', 'Controller');
/**
 * Seccions Controller
 *
 * @property Seccion $Seccion
 * @property PaginatorComponent $Paginator
 */
class SeccionsController extends AppController {

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
		$this->Seccion->recursive = 0;
		$this->set('seccions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Seccion->exists($id)) {
			throw new NotFoundException(__('Invalid seccion'));
		}
		$options = array('conditions' => array('Seccion.' . $this->Seccion->primaryKey => $id));
		$this->set('seccion', $this->Seccion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Seccion->create();
			if ($this->Seccion->save($this->request->data)) {
				$this->Session->setFlash(__('La seccion ha sido creada exitosamente.!'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('La seccion no ha sido creada. Por favor, intente nuevamente.'));
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
		if (!$this->Seccion->exists($id)) {
			throw new NotFoundException(__('Invalid seccion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Seccion->save($this->request->data)) {
				$this->Session->setFlash(__('The seccion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seccion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Seccion.' . $this->Seccion->primaryKey => $id));
			$this->request->data = $this->Seccion->find('first', $options);
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
		$this->Seccion->id = $id;
		if (!$this->Seccion->exists()) {
			throw new NotFoundException(__('Invalid seccion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Seccion->delete()) {
			$this->Session->setFlash(__('The seccion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The seccion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
