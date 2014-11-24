<?php
	function leerArchivo ()	{

		$fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/empleo/ofertas-empleo/1284354353012.csv";
		$f = fopen($fichero, "r") or exit("No puedorrrr abrir el fichero");
		$cuando=fgets($f);	
		$titulos=fgets($f);			
		$contador=0;

		while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 

				$tofind = utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ");
				$replac = "AAAAAAaaaaaaOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
				$datos[$contador][0]=$registro[0];
				$datos[$contador][1]=$registro[1];						
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
		fclose($f);

		foreach ($datos as $key => $fila) {			
        	$provincias[$key]  = $fila[2]; 
  	  	}	 
		//ordenamos ascendente por la columna elegida
		array_multisort($provincias, SORT_ASC, $datos);
		return $datos;

	}


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

?>