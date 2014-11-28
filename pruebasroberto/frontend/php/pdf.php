<?php

// incluimos la libreria

require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');

include("functions.php");
/*
$id=1284384664482;
$datos=leerArchivo();
foreach ($datos as $key => $valor) {
	if($valor[9]==$id){					
		$titulo=$valor[0];
			$ano=substr($valor[3],0,4);
			$mes=substr($valor[3],4,2);

			$dia=substr($valor[3],6);
					           	
		$descripcion=$valor[4];
		$fuente=$valor[6];
		$localidad=$valor[7];
		$enlace=$valor[11];
									
	}else{
			
	}								
}	*/
// almacenamos el contenido HTML
$sHTML = <<<PHP
<h1></h1>
<p>
<img src='logotipo.jpg'/>
<p>
çasd
</p>
</p>
PHP;

//Creamos la instancia
$PDF = new HTML2PDF('P','A4','fr');
// autorizamos la impresion del HTML
$PDF ->WriteHTML($sHTML);

// devolvemos el PDF
$PDF ->Output('html.pdf');
?>
