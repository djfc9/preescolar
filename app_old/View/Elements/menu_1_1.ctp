<?php $sesion = $this->Session->read('Auth'); 
echo $usuario = $sesion['User']['id'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
	<ul id="dropdownmenu">
		<li><a href='/preescolar/personas/principal'><span>Inicio</span></span></a></li>
		<li><a href="#"><span>Perfil</span></a>
      			<ul>
          		<li><a href="/preescolar/personas/view/<?php echo base64_encode($usuario);  ?>"><span>Datos Personales</span></a></li>
        		<li><a href="/preescolar/personas/edit/<?php echo base64_encode($usuario);  ?>"><span>Modificar Informaci&oacute;n</span></a></li>
        		<li><a href="/preescolar/Users/edit/<?php echo base64_encode($usuario); ?>"><span>Cambiar Clave</span></a></li>
     			 </ul>
   		 </li>
		<li><a href="#"><span>Registro</span></a>
      <ul>
        <li><a href="/preescolar/users/add1/"><span>Usuarios</span></a></li>
        <li><a href="/preescolar/personas/registrar_usuarios_1/"><span>Perfiles</span></a></li>
        <li><a href="/preescolar/personas/trabajador_preescolar/"><span>Trabajadores</span></a></li>
        <li><a href="/preescolar/personas/casos_especiales/"><span>Casos Especiales</span></a></li>
        <li><a href="/preescolar/grados/add/"><span>Grados</span></a></li>
        <li><a href="/preescolar/seccions/add/"><span>Secciones</span></a></li>
        <li><a href="/preescolar/Grados_Secciones/add"><span>Cupos</span></a></li>
      </ul>
    </li>
 
    <li><a href="#"><span>Consultas</span></a>
      <ul>
        <li><a href="/preescolar/users/index/"><span>Usuarios</span></a></li>
        <li><a href="/preescolar/users/index_1/"><span>Usuarios registrados</span></a></li>
        <li><a href="/preescolar/personas/index/"><span>Personas registradas</span></a></li>
       <!-- <li><a href="/preescolar/users/index/"><span>Usuarios</span></a></li>-->
        <li><a href="/preescolar/alumnos/index/"><span>Alumnos</span></a></li>
        <li><a href="/preescolar/alumnos/index/"><span>Alumnos opciones</span></a></li>
        <li><a href="/preescolar/Grados_Secciones/index/"><span>Cupos</span></a></li>
        <li><a href="/preescolar/Alumnos/preinscritos"><span>Alumnos Preinscritos</span></a></li>
        <li><a href="/preescolar/Alumnos/inscritos"><span>Alumnos Inscritos</span></a></li>
      </ul>
    </li>
	<li><a href='#'><span>Adminstraci&oacute;n</span></span></a>
      <ul>
          <li><a href="/preescolar/personas/asignacion/"><span>Asignar Grados y Secciones</span></a></li>
         <li><a href="/preescolar/GradosSeccionesPersonas/index/"><span>Secciones Asignadas</span></a></li>
         <li><a href="/preescolar/Alumnos_Grados_Secciones/inscribir/"><span>Inscribir</span></a></li>
         <li><a href="/preescolar/alumnos/promover/"><span>Promover Alumno</span></a></li>
         <li><a href="/preescolar/Alumnos_Grados_Secciones/cambiar_seccion_1/"><span>Cambiar Sección</span></a></li>
         <li><a href="/preescolar/users/edit_1/?"><span>Cambiar usuarios - Grupos</span></a></li>
      </ul>
   </li>
                <li>
			<a href="#">Reportes</a>
			<ul>
				<li>
					<a href="#">Bases de Datos</a>
					<ul>
						<li><a href="/preescolar/alumnos/bd"><span>Grado-Secc</span></a></li>
                                                <li><a href="/preescolar/alumnos/dbpdf_rh"><span>Alum-Rep-General</span></a></li>
                                                <li><a href="/preescolar/alumnos/alumno_rep_ubic_gradosecc"><span>Alum-Rep-Detalle</span></a></li>
                                                <li><a href="/preescolar/alumnos/edad_se"><span>Edad-Sexo</span></a></li>
					</ul>
				</li>
                                <li>
					<a href="#">Autorizaciones</a>
					<ul>
                                                <li><a href="/preescolar/alumnos/viajes/"><span>Paseos</span></a></li>
                                                <li><a href="/preescolar/alumnos/fotografias"><span>Fotografias</span></a></li>
                                                <li><a href="/preescolar/alumnos/autorizados/"><span>Personas</span></a></li>
					</ul>
				</li>
                                <li><a href="/preescolar/alumnos/constancias"><span>Constancias</span></a></li>
                                <li><a href="/preescolar/fichas/justificativos_especiales"><span>Constancias especiales</span></a></li>
			</ul>
		</li>             
   </li>
    <li><a href="#"><span>Estadisticas</span></a>
       <ul>
         <li><a href="/preescolar/alumnos/buscar/1"><span>Graficos</span></a></li>
         <li><a href="/prescolar/alumnos/buscar/2"><span>Planilla de Inscripción</span></a></li>
      </ul>
   </li>
		<li><?php echo $this->Form->postLink(__('Cerrar Sesión'), array('controller'=>'users','action' => 'logout'), null, __('¿Seguro desea Salir?')); ?></li>
		
	</ul>
</body>
</html>
