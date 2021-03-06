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
        <li><a href="/preescolar/personas/view/<?php echo $usuario;  ?>"><span>Datos Personales</span></a></li>
        <li><a href="/preescolar/personas/edit/<?php echo $usuario;  ?>"><span>Modificar Informaci&oacute;n</span></a></li>
        <li><a href="/preescolar/Users/edit/<?php echo $usuario; ?>"><span>Cambiar Clave</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Consultas</span></span></a>
      <ul>
         <li><a href="/preescolar/alumnos/index/"><span>Alumnos</span></a></li>
        <li><a href="/preescolar/Alumnos/lista_autorizados"><span>Autorizados</span></a></li>
        <li><a href="/preescolar/Grados_Secciones/index/"><span>Cupos</span></a></li>
        <li><a href="/preescolar/Alumnos/preinscritos"><span>Alumnos Preinscritos</span></a></li>
        <li><a href="/preescolar/Alumnos/inscritos"><span>Alumnos Inscritos</span></a></li>
      </ul>
   </li>
    <li class='has-sub'><a href='#'><span>Registros</span></span></a>
      <ul>
         <li><a href="/preescolar/users/add/"><span>Usuarios</span></a></li>
         <li><a href="/preescolar/personas/registrar_usuarios/"><span>Perfil de Usuarios</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Procesos</span></span></a>
      <ul>
         <li><a href="/preescolar/alumnos/validar_inscripcion/"><span>Validar Nuevos Ingreso</span></a></li>
         <li><a href="/preescolar/alumnos/validar_reinscripcion/"><span>Validar Alumnos Regulares</span></a></li>
         <li><a href="/preescolar/alumnos/retirar/"><span>Retirar Alumno</span></a></li>
      </ul>
   </li>
<li class='has-sub'><a href='#'><span>Reportes</span></span></a>
      <ul>
         <li><a href="/preescolar/alumnos/bd"><span>Base de datos Alumnos</span></a></li>
         <li><a href="/preescolar/alumnos/autorizados/"><span>Listado de Autorizados</span></a></li>
         <li><a href="/preescolar/alumnos/viajes/"><span>Autorizacion de Paseos</span></a></li>
         <li><a href="/preescolar/alumnos/fotografias"><span>Autorizacion de Fotografias</span></a></li>
         <li><a href="/preescolar/alumnos/constancias"><span>Constancias</span></a></li>
         <li><a href="/preescolar/fichas/justificativos_especiales"><span>Constancias especiales</span></a></li>
      </ul>
   </li>
   
   <li class='last'><span><?php echo $this->Form->postLink(__('Cerrar Sesión'), array('controller'=>'users','action' => 'logout'), null, __('¿Seguro desea Salir?')); ?></span></li>
</ul>
</div>
</body>
</html>
