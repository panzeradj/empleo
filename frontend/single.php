<?php
		include('php/functions.php');	

		if(!empty($_GET['id'])){
			$id = $_GET['id'];	
		}else{
			$id=0;
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

		<section id="empleo">
			<div class="centrado">		
				<h1>Ofertas de Empleo</h1>				
				<?php					
					verOfertaUnica($id);
				?>
			</div>	
			<div class="limpio"></div>
		</section>
		<footer></footer>
	</body>
</html>