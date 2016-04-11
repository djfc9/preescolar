<?php
App::uses('AppController', 'Controller');


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
    $this->Acl->allow($group, 'controllers/Alumnos');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones/bd_alumnos');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones/dbpdf');
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
    $this->Acl->allow($group, 'controllers/AlumnosNormas');
    $this->Acl->allow($group, 'controllers/Requisitos/add');
    $this->Acl->allow($group, 'controllers/Requisitos/index');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/logout');
    $this->Acl->allow($group, 'controllers/Users/index_1');
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
    $this->Acl->allow($group, 'controllers/Alumnos/posiciones');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_autorizados');
    $this->Acl->allow($group, 'controllers/Alumnos/mostrar_lista_autorizados');
    $this->Acl->allow($group, 'controllers/GradosSecciones/alumnos');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
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
    $this->Acl->allow($group, 'controllers/Alumnos/view');
    $this->Acl->allow($group, 'controllers/Alumnos/index_lista');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
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
    $this->Acl->allow($group, 'controllers/Alumnos/c_estudio');
    $this->Acl->allow($group, 'controllers/Alumnos/c_inscripcion');
    $this->Acl->allow($group, 'controllers/Alumnos/c_conducta');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_parroquias');
    $this->Acl->allow($group, 'controllers/Alumnos/lista_municipios');
    $this->Acl->allow($group, 'controllers/AlumnosNormas/view');
    $this->Acl->allow($group, 'controllers/AlumnosNormas/delete');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
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
    $this->Acl->allow($group, 'controllers/Alumnos');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones/bd_alumnos');
    $this->Acl->allow($group, 'controllers/AlumnosGradosSecciones/dbpdf');
    $this->Acl->allow($group, 'controllers/GradosSecciones/view');
    $this->Acl->allow($group, 'controllers/GradosSecciones/index');
    $this->Acl->allow($group, 'controllers/Personas/index');
    $this->Acl->allow($group, 'controllers/Personas/view');
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
    $this->Acl->allow($group, 'controllers/AlumnosNormas');
    $this->Acl->allow($group, 'controllers/Requisitos/index');
    $this->Acl->allow($group, 'controllers/Users/change_pass');
    $this->Acl->allow($group, 'controllers/Users/logout');
    $this->Acl->allow($group, 'controllers/Users/index_1');
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
/*
public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.1 and up
    //$this->Auth->allow('add');
    $this->Auth->allow('mensajes');
    $this->Auth->allow('change_password');
    $this->Auth->allow('buscar_datos');
}*/
    

public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.0
    $this->Auth->allow('*');

    // For CakePHP 2.1 and up
    $this->Auth->allow();
}



public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Usuario o Contraseña invalida, Intente de nuevo'));
    }
}

public function logout() {
    $this->Session->setFlash('Hasta Luego');
    return $this->redirect($this->Auth->logout());
}

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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
                       /* $datos = $this->request->data;
                        debug($datos);*/
                       $usuario = $this->request->data['User']['username']; 
                       $contraseña = $this->request->data['User']['password']; 
                       $correo = $this->request->data['User']['email']; 
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido creado, Información enviada al correo.'));
				return $this->redirect(array('controller'=>'personas', 'action' => 'registrar_usuarios', $usuario));
			} else {
				$this->Session->setFlash(__('El Usuario no ha sido creado, por favor intete de nuevo.'));
			}
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
                $groups = $this->User->Group->find('list', array('order'=> 'name ASC'));
                $this->User->recursive = -1;
                $ultima_sesion = $this->User->find('count');
                //echo debug($ultima_sesion);
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
                //echo debug($groups);
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
		if (!$this->User->exists($id)) {
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
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
	}
        
        public function edit_1($id = null) {
		if (!$this->User->exists($id)) {
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
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
                unset($this->request->data['User']['password']);
		$questions = $this->User->Question->find('list');
                $groups = $this->User->Group->find('list');
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
		$this->User->id = $id;
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
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
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
            $datos = $this->User->find('all', array('conditions'=>array('User.email'=>$email)));
            //echo debug($datos);
            $this->set('data', $datos);
           
        }
        
}
        

		
                
