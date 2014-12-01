 <?php include('php/functions.php'); ?> 
<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>Proyecto CyL</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style/estilo.css">
		<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>	 -->
	</head>
	<body>
		<header>				
			<!-- Menu Superior --> 			
			<?php include('parts/header.php'); ?>
			

		<div id="map_canvas"></div>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
		<?php
			function obtenerDatos(){			
				$conexion=abrirBBDD();			
				$direcciones="";	
				$ordensql="select nombre , posicion from oficinas";
				if($chorizo=$conexion->query($ordensql))
				{			

					while ($registro = $chorizo->fetch_array()) {	
						$direcciones= $direcciones.$registro[0]."?".$registro[1].";"; 					
					}				
				}			
				cerrarBBDD($conexion);
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
		
		<!-- Buscador -->
		<?php include('parts/searcher.php'); ?>
		
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
				
				<?php
					$datos=leerArchivo();
					for($i=0;$i<3;$i++){
						$numAleatorio=rand(0,count($datos));
					//	echo $numAleatorio;
						echo "<article>";
							echo "<h2><a href='single.php?id=".$datos[$numAleatorio][9]."'>".$datos[$numAleatorio][0]."</a><span class=provincia> - ".$datos[$numAleatorio][7]."</span></h2>";
							echo "<p>".$datos[$numAleatorio][4]."</p>";
							echo "<a href='".$datos[$numAleatorio][11]."'>Enlace a la oficina de empleo</a>";
						echo "</article>";
					}
					
					
					$datos[$numAleatorio][0];
				?>
				
			</div>	
			<div class="limpio"></div>
		</section>
		<!-- FOOTER -->
		<?php include('parts/footer.php'); ?>		
	</body>
</html>