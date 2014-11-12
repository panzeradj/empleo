<html>
<head>
</head>
<body>
<h1>Leyendo un fichero remoto</h1>
<?php

	// Aqui se encuentra el fichero
	$fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/directorio/bares/1284211832884.csv";

	// Abrimos el fichero para leer 
	$f = fopen($fichero, "r") or exit("No puedorrrr abrir el fichero");
		
	// La primera linea tiene la fecha de actualización
	//$cuando=fgets($f);
	//echo "<h2>".$cuando."</h2>";

	// Imprimiremos los datos en una tabla
	echo "<table border=1>";

	// La segunda linea contiene los titulos de las columnas (nombres de los campos)
	$titulos=fgets($f);

	// Como es csv, los campos están separados por ; Los corto (split) con explode()
	$campos=explode(";",$titulos);
	echo "<tr>";
	$numcampos=0;
	foreach($campos as $indice=>$valor){
		echo "<th>".$valor."</th>";
		$numcampos++;
	}
	echo "</tr>";

	// El fichero es csv. El separador de campos es ';'
	// Mientras hay líneas que leer...
	while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
		if($registro[3]=='Soria' && $registro[2]==42200){
			echo "<tr>";
		foreach($registro as $indice=>$valor){			
			echo "<td>".$valor."</td>";			
		}
		echo "</tr>";
		}
		
	}

	// Cerrando la tabla
	echo "</table>";

	// Cerrando el fichero
	fclose($f);

	?>
</body>
</html>