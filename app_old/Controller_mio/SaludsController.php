<?php
App::uses('AppController', 'Controller');
/**
 * Saluds Controller
 *
 * @property Salud $Salud
 * @property PaginatorComponent $Paginator
 */
class SaludsController extends AppController {

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
		$this->Salud->recursive = 0;
		$this->set('saluds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Salud->exists($id)) {
			throw new NotFoundException(__('Invalid salud'));
		}
		$options = array('conditions' => array('Salud.' . $this->Salud->primaryKey => $id));
		$this->set('salud', $this->Salud->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($cedula_e = null) {
            
		if ($this->request->is('post')) {
			$this->Salud->create();
                        $c =  strtoupper($this->request->data['Salud']['control_pediatrico']);
                        $e =  strtoupper($this->request->data['Salud']['enfermedad_padecida']);
                        $m =  strtoupper($this->request->data['Salud']['medicamento_fiebre']);
                        $p =  strtoupper($this->request->data['Salud']['poliza_seguros']);
                        $this->request->data['Salud']['control_pediatrico']= $c;
                        $this->request->data['Salud']['enfermedad_padecida'] = $e;
                        $this->request->data['Salud']['poliza_seguros'] = $p;
                        $this->request->data['Salud']['medicamento_fiebre'] = $m;
                        if ($this->Salud->saveAll($this->request->data)) {
				$this->Session->setFlash(__('La Ficha de salud ha sido guardada Exitosamente.!'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('La Ficha de salud ha sido registrado, Por favor, Intente nuevamente'));
			}
		}
		$alumnos = $this->Salud->Alumno->find('list' , array('conditions'=>array('Alumno.cedula_escolar'=>$cedula_e)));
		$tipoPartos = $this->Salud->TipoParto->find('list');
		$tipoProblemaNacimientos = $this->Salud->TipoProblemaNacimiento->find('list');
		$problemaAprendizajes = $this->Salud->ProblemaAprendizaje->find('list', array('order'=>'ProblemaAprendizaje.id ASC'));
		//$controlPediatricos = $this->Salud->ControlPediatrico->find('list');
		$complicacionEmbarazos = $this->Salud->ComplicacionEmbarazo->find('list', array('order'=>'ComplicacionEmbarazo.id ASC','fields'=>array('ComplicacionEmbarazo.id','ComplicacionEmbarazo.nombre')));
		//echo debug($complicacionEmbarazos);
                $this->set(compact('alumnos', 'tipoPartos', 'tipoProblemaNacimientos', 'problemaAprendizajes', 'complicacionEmbarazos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Salud->exists($id)) {
			throw new NotFoundException(__('Invalid salud'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Salud->save($this->request->data)) {
				$this->Session->setFlash(__('La Ficha de salud ha sido modificada Exitosamente.!'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('La Ficha de salud ha sido modificada, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Salud.' . $this->Salud->primaryKey => $id));
			$this->request->data = $this->Salud->find('first', $options);
		}
		$alumnos = $this->Salud->Alumno->find('list');
		$tipoPartos = $this->Salud->TipoParto->find('list');
		$tipoProblemaNacimientos = $this->Salud->TipoProblemaNacimiento->find('list');
		$problemaAprendizajes = $this->Salud->ProblemaAprendizaje->find('list');
		$complicacionEmbarazos = $this->Salud->ComplicacionEmbarazo->find('list', array('fields'=>array('ComplicacionEmbarazo.id', 'ComplicacionEmbarazo.nombre')));
                echo debug($complicacionEmbarazos);
		$this->set(compact('alumnos', 'tipoPartos', 'tipoProblemaNacimientos', 'problemaAprendizajes', 'complicacionEmbarazos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Salud->id = $id;
		if (!$this->Salud->exists()) {
			throw new NotFoundException(__('Invalid salud'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Salud->delete()) {
			$this->Session->setFlash(__('The salud has been deleted.'));
		} else {
			$this->Session->setFlash(__('The salud could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
