<?php
		include('php/functions.php');	

		//if(!empty($_POST['busqueda']) && !empty($_POST['provincia'])){
			$busqueda = $_POST['busqueda'];
			
			$provincias = $_POST['provincia'];
		//}
		
?>


<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>Proyecto CyL</title>
		<meta charset="LATIN-1">
		<link rel="stylesheet" href="style/estilo.css">	
	</head>
	<body>
		<header id="jobs">			
			<!-- Menu Superior --> 
			<?php include('parts/header.php'); ?>
		</header>
		
		<!-- Buscador -->
		<?php include('parts/searcher.php'); ?>

		<section id="empleo">
			<div class="centrado">		
				<h1>Ofertas de Empleo</h1>				
				<?php 
				echo $busqueda;

				//if($busqueda!="" || isset($provincias)){
					if($busqueda == "" && count($provincias) == 0){
						//echo "No hay palabras y no hay provincias";
						todasLasOfertas();			
					}else if($busqueda == "" && count($provincias) > 0){
						//echo "No hay palabras pero SI hay provincias";
						todasLasOfertasDeProvincias($provincias);
					}else if($busqueda != "" && count($provincias) == 0){
						//echo "Hay palabras pero NO hay pronvicia";
						todasLasOfertasConPalabraSinProvincia($busqueda);
					}else if($busqueda != "" && count($provincias) > 0){
						//echo "Hay palabras y SI hay provincia";
						todasLasOfertasConPalabraYProvincia($busqueda,$provincias);
					}else{
						//echo "Para todo lo demas, muestro todo1";
						todasLasOfertas();
					}/*
				}else{	
					echo "Para todo lo demas, muestro todo";				
					todasLasOfertas();
				}*/

					





					/*$datos=leerArchivo();
					$provi="";
				    foreach($datos as $valor)
				    {

				    	echo "<article>";
					    	if($valor[2]!=$provi){				    	
					    		echo "<h1>".$valor[2]."</h1>";
					    	}
				           	echo "<h2>".$valor[0]." <span class=provincia> - ".$valor[2]."</span></h2>";				           	
				           	echo "<p>".$valor[4]."</p>";
				           	echo "<a href=".$valor[10]." class=enlaceOficina >Enlace oficina de empleo</a>";                   				
				       	echo "</article>";
				       	$provi=$valor[2];
				    }                 */           				             
				?>
			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>