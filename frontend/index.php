 <?php 
 	include('php/functions.php'); 
 ?> 

<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>EmpleoJCYL.es</title>
		<link rel="icon" href="images/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">		
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
	</head>
	<body>	
		<main>
			
			<!-- NAV -->
			<?php include('parts/nav.php'); ?>				

			<header id="mapa">

				<script type="text/javascript">		
								var datos="<?php echo obtenerDatos();?>";
								var misPuntos = new Array();
								var direccion = datos.split(";");
								for (a in direccion){	
									var resultado = direccion[a].split("?");
									if(resultado[0]!= undefined && resultado[1]!= undefined ){
										/*console.log(resultado[0] );
										console.log("1: "+resultado[1] );*/
										var coordenadas = resultado[1].split("#");
										if(coordenadas[0]!=undefined && coordenadas[1]!=undefined ){
											misPuntos[a] = [""+resultado[0],""+coordenadas[0], ""+coordenadas[1], "icon1", ""+resultado[2]];							
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
							
								    var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);
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
				
			</header>

			<section>
				<article id="principal">
					<h1>Ofertas de Empleo disponibles <span>Encuentra empleo en CyL de forma rapida y efectiva</span></h1>
						
					<!-- Muestro ofertas aleatorias -->	
					<?php ofertasAleatorias(); ?>
				</article>

				<article id="welcome">
					<div id="welcome_susbscribe">
						<h2>Castilla y Leon</h2>
						<h3>eres t&uacute;, es t&uacute; empleo, es</h3>									
						<h1>FUTURO</h1>
						<a href="#" class="boton letraGrande rosa"> Recibir alertas </a>
					</div>					
				</article>
			</section>		

			<!-- FOOTER -->
			<?php include('parts/footer.php'); ?>			
		</main>			
	</body>
</html>