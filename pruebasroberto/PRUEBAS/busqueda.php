<?php
	/**
	 * LIKE para PHP
	 * funcion que busca una palabra dentro de un string
	 * sin importar acentos ni codificacion
	 * @param  [String] $cadena   
	 * @param  [String] $busqueda 
	 * @return [boolean]         
	 */
	function like($cadena,$busqueda){
		/* Normalizar las cadenas */
		$cadena=utf8_decode($cadena);
		$busqueda=utf8_decode($busqueda);

		/* Remplazo Los acentos y caracteres especiales por letras normales */
		$tofind = utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ");
		$replac = "AAAAAAaaaaaaOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
		$cadena = strtr($cadena,$tofind,$replac);
		$busqueda = strtr($busqueda,$tofind,$replac);

		/* Paso todo a letras minusculas */
		$cadena = strtolower($cadena);
		$busqueda = strtolower($busqueda);
		$cadena = " ".$cadena; // Agrego un caracter " " al principio NECESARIO o la primera palabra nunca la encuenetra

		/* Lipio palabras comodin en las palabras de busqueda */
		$prepos = array("a","con","de","desde","durante","en","entre","excepto","hasta","por","para","hasta","segun","sin","el","la");
		foreach ($prepos as $value) {
			$busqueda =  preg_replace ("/\b" . preg_quote($value) . "\b/i", "", $busqueda);
		}

		/* Creo un array con las palabras clave */
		$claves = preg_split("/[\s,]+/ ", $busqueda);				

		foreach($claves as $valor){			
			/* Busco si la palabra $busqueda esta dentro del String $cadena */			
			if(strpos($cadena,$valor)){					
				/* Respuesta pura LIKE */
				//return true;
				/*Si encuentro la palabra la pongo en negrita, con expresion regular para encontrar 
				la palabra completa y no solo unos caracteres */
				$cadena =  preg_replace ("/\b" . preg_quote($valor) . "\b/i", "<b>" . $valor . "</b>", $cadena);
				echo "<h2>".$cadena."</h2>";
			}else{
				//return false;
			}
		}			
	}
	/* USO */	
 	like("pablo texto por pablo a mario ante garcia a texto pablo ante a mario para garcia pablo mario garcia","pablo garcia, a texto");	 
?>


<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Busqueda</title>
<style type="text/css" media="screen">body{color: #000}b{color: red;}</style>
</head><body></body></html>