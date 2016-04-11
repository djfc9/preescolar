<?php 
$se= $this->Session->read('Auth.User');
                $sesion_abierta = $se['id'];
                $cedula = base64_encode($cedula);
if(!empty($res)){

    echo "<script>"
                    . "var confirmar = confim('Esta persona existe, desea autorizarla a retirar a su(s) hij@ (s)?');"
                    ."if(confirmar == true){"
                    . "document.location=('/preescolar/personas/edit_autorizados_existente/$cedula'); }else{"
            . "document.location=('/preescolar/personas/add1/$cedula'); }"
                    . "</script>";
}
else
{
    echo "<script>"
            . "document.location=('/preescolar/personas/add1/$sesion_abierta'); "
                    . "</script>";
}
?>
 