<?php
	include('php/functions.php');
	 

	if(!empty($_POST['email'])){
		$email = $_POST['email'];	

		if(!empty($_POST['nombre'])){
			$nombre = $_POST['nombre'];	
		}else{
			$nombre = "Usuario/a";			
		}

		if(!empty($_POST['palabras_clave'])){
			$palabras = $_POST['palabras_clave'];
		}else{
			$palabras = "all";			
		}

		if(!empty($_POST['provincia'])){
			$provincias = $_POST['provincia'];
			$listaProvincia ="";
			foreach ($provincias as $key => $value) {
				echo $value;
				$listaProvincia = $listaProvincia.$value.";";
			}
		}else{
			$listaProvincia = "all";			
		}

		
		$resultado = enlist($nombre,$email,$palabras,$listaProvincia);

	}else{			
		echo "Que no hay email? Burundanga y a casa";		
	} 		
?>


<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>EmpleoJCYL.es</title>
		<link rel="icon" href="images/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">		
	</head>
	<body>	
		<main>
			<!-- NAV -->
			<?php include('parts/nav.php'); ?>				

			<header id="subscribe">
				<h1>Alertas por Email <span>Guarda tus preferencias y mantente al dia </span></h1>
			</header>
			<section>
				<h1>Su alta ha sido realizada con exito
					<span>
						Ahora recivirá recivira las ofertas de empleo personalizadas en su correo
					</span>
				</h1> 				
				<?php
					if($resultado){
						echo "<center class='resultado'><img src=images/bien.png></center>";
					}else{
						echo "<center class='resultado'><img src=images/error.png></center>";
					}
				?>	

				<p>* Por favor revise su carpeta de spam</p>
				
			</section>
			<!-- FOOTER -->
			<?php include('parts/footer.php'); ?>
		</main>			
	</body>
</html>