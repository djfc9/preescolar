<?php
App::uses('AppController', 'Controller');
/**
 * AlumnosGradosSecciones Controller
 *
 * @property AlumnosGradosSeccione $AlumnosGradosSeccione
 * @property PaginatorComponent $Paginator
 */
class AlumnosGradosSeccionesController extends AppController {

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
		$this->AlumnosGradosSeccione->recursive = 0;
		$this->set('alumnosGradosSecciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlumnosGradosSeccione->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos grados seccione'));
		}
		$options = array('conditions' => array('AlumnosGradosSeccione.' . $this->AlumnosGradosSeccione->primaryKey => $id));
		$this->set('alumnosGradosSeccione', $this->AlumnosGradosSeccione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlumnosGradosSeccione->create();
			if ($this->AlumnosGradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos grados seccione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos grados seccione could not be saved. Please, try again.'));
			}
		}
		$alumnos = $this->AlumnosGradosSeccione->Alumno->find('list');
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list');
		$this->set(compact('alumnos', 'gradosSecciones'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AlumnosGradosSeccione->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos grados seccione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AlumnosGradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos grados seccione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos grados seccione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlumnosGradosSeccione.' . $this->AlumnosGradosSeccione->primaryKey => $id));
			$this->request->data = $this->AlumnosGradosSeccione->find('first', $options);
		}
		$alumnos = $this->AlumnosGradosSeccione->Alumno->find('list');
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list');
		$this->set(compact('alumnos', 'gradosSecciones'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AlumnosGradosSeccione->id = $id;
		if (!$this->AlumnosGradosSeccione->exists()) {
			throw new NotFoundException(__('Invalid alumnos grados seccione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlumnosGradosSeccione->delete()) {
			$this->Session->setFlash(__('The alumnos grados seccione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alumnos grados seccione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function bd_alumnos($id) {
            $this->layout ='ajax';
            Configure::write('debug' ,'0');
                $gradosSecciones = $this->AlumnosGradosSeccione->find('all', array(
                    'order'=>'Alumno.apellido ASC',
                    'conditions'=>array(
                        'And'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id))));
		//echo debug($gradosSecciones);
                if(empty($gradosSecciones)){
                    echo "<script>alert('Seleccion sin Alumnos'); document.location=('/preescolar/alumnos/bd'); </script>";
                }
		
		$this->set(compact('alumnos', 'gradosSecciones'));
	}
        
        public function reporte_ubicacion(){
		if ($this->request->is(array('post'))) {
                    //echo debug($this->request->data);
                    $gs = $this->request->data['AlumnosGradosSecciones']['gradosSecciones'];
                    $ano_escolar = $this->request->data['AlumnosGradosSecciones']['ano_escolar'];
                    if($gs == ""){
                        $this->Session->setFlash(__('Seleccione un Grado y Sección de la lista'));
                    }elseif ($ano_escolar =="") {
                        $this->Session->setFlash(__('Seleccione un Año Escolar de la lista'));
                    }else{
                      return $this->redirect(array('action' => 'bd_alumnos_p_u',$gs,$ano_escolar));  
                    }

		} 
                
        }
        
        public function lista_grados($ano_escolar){
             $this->layout ='ajax';
            Configure::write('debug' ,'0');
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list', array(
                   'order'=>'GradosSeccione.descripcion Asc',
                   'conditions' =>array('GradosSeccione.ano_escolar'=>$ano_escolar)));
		$this->set(compact('gradosSecciones')); 
        }
              


        public function bd_alumnos_p_u($id,$ano_escolar){
           $this->layout ='ajax';
            Configure::write('debug' ,'0');
                $this->AlumnosGradosSeccione->GradosSeccione->recursive = -1;
                $descripcion = $this->AlumnosGradosSeccione->GradosSeccione->find('all',array(
                    'fields'=>'GradosSeccione.descripcion',
                    'conditions'=>array('and'
                        =>array('GradosSeccione.id'=>$id/*, 'GradosSeccione.ano_escolar'=>$ano_escolar*/))));
                $informacion = $this->AlumnosGradosSeccione->query("SELECT 
                    distinct (alumnos.cedula_escolar), 
                    alumnos.estatu_id,
                    alumnos.apellido as aalumno, 
                    alumnos.nombre as nalumno,
                    alumnos.caso_especial,
                    alumnos.fecha_nacimiento,
                    alumnos.sexo_id,
                    users.email as correo,
                    personas.nombre as nrepresentante, 
                    personas.apellido as arepresentante,
                    personas.entes, 
                    personas.cargo_id,
                    grados_secciones.descripcion as grado, 
                    grados_secciones.id as grado_id,
                    tipo_personas.descripcion as parentesco
                  FROM 
                    public.alumnos, 
                    public.personas,
                    public.alumnos_personas, 
                    public.grados_secciones, 
                    public.users,
                    public.alumnos_grados_secciones, 
                    public.personas_tipo_personas, 
                    public.tipo_personas
                  WHERE 
                    alumnos.id = alumnos_personas.alumno_id AND
                    personas.id = alumnos_personas.persona_id AND
                    personas.id = personas_tipo_personas.persona_id AND
                    alumnos_grados_secciones.alumno_id = alumnos.id AND
                    alumnos_grados_secciones.grados_seccione_id = grados_secciones.id AND
                    alumnos_grados_secciones.ano_escolar = '$ano_escolar' AND
                    personas_tipo_personas.tipo_persona_id = tipo_personas.id AND
                    users.id = personas.user_id AND
                    personas.representante = 'Si' AND 
                    personas.autorizado = 'Si' AND 
                    alumnos.estatu_id = 2 AND
                    grados_seccione_id = $id

                  ORDER BY
                    grados_secciones.descripcion,
                    alumnos.apellido;");
                //echo debug($informacion);
                if(empty($informacion)){
                    echo "<script>alert('Seleccion sin Alumnos'); document.location=('/preescolar/alumnosGradosSeccione/reporte_ubicacion'); </script>";
                }else{
                    $this->set(compact('informacion', 'descripcion','ano_escolar'));
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                    $this->layout = 'pdf';
                    $this->set('fpdf', new FPDF('L','mm','A4'));
                    $this->render('bd_detallado');
                }
        }
        
        public function dbpdf($id){
            $gradosSecciones = $this->AlumnosGradosSeccione->find('all', array(
                'order'=>array('Alumno.apellido ASC','Alumno.segundo_apellido Asc'),
                'conditions'=>array('And'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id, 'Alumno.estatu_id'=>2))));
            foreach ($gradosSecciones as $datos):
            $id_g_s = $datos['AlumnosGradosSeccione']['grados_seccione_id'];
            endforeach;
            $nombre_gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('all', array(
                'conditions'=>array('GradosSeccione.id'=>$id_g_s)));
            $this->set(compact('gradosSecciones','nombre_gradosSecciones'));
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
            $this->layout = 'pdf';
            $this->set('fpdf', new FPDF('L','mm','A4'));
            $this->render('pdf');
            
        }
		
	 public function dbpdf_rh(){
            //$gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('contain'=>array('Alumno','AlumnosPersona','conditions'=>array('AlumnosGradosSeccione.grados_seccione_id'=>$id))));
            $gradosSecciones = $this->AlumnosGradosSeccione->find('all', array('order'=>'Alumno.apellido ASC'));
            //echo debug($gradosSecciones);
            foreach ($gradosSecciones as $datos):
            //echo debug($datos);
            $id_g_s = $datos['AlumnosGradosSeccione']['grados_seccione_id'];
            endforeach;
            $nombre_gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('all', array('conditions'=>array('GradosSeccione.id'=>$id_g_s)));
            $this->set(compact('gradosSecciones','nombre_gradosSecciones'));
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
        
        public function inscribir(){
		if ($this->request->is(array('post', 'put'))) {
                    $datos = $this->request->data;
                    //debug($datos);
                    $id_alumno =$this->request->data['Alumno']['id'];
                    $ano_escolar =$this->request->data['AlumnosGradosSeccione']['ano_escolar'];
                    $grado_y_seccion =$this->request->data['AlumnosGradosSeccione']['grados_seccione_id'];
                    $this->request->data['AlumnosGradosSeccione']['alumno_id']=$id_alumno;
                    $verfificar_si_existe = $this->AlumnosGradosSeccione->find('count', array(
                            'conditions'=>array(
                            'And'=>array('AlumnosGradosSeccione.alumno_id'=>$id_alumno,
                                         'AlumnosGradosSeccione.ano_escolar'=>$ano_escolar))));
                    if($verfificar_si_existe == 1){
                     $this->Session->setFlash(__('Este Alumno esta inscrito en otra Sección'));
                     echo "<script type='text/javascript'>"
                    . "var confirmar = confirm('Este Alumno esta inscrito en otra Sección, Desea cambiarlo de Sección?');"
                    ."if(confirmar == true){"
                    . "document.location=('/preescolar/Alumnos_Grados_Secciones/cambiar_seccion/$id_alumno'); }else{"
            . "document.location=('/preescolar/personas/principal'); }"
                    . "</script>";   
                    }else{
                     /////aqui busco los datos de este gradoseccion para verificar si tiene cupos disponibles////
                     $this->AlumnosGradosSeccione->GradosSeccione->recursive = -1;
                     $gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('first', array(
                    'conditions'=>array('And'=>array('GradosSeccione.ano_escolar'=>$ano_escolar,
                     'GradosSeccione.id'=>$grado_y_seccion))));
                     $cupos = $gradosSecciones['GradosSeccione']['cupos'];
                     $asignados = $gradosSecciones['GradosSeccione']['cupos_asignados'];
                     /////aqui verifico si la seccion tiene cupos disponibles y si tiene permito inscribir al alumno en ella
                     ///sino tiene lo mando para que seleccione otra seccion
                     if($asignados == $cupos){
                         $this->Session->setFlash(__('Esta Sección no tiene cupos disponibles. Por favor elija otra.'));
                         return $this->redirect(array('action'=>'inscribir'));
                     }else{
                         
			if ($this->AlumnosGradosSeccione->saveAll($this->request->data)) {
                    
                     ////aqui le sumo uno al los cupos asignados de esa seccion////
                     $restantes = $gradosSecciones['GradosSeccione']['cupos_asignados']+1;
                      $sql = "UPDATE grados_secciones
                                SET cupos_asignados= $restantes
                                WHERE ano_escolar='$ano_escolar' And id=$grado_y_seccion;";
                     $this->AlumnosGradosSeccione->query($sql);
                     ////hasta aqui la suma de cupos asignados///////////////////////
                     $this->Session->setFlash(__('El Alumno ha sido inscrito Exitosamente...'));
                                echo "<script type='text/javascript'>"
                    . "var confirmar = confirm('El Alumno ha sido inscrito Exitosamente,  Desea Inscribir otro Alumno?');"
                    ."if(confirmar == true){"
                    . "document.location=('/preescolar/Alumnos_Grados_Secciones/inscribir/'); }else{"
            . "document.location=('/preescolar/personas/principal'); }"
                    . "</script>"; 
                                
			}else{
				$this->Session->setFlash(__('El Alumno no ha sido inscrito. Por favor intente nuevamente.'));
			}
                      
                    }///cierre del if que verifica si hay cupos disponibles
                    }///cierre del if que verifica si el alumnos esta inscrito en otra seccion
		} else {
			/*$options = array('conditions' => array('AlumnosGradosSeccione.' . $this->AlumnosGradosSeccione->primaryKey => $id));
			$this->request->data = $this->AlumnosGradosSeccione->find('first', $options);*/
		}
            $mes = date('m');
            if ($mes >= 7 ) {
            //Año escolar
            $ano1=date("Y");
            $ano2=date("Y")+1;
            $ano_escolar=$ano1."-".$ano2;
            }else {
            //Año escolar
            $ano1=date("Y")-1;
            $ano2=date("Y");
            $ano_escolar=$ano1."-".$ano2;
            }
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list', array(
                    'order'=>'GradosSeccione.id Asc',
                    'conditions'=>array('GradosSeccione.ano_escolar'=>$ano_escolar)));
                $estatus = $this->AlumnosGradosSeccione->Alumno->Estatu->find('list', array(
                    'fields'=>array('Estatu.id', 'Estatu.nombre'), 
                    'order'=>'Estatu.id ASC', 
                    'conditions'=>array('Estatu.id '=> '2')));
		$this->set(compact('alumnos', 'gradosSecciones', 'estatus', 'ano_escolar'));
        }
        
        public function cambiar_seccion($id){
           if ($this->request->is(array('post', 'put'))) {
                /*$a =$this->request->data;
                echo debug($a);*/
                $id_alumno =$this->request->data['AlumnosGradosSeccione']['alumno_id'];
                $ano_escolar =$this->request->data['AlumnosGradosSeccione']['ano_escolar'];
                $grado_y_seccion_nueva =$this->request->data['AlumnosGradosSeccione']['grados_seccione_id'];
                $actual = $this->request->data['AlumnosGradosSeccione']['actual'];
                
                $this->AlumnosGradosSeccione->GradosSeccione->recursive =-1;
                
                /////aqui busco los datos de la nueva seccion donde sera inscritos para asignarle un cupo////
                $grado_y_seccion_propuesta = $this->AlumnosGradosSeccione->GradosSeccione->find('first', array(
                    'conditions'=>array('And'=>array('GradosSeccione.id'=>$grado_y_seccion_nueva,
                                                     'GradosSeccione.ano_escolar'=>$ano_escolar))));
                
                $cupos_maximos_seccion_nueva = $grado_y_seccion_propuesta['GradosSeccione']['cupos'];
                $cupos_asignados_nueva_seccion = $grado_y_seccion_propuesta['GradosSeccione']['cupos_asignados'];
                ////aqui verifico si la seccion que se propone tiene cupos disponibles////
                if($cupos_asignados_nueva_seccion == $cupos_maximos_seccion_nueva){
                   $this->Session->setFlash(__('Esta Sección no tiene cupos disponibles. Por favor elija otra.'));
		   return $this->redirect(array('action' => 'cambiar_seccion',$id_alumno)); 
                }else{
                
                ///aqui registro al alumno en la nueva seccion///
                $sql="UPDATE alumnos_grados_secciones
                        SET  grados_seccione_id=$grado_y_seccion_nueva 
                        WHERE alumno_id=$id_alumno And ano_escolar='$ano_escolar';";
                if(!$this->AlumnosGradosSeccione->query($sql)){
                 
                 $cupos_restantes_nueva_seccion = $cupos_asignados_nueva_seccion +1;
                ///aqui le asigno el cupo al alumno en la nueva seccion///
                 $sql_seccion_nueva = "UPDATE grados_secciones
                         SET cupos_asignados=$cupos_restantes_nueva_seccion 
                        WHERE ano_escolar='$ano_escolar' And id=$grado_y_seccion_nueva;";
                $this->AlumnosGradosSeccione->query($sql_seccion_nueva);
                ///hasta aqui la asignación del cupo en la nueva seccion///
                
                 
                /////aqui busco los datos de la sección donde esta inscrito actualmente para liberar el cupo que ocupa///
                $grado_y_seccion_actual = $this->AlumnosGradosSeccione->GradosSeccione->find('first', array(
                    'conditions'=>array('And'=>array('GradosSeccione.id'=>$actual,
                                                     'GradosSeccione.ano_escolar'=>$ano_escolar))));
                $cupos_asignados_anterior = $grado_y_seccion_actual['GradosSeccione']['cupos_asignados'];
                
                ///aqui libero el cupo que ocupaba el alumno en la seccion///
                $cupos_restantes_anterior = $cupos_asignados_anterior -1;
                $sql_seccion_anterior = "UPDATE grados_secciones
                         SET cupos_asignados=$cupos_restantes_anterior 
                        WHERE ano_escolar='$ano_escolar' And id=$actual;";
                $this->AlumnosGradosSeccione->query($sql_seccion_anterior);
                ////hasta aqui la liberación del cupo////////////
                
			//if ($this->AlumnosGradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('El alumno ha sido Cambiado de Sección Exitosamente...'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
                 
                /////aqui termina el cambio de seccion del alumno//////
			} else {
				$this->Session->setFlash(__('No se ha podido cambiar de Sección. Por favor, intente nuevamente.'));
			}
		}////cierre del if que verifica si hay cupos disponibles en la nueva seccion
           }
                $mes = date('m');
            if ($mes >= 7 ) {
            //Año escolar
            $ano1=date("Y");
            $ano2=date("Y")+1;
            $ano_escolar=$ano1."-".$ano2;
            }else {
            //Año escolar
            $ano1=date("Y")-1;
            $ano2=date("Y");
            $ano_escolar=$ano1."-".$ano2;
            }
		$alumnos = $this->AlumnosGradosSeccione->Alumno->find('list', array(
                    'conditions'=>array('Alumno.id'=>$id)));
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list', array(
                    'order'=>'GradosSeccione.id Asc',
                    'conditions'=>array('GradosSeccione.ano_escolar'=>$ano_escolar)));
                $estatus = $this->AlumnosGradosSeccione->Alumno->Estatu->find('list', array(
                    'fields'=>array('Estatu.id', 'Estatu.nombre'), 
                    'order'=>'Estatu.id ASC', 
                    'conditions'=>array('Estatu.id '=> '2')));
                $grado_y_seccion_actual =$this->AlumnosGradosSeccione->find('first',array(
                    'conditions'=>array(
                        'And'=>array('AlumnosGradosSeccione.alumno_id'=>$id, 
                            'AlumnosGradosSeccione.ano_escolar'=>$ano_escolar))));
		$this->set(compact('alumnos', 'gradosSecciones','ano_escolar','estatus','grado_y_seccion_actual'));
        }
        
        
        
        public function cambiar_seccion_1(){
            if ($this->request->is(array('post', 'put'))) {
                /*$a =$this->request->data;
                echo debug($a);*/
                $id_alumno =$this->request->data['Alumno']['id'];
                $actual =$this->request->data['Alumno']['actual'];
                $ano_escolar =$this->request->data['AlumnosGradosSeccione']['ano_escolar'];
                $grado_y_seccion_nueva =$this->request->data['AlumnosGradosSeccione']['grados_seccione_id'];
                $this->AlumnosGradosSeccione->GradosSeccione->recursive =-1;
                
                /////aqui busco los datos de la nueva seccion donde sera inscritos para asignarle un cupo////
                $grado_y_seccion_propuesta = $this->AlumnosGradosSeccione->GradosSeccione->find('first', array(
                    'conditions'=>array('And'=>array('GradosSeccione.id'=>$grado_y_seccion_nueva,
                                                     'GradosSeccione.ano_escolar'=>$ano_escolar))));
                
                $cupos_maximos_seccion_nueva = $grado_y_seccion_propuesta['GradosSeccione']['cupos'];
                $cupos_asignados_nueva_seccion = $grado_y_seccion_propuesta['GradosSeccione']['cupos_asignados'];
                ////aqui verifico si la seccion que se propone tiene cupos disponibles////
                if($cupos_asignados_nueva_seccion == $cupos_maximos_seccion_nueva){
                   $this->Session->setFlash(__('Esta Sección no tiene cupos disponibles. Por favor elija otra.'));
		   return $this->redirect(array('action' => 'cambiar_seccion',$id_alumno)); 
                }else{
                $sql="UPDATE alumnos_grados_secciones
                        SET  grados_seccione_id=$grado_y_seccion_nueva 
                        WHERE alumno_id=$id_alumno And ano_escolar='$ano_escolar';";
                if(!$this->AlumnosGradosSeccione->query($sql)){
                $cupos_restantes_nueva_seccion = $cupos_asignados_nueva_seccion +1;
                ///aqui le asigno el cupo al alumno en la nueva seccion///
                 $sql_seccion_nueva = "UPDATE grados_secciones
                         SET cupos_asignados=$cupos_restantes_nueva_seccion 
                        WHERE ano_escolar='$ano_escolar' And id=$grado_y_seccion_nueva;";
                $this->AlumnosGradosSeccione->query($sql_seccion_nueva);
                ///hasta aqui la asignación del cupo en la nueva seccion///
                
                 
                /////aqui busco los datos de la sección donde esta inscrito actualmente para liberar el cupo que ocupa///
                $grado_y_seccion_actual = $this->AlumnosGradosSeccione->GradosSeccione->find('first', array(
                    'conditions'=>array('And'=>array('GradosSeccione.id'=>$actual,
                                                     'GradosSeccione.ano_escolar'=>$ano_escolar))));
                $cupos_asignados_anterior = $grado_y_seccion_actual['GradosSeccione']['cupos_asignados'];
                
                ///aqui libero el cupo que ocupaba el alumno en la seccion///
                $cupos_restantes_anterior = $cupos_asignados_anterior -1;
                $sql_seccion_anterior = "UPDATE grados_secciones
                         SET cupos_asignados=$cupos_restantes_anterior 
                        WHERE ano_escolar='$ano_escolar' And id=$actual;";
                $this->AlumnosGradosSeccione->query($sql_seccion_anterior);
                ////hasta aqui la liberación del cupo////////////
                
			//if ($this->AlumnosGradosSeccione->save($this->request->data)) {
				$this->Session->setFlash(__('El alumno ha sido Cambiado de Sección Exitosamente...'));
				return $this->redirect(array('controller'=>'personas','action' => 'principal'));
			} else {
				$this->Session->setFlash(__('No se ha podido cambiar de Sección. Por favor, intente nuevamente.'));
			}
		}///cierre del if que verifica si la nueva seccion tiene cupos disponibles///
            }
                $mes = date('m');
            if ($mes >= 7 ) {
            //Año escolar
            $ano1=date("Y");
            $ano2=date("Y")+1;
            $ano_escolar=$ano1."-".$ano2;
            }else {
            //Año escolar
            $ano1=date("Y")-1;
            $ano2=date("Y");
            $ano_escolar=$ano1."-".$ano2;
            }
		$gradosSecciones = $this->AlumnosGradosSeccione->GradosSeccione->find('list', array(
                    'order'=>'GradosSeccione.id Asc',
                    'conditions'=>array('GradosSeccione.ano_escolar'=>$ano_escolar)));
                $estatus = $this->AlumnosGradosSeccione->Alumno->Estatu->find('list', array(
                    'fields'=>array('Estatu.id', 'Estatu.nombre'), 
                    'order'=>'Estatu.id ASC', 
                    'conditions'=>array('Estatu.id '=> '2')));
		$this->set(compact('gradosSecciones','ano_escolar','estatus'));
        }
        
                }
