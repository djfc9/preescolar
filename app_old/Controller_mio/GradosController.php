<?php
App::uses('AppController', 'Controller');
/**
 * Grados Controller
 *
 * @property Grado $Grado
 * @property PaginatorComponent $Paginator
 */
class GradosController extends AppController {

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
		$this->Grado->recursive = 0;
		$this->set('grados', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Grado->exists($id)) {
			throw new NotFoundException(__('Invalid grado'));
		}
		$options = array('conditions' => array('Grado.' . $this->Grado->primaryKey => $id));
		$this->set('grado', $this->Grado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Grado->create();
                        /*$data = $this->request->data;
                        debug($data);*/
			if ($this->Grado->save($this->request->data)) {
				$this->Session->setFlash(__('El grado ha sido creado Satisfactoriamente..'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El grado no ha sido creado. Por favor, intente nuevamente.'));
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
		if (!$this->Grado->exists($id)) {
			throw new NotFoundException(__('Invalid grado'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Grado->save($this->request->data)) {
				$this->Session->setFlash(__('The grado has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grado could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Grado.' . $this->Grado->primaryKey => $id));
			$this->request->data = $this->Grado->find('first', $options);
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
		$this->Grado->id = $id;
		if (!$this->Grado->exists()) {
			throw new NotFoundException(__('Invalid grado'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Grado->delete()) {
			$this->Session->setFlash(__('The grado has been deleted.'));
		} else {
			$this->Session->setFlash(__('The grado could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
