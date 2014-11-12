<!DOCTYPE html>
<html lang="es">
<head>
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true">
	</script>
	<script type="text/javascript">
		var geocoder;
		var map;
		function initialize() {
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(-34.397, 150.644);
			var myOptions = {
			zoom: 8,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
	
		var direcciones = "<?php echo obtenerDatos(); ?>" ;
		//console.log(direcciones);
		var resultado = direcciones.split(";");
		


		for(i in resultado){
			var coordenadas = resultado[i].split("#");
			
			oficinas[i] = new google.maps.LatLng(coordenadas[0],coordenadas[1]);

		}

		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		}
		function codeAddress(address) {
		if (geocoder) {
		geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
		map.setCenter(results[0].geometry.location);
		var marker = new google.maps.Marker({
		map: map, 
		position: results[0].geometry.location
		});
		} else {
		// alert("Geocode was not successful for the following reason: " + status);
		}
		});
		}
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script> 
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
					$direcciones = $direcciones.$registro[7].";";		
					//echo $registro[0] .$registro[7]."<br>"; 
					$algo = str_replace($registro[7],"#","");
					
					echo $direcciones
					//["Sagrada Familia", "41.403571", "2.174472", "icon1", "<div>html</div>"],		
				}				
			}				
			fclose($f);
			//echo $direcciones;
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