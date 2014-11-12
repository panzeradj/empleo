
    <?php
      $fichero='http://www.datosabiertos.jcyl.es/web/jcyl/set/es/directorio/monumentos/1284325843131';



      $f = fopen($fichero, 'r') or exit('No puedorrrr abrir el fichero');

      $titulos=fgets($f);

      while ((( $registro = fgetcsv ( $f , 1000 , ';' )) !== FALSE ) ){ 
      if(strpos($registro[0],"'")!=false || strpos($registro[1],"'")!=false)//para quitar de la lista que sean ' en medio de la cadena y lo modifique
      {


      }
      else
      {
       $localizacion="$registro[1] , $registro[5]";
      echo "codeAddress($localizacion) ;";
      }

      // echo"<br>";

      }
      fclose($f);


     ?>
   
