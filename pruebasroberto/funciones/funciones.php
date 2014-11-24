<?php
	///////////////Funcion para obtener todos los datos de la bbdd, devuelve un array con todos los datos
	function leerArchivo ()
	{
		//echo "melo";
		//funcion para obtener todos los datos de la bbdd en un array
		 
		// Aqui se encuentra el fichero
			$fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/empleo/ofertas-empleo/1284354353012.csv";

		// Abrimos el fichero para leer 
			$f = fopen($fichero, "r") or exit("No puedorrrr abrir el fichero");

		// La primera linea tiene la fecha de actualización
			$cuando=fgets($f);		
		
			

		// La segunda linea contiene los titulos de las columnas (nombres de los campos)
			$titulos=fgets($f);
		// Como es csv, los campos están separados por ; Los corto (split) con explode()
		
			$contador=0;
		// El fichero es csv. El separador de campos es ';'
		// Mientras hay líneas que leer...
			while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
				

					$datos[$contador][0]=$registro[0];
					$datos[$contador][1]=$registro[1];
					$tofind = utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ");
					$replac = "AAAAAAaaaaaaOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
					$datos[$contador][2]=strtr($registro[2],$tofind,$replac);
					$datos[$contador][3]=$registro[3];
					$datos[$contador][4]=$registro[4];
					$datos[$contador][5]=$registro[5];
					$datos[$contador][6]=$registro[6];
					$datos[$contador][7]=$registro[7];
					$datos[$contador][8]=$registro[8];
					$datos[$contador][9]=$registro[9];
					$datos[$contador][10]=$registro[10];
					$datos[$contador][11]=$registro[11];
	              $contador++;				
			}

		// Cerrando el fichero
			fclose($f);
			foreach ($datos as $key => $fila) {			
            	$provincias[$key]  = $fila[2]; // columna de provincias
      	  	}
 
		//ordenamos ascendente por la columna elegida
		array_multisort($provincias, SORT_ASC, $datos);
		return $datos;

	}

	
	$datos=leerArchivo();
	//echo $datos[200][0]; 

	echo "<table border=1>";

	for($i=0;$i<250;$i++)
	{
		echo "<tr>";
		for($a=0;$a<12;$a++)
		{
			echo "<td>";
			echo $datos[$i][$a].";";
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	function abrirBBDD() // conecta con la bbdd
	{
		$conexion = new mysqli("127.0.0.1", "root", "root", "emlpleo");
		if (mysqli_connect_errno()) 
		{
	    	die("Error grave: " . mysqli_connect_error());
		}
		return $conexion;
	}
	function  cerrarBBDD($conexion)//cierra la conexion con la bbdd
	{
		$conexion->close($conexion);
	}
	//$datos=leerArchivo();
	/*echo "<table border=1>";

	for($i=0;$i<250;$i++)
	{
		echo "<tr>";
		for($a=0;$a<12;$a++)
		{
			echo "<td>";
			echo $datos[$i][$a].";";
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";*/
	function sacarCoordenadas($datos)//introduciendo el array con todos los datos devolvemos el titulo del empleo y las coordenadas de su municipio
	{
		
		$conexion = abrirBBDD();
		foreach($datos as $indice=>$valor){   
			if($datos[$indice][7]!='')
			{
			 	 $ordensql="select longitud, latitud FROM municipios  where municipio='".$datos[$indice][7]."'";
	          	
	           if($chorizo=$conexion->query($ordensql))
	            {                         
	                while ($registro = $chorizo->fetch_array()) {
	                	
	                    $cordenadas=$registro[0]."#".$registro[1]; 
	                }
	            }  
	            $direcciones=$direcciones.$datos[$indice][0]."?".$cordenadas.";";
	        }   
		 }
         
        cerrarBBDD($conexion);
        return $direcciones;
	}
	//$string=sacarCoordenadas($datos);
	//echo $string;
	

	

?>
