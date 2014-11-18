
<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>Proyecto CyL</title>
		<meta charset="LATIN-1">
		<link rel="stylesheet" href="css/estilo.css">
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true">
		</script>
		
	
	</head>
	<body>
		<header>			
			<nav>
				<div class="centrado">
					<div id="logotipo"><img src="images/junta.png"></div>
					<ul>
						<li><a href="#">Enlace</a></li>
						<li><a href="#">Enlace</a></li>
						<li><a href="#">Enlace</a></li>
						<li><a href="#">Enlace</a></li>
						<li><a href="#">Enlace</a></li>
					</ul>					
				</div>				
			</nav>

			<div id="map_canvas"></div>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
	<?php
		function obtenerDatos(){			
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
			while (( $registro = fgetcsv ( $f , 1000 , ";" )) !== FALSE ){ 
				if( $registro[7]!=""){					
					$direcciones= $direcciones.$registro[0]."?".$registro[7].";"; 					
				}				
			}				
			fclose($f);
			//echo $direcciones;
			return $direcciones;
		}
			obtenerDatos();	
	?>

		<script type="text/javascript">		
			var datos="<?php echo obtenerDatos();?>";
			var misPuntos = new Array();
			var direccion = datos.split(";");
			for (a in direccion){	
					var resultado = direccion[a].split("?");
					if(resultado[0]!= undefined && resultado[1]!= undefined ){
						console.log(resultado[0] );
						console.log("1: "+resultado[1] );
						var coordenadas = resultado[1].split("#");
						if(coordenadas[0]!=undefined && coordenadas[1]!=undefined ){
							misPuntos[a] = [""+resultado[0],""+coordenadas[0], ""+coordenadas[1], "icon1", ""+resultado[0]];							
						}
					}					
			}

			function inicializaGoogleMaps() {
			    // Coordenadas del centro de nuestro recuadro principal
			    var x =41.991;
			    var y = -2.024532100000033;

			    var mapOptions = {
			        zoom: 7,
			        center: new google.maps.LatLng(x, y),
			        mapTypeId: google.maps.MapTypeId.ROADMAP
			    }

			    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			    setGoogleMarkers(map, misPuntos);
			}

			var markers = Array();
			var infowindowActivo = false;
			function setGoogleMarkers(map, locations) {			    
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
			            title: elPunto[0],
			            animation: google.maps.Animation.DROP
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
	
			
			<div class="limpio"></div>

		</header>
		
		<section id="buscador">
			<article class="centrado">
				<form>
					<input type="text" id="cuadroCiudad" placeholder="Cocinero, Soria">
					<input type="submit" value="buscar">
				</form>
			</article>
		</section>
		<section id="welcome">
			<div class="centrado">
				<article>
					<h2>Castilla y Leon</h2>
					<h3>es empleo , eres t&uacute; , es</h3>									
					<h1>FUTURO</h1>
					<a href="#" class="boton letraGrande"> Inscribete ahora </a>
				</article>
			</div>			
		</section>

		<section id="social">
			<div class="centrado">
				
			</div>
		</section>

		<section id="empleo">
			<div class="centrado">
				<h1>Ofertas de Empleo</h1>
				<article>
					<h2>Titulo empleo</h2>
					<p>
					Descripcion, Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion, Descripcion
					</p>
					<a href="#">Enlace a la oficina de empleo</a>
					<p class="fecha">November 11, 2014</p>
				</article>		
				<article>
					<h2>Titulo empleo</h2>
					<p>
					Descripcion, Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion, Descripcion
					</p>
					<a href="#">Enlace a la oficina de empleo</a>
					<p class="fecha">November 11, 2014</p>
				</article>
				<article>
					<h2>Titulo empleo</h2>
					<p>
					Descripcion, Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion,
					Descripcion, Descripcion, Descripcion, Descripcion
					</p>
					<a href="#">Enlace a la oficina de empleo</a>
					<p class="fecha">November 11, 2014</p>
				</article>	
			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>