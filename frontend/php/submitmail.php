	
<?php 
  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  
  require_once('PHPMailer-master/class.phpmailer.php');
  function mandarEmail($email,$nombre,$cadena){    
      $mail = new phpmailer();
      $mail->IsSMTP();    
      $mail->Mailer = "smtp";    
      $mail->Host = "smtp.googlemail.com";
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = "ssl";
      $mail->Port = 465;
      $mail->Username = "bytelchuscom@gmail.com"; 
      $mail->Password = ""; // Contraseña
      $mail->From = "bytelchuscom@gmail.com";
      $mail->FromName = "Bytelchus Network";
      $mail->Timeout=30;
      $mail->AddAddress($email); // email destinatario
      $mail->Subject = "Prueba de phpmailer";
      $mail->Body = $cadena; // contenido del email
      $mail->AltBody =  $cadena; // contenido del email alternativo
      $exito = $mail->Send();
      $intentos=1; 
      while ((!$exito) && ($intentos < 5)) {
      sleep(5);
          $exito = $mail->Send();
          $intentos=$intentos+1;  
       }
     
        
      if(!$exito){
        echo "Problemas enviando correo electrónico a ";
        echo "<br/>".$mail->ErrorInfo;  
      }else{
        echo "Mensaje enviado correctamente";
      } 
  }//Fin funcion mandarEmail
  
?>