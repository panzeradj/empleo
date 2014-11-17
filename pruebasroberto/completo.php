

<!DOCTYPE html>
<html lang="es">
<head>
	
	<title>Empleo</title>
	<link rel="stylesheet" href="estilo.css">

	<div id="capa-mapa" style="width:400px;height:400px"></div>

		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true">
		</script>

	<script type="text/javascript">
		// creamos un array con la información de todos los puntos:
		// su nombre, latitud, longitud,
		// el icono que le queramos asignar (ver más adelante)
		// y un html totalmente personalizable a vuestro gusto, incluyendo imágenes y enlaces
		var datos="<?php echo obtenerDatos();?>";
		var misPuntos = new Array();
		var direccion = datos.split(";");
		for (a in direccion)
		{	
				var resultado = direccion[a].split("?");
				if(resultado[0]!= undefined && resultado[1]!= undefined )
				{
					console.log(resultado[0] );
					console.log("1: "+resultado[1] );
					var coordenadas = resultado[1].split("#");
					if(coordenadas[0]!=undefined && coordenadas[1]!=undefined )
					{
						misPuntos[a] = [""+resultado[0],""+coordenadas[0], ""+coordenadas[1], "icon1", ""+resultado[0]];
							
					}
				}
				
				
		}

		// creamos un array con la información de todos los puntos:
		// su nombre, latitud, longitud,
		// el icono que le queramos asignar (ver más adelante)
		// y un html totalmente personalizable a vuestro gusto, incluyendo imágenes y enlaces
	/*	var direcciones="<?php echo obtenerDatos();?>";
		var misPuntos = new Array();
		var resultado = direcciones.split(";");
		var coordenadas = resultado[0].split("#");
		for(i in resultado){		
			var coordenadas = resultado[i].split("#");
			if(coordenadas[0]!=undefined && coordenadas[1]!=undefined )
			{
				misPuntos[i] = ["Sagrada Familia", ""+coordenadas[0], ""+coordenadas[1], "icon1", "<div>html</div>"];
					
			}
		}	*/
		
		
		
		
		

		function inicializaGoogleMaps() {
		    // Coordenadas del centro de nuestro recuadro principal
		    var x =41.652251;
		    var y = -4.724532100000033;

		    var mapOptions = {
		        zoom: 6,
		        center: new google.maps.LatLng(x, y),
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    }

		    var map = new google.maps.Map(document.getElementById("capa-mapa"), mapOptions);
		    setGoogleMarkers(map, misPuntos);
		}

		var markers = Array();
		var infowindowActivo = false;
		function setGoogleMarkers(map, locations) {
		    // Definimos los iconos a utilizar con sus medidas
		    var icon1 = new google.maps.MarkerImage(
		        "office-building.png",
		        new google.maps.Size(30, 30)
		    );
		    

		    for(var i=0; i<locations.length; i++) {
		        var elPunto = locations[i];
		        var myLatLng = new google.maps.LatLng(elPunto[1], elPunto[2]);

		        markers[i]=new google.maps.Marker({
		            position: myLatLng,
		            map: map,
		            icon: eval(elPunto[3]),
		            title: elPunto[0]
		        });
		        markers[i].infoWindow=new google.maps.InfoWindow({
		            content: elPunto[4]
		        });
		        google.maps.event.addListener(markers[i], 'click', function(){      
		            if(infowindowActivo)
		                infowindowActivo.close();
		            infowindowActivo = this.infoWindow;
		            infowindowActivo.open(map, this);
		        });
		    }
		}

		inicializaGoogleMaps();
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
					$direcciones= $direcciones.$registro[0]."?".$registro[7].";"; 
					//$direcciones= $direcciones.$registro[7].";"; 
				}				
			}				
			fclose($f);
			//echo $direcciones;
			return $direcciones;
		}
		obtenerDatos();	
	?>

	


</head>
<body>
	<header>
		<h1></h1>
	</header>
	<section>
		<article id="capa-mapa">
			
		</article>
	</section>
	<footer></footer>
</body>
</html>