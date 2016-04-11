<?php
App::uses('AppController', 'Controller');
/**
 * Boletas Controller
 *
 * @property Boleta $Boleta
 * @property PaginatorComponent $Paginator
 */
class BoletasController extends AppController {

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
		$this->Boleta->recursive = 0;
		$this->set('boletas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Boleta->exists($id)) {
			throw new NotFoundException(__('Invalid boleta'));
		}
		$options = array('conditions' => array('Boleta.' . $this->Boleta->primaryKey => $id));
		$this->set('boleta', $this->Boleta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Boleta->create();
			if ($this->Boleta->save($this->request->data)) {
				$this->Session->setFlash(__('The boleta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The boleta could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->Boleta->Alumno->find('list');
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
		if (!$this->Boleta->exists($id)) {
			throw new NotFoundException(__('Invalid boleta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Boleta->save($this->request->data)) {
				$this->Session->setFlash(__('The boleta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The boleta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Boleta.' . $this->Boleta->primaryKey => $id));
			$this->request->data = $this->Boleta->find('first', $options);
		}
		$alumnos = $this->Boleta->Alumno->find('list');
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
		$this->Boleta->id = $id;
		if (!$this->Boleta->exists()) {
			throw new NotFoundException(__('Invalid boleta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Boleta->delete()) {
			$this->Session->setFlash(__('The boleta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The boleta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
