<!DOCTYPE html>
<html lang="es">
<head>
	
	<title>Empleo</title>
	<link rel="stylesheet" href="estilo.css">
	<?php
		function obtenerDatos(){
			// Aqui se encuentra el fichero
			$fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/directorio/oficinas-ecyl-reducido/1284315242383.csv";
			$f = fopen($fichero, "r") or exit("No puedorrrr abrir el fichero");				
			$titulos=fgets($f);
			$titulos=fgets($f);
			$campos=explode(";",$titulos);
			
			$numcampos=0;
			foreach($campos as $indice=>$valor){					
				$numcampos++;
			}				
			$direcciones = "";
			// El fichero es csv. El separador de campos es ';'
			// Mientras hay líneas que leer...
			while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
				if( $registro[7]!=""){						
					//$direcciones = $direcciones . $registro[4].",".$registro[1].";";
					//$direcciones = $direcciones.$registro[7].";";		
					//echo $registro[0] .$registro[7]."<br>"; 
					$algo = str_replace($registro[7],"#","");
					echo $registro[0] .$algo."<br>"; 
					//["Sagrada Familia", "41.403571", "2.174472", "icon1", "<div>html</div>"],		
				}				
			}				
			fclose($f);
			echo $direcciones;
			//return $direcciones;
		}
		obtenerDatos();	
	?>
</head>
<body>
	<header>
		<h1>Empleo</h1>
	</header>
	<section>
		<article>
			
		</article>
	</section>
	<footer></footer>
</body>
</html>