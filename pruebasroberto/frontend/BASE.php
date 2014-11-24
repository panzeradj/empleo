
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
		
		<section id="buscador">
			<article class="centrado">
				<form>
					<input type="text" id="cuadroCiudad" placeholder="Cocinero, Soria">
					<input type="submit" value="buscar">
				</form>
			</article>
		</section>
		<section id="empleo">
			<div class="centrado">
				<h1>Ofertas de Empleo</h1>				
				<article>
					<h2>Titulo empleo</h2>
					<p>
					Descripcion, Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion, Descripcion
					</p>
					<a href="#">Enlace a la oficina de empleo</a>
					<p class="fecha">November 11, 2014</p>
				</article>	
			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>