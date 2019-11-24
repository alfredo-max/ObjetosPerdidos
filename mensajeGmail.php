<?php
require  'PHPMailer/Exception.php'; 
require  'PHPMailer/PHPMailer.php'; 
require  'PHPMailer/SMTP.php';

use  PHPMailer\PHPMailer\PHPMailer ; 
use  PHPMailer\PHPMailer\Exception ;



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host ='smtp.gmail.com';    
$mail->Port=587; 
$mail->SMTPSecure = 'tls'; 
$mail->SMTPAuth   = true; 
$mail->Username   = 'soumayukijira258@gmail.com'; 
$mail->Password   = 'batalladecocina'; 
$mail->setFrom('soumayukijira258@gmail.com', 'Souma');
$mail->addAddress('almalfredo19@gmail.com',"alf");     // Add a recipient

$mail->Subject = 'Web:Contraseña de Recuperacion';
  $mail->msgHTML('hola esta es una prueba');

if($mail->send()){
     echo ("enviado correctamente");
}else{
    echo ("no se envio");
}








// try {
//     //Server settings
//     $mail->SMTPDebug =0;                      // Enable verbose debug output
//     $mail->isSMTP();                                            // Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//     $mail->Username   = 'soumayukijira258@gmail.com';                     // SMTP username
//     $mail->Password   = 'batalladecocina';                               // SMTP password
//     $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
//     $mail->Port       = 587;                                    // TCP port to connect to

//     //Recipients
//     $mail->setFrom('soumayukijira258@gmail.com', 'Souma');
//     $mail->addAddress('almalfredo19@gmail.com');     // Add a recipient


  

//     // Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Web:Contraseña de Recuperacion';
//     $mail->Body    = 'hola esta es una prueba';


//     $mail->send();
//     echo 'El mensaje se envio corectamente';
// } catch (Exception $e) {
//     echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
// }


?>