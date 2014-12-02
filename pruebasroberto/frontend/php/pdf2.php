<?php
		include('php/functions.php');	

		/*if(!empty($_GET['id'])){
			$id = $_GET['id'];	
		}else{
			$id=0;
		} */
		$id= array(1284385747621 , 1414717449344);
	
	require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

	include("functions.php");
	$PDF = new HTML2PDF('P','A4','fr');

	$PDF ->WriteHTML($sHTML);

	$sHTML = <<<PHP
		<h1></h1>
		<img src="logo.png" style:"height: 100px;">
PHP;

	$PDF ->WriteHTML($sHTML);
	$datos=leerArchivo();
	////////////////////////////////////////
foreach ($id as $key => $value) {
	foreach ($datos as $key => $valor) {
			if($valor[9]==$value){					
				$titulo=$valor[0];
					$ano=substr($valor[3],0,4);
					$mes=substr($valor[3],4,2);
					$dia=substr($valor[3],6);					           	
				$descripcion=$valor[4];
				$fuente=$valor[6];
				$localidad=utf8_encode($valor[7]);
				$enlace=$valor[11];
				$provincia=$valor[2];									
			}								
	}
		if($provincia=="&Aacutevila")
		{
			$provincia= "&Aacute;vila";
		}
		if($provincia=="Le&oacuten")
		{
			$provincia="Le&oacute;n";
		}
	$sHTML = <<<PHP
		<h1></h1>
		
		<p >
		<table >
			<tr>
				<td>
					Titulo:
				</td>
				<td>
					$titulo
				</td>
			</tr>
			<tr>
				<td>
					Provincia:
				</td>
				<td>
					$provincia
				</td>
			</tr>
			<tr>
				<td>
					Localidad:
				</td>
				<td>
					$localidad
				</td>
			</tr>
			<tr>
				<td>
					Fecha de la oferta:
				</td>
				<td>
					$dia/$mes/$ano
				</td>
			</tr>
		</table>
		<a href="$enlace" target='_blank'> $enlace</a>
		</p>
PHP;

	$PDF ->WriteHTML($sHTML);
	}

	
	

$PDF ->Output('html.pdf');
?>
