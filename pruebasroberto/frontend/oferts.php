
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
				<?php            
				     // Aqui se encuentra el fichero
				    $fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/empleo/ofertas-empleo/1284354353012.csv";
				    $f = fopen($fichero, "r") or exit("No puedorrrr abrir el fichero");             
				    $titulos=fgets($f);
				    $titulos=fgets($f);
				    $campos=explode(";",$titulos);
				    
				    $numcampos=0;
				    foreach($campos as $indice=>$valor){                    
				        $numcampos++;
				    }               
				    $direcciones = "";				    
				    while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
				        if( $registro[7]!=""){                    
				         	echo "<article>";
				           	echo "<h2>".$registro[0]." <span class=provincia> - ".$registro[2]."</span></h2>";				           	
				           	echo "<p>".$registro[4]."</p>";
				           	echo "<a href=".$registro[11]." class=enlaceOficina >Enlace oficina de empleo</a>";                   				
				       		echo "</article>";
				        }               
				    }               
				    fclose($f);
				?>

			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>