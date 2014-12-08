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

			<header id="subscribe">
				<h1>Alertas por Email <span>Guarda tus preferencias y mantente al dia </span></h1>
			</header>
			


			<section>				
				
				<form method="POST" action="enlist.php" id="subscribe">
					<h2>Nombre <span> * No es obligatorio</span></h2>
					<input type="text" name="nombre" placeholder="Maria Hernandez">
					<h2>Email<span> * Obligatorio</span> </h2>
					<input type="text" name="email" placeholder="maria.hernandez@gmail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					<h2>Palabras Clave <span> * Vacio se enviaran todas</span></h2>
					<input type="text" name="palabras_clave" placeholder="Igenieria , Informatica">
					<h2>Seleccione Provincias</h2>						
					<div class="provincia_subs"><input type="checkbox" name="provincia[0]" value="&Aacutevila" >&Aacutevila</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[1]" value="Burgos" >Burgos</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[2]" value="Le&oacuten">Le&oacuten</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[3]" value="Palencia">Palencia</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[4]" value="Salamanca">Salamanca</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[5]" value="Segovia">Segovia</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[6]" value="Soria">Soria</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[7]" value="Valladolid">Valladolid</input></div>
					<div class="provincia_subs"><input type="checkbox" name="provincia[8]" value="Zamora">Zamora</input></div>
					<input type="submit" name="enviar" value="Inscribirme Ahora!" class="boton rosa">	
				</form>
				
			</section>		



			<!-- FOOTER -->
			<?php include('parts/footer.php'); ?>
			
			
		</main>			
	</body>
</html>