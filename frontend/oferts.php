
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
				<?php include('php/functions.php'); ?>
				<?php   
					$datos=leerArchivo();
					$provi="";
				    foreach($datos as $valor)
				    {

				    	echo "<article>";
					    	if($valor[2]!=$provi){				    	
					    		echo "<h1>$valor[2]</h1>";
					    	}
				           	echo "<h2>".$valor[0]." <span class=provincia> - ".$valor[2]."</span></h2>";				           	
				           	echo "<p>".$valor[4]."</p>";
				           	echo "<a href=".$valor[10]." class=enlaceOficina >Enlace oficina de empleo</a>";                   				
				       	echo "</article>";
				       	$provi=$valor[2];
				    }                            				             
				?>
			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>