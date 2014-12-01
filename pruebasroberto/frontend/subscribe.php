
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

		<section>
			<div class="centrado">
				<h1>Inscribete en las ofertas Ahora</h1>
				<h2>Recibe en tu correo las ofertas de empleo que mas te interesen</h2>	
				<h2>Rellena el siguiente formulario con tus interes</h2>				
				<article>

					<form method="POST" action="enlist.php" id="inscripcion">
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
						<input type="submit" name="enviar" value="Inscribirme Ahora!" class="boton">	
					</form>				
					
				</article>	
			</div>	
			<div class="limpio"></div>
		</section>

		<!-- FOOTER -->
		<?php include('parts/footer.php'); ?>	
	</body>
</html>