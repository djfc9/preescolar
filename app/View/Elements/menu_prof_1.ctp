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
        <li><a href="/preescolar/personas/view/<?php echo base64_encode($usuario);  ?>"><span>Datos Personales</span></a></li>
        <li><a href="/preescolar/personas/edit/<?php echo base64_encode($usuario);  ?>"><span>Modificar Informaci&oacute;n</span></a></li>
        <li><a href="/preescolar/Users/edit/<?php echo base64_encode($usuario); ?>"><span>Cambiar Clave</span></a></li>
        </ul>
    </li>
     <li><a href="#">Regi y Cons Familiar</a>
      <ul>
          <li><a href="/preescolar/personas/nucleo_familiar/<?php echo base64_encode($usuario); ?>"><span>Núcleo Familiar</span></a></li>
        <li><a href="/preescolar/alumnos/add/<?php echo base64_encode($usuario); ?>"><span>Registro de Representados</span></a></li>
        <li><a href="/preescolar/personas/add1_1/<?php echo base64_encode($usuario); ?>"><span>Registro de Autorizados</span></a></li>
        <li><a href="/preescolar/Personas/viewalumnos/<?php echo base64_encode($usuario); ?>"><span>Consultar Representados</span></a></li>
        <li><a href="/preescolar/personas/viewautorizados/<?php echo base64_encode($usuario); ?>"><span>Consultar Autorizados</span></a></li>
      </ul>
    </li>
    <li><a href="#">Consultas</a>
      <ul>
        <li><a href="/preescolar/GradosSecciones/alumnos/<?php echo base64_encode($usuario); ?>"><span>Lista de Alumnos</span></a></li>
        <li><a href="/preescolar/Alumnos/lista_autorizados"><span>Autorizados del Niño</span></a></li>
        <li><a href="/preescolar/comidas"><span>Menú diario</span></a></li>
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
         <li><a href="/preescolar/Boletas/add"><span>Generar Boleta</span></a></li>
         <li><a href="/preescolar/Boletas"><span>Lista de Boletas</span></a></li>
      </ul>
   </li>
      <li class='last'><span><?php echo $this->Form->postLink(__('Cerrar Sesión'), array('controller'=>'users','action' => 'logout'), null, __('¿Seguro desea Salir?')); ?></span></li>
 </ul>
</div>
</body>
</html>

