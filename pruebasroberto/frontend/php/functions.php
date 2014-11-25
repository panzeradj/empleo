<?php

/////////////////////////////////////////////////////////////////////////////////////////////
/////////                           FUNCIONES BBDD                                   ////////
/////////////////////////////////////////////////////////////////////////////////////////////
	
	function abrirBBDD(){
		$conexion = new mysqli("127.0.0.1", "root", "root", "emlpleo");
		if (mysqli_connect_errno()) 
		{
	    	die("Error grave: " . mysqli_connect_error());
		}
		return $conexion;
	}

	function  cerrarBBDD($conexion){
		$conexion->close($conexion);
	}
	
	
/////////////////////////////////////////////////////////////////////////////////////////////
/////////                          FUNCIONES DE FICHERO                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function leerArchivo()
	{
		$fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/empleo/ofertas-empleo/1284354353012.csv";
		$f = fopen($fichero, "r") or exit("No puedorrrr abrir el fichero");
		$cuando=fgets($f);	
		$titulos=fgets($f);
		$contador=0;
		$tofind = utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ");
		$replac = "AAAAAAaaaaaaOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";

		while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
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
		foreach ($datos as $key => $fila) $provincias[$key]  = $fila[2];
		//ordenamos ascendente por la columna elegida
		array_multisort($provincias, SORT_ASC, $datos);
		return $datos;
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                         FUNCIONES DE BUSQUEDA                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////


	function like($cadena,$busqueda){
		$cadena=utf8_decode($cadena);
		$busqueda=utf8_decode($busqueda);
		$tofind = utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ");
		$replac = "AAAAAAaaaaaaOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
		$cadena = strtr($cadena,$tofind,$replac);
		$busqueda = strtr($busqueda,$tofind,$replac);
		$cadena = strtolower($cadena);
		$busqueda = strtolower($busqueda);
		$cadena = " ".$cadena;
		$prepos = array("a","con","de","desde","durante","en","entre","excepto","hasta","por","para","hasta","segun","sin","el","la");
		foreach ($prepos as $value) {
			$busqueda =  preg_replace ("/\b" . preg_quote($value) . "\b/i", "", $busqueda);
		}		
		$claves = preg_split("/[\s,]+/ ", $busqueda);
		foreach($claves as $valor){	
			if($busqueda!=""){
				if(strpos($cadena,$valor)) return true;				
				else return false;
			}else{
				return false;
			}			
		}			
	}


	function todasLasOfertas(){			
		$ofertas = leerArchivo();
		foreach ($ofertas as $key => $valor) {			
			echo "<article>";	
			if($valor[2]!=$provi)
	    	{
	    	
	    		echo "<h1>$valor[2]</h1>";
	    	}					
				echo "<h2>".$valor[0]." <span class=provincia> - ".$valor[2]."</span></h2>";				           	
				echo "<p>".$valor[4]."</p>";
				echo "<a href=".$valor[10]." class=enlaceOficina> Enlace oficina de empleo</a>";                   				
			echo "</article>";
				$provi=$valor[2];			
		}	
	}

	function todasLasOfertasDeProvincias($provincias){
		$datos = leerArchivo();
		foreach ($provincias as $clave => $provincia) {			
			foreach ($datos as $key => $valor) {
				if($valor[2]==$provincia){
					echo "<article>";	
					
					if($valor[2]!=$provi)
			    	{
			       		echo "<h1>$valor[2]</h1>";
			    	}					
					echo "<h2>".$valor[0]." <span class=provincia> - ".$valor[2]."</span></h2>";				           	
					echo "<p>".$valor[4]."</p>";
					echo "<a href=".$valor[10]." class=enlaceOficina> Enlace oficina de empleo</a>";                   				
					echo "</article>";	
						$provi=$valor[2];
				}					
			}
		}
	}

	function todasLasOfertasConPalabraSinProvincia($palabras){
		$datos = leerArchivo();				
		foreach ($datos as $key => $valor) {
			if(like($valor[0],$palabras)){
				echo "<article>";	
				if($valor[2]!=$provi)
	    	{
	       		echo "<h1>$valor[2]</h1>";
	    	}						
				echo "<h2>".$valor[0]." <span class=provincia> - ".$valor[2]."</span></h2>";				           	
				echo "<p>".$valor[4]."</p>";
				echo "<a href=".$valor[10]." class=enlaceOficina> Enlace oficina de empleo</a>";                   				
				echo "</article>";	
			}					
		}		
	}

	function todasLasOfertasConPalabraYProvincia($palabras,$provincias){
		$datos = leerArchivo();	
		foreach ($provincias as $clave => $provincia) {		
			foreach ($datos as $key => $valor) {
				if($valor[2]==$provincia){
					if(like($valor[0],$palabras)){
					echo "<article>";
					if($valor[2]!=$provi)
			    	{
			    		echo "<h1>$valor[2]</h1>";
			    	}							
					echo "<h2>".$valor[0]." <span class=provincia> - ".$valor[2]."</span></h2>";				           	
					echo "<p>".$valor[4]."</p>";
					echo "<a href=".$valor[10]." class=enlaceOficina> Enlace oficina de empleo</a>";                   				
					echo "</article>";	
					}	
				}								
			}
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                          FUNCIONES PARA MAPÂS                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

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