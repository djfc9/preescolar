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
            
            Configure::write('debug',0);
                     $sesion = $this->Session->read('Auth');
                     $id = $sesion['User']['id'];
                    if (Date('m') >= 7) {
                        //Año escolar
                        $ano1 = date("Y");
                        $ano2 = date("Y") + 1;
                        $ano_escolar = $ano1 . "-" . $ano2;
                    } else {
                        //Año escolar
                        $ano1 = date("Y") - 1;
                        $ano2 = date("Y");
                        $ano_escolar = $ano1 . "-" . $ano2;
                    }
                    $this->Boleta->Alumno->GradosSeccione->Persona->recursive = -1;
                    $data = $this->Boleta->Alumno->GradosSeccione->Persona->find('all',
                             array('fields'=>array('Persona.id'),
                                 'conditions'=>array('Persona.user_id'=> $id)));
                    $persona_id = $data['0']['Persona']['id'];
                    
                    $seccion_asignada = $this->Boleta->Alumno->GradosSeccione->GradosSeccionesPersona->find('all',
                            array('conditions'=>array(
                                'And'=>array(
                                  'GradosSeccionesPersona.persona_id'=>$persona_id,  
                                  'GradosSeccionesPersona.ano_escolar'=>$ano_escolar
                                ))));
                    $id_seccion = $seccion_asignada['0']['GradosSeccionesPersona']['grados_seccione_id'];

                    $sql = "SELECT 
                    boletas.id, 
                    boletas.calificacion, 
                    boletas.created, 
                    boletas.lapsos, 
                    boletas.ano_escolar, 
                    boletas.fecha_entrega, 
                    boletas.dias_habiles, 
                    boletas.inasistencias, 
                    boletas.componentes_ambiente, 
                    alumnos.nombre, 
                    alumnos.apellido, 
                    alumnos.segundo_nombre, 
                    alumnos.segundo_apellido
                  FROM 
                    public.alumnos, 
                    public.boletas, 
                    public.grados_secciones, 
                    public.alumnos_grados_secciones, 
                    public.alumnos_boletas
                  WHERE 
                    alumnos.id = alumnos_boletas.alumno_id AND
                    alumnos.id = alumnos_grados_secciones.alumno_id AND
                    grados_secciones.id = alumnos_grados_secciones.grados_seccione_id AND
                    alumnos_boletas.boleta_id = boletas.id AND
                    grados_secciones.id = $id_seccion
                  ORDER BY
                    boletas.created DESC;";
                    $boletas = $this->Boleta->query($sql);
		$this->set('boletas', $boletas);
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
            Configure::write('debug', 0);
            $this->layout = 'ajax';
            $alum_busqueda = $this->Boleta->Alumno->find('all', array(
            'conditions' => array('Alumno.cedula_escolar' => $cedula,
                'Alumno.confirmar <>' => 0)));
            
            $sesion = $this->Session->read('Auth');
                     $id = $sesion['User']['id'];
                    if (Date('m') >= 7) {
                        //Año escolar
                        $ano1 = date("Y");
                        $ano2 = date("Y") + 1;
                        $ano_escolar = $ano1 . "-" . $ano2;
                    } else {
                        //Año escolar
                        $ano1 = date("Y") - 1;
                        $ano2 = date("Y");
                        $ano_escolar = $ano1 . "-" . $ano2;
                    }
                    $this->Boleta->Alumno->GradosSeccione->Persona->recursive = -1;
                    $data = $this->Boleta->Alumno->GradosSeccione->Persona->find('all',
                             array('fields'=>array('Persona.id'),
                                 'conditions'=>array('Persona.user_id'=> $id)));
                    $persona_id = $data['0']['Persona']['id'];
                    
                    $seccion_asignada = $this->Boleta->Alumno->GradosSeccione->GradosSeccionesPersona->find('all',
                            array('conditions'=>array(
                                'And'=>array(
                                  'GradosSeccionesPersona.persona_id'=>$persona_id,  
                                  'GradosSeccionesPersona.ano_escolar'=>$ano_escolar
                                ))));
                    $id_seccion = $seccion_asignada['0']['GradosSeccionesPersona']['grados_seccione_id'];
                    $gr_sec = $alum_busqueda['0']['GradosSeccione'];
                    foreach ($gr_sec as $gr_secc):
                       $id_gr_sec = $gr_secc['id'];
                        if($id_gr_sec == $id_seccion){
                            $this->set('datos', $alum_busqueda);
                        }else{
                          $this->Session->setFlash(__('Este alumno no pertenece a su sección.'));  
                        }
                    endforeach;

        }
}
