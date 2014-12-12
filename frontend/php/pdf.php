<?php
	require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
	include('functions.php');	

	if(!empty($_GET['id'])){
		$id = $_GET['id'];	
	}else{
		$id=0;
	} 	
		

$datos=leerArchivo();
foreach ($datos as $key => $valor) {
	if($valor[9]==$id){					
		$titulo=utf8_encode($valor[0]);
			$ano=substr($valor[3],0,4);
			$mes=substr($valor[3],4,2);
			$dia=substr($valor[3],6);					           	
		$descripcion=$valor[4];
		//$fuente=$valor[6];
		$localidad=utf8_encode($valor[7]);
		//$enlace="<a href='../single.php?id=".$valor[9]."'>Enlace a pag web</a>";//modificarlo
		$enlace="<a href='".$valor[11]."' target='_blank' > Enlace a oficina de empleo </a>";
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


// almacenamos el contenido HTML
$sHTML = <<<PHP
<h1></h1>
<img src="logo.jpg" width="200px">
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

$descripcion<br><br><br>
$enlace



</p>


PHP;

//Creamos la instancia
$PDF = new HTML2PDF('P','A4','fr');
// autorizamos la impresion del HTML
$PDF ->WriteHTML($sHTML);

// devolvemos el PDF
$PDF ->Output('html.pdf');
?>
