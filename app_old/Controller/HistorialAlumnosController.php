<?php
App::uses('AppController', 'Controller');
/**
 * HistorialAlumnos Controller
 *
 * @property HistorialAlumno $HistorialAlumno
 * @property PaginatorComponent $Paginator
 */
class HistorialAlumnosController extends AppController {

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
		$this->HistorialAlumno->recursive = 0;
		$this->set('historialAlumnos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HistorialAlumno->exists($id)) {
			throw new NotFoundException(__('Invalid historial alumno'));
		}
		$options = array('conditions' => array('HistorialAlumno.' . $this->HistorialAlumno->primaryKey => $id));
		$this->set('historialAlumno', $this->HistorialAlumno->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HistorialAlumno->create();
			if ($this->HistorialAlumno->save($this->request->data)) {
				$this->Session->setFlash(__('The historial alumno has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historial alumno could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->HistorialAlumno->Alumno->find('list');
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
		if (!$this->HistorialAlumno->exists($id)) {
			throw new NotFoundException(__('Invalid historial alumno'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HistorialAlumno->save($this->request->data)) {
				$this->Session->setFlash(__('The historial alumno has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historial alumno could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HistorialAlumno.' . $this->HistorialAlumno->primaryKey => $id));
			$this->request->data = $this->HistorialAlumno->find('first', $options);
		}
		$alumnos = $this->HistorialAlumno->Alumno->find('list');
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
		$this->HistorialAlumno->id = $id;
		if (!$this->HistorialAlumno->exists()) {
			throw new NotFoundException(__('Invalid historial alumno'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HistorialAlumno->delete()) {
			$this->Session->setFlash(__('The historial alumno has been deleted.'));
		} else {
			$this->Session->setFlash(__('The historial alumno could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
