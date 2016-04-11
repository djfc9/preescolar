<?php
App::uses('AppController', 'Controller');
/**
 * Boletas Controller
 *
 * @property Boleta $Boleta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BoletasController extends AppController {

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
            Configure::write('debug', 0);
		if ($this->request->is('post')) {
			$this->Boleta->create();
                        //debug($this->request->data);
                        $alumno = $this->request->data['Alumno']['Alumno'];
                        $lapsos = $this->request->data['Boleta']['lapsos'];
                        $ano_escolar = $this->request->data['Boleta']['ano_escolar'];
                        $sql = "SELECT 
                                count(boletas.id),
                                boletas.lapsos, 
                                boletas.ano_escolar, 
                                alumnos_boletas.alumno_id
                              FROM 
                                public.alumnos_boletas, 
                                public.boletas
                              WHERE 
                                boletas.id = alumnos_boletas.boleta_id And
                                alumnos_boletas.alumno_id = $alumno And
                                boletas.lapsos = '$lapsos' And
                                boletas.ano_escolar = '$ano_escolar'
                              GROUP BY
                                boletas.lapsos, 
                                boletas.ano_escolar, 
                                alumnos_boletas.alumno_id;";
                        $cuenta = $this->Boleta->query($sql);
                        $cuenta = $cuenta['0']['0']['count'];
                        if($cuenta < 1){
			if ($this->Boleta->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Boletin de lapso creado Exitosamente.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Boletin de lapso no ha sido creado. Por favor, intente nuevamente.'));
			}
                        
                        }else{
                          $this->Session->setFlash(__('Ya Existe un Boletin de este lapso creado.'));  
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
		$this->request->allowMethod('post', 'delete');
		if ($this->Boleta->delete()) {
			$this->Session->setFlash(__('The boleta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The boleta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        
        public function buscar_datos_alumno($cedula){
            $this->layout = 'ajax';
            $alum_busqueda = $this->Boleta->Alumno->find('all', array(
            'conditions' => array('Alumno.cedula_escolar' => $cedula,
                'Alumno.confirmar <>' => 0)));
            $this->set('datos', $alum_busqueda);
        }
}
