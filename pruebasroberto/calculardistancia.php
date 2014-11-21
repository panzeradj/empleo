<?php
include['/funciones/funciones.php'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    
    <title>Empleo</title>
    <link rel="stylesheet" href="estilo.css">

    <div id="capa-mapa" style="width:400px;height:400px"></div>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true">
        </script>

    <script type="funciones/fucniones.html">
       
        var datos="<?php $datos=leerArchivo(); echo sacarCoordenadas();?>";
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

                        function degreesToRadian(numDegrees) {  
                            return numDegrees * Math.PI / 180;  
                        } 
                  
                        var lat1   = degreesToRadian(41.6529);  
                        var lat2   = degreesToRadian(coordenadas[0]);  
                        var lng1   = degreesToRadian(-4.72838);  
                        var lng2   = degreesToRadian( coordenadas[1]);  
                          console.log("aaa");
                        var result = Math.pow(Math.sin((lat2 - lat1) / 2) , 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin((lng2 - lng1) / 2) , 2);  
                        console.log(12722 * Math.asin(Math.sqrt(result)));  
                            
                    }
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