<?php $sesion = $this->Session->read('Auth'); 
echo $usuario = $sesion['User']['id'];
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
    <li><a href="#"><span>Perfil</span></a>
      <ul>
        <li><a href="/preescolar/personas/view/<?php echo $usuario;  ?>"><span>Datos Personales</span></a></li>
        <li><a href="/preescolar/personas/edit/<?php echo $usuario;  ?>"><span>Modificar Informaci&oacute;n</span></a></li>
        <li><a href="/preescolar/Users/edit/<?php echo $usuario; ?>"><span>Cambiar Clave</span></a></li>
      </ul>
    </li>
     <li><a href="#">Regi y Cons Familiar</a>
      <ul>
          <li><a href="/preescolar/personas/nucleo_familiar/<?php echo $usuario; ?>"><span>Núcleo Familiar</span></a></li>
        <li><a href="/preescolar/alumnos/add/<?php echo $usuario; ?>"><span>Registro de Representados</span></a></li>
        <li><a href="/preescolar/personas/add1_1/<?php echo $usuario; ?>"><span>Registro de Autorizados</span></a></li>
        <li><a href="/preescolar/Personas/viewalumnos/<?php echo $usuario; ?>"><span>Consultar Representados</span></a></li>
        <li><a href="/preescolar/personas/viewautorizados/<?php echo $usuario; ?>"><span>Consultar Autorizados</span></a></li>
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
      </ul>
    </li>
 
    <li><a href="#"><span>Consultas</span></a>
      <ul>
        <li><a href="/preescolar/users/index/"><span>Usuarios</span></a></li>
        <li><a href="/preescolar/users/index_1/"><span>Usuarios registrados</span></a></li>
        <li><a href="/preescolar/personas/index/"><span>Personas registradas</span></a></li>
        <li><a href="/preescolar/alumnos/index/"><span>Alumnos</span></a></li>
        <li><a href="/preescolar/alumnos/index_1/"><span>Alumnos opciones</span></a></li>
        <li><a href="/preescolar/Grados_Secciones/index/"><span>Cupos</span></a></li>
        <li><a href="/preescolar/Alumnos/preinscritos"><span>Alumnos Preinscritos</span></a></li>
        <li><a href="/preescolar/Alumnos/inscritos"><span>Alumnos Inscritos</span></a></li>
      </ul>
    </li>
 <li class='has-sub'><a href='#'><span>Adminstraci&oacute;n</span></span></a>
      <ul>
          <li><a href="/preescolar/personas/asignacion/"><span>Asignar Grados y Secciones</span></a></li>
         <li><a href="/preescolar/GradosSeccionesPersonas/index/"><span>Secciones Asignadas</span></a></li>
         <li><a href="/preescolar/alumnos/inscribir/"><span>Inscribir</span></a></li>
         <li><a href="/preescolar/users/edit_1/?"><span>Cambiar usuarios - Grupos</span></a></li>
         <li><a href="/preescolar/alumnos/retirar/"><span>Retirar</span></a></li>
         <li><a href="/preescolar/users/edit_1"><span>f</span></a></li>
      </ul>
   </li>
<li class='has-sub'><a href='#'><span>Reportes</span></span></a>
      <ul>
         <li><a href="/preescolar/alumnos/bd"><span>Base de datos Alumnos</span></a></li>
         <li><a href="/preescolar/alumnos/autorizados/"><span>Listado de Autorizados</span></a></li>
         <li><a href="/preescolar/alumnos/viajes/"><span>Autorizacion de Paseos</span></a></li>
         <li><a href="/preescolar/alumnos/fotografias"><span>Autorizacion de Fotografias</span></a></li>
         <li><a href="/preescolar/alumnos/constancias"><span>Constancias</span></a></li>
         <li><a href="/preescolar/alumnos/retirar/"><span>Constancias especiales</span></a></li>
         <li><a href="/preescolar/alumnos/dbpdf_rh/"><span>Listado de RRHH</span></a></li>
      </ul>
   </li>
   </li>
    <li><a href="#"><span>Estadisticas</span></a>
       <ul>
         <li><a href="/preescolar/alumnos/buscar/1"><span>Graficos</span></a></li>
         <li><a href="/prescolar/alumnos/buscar/2"><span>Planilla de Inscripción</span></a></li>
      </ul>
   </li>
      <li class='last'><span><?php echo $this->Form->postLink(__('Cerrar Sesión'), array('controller'=>'users','action' => 'logout'), null, __('¿Seguro desea Salir?')); ?></span></li>
 </ul>
</div>
</body>
</html>

