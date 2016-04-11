<?php   ///fpdf////
  //echo debug($data);
   foreach ($data as $data):
       //Datos del Alumno:
    $Alu_ci = $data['Alumno']['cedula_escolar'];
    $Alu_nombre = $data['Alumno']['nombre'];
    $Alu_apellido = $data['Alumno']['apellido'];
    $Alu_peso = $data['Alumno']['peso'];
    $Alu_talla = $data['Alumno']['talla'];
    $Alu_sexo = $data['Sexo']['descripcion'];
    $Alu_fnacimiento = $data['Alumno']['fecha_nacimiento'];
    $Alu_lnacimiento = $data['Alumno']['lugar_nacimiento'];
    $Alu_fingreso = $data['Alumno']['fecha_ingreso'];
    $Alu_direccion = $data['Alumno']['direccion'];
    $Alu_tlfhab = $data['Alumno']['telefono_habitacion'];
    $Alu_foto = $data['Alumno']['foto'];
    $Alu_id = $data['Alumno']['id'];
    $Alu_edo = $data['Estado']['descripcion'];
    $Alu_municipio = $data['Municipio']['nombre'];
    $Alu_parroquia = $data['Parroquia']['nombre'];
    
    ////Datos Del Representante:////
   /*
    for($i=0; $i<= 4; $i++)
    {*/
 //debug($data['Persona']);
    foreach($data['Persona'] as $persona):
    
    $per_id   = $persona['id'];
   //echo $per_nombre   = $persona['nombre'];
    $per_nombre   = $persona['nombre'];
    $per_apellido   = $persona['apellido'];
    $per_cedula   = $persona['cedula'];
    $per_direccion   = $persona['direccion'];
    $per_tlf_local   = $persona['telefono_local'];
    $per_tfl_movil   = $persona['telefono_movil'];
    $per_tlf_trabajo   = $persona['telefono_trabajo'];
    $per_parentesco   = $persona['tipo_persona_id'];
    $per_foto   = $persona['foto'];
   // echo "<br>";
    //}
    endforeach;
    endforeach;


    
 class pdf extends FPDF
 {
    
    
    ///////////////////////generando el pdf
    
                    //funcion de pie de pagina
                       function Footer()
			{
			$this->SetY(-25);
			$this->SetFont('Arial','I',8);
			$this->Ln(10);
			$this->SetFont('Arial','B',8);
			$this->Cell(65,3,'Pagina '.$this->PageNo().'/{nb}',0,0,'L');
			$this->Cell(120,3,date("d/m/Y H:i:s"),0,0,'R');					
			$this->Ln();
			$this->SetFillColor(0);
			}
                        
                        
 }                   
                  
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    $pdf->Ln(20);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255);
        $pdf->Image("./img/logos/bolivar_nino.png",16,11,24);
        $pdf->Image("./img/logos/republica.png",135,11,70);
        //$pdf->Image("/img/persona/foto/". $per_foto,156,30,29);
	$pdf->Ln(15);
        $pdf->Cell(50,	6,"FECHA: ".date("d")."/".date("m")."/".date("Y") ,'0',0,'L',1);
        $pdf->Ln();
        //$fpdf->Cell(50,	6,utf8_decode("AÑO ESCOLAR: ").$ano_escolar,'0',0,'L',1);
        $pdf->Ln();
        $pdf->SetFont('Arial','B',16);
        
    $pdf->Cell(40,10, $Alu_ci);
    $pdf->Cell(40,10, $per_nombre);
    $pdf->Footer();
    $pdf->Output();
    
    
 
 ?>
