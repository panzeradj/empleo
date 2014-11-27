<?php
	
	require('WriteHTML.php');

	$pdf=new PDF_HTML();
	$pdf->Open();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',16);
	$pdf->WriteHTML('<div align="left">Este es una pagina PDF con una imagen.
	<strong>
	<img src="miimagen.jpg" border="0" width="493" height="163" /></strong></div><div align="left"><strong>esta es la imagen</strong></div>');

	$pdf->Output();
?>