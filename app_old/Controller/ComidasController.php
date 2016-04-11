<?php
App::uses('AppController', 'Controller');
/**
 * Comidas Controller
 *
 * @property Comida $Comida
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ComidasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comida->recursive = 0;
		$this->set('comidas', $this->Paginator->paginate());
	}
        
        public function index1() {
		$this->Comida->recursive = 0;
		$this->set('comidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            $id = base64_decode($id);
		if (!$this->Comida->exists($id)) {
			throw new NotFoundException(__('Invalid comida'));
		}
		$options = array('conditions' => array('Comida.' . $this->Comida->primaryKey => $id));
		$this->set('comida', $this->Comida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comida->create();
			if ($this->Comida->save($this->request->data)) {
				$this->Session->setFlash(__('El Menú ha sido guardado.'));
				return $this->redirect(array('action' => 'index1'));
			} else {
				$this->Session->setFlash(__('Este menú no ha sido creado. Por favor, intente nuevamente.'));
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
            $id = base64_decode($id);
		if (!$this->Comida->exists($id)) {
			throw new NotFoundException(__('Invalid comida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comida->save($this->request->data)) {
				$this->Session->setFlash(__('The comida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comida.' . $this->Comida->primaryKey => $id));
			$this->request->data = $this->Comida->find('first', $options);
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
		$this->Comida->id = $id;
		if (!$this->Comida->exists()) {
			throw new NotFoundException(__('Invalid comida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comida->delete()) {
			$this->Session->setFlash(__('The comida has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comida could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
