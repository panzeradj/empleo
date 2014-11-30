<?php
	include('php/functions.php');
	 

	if(!empty($_POST['email'])){
		$email = $_POST['email'];	

		if(!empty($_POST['nombre'])){
			$nombre = $_POST['nombre'];	
		}else{
			$nombre = "Usuario/a";
			echo "Desde ahora te llamas ".$nombre;
		}

		if(!empty($_POST['palabras_clave'])){
			$palabras = $_POST['palabras_clave'];
		}else{
			$palabras = "all";
			echo "No hay PALABRAS";
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
			echo "No hay provincia";
		}

		//echo "<h1>Nomnbre:".$nombre."<br>Email: ".$email."<br>Palabras: ".$palabras."<br>Provincias: ".$listaProvincia."</h1>";
		$resultado = enlist($nombre,$email,$palabras,$listaProvincia);

	}else{
		// Si no hay email, Burundanga y a casa!	
		echo "Que no hay email? Burundanga y a casa";		
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
			Menu Superior 
			<?php include('parts/header.php'); ?>
		</header>
		
		Buscador
		<?php include('parts/searcher.php'); ?>

		<section id="empleo">
			<div class="centrado">		
				<h1>Alta en Alertas por Email</h1>				
				<?php
					if($resultado){
						echo "<center><img src=images/bien.png></center>";
					}else{
						echo "<center><img src=images/error.png></center>";
					}
				?>
			</div>	
			<div class="limpio"></div>
		</section>
		<!-- FOOTER -->
		<?php include('parts/footer.php'); ?>
	</body>
</html> 