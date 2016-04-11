<?php
App::uses('AppController', 'Controller');

/**
 * Personas Controller
 *
 * @property PersonasTipoPersona $Persona
 * @property PaginatorComponent $Paginator
 */
class PersonasController extends AppController {
    


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
		$this->Persona->recursive = 0;
		$this->set('personas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		/*if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}*/
                //echo $id;
		$options = array('conditions' => array('Persona.user_id' => base64_decode($id)));
		$this->set('persona', $this->Persona->find('first', $options));
                //debug($options);
	}
        
        public function viewalumnos($id) {
		$options = array('conditions' => array('Persona.user_id' => base64_decode($id)));
		$this->set('persona', $this->Persona->find('first', $options));
                //debug($options);
	}
         public function viewautorizados($id) {
		$options = array('conditions' => array('Persona.nucleo_familiar_ref' => base64_decode($id)));
		$this->set('persona', $this->Persona->find('all', $options));
                //debug($options);
	}
        ///funcion para ver los datos personales de los autorizados
        public function view_ficha_autorizados($id) {
		/*if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}*/
                //echo $id;
		$options = array('conditions' => array('Persona.id' => $id));
		$this->set('persona', $this->Persona->find('first', $options));
                //debug($options);
	}

/**
 * add method
 *
 * @return void
 */
        //accion utilizada para registrar a los representantes. 
	public function add() {
            Configure::write('debug', '0');
		if ($this->request->is('post')) {
			$this->Persona->create();
                        //Added this line
                        /*$datos = $this->request->data;
                        echo debug($datos);*/
                        $this->request->data['Persona']['user_id'] = $this->Auth->user('id');
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('Sus Datos Personales Fueron Guardados con Exito.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('Sus Datos Personales no Fueron Guardados, Por Favor intente nuevamente.'));
			}
		}
		$estados = $this->Persona->Estado->find('list', array('order'=>'Estado.id ASC'));
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list', array('order'=>'Cargo.nombre Asc'));
		$users = $this->Persona->User->find('list');
                //$tipoPersonas = $this->Persona->TipoPersona->find('list');
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id <=' =>'2')));
		$alumnos = $this->Persona->Alumno->find('list');
		$this->set(compact('estados', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
	}
        
        /*public function casos_especiales() {
		if ($this->request->is('post')) {
			$this->Persona->create();
                        //Added this line
                        /*$datos = $this->request->data;
                        echo debug($datos);
                        $this->request->data['Persona']['user_id'] = $this->Auth->user('id');
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('Sus Datos Personales Fueron Guardados con Exito.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('Sus Datos Personales no Fueron Guardados, Por Favor intente nuevamente.'));
			}
		}
		$estados = $this->Persona->Estado->find('list', array('order'=>'Estado.id ASC'));
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list');
		$tipoPersonas = $this->Persona->TipoPersona->find('list');
		$alumnos = $this->Persona->Alumno->find('list');
		$this->set(compact('estados', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
	}*/

        public function normas($id = null) {
		if ($this->request->is(array('post', 'put'))) {
                   $datos = $this->request->data;
                    //debug($datos);
                    $id = $this->request->data['Persona']['id'];
                    $norma = $this->request->data['Persona']['norma_convivencia'];
                    if($norma > 0)
                    {
                      
			if ($this->Persona->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Las normas fueron registradas con Exito.'));
				return $this->redirect(array('controller'=>'alumnos','action' => 'add', base64_encode($id)));
			} else {
				$this->Session->setFlash(__('Las normas no han sido registradas, por favor intente de nuevo.'));
                                //return $this->redirect(array('action' => 'normas',$id));
			}
                    }
                    else
                        {
                        echo "<script>alert('Al no aceptar las normas no puede realizar la Preinscripcion');
                     document.location=('/preescolar/personas/principal');</script> ";
                        }
                        
		} else {
			$persona= $this->Persona->find('first', array('conditions'=>array('Persona.user_id'=>$id)));
                 $this->set(compact('persona'));
		}
		
	}
                //accion utilizada para aceptar las normas internas del preescolar
        public function add1($id = null) {
            Configure::write('debug', '0');
		if ($this->request->is('post','put')) {
			$this->Persona->create();
                        $this->request->data['Persona']['nucleo_familiar_ref'] = $this->Auth->user('id');
                      $datos = $this->request->data;
                       // echo debug($datos);
                        if ($this->Persona->saveAll($this->request->data)) {
				$this->Session->setFlash(__('El Autorizado fue Guardado con exito.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El Autorizado no ha sido Guardado. Por Favor, Intente nuevamente.'));
			}
                                         /*}
                                         else
                                         {
                                            $this->Session->setFlash(__('Ya usted registro los Autorizados permitidos'));
                                            return $this->redirect(array('action' => 'principal'));
                                         }*/
                         
		}
		$estados = $this->Persona->Estado->find('list', array('order'=>'Estado.id ASC'));
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list');
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id !='=>5,'TipoPersona.id <>'=>3 )));
                //$representa = $this->Persona->AlumnosPersona->find('all', array('fields'=>array('AlumnosPersona.alumno_id','AlumnosPersona.id'),'conditions'=>array('AlumnosPersona.persona_id'=> $id)));
                $this->Persona->recursive = 1;
               ///aqui verfico quien esta logeado y busco el id de la persona para hacer las demas consultas
                $se= $this->Session->read('Auth.User');
                $sesion_abierta = $se['id'];
                $datos = $this->Persona->find('all', array('conditions'=>array('Persona.user_id'=> $sesion_abierta)));
                 $id_persona = $datos['0']['Persona']['id']; 
                 //consulta anidada
		$alumnos = $this->Persona->Alumno->find('list', array('conditions'=>
                    array('Alumno.id'=> $this->Persona->AlumnosPersona->find('list',
                            array('fields'=>array('AlumnosPersona.alumno_id'), 'conditions'=>array('AlumnosPersona.persona_id'=>$id_persona))))));
                
                
                if(!empty($alumnos)){
                    $datos_p = $this->Persona->find('all', array('conditions'=>array('Persona.user_id'=>$sesion_abierta)));
                $alumnos_id = $datos_p['0']['Alumno']['0']['id'];
                    $contador = $this->Persona->AlumnosPersona->find('count', array('conditions'=>array('AlumnosPersona.alumno_id'=>$alumnos_id)));
                    if($contador <= 6)
                    {
                    //debug($contador);
                $this->set(compact('estados', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
                    }
                    else{
                         echo "Usted llego al limite de autorizados...";
                    echo "<script>alert('Usted ya registro el máximo autorizados ');
                     document.location=('/preescolar/personas/principal');</script> ";
                    }
                       
                    }
                else {
                    echo "Usted no tiene niños registrados aun...";
                    echo "<script>alert('Debe registrar sus niñ@s antes que a los autorizados');
                     document.location=('/preescolar/alumnos/add/$sesion_abierta');</script> "; 
                }
                
               
               // echo debug($alumnos);
                //echo debug($alumnos);
	}
        
        public function add1_1() {
		
	}

        

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            Configure::write('debug', '0');
		/*if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}*/
		if ($this->request->is(array('post', 'put'))) {
                   /* $datos = $this->request->data;
                    echo debug($datos);*/
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos fueron modificados exitosamente!.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('Los datos no han sido modificados, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Persona.user_id' => base64_decode($id)));
			$this->request->data = $this->Persona->find('first', $options);
		}
                $options = array('conditions' => array('Persona.user_id' => base64_decode($id)));
			$this->set('persona', $this->Persona->find('first', $options));
		$estados = $this->Persona->Estado->find('list');
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list');
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id !='=>5,'TipoPersona.id <>'=>3 )));
		$alumnos = $this->Persona->Alumno->find('list');
                $persona = $this->Persona->find('all', array('fields'=>array('Persona.foto'),'conditions'=>array('Persona.user_id'=> base64_decode($id))));
		$this->set(compact('estados','persona', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
	}
        public function edit_autorizados($id = null) {
		/*if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}*/
		if ($this->request->is(array('post', 'put'))) {
                   /* $datos = $this->request->data;
                    echo debug($datos);*/
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos fueron modificados exitosamente!.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('Los datos no han sido modificados, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Persona.id' => $id));
			$this->request->data = $this->Persona->find('first', $options);
		}
		$estados = $this->Persona->Estado->find('list');
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list');
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id !='=>5,'TipoPersona.id <>'=>3 )));
		$alumnos = $this->Persona->Alumno->find('list');
                $persona = $this->Persona->find('all', array('conditions'=>array('Persona.user_id'=> $id)));
		$this->set(compact('estados','persona', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
	}
        public function edit_autorizados_existente($cedula = null) {
		/*if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}*/
		if ($this->request->is(array('post', 'put'))) {
                   /* $datos = $this->request->data;
                    echo debug($datos);*/
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos fueron modificados exitosamente!.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('Los datos no han sido modificados, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Persona.cedula' => base64_decode($cedula)));
			$this->request->data = $this->Persona->find('first', $options);
		}
                $options = array('conditions' => array('Persona.cedula' => base64_decode($cedula)));
			$this->set('persona', $this->Persona->find('first', $options));
                
		$estados = $this->Persona->Estado->find('list');
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list');
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id !='=>5,'TipoPersona.id <>'=>3 )));
		 $se= $this->Session->read('Auth.User');
                $sesion_abierta = $se['id'];
                $datos = $this->Persona->find('all', array('conditions'=>array('Persona.user_id'=> $sesion_abierta)));
                 $id_persona = $datos['0']['Persona']['id']; 
                 //consulta anidada
		$alumnos = $this->Persona->Alumno->find('list', array('conditions'=>
                    array('Alumno.id'=> $this->Persona->AlumnosPersona->find('list',
                            array('fields'=>array('AlumnosPersona.alumno_id'), 'conditions'=>array('AlumnosPersona.persona_id'=>$id_persona))))));
                if(!empty($alumnos)){
                    $datos_p = $this->Persona->find('all', array('conditions'=>array('Persona.user_id'=>$sesion_abierta)));
                $alumnos_id = $datos_p['0']['Alumno']['0']['id'];
                    $contador = $this->Persona->AlumnosPersona->find('count', array('conditions'=>array('AlumnosPersona.alumno_id'=>$alumnos_id)));
                    if($contador <= 6)
                    {
                    //debug($contador);
                $this->set(compact('estados', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
                    }
                    else{
                         echo "Usted llego al limite de autorizados...";
                    echo "<script>alert('Usted ya registro el máximo autorizados ');
                     document.location=('/preescolar/personas/principal');</script> ";
                    }
                       
                    }
		$this->set(compact('estados','persona', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
	}
        
        public function edit_all($id = null) {
		/*if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}*/
		if ($this->request->is(array('post', 'put'))) {
                   /* $datos = $this->request->data;
                    echo debug($datos);*/
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos fueron modificados exitosamente!.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('Los datos no han sido modificados, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Persona.id' => base64_decode($id)));
			$this->request->data = $this->Persona->find('first', $options);
		}
		$estados = $this->Persona->Estado->find('list');
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list');
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id !='=>5,'TipoPersona.id <>'=>3 )));
		$alumnos = $this->Persona->Alumno->find('list');
                $persona = $this->Persona->find('all', array('fields'=>array('Persona.foto'),'conditions'=>array('Persona.id'=> base64_decode($id))));
		$this->set(compact('estados','persona', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos'));
	}

        
       public function nucleo_familiar($id = null){
            //$a = $this->Session->read('Auth.User');
            //echo debug($a);
		//echo base64_decode($id) = base64_decode($id);
		if ($this->request->is(array('post', 'put'))) {
                     $info = $this->request->data;
                    //
                     
                     //$this->request->data['Persona']['nucleo_familiar_ref'] = $this->request->data['Persona']['id'];
                     //echo debug($info);
			if ($this->Persona->saveAll($this->request->data)) {
				$this->Session->setFlash(__('El Nucleo Familiar fue guardado exitosamente!.'));
				return $this->redirect(array('action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El Nucleo Familiar no ha sido registrado, Por favor, Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Persona.user_id' => base64_decode($id)));
                        $this->set('persona', $this->Persona->find('first', $options));
		}
		$estados = $this->Persona->Estado->find('list');
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
                $tipo_per = $this->Persona->find('all', array('conditions'=>array('Persona.user_id' => base64_decode($id))));
                //aqui busco los id de todas las personas que sean madres o padres
                $parentesco = $this->Persona->PersonasTipoPersona->find('list', 
                        array('fields'=>array('PersonasTipoPersona.persona_id'),'conditions'=>
                            array('OR'=>array('PersonasTipoPersona.tipo_persona_id'=>array(1,2)))));
                //aqui busco los datos de la persona que sea la madre de este nucleo familiar..
                $nucleo_fam = $this->Persona->find('all', 
                        array('conditions'=>array(
                            'And'=>array(
                            'Persona.nucleo_familiar_ref'=> base64_decode($id), 'Persona.id'=>$parentesco))));
                //echo debug($nucleo_fam);
                //$nucleo_fam = $this->Persona->find('all', array('conditions'=>array('Persona.nucleo_familiar_ref'=> base64_decode($id))));
                Configure::write('debug', '0');
                if($nucleo_fam == null)
                {
                    $personas = $this->Persona->find('all', array('conditions'=>array('Persona.user_id' => base64_decode($id))));
		$this->set(compact('estados','personas' ,'tipo_per' ,'municipios', 'parroquias', 'sexos', 'cargos', 'tipoPersonas'));  
                }
                else
                {
                $personas = $this->Persona->find('all', array('conditions'=>array('Persona.user_id' => base64_decode($id))));
		$this->set(compact('estados','nucleo_fam','personas' ,'tipo_per' ,'municipios', 'parroquias', 'sexos', 'cargos', 'tipoPersonas'));  
                /*$personas = $this->Persona->find('all', array('conditions'=>array('Persona.id'=> base64_decode($id))));
		$this->set(compact('estados','nucleo_fam','personas' ,'tipo_per' ,'municipios', 'parroquias', 'sexos', 'cargos', 'tipoPersonas'));  */
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
		$this->Persona->user_id = $id;
		/*if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Invalid persona'));
		}*/
		$this->request->onlyAllow('post', 'delete');
		if ($this->Persona->delete()) {
			$this->Session->setFlash(__('The persona has been deleted.'));
		} else {
			$this->Session->setFlash(__('Error:  No se puede eliminar ningun registro'));
		}
		return $this->redirect(array('action' => 'index'));
	}

 /*public function principal()
        {
     Configure::write('debug', '0');
         $se= $this->Session->read('Auth.User');
        // echo debug($se);
         $sesion_abierta = $se['id'];
          //$sesion_abierta = $_SESSION['Auth']['User']['id'];
           //$sesion_abierta = $this->Auth->user('id');
            $datos = $this->Persona->find('all', array('conditions'=>array('Persona.user_id'=> $sesion_abierta)));
            foreach ($datos as $perfil):
             $id_sesion = $perfil['Persona']['user_id'];
            endforeach;
            if($id_sesion != "") //valido que este usuario tiene un perfil creado
                {
                $this->set('datos', $datos);
                $this->set('sesion', $se);
                }
                else 
                {
                    return $this->redirect(array('action'=>'add'));
                }
          /* $a = $this->Auth->login();
             echo debug($a);
        }*/
        
        public function principal()
        {
        //Configure::write('debug', '0');
         $datos = $this->Persona->find('all',
                 array('fields'=>array('nombre','apellido','foto'),
                     'conditions'=>array('Persona.user_id'=>$_SESSION ['Auth'] ['User'] ['id'])));
         if($datos == NULL){
                  return $this->redirect(array('action'=>'add'));
              }else{
          $this->set('datos',$datos);
          $this->set('sesion',$this->Session->read('Auth.User'));
              }
        }
        

        public function lista_municipios($id)
        {
            Configure::write('debug', '0');
           $this->layout = 'ajax'; 
           $municipios = $this->Persona->Municipio->find('list', array('conditions'=>array('Municipio.estado_id' => $id ))); 
                    $this->set('municipios', $municipios);
        }
        
        public function lista_parroquias($id)
        {
           Configure::write('debug', '0');
           $this->layout = 'ajax'; 
           $parroquias = $this->Persona->Parroquia->find('list', array('conditions'=>array('Parroquia.municipio_id' => $id))); 
           $this->set('parroquias', $parroquias);
        }
        
 public function viewpdf($id = null) {
     
      $alumno = $this->Persona->Alumno->find('all', array('conditions'=>array('Alumno.id'=>$id)));
      //$this->Persona->AlumnosPersona->recursive = 2;
      $autorizados = $this->Persona->AlumnosPersona->find('all', array('conditions'=>array('AlumnosPersona.alumno_id'=>$id)));
      //echo debug($autorizados);
    //Import /app/Vendor/Fpdf
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('pdf', new FPDF('P','mm','A4')
   
           );
    //pass data to view
    $this->set('data', $alumno);
    $this->set('autoriza', $autorizados);
    $miCabecera = array('Nombre', 'Apellido', 'Matrícula', 'Edad', 'Estado Civil', 'Peso (kg)', 'Estatura (m)'); 
    $this->set('micabecera', $miCabecera);
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('pdf');
    
}


///funcion utilizada para registrar y/o registrar trabajadores del preescolar

    public function trabajador_preescolar(){
         //Configure::write('debug', '0');
		if ($this->request->is(array('post', 'put'))) {
                    /*$datos = $this->request->data;
                    debug($datos);*/
                   //$id = $this->request->data['GradosSeccione']['GradosSeccione']['0'];
			if ($this->Persona->saveAll($this->request->data)) {
                            //$this->Persona->GradosSeccione->query("Update grados_secciones SET asignada = True where id= $id");
				$this->Session->setFlash(__('Registrado Satisfactoriamente!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El Grado y la Seccion no ha sido registrado, Por favor, Intente nuevamente'));
			}
		} else {
			
			$this->request->data = $this->Persona->find('list');
		}
                
    }
     public function busqueda_datos_trabajador($cedula)
        {
            $this->layout ='ajax';
            $persona_encontrada = $this->Persona->find('all', array('conditions'=>array('Persona.cedula'=>/*'02546844'*/$cedula)));
		//echo debug($alum_busqueda);
                $this->set('datos', $persona_encontrada);
        }


 public function asignacion()
        { 
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
                Configure::write('debug', '0');
		if ($this->request->is(array('post', 'put'))) {
                   $id_persona = $this->request->data['Persona']['id'];
                   $id = $this->request->data['GradosSeccione']['GradosSeccione']['0'];
                   $existe = $this->Persona->GradosSeccionesPersona->find('count', 
                           array('conditions'=>
                              array('And'=>
                               array('GradosSeccionesPersona.persona_id'=>$id_persona,
                                     'GradosSeccionesPersona.ano_escolar'=>$ano_escolar))));
                   if($existe == 0)
                   {
                   if ($this->Persona->saveAll($this->request->data)) {
                            $consulta = "Update grados_secciones_personas SET ano_escolar = '$ano_escolar' where persona_id= $id_persona And ano_escolar ='0' ";
                            $this->Persona->GradosSeccione->query($consulta);
				$this->Session->setFlash(__('Se Asign&oacute; el Grado y Secci&oacute;n Satisfactoriamente!.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('El Grado y la Seccion no ha sido registrado, Por favor, Intente nuevamente'));
			}
                       
                   }
                   else
                   {
                     $this->Session->setFlash(__('Esta persona ya tiene asignada una sección.'));
                    return $this->redirect(array('action' => 'asignacion'));  
                   }
		} else {
			
			$this->request->data = $this->Persona->find('list');
		}
                
                $gradosSecciones = $this->Persona->GradosSeccione->find('list', array(
                    'order'=>'GradosSeccione.descripcion Asc',
                    'conditions'=>array('GradosSeccione.ano_escolar' => $ano_escolar)));
                $this->set(compact('gradosSecciones'));
	 
            
        }
		
		
		public function dbpdf_rh(){
            //$gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('contain'=>array('Alumno','AlumnosPersona','conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id))));
 //           $gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('order'=>'Alumno.apellido ASC'));
           $personas = $this->Persona->find('all', array('conditions'=>array('Persona.representante'=>'Si')));
			//echo debug($gradosSecciones);
   //         foreach ($gradosSecciones as $datos):
            //echo debug($datos);
     //       $id_g_s = $datos['AlumnosGradosSeccione']['grados_seccione_id'];
       //     endforeach;
       //     $nombre_gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id'=>$id_g_s)));
            $this->set(compact('personas'));
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('L','mm','A4'));
    //pass data to view
   // $this->set('data', 'Hello, PDF world');
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('pdf_rh');
            
        }		
        
         public function busqueda($cedula)
        {
            $this->layout ='ajax';
            $persona_encontrada = $this->Persona->find('all', array('conditions'=>array('Persona.cedula'=>$cedula)));    
           $grupo = $persona_encontrada['0']['User']['group_id'];
           if($grupo == 3){
                $this->set('datos', $persona_encontrada);
           }
           else
           {
               echo "<script>alert('Esta cédula no pertenece al grupo de Profesores');
                     document.location=('/preescolar/personas/asignacion');</script> ";
           }
        }
        
        public function autorizados($si)
        {
           $this->Persona->recursive = 1;
            $personas = $this->Persona->find('all', array('conditions'=>array('Persona.autorizado'=> $si)));
          // $alumno = $this->Persona->AlumnosPersona->find('all', array('conditions'=>array('AlumnosPersona.persona_id' => $personas)));
		//echo debug($personas);
            $this->set('datos', $personas, $this->Paginator->paginate());
        }
        
         public function consultar_cedula($cedula) {
        $this->layout = 'ajax';
        //$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id !='=>5,'TipoPersona.id <>'=>3 )));
        $res = $this->Persona->find('count', array('conditions' => array('Persona.cedula' => $cedula)));
        //echo debug($res);
        $se= $this->Session->read('Auth.User');
                $sesion_abierta = $se['id'];
                $cedula = base64_encode($cedula);
        if(!empty($res)){
            //return $this->redirect(array('action'=>'edit_autorizados_existente', $cedula));
    
            echo "<script>"
                    . "var confirmar = confirm('Esta persona existe, desea autorizarla a retirar a su(s) hij@ (s)?');"
                    ."if(confirmar == true){"
                    . "document.location=('/preescolar/personas/edit_autorizados_existente/$cedula'); }"
                    . "</script>";
        }
        else{
            echo "<script>
                    document.location=('/preescolar/personas/add1');"
                    . "</script>";
            //return $this->redirect(array('action'=>'add1')); 
            
        }
        $this->set('res', $res);
    }
        public function consultar_persona_existe($cedula ){
             $this->layout ='ajax';
             //$users = $this->Persona->User->find('list');
            $res = $this->Persona->find('all', array('conditions'=>array('Persona.cedula'=>  $cedula)));
            $this->set('res', $res);
            //$this->set(compact($users));
           // debug($res);
        }
        
        public function registrar_usuarios($usuario){
           if ($this->request->is('post', 'put')) {
			$this->Persona->create();
                        $usuario = base64_decode($usuario);
                        //Added this line
                        /*$datos = $this->request->data;
                        echo debug($datos);*/
                        $user_id = $datos = $this->request->data['Persona']['users'];
                        $this->request->data['Persona']['user_id'] = $user_id;
			if ($this->Persona->saveAll($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido creado con Exito.'));
				return $this->redirect(array('controller'=>'Users','action' => 'index_1'));
			} else {
				$this->Session->setFlash(__('Sus Datos Personales no Fueron Guardados, Por Favor intente nuevamente.'));
			}
		}
		$estados = $this->Persona->Estado->find('list', array('order'=>'Estado.id ASC'));
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list', array('conditions'=>array('User.username'=>base64_decode($usuario))));
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id <=' =>'2')));
		$alumnos = $this->Persona->Alumno->find('list');
		$this->set(compact('estados', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos')); 
        }
         public function registrar_usuarios_1(){
           if ($this->request->is('post', 'put')) {
			$this->Persona->create();
                        //Added this line
                        /*$datos = $this->request->data;
                        echo debug($datos);*/
                        $user_id = $datos = $this->request->data['Persona']['users'];
                        $this->request->data['Persona']['user_id'] = $user_id;
			if ($this->Persona->saveAll($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido creado con Exito.'));
				return $this->redirect(array('controller'=>'Users','action' => 'index_1'));
			} else {
				$this->Session->setFlash(__('Sus Datos Personales no Fueron Guardados, Por Favor intente nuevamente.'));
			}
		}
		$estados = $this->Persona->Estado->find('list', array('order'=>'Estado.id ASC'));
		$municipios = $this->Persona->Municipio->find('list');
		$parroquias = $this->Persona->Parroquia->find('list');
		$sexos = $this->Persona->Sexo->find('list');
		$cargos = $this->Persona->Cargo->find('list');
		$users = $this->Persona->User->find('list', array('order'=>'User.id DESC'));
		$tipoPersonas = $this->Persona->TipoPersona->find('list', array('conditions'=>array('TipoPersona.id <=' =>'2')));
		$alumnos = $this->Persona->Alumno->find('list');
		$this->set(compact('estados', 'municipios', 'parroquias', 'sexos', 'cargos', 'users', 'tipoPersonas', 'alumnos')); 
        }
        
}
