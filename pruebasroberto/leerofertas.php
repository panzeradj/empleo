

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
       // document.write(datos);
        var misPuntos = new Array();
        var contador=0;
        var direccion = datos.split(";");
        for (a in direccion)
        {   
                var resultado = direccion[a].split("?");
                if(resultado[0]!= undefined && resultado[1]!= undefined )
                {
                  console.log(resultado[0]);
                    var coordenadas = resultado[1].split("#");
                    if(coordenadas[0]!=undefined && coordenadas[1]!=undefined )
                    {
                    
                       function degreesToRadian(numDegrees) {  
                            return numDegrees * Math.PI / 180;  
                        }      
                        //var lng=coordenadas[0]+((a+1)*0.00001)
                        var lat1   = degreesToRadian(41.6529);  
                        var lat2   = degreesToRadian(coordenadas[1]);  
                        var lng1   = degreesToRadian(-4.72838);  
                        var lng2   = degreesToRadian( coordenadas[0]);  
                          //console.log("aaa");
                        var result = Math.pow(Math.sin((lat2 - lat1) / 2) , 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin((lng2 - lng1) / 2) , 2);  
                        var distancia =(12722 * Math.asin(Math.sqrt(result))); 

                        if(distancia<30)
                        {
                            misPuntos[contador] = [""+resultado[0],""+coordenadas[1], ""+coordenadas[0], "icon1", ""+resultado[0]];
                            //console.log( "distancia <10");
                            contador++;
                        }                     

                    }
                }            
             
        }
      
        function inicializaGoogleMaps() {
            // Coordenadas del centro de nuestro recuadro principal
            var x =41.652251;
            var y = -4.724532100000033;
           /* for(i=0; i<misPuntos.length;i++)
            {
                document.write( misPuntos[i]);

            }*/
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
                    console.log( elPunto[1]);
                    elPunto[1]=parseFloat(elPunto[1])+(i*0.0002);
                    elPunto[1]=""+elPunto[1];
                     elPunto[2]=parseFloat(elPunto[2])+(i*0.0002);
                    elPunto[2]=""+elPunto[2];

                    console.log( elPunto[2]);
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
              //echo "melonnnn";
            $fichero="http://www.datosabiertos.jcyl.es/web/jcyl/risp/es/empleo/ofertas-empleo/1284354353012.csv";
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
                if($registro[7]!='')
                {   
                   $cor=localizacion($registro[7]);

                     $direcciones= $direcciones.$registro[0]."?".$cor.";"; 
                     //echo $direcciones;
                    
                }
                                   
            }               
            fclose($f);
           // echo $direcciones;
            
            return $direcciones;
        }

        function localizacion($municipio)
        {
          //  echo $municipio;
            $conexion = new mysqli("127.0.0.1", "root", "root", "emlpleo");

                   //select para sacar las dos coordenadas 
                   $ordensql="select longitud, latitud FROM municipios  where municipio='$municipio'";

                   if($chorizo=$conexion->query($ordensql))
                    {
                                                
                        while ($registro = $chorizo->fetch_array()) {
                            $cordenadas=$registro[0]."#".$registro[1];
                           //echo $cordenadas;
                        }
                    }
                        
                   $conexion->close($conexion);
                //echo  $cordenadas;
                   return $cordenadas;
        }

         obtenerDatos(); 
       
       // localizacion($caca);
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
    



