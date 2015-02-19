<?php
	if(!empty($_GET['e'])){
		$result = endlist($_GET['e']);
		
	}
?>


<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>Proyecto CyL</title>
		<meta charset="LATIN-1">
		<style type="text/css">		
		h1{
			font-size: 2em;
			text-align: center;
		}

		.bien{
			text-align: center;
			color: #7BE23D;
		}

		.mal{
			text-align: center;
			color: #F02F2F;
		}
		</style>
	</head>
	<body>
	
		<section>
			<div class="centrado">

				<article>	
					<h1>Baja para alertas por email EmpleoJCYL</h1>							
					<?php if($result){
							echo "<h2 class='bien'>Usted ha sido dado de baja correctamente</h2>";
						}else{
							echo "<h2 class='mal'>Ocurrio un error, intentlo de nuevo mas tarde.</h2>";
						} 
					?>
					<a href="http://empleojcyl.es/">EmpleoJCYL.es</a>
				</article>	
			</div>	
		</section>

	</body>
</html>