<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
   


/*public function beforeFilter() {
    parent::beforeFilter();
    //$this->Auth->allow('index', 'view');
    $this->Auth->allow('initDB'); // We can remove this line after we're finished
}*/

public function initDB() {
    $group = $this->User->Group;
    //Allow admins to everything
    //
    //Administradores
    $group->id = 1;
    $this->Acl->allow($group, 'controllers');

    //Direccion
    $group->id = 2;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Users/add');
    $this->Acl->allow($group, 'controllers/Users/add2');
    $this->Acl->allow($group, 'controllers/Users/index');
    $this->Acl->allow($group, 'controllers/Users/edit');
    $this->Acl->allow($group, 'controllers/Users/edit_2');
    $this->Acl->allow($group, 'controllers/Alumnos');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones/bd_alumnos');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones/dbpdf');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones');
    $this->Acl->allow($group, 'controllers/Saluds');
    $this->Acl->allow($group, 'controllers/Fichas/view');
    $this->Acl->allow($group, 'controllers/Fichas/justificativos_especiales');
    $this->Acl->allow($group, 'controllers/Fichas/justificativos_pdf_especiales');
    //$this->Acl->allow($group, 'controllers/Fichas/justificativosespeciales');
    $this->Acl->allow($group, 'controllers/Fichas/lis_autorizados');
    $this->Acl->allow($group, 'controllers/Grados');
    $this->Acl->allow($group, 'controllers/Seccions');
    $this->Acl->allow($group, 'controllers/GradosSecciones/view');
    $this->Acl->allow($group, 'controllers/GradosSecciones/index');
    $this->Acl->allow($group, 'controllers/GradosSecciones/edit');
    $this->Acl->allow($group, 'controllers/Personas/index');
    $this->Acl->allow($group, 'controllers/Personas/registrar_usuarios');
    $this->Acl->allow($group, 'controllers/Personas/consultar_persona_existe');
    $this->Acl->allow($group, 'controllers/Personas/consultar_cedula');
    $this->Acl->allow($group, 'controllers/Personas/view');
    $this->Acl->allow($group, 'controllers/Personas/principal');
    $this->Acl->allow($group, 'controllers/Personas/asignacion');
    $this->Acl->allow($group, 'controllers/Personas/busqueda');
    $this->Acl->allow($group, 'controllers/Personas/autorizados');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_preinscritos');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/Personas/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Personas/lista_municipios');
    $this->Acl->allow($group, 'controllers/GradosSeccionesPersonas');
    $this->Acl->allow($group, 'controllers/Normas');
    $this->Acl->allow($group, 'controllers/Comidas');
    $this->Acl->allow($group, 'controllers/Eventos');
    $this->Acl->allow($group, 'controllers/Noticias');
    $this->Acl->allow($group, 'controllers/AlumnosNormas');
    $this->Acl->allow($group, 'controllers/Requisitos/add');
    $this->Acl->allow($group, 'controllers/Requisitos/index');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/logout');
    $this->Acl->allow($group, 'controllers/Users/index_1');
    $this->Acl->allow($group, 'controllers/Users/pregunt_seg');
    //// controllers a ser denegados luego de terminado el proceso de inscripción
    $this->Acl->allow($group, 'controllers/Personas/add');
    $this->Acl->allow($group, 'controllers/Personas/add1');
    $this->Acl->allow($group, 'controllers/Personas/add1_1');
    $this->Acl->allow($group, 'controllers/Personas/edit');
    $this->Acl->allow($group, 'controllers/Personas/edit_autorizados_existente');
    $this->Acl->allow($group, 'controllers/Saluds/add');
    $this->Acl->allow($group, 'controllers/Saluds/edit');
    $this->Acl->allow($group, 'controllers/Personas/nucleo_familiar');

    //Profesores
    $group->id = 3;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Personas/view');
    $this->Acl->allow($group, 'controllers/Personas/consultar_cedula');
    $this->Acl->allow($group, 'controllers/Personas/viewalumnos');
    $this->Acl->allow($group, 'controllers/Personas/principal');
    $this->Acl->allow($group, 'controllers/Personas/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Personas/lista_municipios');
    $this->Acl->allow($group, 'controllers/Personas/viewpdf');
    $this->Acl->allow($group, 'controllers/Personas/normas');
    $this->Acl->allow($group, 'controllers/Alumnos/view');
    $this->Acl->allow($group, 'controllers/Alumnos/boletines');
    $this->Acl->allow($group, 'controllers/Alumnos/posiciones');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_autorizados');
    $this->Acl->allow($group, 'controllers/Alumnos/mostrar_lista_autorizados');
    $this->Acl->allow($group, 'controllers/GradosSecciones/alumnos');
    $this->Acl->allow($group, 'controllers/Boletas');
    $this->Acl->allow($group, 'controllers/Comidas/index');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/pregunt_seg');
    $this->Acl->allow($group, 'controllers/Users/logout');
    //// controllers a ser denegados luego de terminado el proceso de inscripción
    $this->Acl->allow($group, 'controllers/Personas/add');
    $this->Acl->allow($group, 'controllers/Personas/add1');
    $this->Acl->allow($group, 'controllers/Personas/add1_1');
    $this->Acl->allow($group, 'controllers/Personas/edit');
    $this->Acl->allow($group, 'controllers/Personas/edit_autorizados_existente');
    $this->Acl->allow($group, 'controllers/Saluds/add');
    $this->Acl->allow($group, 'controllers/Saluds/edit');
    $this->Acl->allow($group, 'controllers/Alumnos/add');
    $this->Acl->allow($group, 'controllers/Alumnos/edit');
    $this->Acl->allow($group, 'controllers/Personas/nucleo_familiar');
    
    
    //Medicos
    $group->id = 4;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Personas/consultar_cedula');
    $this->Acl->allow($group, 'controllers/Personas/view');
    $this->Acl->allow($group, 'controllers/Personas/principal');
    $this->Acl->allow($group, 'controllers/Personas/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Personas/lista_municipios');
    $this->Acl->allow($group, 'controllers/Alumnos/view_alumno');
    $this->Acl->allow($group, 'controllers/Alumnos/lista');
    $this->Acl->allow($group, 'controllers/Alumnos/boletines');
    $this->Acl->allow($group, 'controllers/Alumnos/view');
    $this->Acl->allow($group, 'controllers/Alumnos/index_lista');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/pregunt_seg');
    $this->Acl->allow($group, 'controllers/Fichas');
    $this->Acl->allow($group, 'controllers/Saluds/view');
    $this->Acl->allow($group, 'controllers/Saluds/index');
    $this->Acl->allow($group, 'controllers/Users/logout');
    //// controllers a ser denegados luego de terminado el proceso de inscripción
    $this->Acl->allow($group, 'controllers/Personas/edit');
    $this->Acl->allow($group, 'controllers/Personas/add1');
    $this->Acl->allow($group, 'controllers/Personas/add1_1');
    $this->Acl->allow($group, 'controllers/Personas/edit_autorizados_existente');
    $this->Acl->allow($group, 'controllers/Saluds/add');
    $this->Acl->allow($group, 'controllers/Saluds/edit');
    $this->Acl->allow($group, 'controllers/Alumnos/add');
    $this->Acl->allow($group, 'controllers/Alumnos/edit');
    $this->Acl->allow($group, 'controllers/Comidas/index');
     $this->Acl->allow($group, 'controllers/Personas/add');
     $this->Acl->allow($group, 'controllers/Personas/nucleo_familiar');
    
    
    
    //Representantes
    $group->id = 5;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Personas/view');
    $this->Acl->allow($group, 'controllers/Personas/consultar_cedula');
    $this->Acl->allow($group, 'controllers/Personas/viewalumnos');
    $this->Acl->allow($group, 'controllers/Personas/principal');
    $this->Acl->allow($group, 'controllers/Personas/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Personas/lista_municipios');
    $this->Acl->allow($group, 'controllers/Personas/viewpdf');
    $this->Acl->allow($group, 'controllers/Personas/viewautorizados');
    $this->Acl->allow($group, 'controllers/Personas/view_ficha_autorizados');
    $this->Acl->allow($group, 'controllers/Personas/viewautorizados');
    $this->Acl->allow($group, 'controllers/Personas/normas');
    $this->Acl->allow($group, 'controllers/Users/logout');
    $this->Acl->allow($group, 'controllers/Alumnos/view');
    $this->Acl->allow($group, 'controllers/Alumnos/posiciones');
    $this->Acl->allow($group, 'controllers/Alumnos');
    $this->Acl->allow($group, 'controllers/Alumnos/boletines');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/AlumnosNormas/view');
    $this->Acl->allow($group, 'controllers/AlumnosNormas/delete');
    $this->Acl->allow($group, 'controllers/Comidas/index');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/pregunt_seg');
    //// controllers a ser denegados luego de terminado el proceso de inscripción
    $this->Acl->allow($group, 'controllers/Personas/add');
    $this->Acl->allow($group, 'controllers/Personas/add1');
    $this->Acl->allow($group, 'controllers/Personas/add1_1');
    $this->Acl->allow($group, 'controllers/Personas/edit_autorizados_existente');
    $this->Acl->allow($group, 'controllers/Personas/edit');
    $this->Acl->allow($group, 'controllers/Personas/edit_autorizados');
    $this->Acl->allow($group, 'controllers/Saluds/add');
    $this->Acl->allow($group, 'controllers/Saluds/edit');
    $this->Acl->allow($group, 'controllers/Alumnos/add');
    $this->Acl->allow($group, 'controllers/Alumnos/edit');
    $this->Acl->allow($group, 'controllers/Personas/nucleo_familiar');
    
    //secretarias
    $group->id = 6;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Users/add');
    $this->Acl->allow($group, 'controllers/Users/add2');
    $this->Acl->allow($group, 'controllers/Users/index');
    $this->Acl->allow($group, 'controllers/Users/edit');
    $this->Acl->allow($group, 'controllers/Users/edit_2');
    $this->Acl->allow($group, 'controllers/Alumnos');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones');
    $this->Acl->allow($group, 'controllers/GradosSecciones/view');
    $this->Acl->allow($group, 'controllers/GradosSecciones/index');
    $this->Acl->allow($group, 'controllers/Personas/index');
    $this->Acl->allow($group, 'controllers/Personas/view');
    $this->Acl->allow($group, 'controllers/Personas/viewalumnos');
    $this->Acl->allow($group, 'controllers/Personas/viewautorizados');
    $this->Acl->allow($group, 'controllers/Personas/consultar_cedula');
    $this->Acl->allow($group, 'controllers/Personas/consultar_persona_existe');
    $this->Acl->allow($group, 'controllers/Personas/principal');
    $this->Acl->allow($group, 'controllers/Personas/asignacion');
    $this->Acl->allow($group, 'controllers/Personas/busqueda');
    $this->Acl->allow($group, 'controllers/Personas/autorizados');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/buscar_alumno');
    $this->Acl->allow($group, 'controllers/Alumnos/buscar_alumno_1');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_preinscritos');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/Personas/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Personas/lista_municipios');
    $this->Acl->allow($group, 'controllers/GradosSeccionesPersonas');
    $this->Acl->allow($group, 'controllers/Fichas/justificativos_especiales');
    $this->Acl->allow($group, 'controllers/Fichas/justificativos_pdf_especiales');
    //$this->Acl->allow($group, 'controllers/Fichas/justificativosespeciales');
    $this->Acl->allow($group, 'controllers/Fichas/lis_autorizados');
    $this->Acl->allow($group, 'controllers/Normas');
    $this->Acl->allow($group, 'controllers/Comidas');
    $this->Acl->allow($group, 'controllers/Eventos');
    $this->Acl->allow($group, 'controllers/Noticias');
    $this->Acl->allow($group, 'controllers/AlumnosNormas');
    $this->Acl->allow($group, 'controllers/Requisitos/index');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/logout');
    $this->Acl->allow($group, 'controllers/Users/index_1');
    $this->Acl->allow($group, 'controllers/Users/pregunt_seg');
    //// controllers a ser denegados luego de terminado el proceso de inscripción
    $this->Acl->allow($group, 'controllers/Personas/add');
    $this->Acl->allow($group, 'controllers/Personas/add1');
    $this->Acl->allow($group, 'controllers/Personas/add1_1');
    $this->Acl->allow($group, 'controllers/Personas/edit_autorizados_existente');
    $this->Acl->allow($group, 'controllers/Personas/registrar_usuarios');
    $this->Acl->allow($group, 'controllers/Personas/edit');

    //we add an exit to avoid an ugly "missing views" error message
    echo "Permisos creados con exito...";
    exit;
}

public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.1 and up
    //$this->Auth->allow('add');
    $this->Auth->allow('mensajes');
    $this->Auth->allow('change_password');
    $this->Auth->allow('buscar_datos');
    $this->Auth->allow('cambio_clave');
    $this->Auth->allow('enviarcorreo');
    $this->Auth->allow('initDB');
}
    

/*public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.0
    $this->Auth->allow('*');

    // For CakePHP 2.1 and up
    $this->Auth->allow();
}
*/


/*public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Usuario o Contraseña invalida, Intente de nuevo'));
    }
}*/

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
			    return $this->redirect($this->Auth->redirectUrl());
            //    return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Usuario y/o Contraseña no son correctas.'));
            /*$_SESSION = array(); 
        // Borra la cookie que almacena la sesión 
        if(isset($_COOKIE[session_name()])) { 
        setcookie(session_name(), '', time() - 42000, '/'); 
        } 
        // Finalmente, destruye la sesión 
        session_destroy(); */
        }

        if ($this->Session->read('Auth.User')) {
     $this->Session->setFlash(__('Usted ya tiene una Sesión abierta. '));

            //return $this->redirect('/');
            return $this->redirect(array('controller' => 'personas', 'action' => 'principal'));
        }
        
        
        
    }

/*public function logout() {
    Cache::clear($check=false, $config='deafult');
    $this->Session->destroy();
    $this->Session->setFlash('Hasta Luego');
    return $this->redirect($this->Auth->logout());
}*/

public function logout() {
        /*session_destroy();
        $parametros_cookies = session_get_cookie_params(); 
        setcookie(session_name(),0,1,$parametros_cookies["path"]);
        Cache::clear($check=false, $config='deafult');
        $this->Session->delete('User');*/
        $_SESSION = array(); 
        // Borra la cookie que almacena la sesión 
        if(isset($_COOKIE[session_name()])) { 
        setcookie(session_name(), '', time() - 42000, '/'); 
        } 
        // Finalmente, destruye la sesión 
        session_destroy(); 
        $this->Session->setFlash(__('Sesión cerrada con éxito. '));
        $this->redirect($this->Auth->logout());
    }

/**
 * Components
 *
 * @var array
 */
         //componente para el captcha y el paginador///
	//public $components = array('','Captcha');
       

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
        public function index_1() {
		$this->User->recursive = 0;
                $usuarios = $this->User->find('all', array('order'=> 'User.username ASC'));
                //$this->User->find("all",array('order'=>'Users.nombre DESC'));
		$this->set('usuarios', $usuarios, $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists(base64_decode($id))) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => base64_decode($id)));
		$this->set('user', $this->User->find('first', $options));
	}

        /////////////////////captcha////////////////////////////////
        
        
        public $components = array('Paginator' );

    /**
     * Helpers
     *
     * @var array
     * @access public
     */


//////////////////////////////////////////////////////////////////////////
        
        
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
                        //echo debug($this->request->data);
                       // $this->User->set($this->request->data);
                       $usuario = base64_encode($this->request->data['User']['username']); 
                       $contraseña = base64_encode($this->request->data['User']['password']); 
                       $correo = base64_encode($this->request->data['User']['email']); 
                       $asunto = base64_encode($asunto = "Registro de usuarios - Datos de Usuario");
                       $text_contenido = "Nombre de Usuario: ".$usuario."<br>Contraseña: ".$contraseña."<br>Recomendación: Registar una pregunta y Respuesta de Seguridad para garantizar mayor Seguridad en el sistema.<br>";
		       $text_contenido = base64_encode($text_contenido); 
                       if ($this->User->saveAll($this->request->data)) {
                            $this->Session->setFlash(__('El usuario ha sido creado, Información enviada al correo.'));
                                return $this->redirect(array('action' => 'enviarcorreo', $text_contenido, $asunto, $correo, $usuario));
                             
				//return $this->redirect(array('controller'=>'personas', 'action' => 'registrar_usuarios', $usuario));
			} else {
				$this->Session->setFlash(__('El Usuario no ha sido creado, por favor intete de nuevo.'));
			}

		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
                $groups = $this->User->Group->find('list', array('order'=> 'name ASC'));
                $this->User->recursive = -1;
                $ultima_sesion = $this->User->find('count');
                $this->set(compact('groups', 'ultima_sesion'));

	}
        
        //// funcio para registrar desde el modulo de administracion////
        	public function add1() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Su usuario ha sido creado, ingrese con sus datos para continuar.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
                $groups = $this->User->Group->find('list');
                $this->set(compact('groups'));

	}

	//// funcio para registrar desde el modulo de secretarias////
        	public function add2() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Su usuario ha sido creado, ingrese con sus datos para continuar.'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
                $groups = $this->User->Group->find('list', array('conditions'=>array('Group.id >'=>1)));
                $this->set(compact('groups'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists(base64_decode($id))) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Los Datos Fueron modificados exitosamente..!'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => base64_decode($id)));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
	}
        
        public function edit_1($id = null) {
		if (!$this->User->exists(base64_decode($id))) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Los Datos Fueron modificados exitosamente..!'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey =>base64_decode($id)));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
		$questions = $this->User->Question->find('list');
                $groups = $this->User->Group->find('list');
		$this->set(compact('questions', 'groups'));
	}

	 public function edit_2($id = null) {
		if (!$this->User->exists(base64_decode($id))) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    /*$datos = $this->request->data;
                    debug($datos);*/
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Los Datos Fueron modificados exitosamente..!'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey =>base64_decode($id)));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
		$questions = $this->User->Question->find('list');
                $groups = $this->User->Group->find('list', array('conditions'=>array('Group.id >'=>1)));
		$this->set(compact('questions', 'groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = base64_decode($id);
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public  function change_pass(){
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => base64_decode($id)));
			$this->request->data = $this->User->find('first', $options);
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
        }
        
            public  function change_password($id = null){
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
        }
        
        
        
        public function mensajes(){

        }
        
        public function buscar_datos($email){
            $this->layout='ajax';
            if ($this->request->is(array('post', 'put'))) {
                $data = $this->request->data;
                //debug($data);
                   $id_usuario = $this->request->data['User']['id'];
                   $respuesta_usuario = $this->request->data['User']['respuesta_del_usuario'];
                   $respuesta_real = $this->request->data['User']['respuesta'];
                   if($respuesta_usuario == $respuesta_real){
                       $this->Session->setFlash(__('Respuestas correctas, ahora puede cambiar su clave.'));
				return $this->redirect(array('action' => 'cambio_clave',  base64_encode($id_usuario)));
                   }else{
                       $this->Session->setFlash(__('Respuestas incorrectas, intente nuevamente.'));
                       $options = array('conditions' => array('User.email'=>$email));
		       $this->request->data = $this->User->find('first', $options);
                   }
                   
		} else {
			$options = array('conditions' => array('User.email'=>$email));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
            
            $datos = $this->User->find('all', array('conditions'=>array('User.email'=>$email)));
            //echo debug($datos);
            $this->set('data', $datos);
           
        }
        
        public function cambio_clave($id){
            
            if (!$this->User->exists(base64_decode($id))) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    $primera = $this->request->data['User']['password'];
                    $segunda = $this->request->data['User']['password_v'];
                    if($segunda != $primera){
                        $this->Session->setFlash(__('Las claves no coninciden, intente nuevamente.'));
                        $options = array('conditions' => array('User.' . $this->User->primaryKey => base64_decode($id)));
			$this->request->data = $this->User->find('first', $options);
                    }else{
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Cambio de Clave exitoso..!'));
				return $this->redirect(array('controller'=>'users','action' => 'login'));
			} else {
				$this->Session->setFlash(__('No se pudo cambiar la clave. intente nuevamente.'));
			}
                    }
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => base64_decode($id)));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
        }
        
        public function pregunt_seg($id){
             if (!$this->User->exists(base64_decode($id))) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Registro exitoso..!'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('No se pudo registrar la pregunta de seguridad. intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => base64_decode($id)));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
                unset($this->request->data['User']['respuesta']);
		$questions = $this->User->Question->find('list', array('conditions'=>array('Question.id <=' => 5)));
		$this->set(compact('questions'));
        }
        
        
        public function enviarcorreo($text_contenido,$asunto,$correo, $usuario){
                            $Email = new CakeEmail();
                            $Email->config('smtp');
                            $Email->to(base64_decode($correo));
                            $Email->subject(base64_decode($asunto));
                            if($Email->send(base64_decode($text_contenido))){
                                $this->Session->setFlash(__('El usuario ha sido creado Exitosamente, Información enviada al correo.'));
                                return $this->redirect(array('controller'=>'personas', 'action' => 'principal', base64_decode($usuario)));
                            }else{
                                $this->Session->setFlash(__('El usuario ha sido creado, pero ocurrio un error al enviar información al correo.'));
                            }

        }
        
        
        ///////////////principal///////////////////////////
        
        public function home(){
            //Configure::write('debug', '0');
         $datos = $this->Session->read('Auth.User');
         echo debug($datos);
         /*if($datos == NULL){
                  return $this->redirect(array('action'=>'add'));
              }else{
          $this->set('datos',$datos);
          $this->set('sesion',$this->Session->read('Auth.User'));
              }*/
        }
        
        
}
        

		
                
