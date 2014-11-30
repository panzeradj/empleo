<html>
<head>
</head>
<body>
<h1>Leyendo un fichero remoto</h1>
<?php
	$conexion = new mysqli("127.0.0.1", "root", "root", "emlpleo");

		// Aqui se encuentra el fichero
		$fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/directorio/oficinas-ecyl-reducido/1284315242383.csv";

		// Abrimos el fichero para leer 
		$f = fopen($fichero, "r") or exit("No puedorrrr abrir el fichero");
		//INSERT INTO municipios(Municipio,Cod_Municipio,Provincia,Cod_Provincia,Poblacion,Mancomunidades,Entidades_Locales_Menores,Comarca,Longitud,Latitud,CoordenadaX,CoordenadaY) VALUES ();
		// La primera linea tiene la fecha de actualización
		$cuando=fgets($f);
		$titulos=fgets($f);
		//echo "<h2>".$cuando."</h2>";

		// Imprimiremos los datos en una tabla
		//echo "<table border=1>";

		// La segunda linea contiene los titulos de las columnas (nombres de los campos)
		//$titulos=fgets($f);

		// Como es csv, los campos están separados por ; Los corto (split) con explode()
		//$campos=explode(";",$titulos);
		//echo "<tr>";
	
		//echo "</tr>";
		$contador=0;
		// El fichero es csv. El separador de campos es ';'
		// Mientras hay líneas que leer...
		while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
			//echo "<tr>";
			$contador++;
			$registro[7]=str_replace(',','.',$registro[7]);
			//$registro[9]=str_replace(',','.',$registro[9]);
			//echo $registro[9]."<br>";
			$ordensql="insert into oficinas(nombre,calle,cod_postal,localidad,telefono,email,posicion,enlace) values('$registro[0]', '$registro[1]', $registro[2], '$registro[3]','$registro[5]','$registro[6]','$registro[7]','$registro[12]');";
			echo $ordensql."<br>";
			$conexion->query($ordensql);
		}
		echo "<br>".$contador;
		// Cerrando la tabla
		//echo "</table>";

		// Cerrando el fichero
		fclose($f);
	$conexion->close($conexion);

?>
</body>
</html>
