<?php



	include('php/functions.php');	

/*	if(isset($_POST['busqueda'])){
		$busqueda = $_POST['busqueda'];

		if(isset($_POST['provincia'])){
			$provincias = $_POST['provincia'];
			echo "long".count($provincias);
			foreach($provincias as $indice=>$valor){	
				echo "PALABRA ".$busqueda."<br>";			
				echo "PROVINCIA: ".$indice." ".$valor."<br>";

				
			}
		}else{
			// Tengo que sacar todas
		}		
	}*/
		$busqueda = $_POST['busqueda'];
		$provincias = $_POST['provincia'];
		if($busqueda == "" && count($provincias) == 0){
			echo "No hay palabras y no hay provincias";
			todasLasOfertas();			
		}else if($busqueda == "" && count($provincias) > 0){
			echo "No hay palabras pero SI hay provincias";
			todasLasOfertasDeProvincias($provincias);
		}else if($busqueda != "" && count($provincias) == 0){
			echo "Hay palabras pero NO hay pronvicia";
			todasLasOfertasConPalabraSinProvincia($busqueda);
		}else if($busqueda != "" && count($provincias) > 0){
			echo "Hay palabras y SI hay provincia";
			todasLasOfertasConPalabraYProvincia($busqueda,$provincias);
		}else{
			echo "Para todo lo demas, muestro todo";
		}










	
  
?>


<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Busqueda</title>
<style type="text/css" media="screen">body{color: #000}b{color: red;}</style>
</head><body></body></html>