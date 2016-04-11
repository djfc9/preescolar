<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
                Preescolar
	</title>
	<?php
		echo $this->Html->meta('icon');
                //echo $this->Html->css('index');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->Html->script(array('jquery-1.8.1.min','funciones','jquery.validate','jquery-ui-1.10.4.custom.min.js'));
	?>
    
   <!-- <script>
        ///funcion de contador invertido (cuenta regresiva)
        function countdown(id){
            var fecha=new Date('2014','5','11','00','00','00')
            var hoy=new Date()
            var dias=0
            var horas=0
            var minutos=0
            var segundos=0

            if (fecha>hoy){
                    var diferencia=(fecha.getTime()-hoy.getTime())/1000
                    dias=Math.floor(diferencia/86400)
                    diferencia=diferencia-(86400*dias)
                    horas=Math.floor(diferencia/3600)
                    diferencia=diferencia-(3600*horas)
                    minutos=Math.floor(diferencia/60)
                    diferencia=diferencia-(60*minutos)
                    segundos=Math.floor(diferencia)

                    document.getElementById(id).innerHTML='<span class="element">' + dias + ' dias\t\t</span><span class="element">' + horas + ' horas\t\t</span><span class="element">' + minutos + ' minutos\t\t</span><span class="element">' + segundos + ' segundos</span>'

                    if (dias>0 || horas>0 || minutos>0 || segundos>0){
                            setTimeout("countdown(\"" + id + "\")",1000)
                    }
            }
            else{
                    document.getElementById('restante').innerHTML='<span class="element">' + dias + ' dias\t\t</span><span class="element">' + horas + ' horas\t\t</span><span class="element">' + minutos + ' minutos\t\t</span><span class="element">' + segundos + ' segundos</span>'
            }
        }
        </script>-->
</head>
<body <!--onload="countdown('contador')-->">
	<center>
	<div id="container">
            <div id="headertop">
                    <?php echo $this->Html->image('tope_jerarquico.png', array('style' => 'width: 1200px;', 'style' => 'height: 78px;')); ?>
		</div>
		<div id="header">

                    <?php echo $this->Html->image('banner_preescolar.jpg', array('style' => 'width: 1200px;', 'style' => 'height: 181px;')); ?>
                <div style='width: 990px;'>
                <?php echo $this->Session->flash();  ?> 
                </div>
                <?php $sesion = $this->Session->read('Auth');                   /*   echo      debug($sesion);*/ ?> 
		<?php Configure::write('debug', '0'); ?> 
                <?php echo $this->Html->css('menuA'); ?>
                <?php  if(!empty($sesion)){
                $nivel_usuario = $sesion['User']['Group']['id']; 
                $trabaja = $sesion['User']['trabaja_preescolar'];
                switch ($nivel_usuario)
                    {
                        case "": ///vacio
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_login');
                        echo "</div>";
                        break;
                        case "1": ///admin
                             if($trabaja == 0)
                            {
                        echo "<div class='flotados'>";
                        echo $this->Element('menu');
                        echo "</div>";
                            }
                            else 
                            {
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_1');
                        echo "</div>";
                            }
                        break;
                        case "2":///direccion
                            if($trabaja == 0)
                            {
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_direccion');
                        echo "</div>";
                            }
                            else 
                            {
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_direccion_1');
                        echo "</div>";
                            }
                        break;
                        case "3":///profesores
                            if($trabaja == 0)
                            {
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_prof');
                        echo "</div>";
                            }
                            else {
                                echo "<div class='flotados'>";
                        echo $this->Element('menu_prof_1');
                        echo "</div>";
                            }
                        break;
                        case "4": ///medicos
                            if($trabaja == 0)
                            {
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_medico');
                        echo "</div>";
                            }
                            else {
                                echo "<div class='flotados'>";
                        echo $this->Element('menu_medico_1');
                        echo "</div>";
                            }
                        break;
                        case "5": ///representantes
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_usuario');
                        echo "</div>";
                        break;
                        case "6": ///Secretarias
                            if($trabaja == 0)
                            {
                        echo "<div class='flotados'>";
                        echo $this->Element('menu_secretaria');
                        echo "</div>";
                            }
                            else {
                                echo "<div class='flotados'>";
                        echo $this->Element('menu_secretaria_1');
                        echo "</div>";
                            }
                        break;
                    }//cierre de switch
                }else
                {
                    echo "<div class='flotados'>";
                        echo $this->Element('menu_login');
                        echo "</div>";
                       }///cierre del else
             ?>
                </div>
		<div id="content">
                <?php echo $this->fetch('content'); ?>
                </div>
        
		<div id="footer">
                   <?php echo " <div align='center'> Algunos Derechos Reservados © Instituto Nacional de Deportes ".Date("Y")." - 
                    Diseñado por: Direcci&oacute;n de Inform&aacute;tica Organizaci&oacute;n y Sistemas
                    </div> " ;?>
		</div>
            </div>
	</center>
	<?php echo $this->element('sql_dump'); ?>
        <?php  echo $this->element('sql_dump'); ?>
</body>
</html>