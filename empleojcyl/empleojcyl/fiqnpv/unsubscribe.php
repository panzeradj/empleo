<?php
	if(!empty($_GET['e'])){
		$result = endlist($_GET['e']);
		if($result){
			echo "bien";
		}else{
			echo "mal";
		}
	}
?>


<!DOCTYPE html>
<html lang="es">
	<head>		
		<title>Proyecto CyL</title>
		<meta charset="LATIN-1">
		<link rel="stylesheet" href="style/estilo.css">	
	</head>
	<body>
		<header id="jobs">			
			<!-- Menu Superior --> 
			<?php include('parts/header.php'); ?>
		</header>

		<!-- Buscador -->
		<?php include('parts/searcher.php'); ?>

		<section>
			<div class="centrado">
				<h1>Darse de baja en las alertas Email</h1>								
				<article>								
					
				</article>	
			</div>	
			<div class="limpio"></div>
		</section>

		<!-- FOOTER -->
		<?php include('parts/footer.php'); ?>	
	</body>
</html>