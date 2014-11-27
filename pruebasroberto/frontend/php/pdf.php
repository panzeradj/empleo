<?php
	include('functions.php');
	require('./fpdf17/fpdf.php');
	$remplazos=array("&aacute;","&Aacute;","&eacute;","&Eacute;","&iacute;","&Iacute;","&oacute;","&Oacute;","&uacute;","&Uacute;");
	$cambio=array("á","Á","é","É","í","Í","ó","Ó","ú","Ú");

	$contador=0;//usado para los acentos
	$datos=leerArchivo();
	$pdf = new FPDF();
	foreach ($datos as $key => $valor) {
			if($valor[9]==1284385182427){	
				foreach($remplazos as $value )
				{
					$valor[0]=str_replace($value, $cambio[$contador],$valor[0]);		
					$valor[2]=str_replace($value, $cambio[$contador],$valor[2]);				
					$valor[7]=str_replace($value, $cambio[$contador],$valor[7]);
					$valor[4]=str_replace($value, $cambio[$contador],$valor[4]);	
					$contador++;					
				}
				$valor[2]=iconv("UTF-8","windows-1252",$valor[2]);
				$valor[4]=iconv("UTF-8","windows-1252",$valor[4]);
				$pdf = new FPDF();
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',16);
				$pdf->Image('./logotipo.jpg',10,10,40,40);
				$pdf->SetXY(25, 50);
					$ano=substr($valor[3],0,4);
				$mes=substr($valor[3],4,2);
				$dia=substr($valor[3],6);
				$fecha="".$dia."/".$mes."/".$ano;

				$texto1=" Titulo: $valor[0] \n Provincia: $valor[2] \n Localidad: $valor[7] \n Fecha publicacion: $fecha";
				$pdf->MultiCell(120,10,$texto1,0,"L");
				$pdf->SetFont('Arial','B',8);
				$pdf->SetXY(25, 100);
				$texto1="$valor[4]";
				$pdf->MultiCell(165,10,$texto1,1,"L");
				$pdf->SetXY(25, 240);
				$texto1="Enlace: $valor[11]";
				$pdf->MultiCell(165,10,$texto1,0,"L");			
			}else{
					
			}								
		}	
	
	

	$pdf->Output();
?>