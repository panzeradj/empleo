<?php
		include('php/functions.php');	

		if(!empty($_POST['busqueda'])){
			$busqueda = $_POST['busqueda'];	
		}else{
			$busqueda = "";
		} 

		if(!empty($_POST['provincia'])){
			$provincias = $_POST['provincia'];
		}else{
			$provincias = null;
		}

		if(!empty($_GET['e'])){
			$email = $_GET['e'];
		}else{
			
		}
			
		
		
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
					if($busqueda == "" && $provincias == null){
						//echo "No hay palabras y no hay provincias";
						todasLasOfertas();			
					}else if($busqueda == "" && $provincias != null){
						//echo "No hay palabras pero SI hay provincias";
						todasLasOfertasDeProvincias($provincias);
					}else if($busqueda != "" && $provincias == null){
						//echo "Hay palabras pero NO hay pronvicia";
						todasLasOfertasConPalabraSinProvincia($busqueda);
					}else if($busqueda != "" && $provincias != null){
						//echo "Hay palabras y SI hay provincia";
						todasLasOfertasConPalabraYProvincia($busqueda,$provincias);
					}else{
						//echo "Para todo lo demas, muestro todo";
						todasLasOfertas();
					}					         				             
				?>
			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>