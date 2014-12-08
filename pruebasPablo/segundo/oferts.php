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
		}		
?>

<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>EmpleoJCYL.es</title>
		<link rel="icon" href="images/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">		
		<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script> -->
	</head>
	<body>	
		<main>
			
			<!-- NAV -->
			<?php include('parts/nav.php'); ?>				

			<header id="oferts">
				<h1>Buscador de Empleo <span>Encuentra trabajo por provincias , palabras clave o ambas</span></h1>
			</header>
			


			<section>				
				<!-- BUSCADOR -->
				<?php include('parts/searcher.php'); ?>				
				
				
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

				
			</section>		



			<!-- FOOTER -->
			<?php include('parts/footer.php'); ?>
			
			
		</main>			
	</body>
</html>