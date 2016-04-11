<?php
header('Content-type: text/html; charset= utf-8');
        foreach ($alumnos as $lista):
               //echo debug($lista);
            $mes = date('m');
        if ($mes >= 7) {
            //Año escolar
            $ano1 = date("Y");
            $ano2 = date("Y") + 1;
            $ano_escolar = $ano1 . "-" . $ano2;
        } else {
            //Año escolar
            $ano1 = date("Y") - 1;
            $ano2 = date("Y");
            $ano_escolar = $ano1 . "-" . $ano2;
        }
               $nombre = $lista['Alumno']['nombre'];
               $cedula_escolar = $lista['Alumno']['cedula_escolar'];
               $apellido = $lista['Alumno']['apellido'];
               foreach ($lista['GradosSeccione'] as $fechas):
                   $fecha_actual = $fechas['ano_escolar'];
                   if($ano_escolar == $fecha_actual){
                       $grupo = $fechas['descripcion'];
                   }
               endforeach;
               //$grupo = $lista['GradosSeccione']['0']['descripcion'];
               $fecha_nac = $lista['Alumno']['fecha_nacimiento'];
               
                $valor = explode('-', $fecha_nac);
                $valor_año = $valor[0];
                $valor_mes = $valor[1];
                $valor_dia = $valor[2];
                $fecha_nacim = $valor_dia.'-'.$valor_mes.'-'.$valor_año;
               
               foreach ($lista['Persona'] as $representantes):
                   $rep = $representantes['representante'];
                   $autorizado = $representantes['autorizado'];
                   
                   if($rep == 'Si' && $autorizado =='Si'){
                       $representante = $representantes['nombre']." ".$representantes['apellido'];
                   }
                   
               endforeach;
               
        endforeach; 
        foreach ($gradosSeccion['0']['Persona'] as $maestras):
            $docente = $maestras['docente'];
            if($docente == TRUE){
                $maestra_titular = $maestras['nombre']." ".$maestras['apellido'];
            }else{
                 $maestra_auxiliar = $maestras['nombre']." ".$maestras['apellido'];
            }
        endforeach;
        
        foreach ($lista['Boleta'] as $boletas):
            //echo debug($boletas);
            if($boletas['lapsos'] == 'Primer'){
            $primer_calificacion = $boletas['calificacion'];
            $primer_inasistencia = $boletas['inasistencias'];
            $primer_habiles = $boletas['dias_habiles'];
            $primer_entrega = $boletas['fecha_entrega'];
                $valor = explode('-', $primer_entrega);
                $valor_año = $valor[0];
                $valor_mes = $valor[1];
                $valor_dia = $valor[2];
                $primer_entrega = $valor_dia.'-'.$valor_mes.'-'.$valor_año;
            }
            elseif($boletas['lapsos'] == 'Segundo'){
            $segundo_calificacion = $boletas['calificacion']; 
            $segundo_inasistencia = $boletas['inasistencias'];
            $segundo_habiles = $boletas['dias_habiles'];
            $segundo_entrega = $boletas['fecha_entrega'];
            $seg_relacion_ambiente = $boletas['componentes_ambiente'];
            $valor = explode('-', $segundo_entrega);
                $valor_año = $valor[0];
                $valor_mes = $valor[1];
                $valor_dia = $valor[2];
                $segundo_entrega = $valor_dia.'-'.$valor_mes.'-'.$valor_año;
            }
            elseif($boletas['lapsos'] == 'Tercero'){
            $tercer_calificacion = $boletas['calificacion']; 
            $tercer_inasistencia = $boletas['inasistencias'];
            $tercer_habiles = $boletas['dias_habiles'];
            $tercer_entrega = $boletas['fecha_entrega'];
            $ter_relacion_ambiente = $boletas['componentes_ambiente'];
            $valor = explode('-', $tercer_entrega);
                $valor_año = $valor[0];
                $valor_mes = $valor[1];
                $valor_dia = $valor[2];
                $tercer_entrega = $valor_dia.'-'.$valor_mes.'-'.$valor_año;
            }
        endforeach;
        
        
        
        ///funcion para calcular la edad del niño en septiembre...
$hoy1 = getdate();
$dias_del_mes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
 $valores1 = explode('-', $fecha_nac);
$año1 = $valores1[0];
$mes1 = $valores1[1];
$dia1 = $valores1[2];

$años1 = $hoy1['year'] - $año1;
$meses1 = 9 - $mes1;
if($meses1 < 0)
{
$meses1 += 12;
$años1--;
}
        
        
 
      $dia = date('d');
      $mes = date('m');
      $año = date('Y');
      
      switch ($mes)
      {
      case 1:
          $mes = 'Enero';
          break;
      case 2:
          $mes = 'Febrero';
          break;
      case 3:
          $mes = 'Marzo';
          break;
      case 4:
          $mes = 'Abril';
          break;
      case 5:
          $mes = 'Mayo';
          break;
      case 6:
          $mes = 'Junio';
          break;
      case 7:
          $mes = 'Julio';
          break;
      case 8:
          $mes = 'Agosto';
          break;
      case 9:
          $mes = 'Septiembre';
          break;
      case 10:
          $mes = 'Octubre';
          break;
      case 11:
          $mes = 'Noviembre';
          break;
      case 12:
          $mes = 'Diciembre';
          break;
      
      }

class PDF extends FPDF
{

    
    
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(123,1,1);
    $this->Cell(0,6,  utf8_decode('Documento no válido sin firma y sello húmedo.'),0,1,'C');

}
}

//Año escolar
$ano1=date("Y");
$ano2=date("Y")+1;
$ano_escolar=$ano1."-".$ano2;


 $dia = date('d');
 $mes = date('m');
 $año = date('Y');
 $escolar_a = $mes ;   
 if ($escolar_a >= 6 ) {
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

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$pdf->Ln(1);
	$pdf->SetFont('Arial','B',14);
        $pdf->Image("./img/logos/bolivar_nino.png",16,11,18);
        $pdf->Image("./img/boletin.png",175,11,25);
	$pdf->Ln(2);
        $pdf->Cell(200,6, utf8_decode('BOLETIN INFORMATIVO') ,0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(200,6, utf8_decode('Año Escolar: '.$ano_escolar) ,0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Ln(10);
        $pdf->Setx(17);
        $pdf->Cell(20,6, utf8_decode('Alumno (a): ') ,'',0,'L');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(30,6, utf8_decode(strtoupper($nombre)) ,'',0,'C');
        $pdf->Cell(30,6, utf8_decode(strtoupper($apellido)) ,'',0,'C');
        $pdf->Cell(3,10, utf8_decode(' ') ,0,0,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(14,6, utf8_decode('Grupo:') ,0,0,'');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(25 ,6, utf8_decode(strtoupper($grupo)) ,'',0,'C');
        $pdf->Cell(3,10, utf8_decode(' ') ,0,0,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(35,6, utf8_decode('Fecha de Nacimiento: ') ,'',0,'');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(24,6, utf8_decode(strtoupper($fecha_nacim)) ,'',1,'R');
        $pdf->SetFont('Arial','',10);
        $pdf->Setx(17);
        $pdf->Cell(81,6, utf8_decode('                                 ') ,0,0,'L');
        /*$pdf->Cell(59,6, utf8_decode('Edad de Ingreso en Septiembre: ') ,0,0,'L');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(22,6, utf8_decode($años1.' años '.$meses1.' meses') ,'',1,'C');*/
        $pdf->SetFont('Arial','',10);
        $pdf->Setx(17);
        $pdf->Cell(15,6, utf8_decode('Docente: ') ,0,0,'');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(43,6, utf8_decode(strtoupper($maestra_titular.'  ')) ,0,0,'');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(14,6, utf8_decode('Auxiliar: ') ,0,0,'');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(43,6, utf8_decode(strtoupper($maestra_auxiliar.'  ')) ,0,0,'');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(25,6, utf8_decode('Representante: ') ,0,0,'');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(44,6, utf8_decode(strtoupper($representante)) ,0,1,'R');
        $pdf->SetFont('Arial','B',8);
        $pdf->Setx(17);
        $pdf->Cell(38,6, utf8_decode('GUIA PARA LOS PADRES:') ,0,0,'');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(147,6, utf8_decode('El Boletín Informativo es un instrumento que permite a los padres y representantes conocer sobre') ,0,1,'J');
        $pdf->Setx(17);
        $pdf->Cell(200,6, utf8_decode('el desarrollo y los aprendizajes adquiridos por sus hijos e hijas en los tres momentos del año escolar.') ,0,1,'J');
        
        $pdf->Ln(5);
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6, utf8_decode('1er LAPSO') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('') ,0,0,'J');
        $pdf->Cell(25,6, utf8_decode('DÍAS HÁBILES:') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(13,4, utf8_decode($primer_habiles) ,'B',0,'C');
        //$pdf->SetFont('Arial','',8);
        $pdf->Cell(41,6, '                          ' ,0,0,'J');
        //$pdf->Cell(28,6, utf8_decode('INASISTENCIAS:') ,0,0,'J');
        //$pdf->SetFont('Arial','B',8);
        //$pdf->Cell(13,4, utf8_decode($primer_inasistencia) ,'B',0,'C');
        //$pdf->SetFont('Arial','',8);
        $pdf->Cell(39,6, utf8_decode('FECHA DE ENTREGA:') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(24,4, utf8_decode($primer_entrega) ,'B',1,'C');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('Período de Adaptación:') ,0,1,'J');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','I',8);
        $pdf->MultiCell(158,6,utf8_decode($primer_calificacion),0,'J');
        $pdf->Image("./img/karuta.png",180,75,18);
        $pdf->SetFont('Arial','B',6);
        $pdf->Ln(1);
        $pdf->Cell(182,2,'Sello',0,1,'R');
        $pdf->Ln(1);
        
        if($boletas['lapsos'] == 'Segundo'){
        /*$pdf->Ln(4);
        $pdf->Setx(17);
        $pdf->Cell(180,6, utf8_decode('___________________________________________________________________________________________________') ,0,1,'J');
        */$pdf->Ln(5);
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6, utf8_decode('2DO LAPSO') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('') ,0,0,'J');
        $pdf->Cell(25,6, utf8_decode('DÍAS HÁBILES:') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(13,4, utf8_decode($segundo_habiles) ,'B',0,'C');
        //$pdf->SetFont('Arial','',8);
        $pdf->Cell(41,6, '                          ' ,0,0,'J');
        //$pdf->Cell(28,6, utf8_decode('INASISTENCIAS:') ,0,0,'J');
        //$pdf->SetFont('Arial','B',8);
        //$pdf->Cell(13,4, utf8_decode($segundo_inasistencia) ,'B',0,'C');
        //$pdf->SetFont('Arial','',8);
        $pdf->Cell(39,6, utf8_decode('FECHA DE ENTREGA:') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(24,4, utf8_decode($segundo_entrega) ,'B',1,'C');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('Formación Personal, Social y Comunicación:') ,0,1,'J');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','I',8);
        $pdf->MultiCell(158,6,utf8_decode($segundo_calificacion),0,'J');
        $pdf->Image("./img/karuta1.png",180,117,18);
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('Relación entre los componentes del ambiente:') ,0,0,'J');
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(155,6,'Sello',0,1,'R');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','',8);
        $pdf->MultiCell(158,6, utf8_decode($seg_relacion_ambiente),0,'J');
        //$pdf->Cell(24,4, utf8_decode($seg_relacion_ambiente) ,'0',1,'J');
        }
        
        if($boletas['lapsos'] == 'Tercero'){
        /*$pdf->Ln(4);
        $pdf->Setx(17);
        $pdf->Cell(180,6, utf8_decode('___________________________________________________________________________________________________') ,0,1,'J');
        */$pdf->Ln(5);
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6, utf8_decode('3er LAPSO') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('') ,0,0,'J');
       // $pdf->SetFont('Arial','',8);
        $pdf->Cell(25,6, utf8_decode('DÍAS HÁBILES:') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(13,4, utf8_decode($tercer_habiles) ,'B',0,'C');
        //$pdf->SetFont('Arial','',8);
        $pdf->Cell(41,6, '                          ' ,0,0,'J');
        //$pdf->Cell(28,6, utf8_decode('INASISTENCIAS:') ,0,0,'J');
        //$pdf->SetFont('Arial','B',8);
        //$pdf->Cell(13,4, utf8_decode($tercer_inasistencia) ,'B',0,'C');
       // $pdf->SetFont('Arial','',8);
        $pdf->Cell(39,6, utf8_decode('FECHA DE ENTREGA:') ,0,0,'J');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(24,4, utf8_decode($tercer_entrega) ,'B',1,'C');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('Formación Personal, Social y Comunicación:') ,0,1,'J');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','I',8);
        $pdf->MultiCell(158,6,utf8_decode($tercer_calificacion),0,'J');
        $pdf->Image("./img/karuta2.png",180,179,18);
        $pdf->Setx(17);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6, utf8_decode('Relación entre los componentes del ambiente:') ,0,0,'J');
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(155,6,'Sello',0,1,'R');
        $pdf->Setx(17);
        $pdf->SetFont('Arial','',8);
        $pdf->MultiCell(158,6, utf8_decode($ter_relacion_ambiente),0,'J');
        //echo  strlen($ter_relacion_ambiente);
        }
        
        $pdf->Ln(5);
        $pdf->Setx(25);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,4, utf8_decode('_________________________') ,0,0,'J');
        $pdf->Cell(40,4, utf8_decode('                             ') ,0,0,'J');
        $pdf->Cell(20,4, utf8_decode('_________________________') ,0,0,'J');
        $pdf->Cell(40,4, utf8_decode('                             ') ,0,0,'J');
        $pdf->Cell(20,4, utf8_decode('_________________________') ,0,1,'J');
        $pdf->Setx(35);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,4, utf8_decode('DIRECTOR (A)') ,0,0,'J');
        $pdf->Cell(43,4, utf8_decode('                             ') ,0,0,'J');
        $pdf->Cell(20,4, utf8_decode('DOCENTE') ,0,0,'J');
        $pdf->Cell(35,4, utf8_decode('                             ') ,0,0,'J');
        $pdf->Cell(20,4, utf8_decode('REPRESENTANTE') ,0,1,'J');
        $pdf->Setx(36);
        $pdf->SetFont('Arial','B',6);
        $director = $directores['Persona']['nombre'].' '.$directores['Persona']['apellido'];
        $pdf->Cell(20,4, ucwords(utf8_decode($director /*'Janet Arvelaiz'*/)) ,0,0,'J');
        $pdf->Cell(40,4, utf8_decode('                             ') ,0,0,'J');
        $pdf->Cell(20,4, ucwords(utf8_decode($maestra_titular.'  ')) ,0,0,'C');
        $pdf->Cell(40,4, utf8_decode('                             ') ,0,0,'J');
        $pdf->Cell(20,4, ucwords(utf8_decode($representante)) ,0,1,'C');
        
        
$pdf->Output();
?>
