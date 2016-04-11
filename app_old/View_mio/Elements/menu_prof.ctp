<?php $sesion = $this->Session->read('Auth'); 
 //debug($sesion);
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
    <li><a href="#">Consultas</a>
      <ul>
        <li><a href="/preescolar/GradosSecciones/alumnos/<?php echo $usuario; ?>"><span>Lista de Alumnos</span></a></li>
        <li><a href="/preescolar/Alumnos/lista_autorizados"><span>Autorizados del Niño</span></a></li>
      </ul>
    </li>
 
     <li><a href="#"><span>Evaluaciones</span></a>
       <ul>
         <li><a href="#"><span>Evaluar</span></a></li>
         <li><a href="#"><span>Evaluar</span></a></li>
      </ul>
   </li>

     <li><a href="#"><span>Boletas</span></a>
       <ul>
         <li><a href="#"><span>Generar Boleta</span></a></li>
      </ul>
   </li>
      <li class='last'><span><?php echo $this->Form->postLink(__('Cerrar Sesión'), array('controller'=>'users','action' => 'logout'), null, __('¿Seguro desea Salir?')); ?></span></li>
 </ul>
</div>
</body>
</html>

