<?php
App::uses('AppController', 'Controller');
/**
 * ProblemaAprendizajes Controller
 *
 * @property ProblemaAprendizaje $ProblemaAprendizaje
 * @property PaginatorComponent $Paginator
 */
class ProblemaAprendizajesController extends AppController {

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
		$this->ProblemaAprendizaje->recursive = 0;
		$this->set('problemaAprendizajes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProblemaAprendizaje->exists($id)) {
			throw new NotFoundException(__('Invalid problema aprendizaje'));
		}
		$options = array('conditions' => array('ProblemaAprendizaje.' . $this->ProblemaAprendizaje->primaryKey => $id));
		$this->set('problemaAprendizaje', $this->ProblemaAprendizaje->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProblemaAprendizaje->create();
			if ($this->ProblemaAprendizaje->save($this->request->data)) {
				$this->Session->setFlash(__('The problema aprendizaje has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problema aprendizaje could not be saved. Please, try again.'));
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
		if (!$this->ProblemaAprendizaje->exists($id)) {
			throw new NotFoundException(__('Invalid problema aprendizaje'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProblemaAprendizaje->save($this->request->data)) {
				$this->Session->setFlash(__('The problema aprendizaje has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problema aprendizaje could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProblemaAprendizaje.' . $this->ProblemaAprendizaje->primaryKey => $id));
			$this->request->data = $this->ProblemaAprendizaje->find('first', $options);
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
		$this->ProblemaAprendizaje->id = $id;
		if (!$this->ProblemaAprendizaje->exists()) {
			throw new NotFoundException(__('Invalid problema aprendizaje'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProblemaAprendizaje->delete()) {
			$this->Session->setFlash(__('The problema aprendizaje has been deleted.'));
		} else {
			$this->Session->setFlash(__('The problema aprendizaje could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
