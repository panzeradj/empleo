<!DOCTYPE html>
<html lang="es">
<head>
	
	<title>Empleo</title>
	<link rel="stylesheet" href="estilo.css">
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true">
</script>
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
					//$algo = str_replace($registro[7],"#","");
					//echo $algo;
					$direcciones= $direcciones.$registro[7].";"; 
				}				
			}				
			fclose($f);
			//echo $direcciones;
			return $direcciones;
		}
		obtenerDatos();	
	?>
	<script type="text/javascript">
		function mostrarGoogleMaps()
         {
            //Creamos el punto a partir de las coordenadas:
            var punto = new google.maps.LatLng(42.099403,-5.035605);
 
            //Configuramos las opciones indicando Zoom, punto(el que hemos creado) y tipo de mapa
            var myOptions = {
            zoom: 15, center: punto, mapTypeId: google.maps.MapTypeId.ROADMAP
            };
 
            //Creamos el mapa e indicamos en qué caja queremos que se muestre
            var map = new google.maps.Map(document.getElementById("mostrarMapa"),  myOptions);
 
            //Opcionalmente podemos mostrar el marcador en el punto que hemos creado.
            var marker = new google.maps.Marker({
            position:punto,
            map: map,
            title:"Título del mapa"});
          }

		//document.write("En script");
		var direcciones="<?php echo obtenerDatos();?>";
			
		var resultado = direcciones.split(";");
		
	document.write(resultado.length+"<br>");
		var oficinas =new Array();

		for(i in resultado){
			//var oficinas[i]=new Array(2);
			
			var coordenadas = resultado[i].split("#");
			if(coordenadas[0]!=undefined && coordenadas[1]!=undefined )
			{
					document.write(coordenadas[0] +","+ coordenadas[1]+"<br>");
			}
		

		}

	
</script>



</head>
<body onload="mostrarGoogleMaps()">
	<header>
		<h1>Empleo</h1>
	</header>
	<section>
		<article>
			<div id="mostrarMapa" style="width: 450px; height: 350px;"> </div>
		</article>
	</section>
	<footer></footer>
</body>
</html>