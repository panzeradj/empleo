
<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>Proyecto CyL</title>
		<meta charset="LATIN-1">
		<link rel="stylesheet" href="style/estilo.css">
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>	
	</head>
	<body>
		<header>				
			<!-- Menu Superior --> 
			<?php include('parts/header.php'); ?>

			<div id="map_canvas"></div>
		
	
			
			<div class="limpio"></div>

		</header>
		
		<section id="buscador">
			<article class="centrado">
				<form action="oferts.php" method="POST">
					<input type="text" id="busqueda" name="busqueda" placeholder="Cocinero">
					<input type="submit" value="buscar">
					<div id="buscador_provincias">
						<input type="checkbox" name="provincia[1]" value="Avila" >&Aacute;vila </input>
                   		<input type="checkbox" name="provincia[2]" value="Burgos" >Burgos</input>
                    	<input type="checkbox" name="provincia[3]" value="Leon">Le&oacute;n</input>
                    	<input type="checkbox" name="provincia[4]" value="Palencia">Palencia </input>
                    	<input type="checkbox" name="provincia[5]" value="Salamanca ">Salamanca </input>
                    	<input type="checkbox" name="provincia[6]" value="Segovia">Segovia </input>
                    	<input type="checkbox" name="provincia[7]" value="Soria">Soria</input>
                    	<input type="checkbox" name="provincia[8]" value="Valladolid">Valladolid </input>
                    	<input type="checkbox" name="provincia[9]" value="Zamora">Zamora</input>
					</div>
					
				</form>
			</article>
		</section>
		<section id="welcome">
			<div class="centrado">
				<article>
					<h2>Castilla y Leon</h2>
					<h3>es empleo , eres t&uacute; , es</h3>									
					<h1>FUTURO</h1>
					<a href="#" class="boton letraGrande"> Inscribete ahora </a>
				</article>
			</div>			
		</section>

		<section id="social">
			<div class="centrado">
				
			</div>
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