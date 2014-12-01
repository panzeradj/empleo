	
<?php 
  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  
  require_once('PHPMailer-master/class.phpmailer.php');

  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail
  $mail = new phpmailer();

  $mail->IsSMTP();

  //Definimos las propiedades y llamamos a los métodos 
  //correspondientes del objeto mail  

  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
  $mail->Mailer = "smtp"; 	

  //Asignamos a Host el nombre de nuestro servidor smtp
  $mail->Host = "smtp.googlemail.com";

  //Le indicamos que el servidor smtp requiere autenticación
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";

  //Puerto de Gmail
  $mail->Port = 465;

  // IMPORTANTE ESTO NO SALE EN LOS LIBROS!!!!!
  // en GMAIL hay que activar "Acceso de aplicaciones menos seguras"
  
  //Le decimos cual es nuestro nombre de usuario y password
  $mail->Username = "bytelchuscom@gmail.com"; 
  $mail->Password = "";

  //Indicamos cual es nuestra dirección de correo y el nombre que 
  //queremos que vea el usuario que lee nuestro correo
  $mail->From = "bytelchuscom@gmail.com";
  $mail->FromName = "Bytelchus Network";

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
  //una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=30;

  //Indicamos cual es la dirección de destino del correo
  $mail->AddAddress("o0kiii@hotmail.com");

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
  $mail->Subject = "Prueba de phpmailer";
  $mail->Body = "<b>Mensaje de prueba mandado con phpmailer en formato html</b>";

  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

  //se envia el mensaje, si no ha habido problemas 
  //la variable $exito tendra el valor true
  $exito = $mail->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  //del anterior, para ello se usa la funcion sleep	
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
	sleep(5);
     	//echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;	
   }
 
		
   if(!$exito)
   {
	echo "Problemas enviando correo electrónico a ";
	echo "<br/>".$mail->ErrorInfo;	
   }
   else
   {
	echo "Mensaje enviado correctamente";
   } 
?>