<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="estilo.css">

	<div id="capa-mapa" style="width:400px;height:400px"></div>

		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true">
		</script>

	<script type="text/javascript">
		// creamos un array con la información de todos los puntos:
		// su nombre, latitud, longitud,
		// el icono que le queramos asignar (ver más adelante)
		// y un html totalmente personalizable a vuestro gusto, incluyendo imágenes y enlaces
		var misPuntos = [
		    ["Sagrada Familia", "41.403571", "2.174472", "icon1", "<div>html</div>"],
		    ["Plaça Catalunya", "41.387097", "2.170072", "icon2", "<div>html</div>"],
		    ["Estación de Sants", "41.379514", "2.140644", "icon3", "<div>html</div>"],
		];

		function inicializaGoogleMaps() {
		    // Coordenadas del centro de nuestro recuadro principal
		    var x =41.389624;
		    var y = 2.15988563537;

		    var mapOptions = {
		        zoom: 13,
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
		        "http://www.vinx.info/uploads/editor/map-green.png",
		        new google.maps.Size(20, 30)
		    );
		    var icon2 = new google.maps.MarkerImage(
		        "http://www.vinx.info/uploads/editor/map-orange.png",
		        new google.maps.Size(20, 30)
		    );
		    var icon3 = new google.maps.MarkerImage(
		        "http://www.vinx.info/uploads/editor/map-red.png",
		        new google.maps.Size(20, 30)
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