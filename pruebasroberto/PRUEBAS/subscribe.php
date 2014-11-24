
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
		<section>
			<div class="centrado">
				<h1>Inscribete en las ofertas Ahora</h1>
				<h2>Recibe en tu correo las ofertas de empleo que mas te interesen</h2>	
				<h2>Rellena el siguiente formulario con tus interes</h2>				
				<article>

					<form method="POST" action="altaSuscripcion.php" id="inscripcion">
						<h2>Nombre <span> *No es necesario</span></h2>
						<input type="text" name="nombre" placeholder="Maria Hernandez">
						<h2>Email</h2>
						<input type="text" name="email" placeholder="maria.hernandez@gmail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
						<h2>Palabras Clave <span> *Vacio se enviaran todas</span></h2>
						<input type="text" name="palabras_clave" placeholder="Igenieria , Informatica">
						<h2>Provincias</h2>
						<input type="text" name="provincias">
						<input type="submit" name="enviar" value="Inscribirme Ahora!" class="boton">	
					</form>				
					
				</article>	
			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>