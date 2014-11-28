<?php
		include('php/functions.php');	

		if(!empty($_GET['id'])){
			$id = $_GET['id'];	
		}else{
			$id=0;
		} 
		
		


// incluimos la libreria

require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

include("functions.php");

//$id=1415671920715;//identidad de la oferta avila: 1284384664482leon:1415671920715
$datos=leerArchivo();
foreach ($datos as $key => $valor) {
	if($valor[9]==$id){					
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

// almacenamos el contenido HTML
$sHTML = <<<PHP
<h1></h1>
<img src="logo.png">
<p>
Titulo: $titulo<br>
Provincia: $provincia <br>
Localidad: $localidad <br>
Fecha de la oferta: $dia/$mes/$ano<br>
$descripcion<br><br><br>

<a href="$enlace" target='_blank'> $enlace</a>



</p>


PHP;

//Creamos la instancia
$PDF = new HTML2PDF('P','A4','fr');
// autorizamos la impresion del HTML
$PDF ->WriteHTML($sHTML);

// devolvemos el PDF
$PDF ->Output('html.pdf');
?>
