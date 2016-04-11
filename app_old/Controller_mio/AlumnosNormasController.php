<?php
App::uses('AppController', 'Controller');
/**
 * AlumnosNormas Controller
 *
 * @property AlumnosNorma $AlumnosNorma
 * @property PaginatorComponent $Paginator
 */
class AlumnosNormasController extends AppController {

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
		$this->AlumnosNorma->recursive = 0;
		$this->set('alumnosNormas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlumnosNorma->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos norma'));
		}
		$options = array('conditions' => array('AlumnosNorma.' . $this->AlumnosNorma->primaryKey => $id));
		$this->set('alumnosNorma', $this->AlumnosNorma->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlumnosNorma->create();
			if ($this->AlumnosNorma->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos norma has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos norma could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->AlumnosNorma->Alumno->find('list');
		$normas = $this->AlumnosNorma->Norma->find('list');
		$this->set(compact('alumnos', 'normas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AlumnosNorma->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos norma'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AlumnosNorma->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos norma has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos norma could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlumnosNorma.' . $this->AlumnosNorma->primaryKey => $id));
			$this->request->data = $this->AlumnosNorma->find('first', $options);
		}
		$alumnos = $this->AlumnosNorma->Alumno->find('list');
		$normas = $this->AlumnosNorma->Norma->find('list');
		$this->set(compact('alumnos', 'normas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AlumnosNorma->id = $id;
		if (!$this->AlumnosNorma->exists()) {
			throw new NotFoundException(__('Invalid alumnos norma'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlumnosNorma->delete()) {
			$this->Session->setFlash(__('The alumnos norma has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alumnos norma could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller'=>'personas','action' => 'principal'));
	}
       
                
                
                
                
}
