<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';
 

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'doskeweb@gmail.com';                     // SMTP username
    $mail->Password   = 'weben500';                                   // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
   
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom('doskeweb@gmail.com', 'Mailer');
    $mail->addAddress($_GET["email"], 'Joe User');     // Add a recipient

    //generando contraseña
    function claveAleatoria($longitud,$opcLetra,$opcNumero, $opcMayus, $opcEspecial = FALSE){
        $letras ="abcdefghijklmnopqrstuvwxyz";
        $numeros = "1234567890";
        $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $especiales ="|@#~$%()=^*+[]{}-_";
        $listado = "";
        $password = "";
        if ($opcLetra == TRUE) $listado .= $letras;
        if ($opcNumero == TRUE) $listado .= $numeros;
        if($opcMayus == TRUE) $listado .= $letrasMayus;
        if($opcEspecial == TRUE) $listado .= $especiales;
        
        for( $i=1; $i<=$longitud; $i++) {
        $caracter = $listado[rand(0,strlen($listado)-1)];
        $password.=$caracter;
        $listado = str_shuffle($listado);
        }
        return $password;
        }
        $nuevaclave=claveAleatoria(6,TRUE,TRUE,TRUE,False);

    // cambiando clave en la base de datos
    require ("UsuarioControlador.php");

    $user=UsuarioControlador::getUsuarioEmail($_GET["email"]);
    $username=$user->getUserName();
    // echo(UsuarioControlador::CambiarClave($username,$nuevaclave));
   if( UsuarioControlador::CambiarClave($username,$nuevaclave)){
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Nueva clave:';
        $mail->Body    = 'Tu nueva clave es: '.$nuevaclave;
        $mail->send();
        echo 'Se ha cambiado la contraseña correctamente';
   }else{
       echo ("no se cambio");
   }
// //    echo($mail->Body);


} catch (Exception $e) {
    echo "no se pudo enviar: {$mail->ErrorInfo}";
}
?>