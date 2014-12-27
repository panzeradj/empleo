<?php
	// MAILER 
	require_once('PHPMailer-master/class.phpmailer.php');


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                           FUNCIONES BBDD                                   ////////
/////////////////////////////////////////////////////////////////////////////////////////////
	
	function conexion(){
		$conexion = new mysqli("127.0.0.1", "root", "", "empleo");
		if (mysqli_connect_errno()) 
		{
	    	die("Error grave: " . mysqli_connect_error());
		}
		return $conexion;
	}

	
	function abrirBBDD(){
		$conexion = new mysqli("127.0.0.1", "root", "", "empleo");
		if (mysqli_connect_errno()) 
		{
	    	die("Error grave: " . mysqli_connect_error());
		}
		return $conexion;
	}

	function  cerrarBBDD($conexion){
		$conexion->close();
	}
	
	
/////////////////////////////////////////////////////////////////////////////////////////////
/////////                          FUNCIONES DE FICHERO                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function leerArchivo()
	{
		$fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/empleo/ofertas-empleo/1284354353012.csv";		

		ini_set('track_errors', 1);
		$fh = fopen($fichero, 'r');
		if ( !$fh ) {
			echo 'fopen failed. reason: ', $php_errormsg;
		}

		$cuando=fgets($fh);	
		$titulos=fgets($fh);
		$contador=0;
		$tofind = utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ");
		$replac = "AAAAAAaaaaaaOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";

		while (( $registro = fgetcsv ( $fh , 1000 , ";" )) !== FALSE ){ 
			if($registro[2]!="")
			{
				$datos[$contador][0]=$registro[0];					
				$datos[$contador][2]=strtr($registro[2],$tofind,$replac);
				$datos[$contador][3]=$registro[3];
				$datos[$contador][4]=$registro[4];
				$datos[$contador][5]=$registro[5];				
				$datos[$contador][7]=$registro[7];
				$datos[$contador][8]=$registro[8];
				$datos[$contador][9]=$registro[9];				
				$datos[$contador][11]=$registro[11];
				 $contador++;	
			}
		 			
		}		
		fclose($fh);
		foreach ($datos as $key => $fila) $provincias[$key]  = $fila[2];		
		array_multisort($provincias, SORT_ASC, $datos);
		$cont=0;		
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
				$datos[$cont][7]=$datos[$cont][2];
			}
			$cont++;
		}
		return $datos;
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                           OFERTAS ALEATORIAS                               ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function ofertasAleatorias(){
		$datos=leerArchivo();
		for($i=0;$i<3;$i++){
			$numAleatorio=rand(0,count($datos));
			//	echo $numAleatorio;
			echo "<article class=aleatorio>";
			echo "<h2><a href='single.php?id=".$datos[$numAleatorio][9]."'>".$datos[$numAleatorio][0]."</a></h2>";
			echo "<p>".substr(strip_tags($datos[$numAleatorio][4], '<p><em><b><strong>'),0,500)."</p></em></b></strong>[...]<br><a href='single.php?id=".$datos[$numAleatorio][9]."' class='boton rosa'>Mas informacion</a>";

			echo "</article>";				
		}
		$datos[$numAleatorio][0];
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                        OBTENER DATOS OFICINAS                              ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function obtenerDatos(){			
		$conexion=abrirBBDD();			
		$direcciones="";	
		$ordensql="select nombre , posicion, localidad, calle, telefono, email , enlace from oficinas";
		if($chorizo=$conexion->query($ordensql))
		{			
			while ($registro = $chorizo->fetch_array()) {	
				if ($registro[3]!="")
				{
					$htm="$registro[0] <p> Localidad: $registro[2] <p>Calle: ".utf8_decode($registro[3])." <p> Telefono: $registro[4] <p>Email: $registro[5] <p>";
					
				}
				
				$direcciones= $direcciones.$registro[0]."?".$registro[1]."?".$htm.";"; 					
			}				
		}			
		cerrarBBDD($conexion);
		return $direcciones;
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
		$contador=0;//para ver si devuelve mas de un dato
		foreach ($ofertas as $key => $valor) {	
			if($valor[2]!=$provi)
	    	{	    	
	    		echo "<h3 class=separador>".$valor[2]."</h3>";
	    	}		
			echo "<article class='oferts'>";								
			echo "<h2><a href='single.php?id=".$valor[9]."' >".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
			echo "<p>".$valor[4]."</p>";			                  				
			echo "</article>";
				$provi=$valor[2];			
				$contador++;
		}	
		if($contador==0)
		{
			echo"<h2 class=sinSubasta> No hay ofertas con esta busqueda</h2>";
		}
	}


	function todasLasOfertasDeProvincias($provincias){
		$datos = leerArchivo();
		$provi = "";
		$contador=0;//para ver si devuelve mas de un dato
		foreach ($provincias as $clave => $provincia) {		

			foreach ($datos as $key => $valor) {
				if($valor[2]==$provincia){
					if($valor[2]!=$provi)
			    	{

			       		echo "<h1 class=separador>".$valor[2]."</h1>";;
			    	}
					echo "<article class='oferts'>";										
					echo "<h2><a href='single.php?id=".$valor[9]."'>".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
					echo "<p>".$valor[4]."</p>";	
					echo "<a href=".$valor[11]." class=enlaceOficina target='_blank'> Enlace oficina de empleo</a>";                   				
					echo "</article>";	
						$provi=$valor[2];
						$contador++;
				}					
			}
		}
		if($contador==0)
		{
			echo"<h2 class=sinSubasta> No hay ofertas con esta busqueda</h2>";
		}
	}

	function todasLasOfertasConPalabraSinProvincia($palabras){
		$datos = leerArchivo();	
		$provi = "";		
		$contador=0;//para ver si devuelve mas de un dato	
		foreach ($datos as $key => $valor) {
			if(like($valor[0],$palabras)){
				if($valor[2]!=$provi)
			    {
			    	echo "<h1 class=separador>".$valor[2]."</h1>";
			    }
				echo "<article class='oferts'>";									
				echo "<h2><a href='single.php?id=".$valor[9]."'  >".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
				echo "<p>".$valor[4]."</p>";	
				echo "<a href=".$valor[11]." class=enlaceOficina target='_blank'> Enlace oficina de empleo</a>";                   				
				echo "</article>";
				$provi=$valor[2];
				$contador++;	
			}					
		}	
		if($contador==0)
		{
			echo"<h2 class=sinSubasta> No hay ofertas con esta busqueda</h2>";
		}
	}

	function todasLasOfertasConPalabraYProvincia($palabras,$provincias){
		$datos = leerArchivo();	
		$provi = "";
		$contador=0;//para ver si devuelve mas de un dato
		foreach ($provincias as $clave => $provincia) {		
			foreach ($datos as $key => $valor) {
				if($valor[2]==$provincia){
					if(like($valor[0],$palabras)){
						if($valor[2]!=$provi)
				    	{
				    		echo "<h1 class=separador>".$valor[2]."</h1>";
				    	}
						echo "<article class='oferts'>";												
						echo "<h2><a href='single.php?id=".$valor[9]."' target='_blank'>".$valor[0]."</a><span class=provincia> - ".$valor[2]."</span></h2>";				           	
						echo "<p>".$valor[4]."</p>";	
						echo "<a href=".$valor[11]." class=enlaceOficina target='_blank'> Enlace oficina de empleo</a>";                   				
						echo "</article>";	
						$provi=$valor[2];
						$contador++;
					}	
				}								
			}
		}
		if($contador==0)
		{
			echo"<h2 class=sinSubasta> No hay ofertas con esta busqueda</h2>";
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////                          FUNCIONES OFERTAS EMAIL                           ////////
/////////////////////////////////////////////////////////////////////////////////////////////

	function ofertasEmail($email){
		
		$conexion = conexion();		
		$sql = "SELECT palabras,provincias FROM enlist WHERE estado = 1 and email='".$email."';";
		if($resultado = $conexion->query($sql)){			
			if($row = $resultado->fetch_array()){				

				if($row[0] == "all" && $row[1] == "all"){							
					todasLasOfertas();		
						
				}else if($row[0] == "all" && $row[1] != "all"){	
					$provincias = explode(";",$row[1]);						
					todasLasOfertasDeProvincias($provincias);

				}else if($row[0] != "all" && $row[1] == "all"){							
					todasLasOfertasConPalabraSinProvincia($row[0]);

				}else if($row[0] != "all" && $row[1] != "all"){	
					$provincias = explode(";",$row[1]);						
					todasLasOfertasConPalabraYProvincia($row[0],$provincias);

				}else{							
					todasLasOfertas();
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
				echo "<a href='php/pdf.php?id=".$valor[9]."' class='pdf' target='_blank'>GUARDAR EN PDF</a>";                   				
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
			generarEmail();
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
		$mail->Username = "empleojcyles@gmail.com"; 
		$mail->Password = "DataTravel*"; // Contraseña
		$mail->From = "empleojcyles@gmail.com";
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
			//echo "Problemas enviando correo electrónico a ";
			//echo "<br/>".$mail->ErrorInfo;  
		}else{
			//echo "Mensaje enviado correctamente";
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