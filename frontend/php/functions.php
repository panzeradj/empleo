<?php
	// MAILER 
	require_once('PHPMailer-master/class.phpmailer.php');


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                           FUNCIONES BBDD                                   ////////
/////////////////////////////////////////////////////////////////////////////////////////////
	
	function conexion(){
		$conexion = new mysqli("mysql128int.srv-hostalia.com", "u2823322_empleo", "@cFdI2}5cV", "db2823322_empleo");
		if (mysqli_connect_errno()) 
		{
	    	die("Error grave: " . mysqli_connect_error());
		}
		return $conexion;
	}

	
	function abrirBBDD(){
		$conexion = new mysqli("mysql128int.srv-hostalia.com", "u2823322_empleo", "@cFdI2}5cV", "db2823322_empleo");
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
		$f = fopen($fichero, "r") or exit("Error");

		$cuando=fgets($f);	
		$titulos=fgets($f);
		$contador=0;
		$tofind = utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ");
		$replac = "AAAAAAaaaaaaOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";

		while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
			$datos[$contador][0]=$registro[0];
			$datos[$contador][1]="";//$registro[1];			
			$datos[$contador][2]=strtr($registro[2],$tofind,$replac);
			$datos[$contador][3]=$registro[3];
			$datos[$contador][4]=$registro[4];
			$datos[$contador][5]=$registro[5];
			$datos[$contador][6]="";//$registro[6];
			$datos[$contador][7]=$registro[7];
			$datos[$contador][8]=$registro[8];
			$datos[$contador][9]=$registro[9];
			$datos[$contador][10]="";//$registro[10];
			$datos[$contador][11]=$registro[11];
		  $contador++;				
		}		
		fclose($f);
		foreach ($datos as $key => $fila) $provincias[$key]  = $fila[2];
		//ordenamos ascendente por la columna elegida
		array_multisort($provincias, SORT_ASC, $datos);
		$cont=0;
		// AQUI ME DICE EL PUTO EL UNDEFINED OFFSET 
		while($cont<$contador)
		{
			if($datos[$cont][2]=='Avila')
			{
				$datos[$cont][2]="&Aacutevila";
			}
			if($datos[$cont][2]=='Leon')
			{
				$datos[$cont][2]="Le&oacuten";
			}
			if($datos[$cont][7]=="")
			{
				$datos[$cont][7]=	$datos[$cont][2];
			}
			$cont++;
		}
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
		$provi = "";
		foreach ($ofertas as $key => $valor) {			
			echo "<article>";	
			if($valor[2]!=$provi)
	    	{	    	
	    		echo "<h1 class=separador>".$valor[2]."</h1>";
	    	}					
			echo "<h2><a href='single.php?id=".$valor[9]."' >".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
			echo "<p>".$valor[4]."</p>";
			echo "<a href=".$valor[11]." class=enlaceOficina target='_blank'> Enlace oficina de empleo</a>";                   				
			echo "</article>";
				$provi=$valor[2];			
		}	
	}


	function todasLasOfertasDeProvincias($provincias){
		$datos = leerArchivo();
		$provi = "";
		foreach ($provincias as $clave => $provincia) {			
			foreach ($datos as $key => $valor) {
				if($valor[2]==$provincia){
					echo "<article>";	
					
					if($valor[2]!=$provi)
			    	{
			       		echo "<h1 class=separador>".$valor[2]."</h1>";;
			    	}					
					echo "<h2><a href='single.php?id=".$valor[9]."'>".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
					echo "<p>".$valor[4]."</p>";
					echo "<a href=".$valor[11]." class=enlaceOficina target='_blank'> Enlace oficina de empleo</a>";                   				
					echo "</article>";	
						$provi=$valor[2];
				}					
			}
		}
	}

	function todasLasOfertasConPalabraSinProvincia($palabras){
		$datos = leerArchivo();	
		$provi = "";			
		foreach ($datos as $key => $valor) {
			if(like($valor[0],$palabras)){
				echo "<article>";	
				if($valor[2]!=$provi)
			    {
			    	echo "<h1 class=separador>".$valor[2]."</h1>";
			    }						
				echo "<h2><a href='single.php?id=".$valor[9]."'  >".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
				echo "<p>".$valor[4]."</p>";
				echo "<a href=".$valor[11]." class=enlaceOficina target='_blank'> Enlace oficina de empleo</a>";                   				
				echo "</article>";
				$provi=$valor[2];	
			}					
		}		
	}

	function todasLasOfertasConPalabraYProvincia($palabras,$provincias){
		$datos = leerArchivo();	
		$provi = "";
		foreach ($provincias as $clave => $provincia) {		
			foreach ($datos as $key => $valor) {
				if($valor[2]==$provincia){
					if(like($valor[0],$palabras)){
					echo "<article>";
					if($valor[2]!=$provi)
			    	{
			    		echo "<h1 class=separador>".$valor[2]."</h1>";
			    	}							
					echo "<h2><a href='single.php?id=".$valor[9]."' target='_blank'>".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
					echo "<p>".$valor[4]."</p>";
					echo "<a href=".$valor[11]." class=enlaceOficina target='_blank'> Enlace oficina de empleo</a>";                   				
					echo "</article>";	
					$provi=$valor[2];
					}	
				}								
			}
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                          FUNCIONES SINGLE.PHP                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function verOfertaUnica($id){
		$datos = leerArchivo();				
		foreach ($datos as $key => $valor) {
			if($valor[9]==$id){					
				echo "<article>";												
				echo "<h2>$valor[0]</h2>";
				$ano=substr($valor[3], 0 ,4);
				$mes=substr($valor[3], 4 ,2);
				$dia=substr($valor[3], 6);

				echo "<p> Fecha de la oferta: ".$ano."/".$mes."/".$dia."</p>";        	
				echo "<p>".$valor[4]."</p>";
				echo "<p>".$valor[5]."</p>";
				echo "<p>".$valor[8]."</p>";
				//echo "<p>".$valor[9]."</p>";
				echo "<a href=".$valor[11]." class=enlaceOficina target='_blank' > Enlace oficina de empleo</a>";  
				echo "<a href='php/pdf.php?id=".$valor[9]."' class='boton pdf' target='_blank'>Ver en PDF</a>";                   				
				echo "</article>";		
				echo '<a href="https://twitter.com/share" class="twitter-share-button" data-text="'.$valor[0].' :" data-via="empleojcyl" data-lang="es" data-size="large">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script","twitter-wjs");</script>';

			}								
		}		
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                    FUNCIONES PARA SUBSCRIBE & ENLIST                       ////////
/////////////////////////////////////////////////////////////////////////////////////////////


	function enlist($nombre,$email,$palabras,$provincias){
		$conexion = conexion();
		$sql = "INSERT INTO enlist(estado,frecuencia,nombre,email,palabras,provincias) VALUES(1,0,'".$nombre."','".$email."','".$palabras."','".$provincias."')";
		if($conexion->query($sql)){
			$conexion->close();
			return true;
		}else{
			$conexion->close();
			return false;
		}		
	}

	function generarEmail(){
		$conexion = conexion();
		$sql = "SELECT * FROM enlist WHERE estado = 1";
		if($resultado = $conexion->query($sql)){
			while($row = $resultado->fetch_array()){				
				$cadena="http://empleojcyl.es/oferts?e=".$row[4]."<br><br><br><br><br><br>Puede darse de baja <a href=http://127.0.0.1/empleo/frontend/fiqnpv/unsubscribe?=".$row[4].">aqui</a>";
				enviarEmail($row[4],$cadena);				
			}
		}else{
			echo "error al sacar select";
		}
	}

	/**
	 * [enviarEmail description]
	 * Funcion encargada de enviar el email al cliente con las alertas de empleo
	 * @param  [type] $email  [description]	
	 * @param  [type] $cadena [description]
	 * @return [type]         [description]
	 */
	function enviarEmail($email,$cadena){    
	    $mail = new phpmailer();
		$mail->IsSMTP();    
		$mail->Mailer = "smtp";    
		$mail->Host = "smtp.googlemail.com";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;
		$mail->Username = "empleodatosabiertos@gmail.com"; 
		$mail->Password = "chemaesunchulazo"; // Contraseña
		$mail->From = "bytelchuscom@gmail.com";
		$mail->FromName = "EmpleoJCYL.es";
		$mail->Timeout=30;
		$mail->AddAddress($email); // email destinatario
		$mail->Subject = "Ofertas EmpleoJCYL";
		$mail->Body = $cadena; // contenido del email
		$mail->AltBody =  $cadena; // contenido del email alternativo
		$exito = $mail->Send();
		$intentos=1; 
		while ((!$exito) && ($intentos < 5)) {
			sleep(5);
			$exito = $mail->Send();
			$intentos=$intentos+1;  
		}    

		if(!$exito){
			echo "Problemas enviando correo electrónico a ";
			echo "<br/>".$mail->ErrorInfo;  
		}else{
			echo "Mensaje enviado correctamente";
		} 
	  }//Fin funcion mandarEmail


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                             BAJA DE EMAILS                                 ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function endlist($email){
	  	$conexion = $conexion();
	  	$sql = "UPDATE enlist SET estado = 0 WHERE email = ".$email.";";
	  	if($conexion->query($sql)){
	  		$conexion->close();
	  		return true;
	  	}else{
	  		$conexion->close();
	  		return false;
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