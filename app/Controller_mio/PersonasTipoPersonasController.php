<?php
App::uses('AppController', 'Controller');
/**
 * PersonasTipoPersonas Controller
 *
 * @property PersonasTipoPersona $PersonasTipoPersona
 * @property PaginatorComponent $Paginator
 */
class PersonasTipoPersonasController extends AppController {

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
		$this->PersonasTipoPersona->recursive = 0;
		$this->set('personasTipoPersonas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PersonasTipoPersona->exists($id)) {
			throw new NotFoundException(__('Invalid personas tipo persona'));
		}
		$options = array('conditions' => array('PersonasTipoPersona.' . $this->PersonasTipoPersona->primaryKey => $id));
		$this->set('personasTipoPersona', $this->PersonasTipoPersona->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PersonasTipoPersona->create();
			if ($this->PersonasTipoPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The personas tipo persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personas tipo persona could not be saved. Please, try again.'));
			}
		}
		$tipoPersonas = $this->PersonasTipoPersona->TipoPersona->find('list');
		$personas = $this->PersonasTipoPersona->Persona->find('list');
		$this->set(compact('tipoPersonas', 'personas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PersonasTipoPersona->exists($id)) {
			throw new NotFoundException(__('Invalid personas tipo persona'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PersonasTipoPersona->save($this->request->data)) {
				$this->Session->setFlash(__('The personas tipo persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personas tipo persona could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PersonasTipoPersona.' . $this->PersonasTipoPersona->primaryKey => $id));
			$this->request->data = $this->PersonasTipoPersona->find('first', $options);
		}
		$tipoPersonas = $this->PersonasTipoPersona->TipoPersona->find('list');
		$personas = $this->PersonasTipoPersona->Persona->find('list');
		$this->set(compact('tipoPersonas', 'personas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PersonasTipoPersona->id = $id;
		if (!$this->PersonasTipoPersona->exists()) {
			throw new NotFoundException(__('Invalid personas tipo persona'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PersonasTipoPersona->delete()) {
			$this->Session->setFlash(__('The personas tipo persona has been deleted.'));
		} else {
			$this->Session->setFlash(__('The personas tipo persona could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
