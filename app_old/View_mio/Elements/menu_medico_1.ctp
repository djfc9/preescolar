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
<li class='has-sub'><a href="#">Perfil</a>
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
    <li class='has-sub'><a href="#">Informaci&oacute;n</a>
      <ul>
          <li><a href="/preescolar/alumnos/lista"><span>Listado de Alumnos</span></a></li>
        <li><a href="/preescolar/saluds/index"><span>Salud de Alumnos</span></a></li>
      </ul>
    </li>
 
    <li  class='has-sub'><a href="#">Reportes</a>
      <ul>
        <li><a href="/preescolar/fichas/"><span>Listar Casos m&eacute;dico</span></a></li>
        <li><a href="/preescolar/fichas/justificativos"><span>Justificativo m&eacute;dico</span></a></li>
       <!-- <li><a href="/preescolar/fichas/reposos/"><span>Reposos m&eacute;dico</span></a></li>-->
      </ul>
    </li>
      <li class='last'><span><?php echo $this->Form->postLink(__('Cerrar Sesión'), array('controller'=>'users','action' => 'logout'), null, __('¿Seguro desea Salir?')); ?></span></li>
 </ul>
 </div>
</body>
</html>
