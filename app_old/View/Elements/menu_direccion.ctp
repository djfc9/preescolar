<?php $sesion = $this->Session->read('Auth'); 
 $usuario = $sesion['User']['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
	<link rel='stylesheet' type='text/css' href='styles.css' />
</head>
<body>
<div id='cssmenu'>
<ul>
   <li class='active'><a href='/preescolar/personas/principal'><span>Inicio</span></span></a></li>
   <li class='has-sub'><a href='#'><span>Perfil</span></span></a>
      <ul>
        <li><a href="/preescolar/personas/view/<?php echo base64_encode($usuario);  ?>"><span>Datos Personales</span></a></li>
        <li><a href="/preescolar/personas/edit/<?php echo base64_encode($usuario);  ?>"><span>Modificar Informaci&oacute;n</span></a></li>
        <li><a href="/preescolar/Users/edit/<?php echo base64_encode($usuario); ?>"><span>Cambiar Clave</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Registro</span></span></a>
      <ul>
        <li><a href="/preescolar/grados/add/"><span>Grados</span></a></li>
        <li><a href="/preescolar/seccions/add/"><span>Secciones</span></a></li>
        <li><a href="/preescolar/Grados_Secciones/add"><span>Cupos</span></a></li>
        <li><a href="/preescolar/requisitos/add/"><span>Requisitos</span></a></li>
        <li><a href="/preescolar/users/add/"><span>Usuarios</span></a></li>
         <li><a href="/preescolar/personas/registrar_usuarios/"><span>Perfil de Usuarios</span></a></li>
         <li><a href="/preescolar/comidas/add"><span>Menú diario</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Cosultas</span></span></a>
      <ul>
         <li><a href="/preescolar/alumnos/index/"><span>Alumnos</span></a></li>
        <li><a href="/preescolar/Alumnos/lista_autorizados"><span>Autorizados</span></a></li>
        <li><a href="/preescolar/Grados_Secciones/index/"><span>Cupos</span></a></li>
        <li><a href="/preescolar/Alumnos/preinscritos"><span>Alumnos Preinscritos</span></a></li>
        <li><a href="/preescolar/Alumnos/inscritos"><span>Alumnos Inscritos</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Procesos</span></span></a>
      <ul>
         <li><a href="/preescolar/Alumnos_Grados_Secciones/inscribir/"><span>Inscribir</span></a></li>
         <li><a href="/preescolar/Alumnos_Grados_Secciones/cambiar_seccion_1/"><span>Cambiar Sección</span></a></li>
         <li><a href="/preescolar/alumnos/retirar/"><span>Retirar Alumno</span></a></li>
         <li><a href="/preescolar/alumnos/promover/"><span>Promover Alumno</span></a></li>
      </ul>
   </li>
<li class='has-sub'><a href='#'><span>Adminstraci&oacute;n</span></span></a>
      <ul>
          <li><a href="/preescolar/personas/asignacion/"><span>Asignar Grados y Secciones</span></a></li>
         <li><a href="/preescolar/GradosSeccionesPersonas/index/"><span>Secciones Asignadas</span></a></li>
         <li><a href="/preescolar/Eventos/add"><span>Agregar Eventos</span></a></li>
         <li><a href="/preescolar/Noticias/add"><span>Agregar Noticias</span></a></li>
      </ul>
   </li>
<li class="has-sub">
	<a href="#">Reportes</a>
	<ul>
		<li>
			<a href="#">Bases de Datos</a>
			<ul>
				<li><a href="/preescolar/alumnos/bd"><span>Grado-Secc</span></a></li>
                                   <li><a href="/preescolar/alumnos/dbpdf_rh"><span>Alum-Rep-General</span></a></li>
                                   <li><a href="/preescolar/AlumnosGradosSecciones/reporte_ubicacion"><span>Alum-Rep-Detalle</span></a></li>
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
   
   <li class='last'><span><?php echo $this->Form->postLink(__('Cerrar Sesión'), array('controller'=>'users','action' => 'logout'), null, __('¿Seguro desea Salir?')); ?></span></li>
</ul>
</div>
</body>
</html>
