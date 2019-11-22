<?php
 
//  session_start();
 require_once (__DIR__.'/vendor/autoload.php');


$fb= new \Facebook\Facebook([
    'app_id'  => '2569743453140724',
    'app_secret' => 'c1b2cd4813c9ce5be8b5f42da7369f4a',
    'default_graph_version' => 'v3.2',
]);

$helper= $fb->getRedirectLoginHelper();

 $login_url=$helper->getLoginUrl('http://localhost/objetos_perdidos/');

//  print_r($login_url);

try{
    $accessToken=$helper->getAccessToken();
    // print_r($accessToken);
    if(isset($accessToken)){
         
         $_SESSION['access_token']=(string)$accessToken;
         //Si la sesión está configurada, podemos redirigir al usuario a cualquier página
    
        session_start();
        $_SESSION["tipo"]="usuario_regular";
        header("Location: View/HomeUsuarioRegular.php");
    }

}catch(Exception $exc){
      echo $exc->getTraceAsString();
}

// // ahora podemos recibir el nombre,apellido y email del usuario
   if(isset($_SESSION['access_token'])){


        try {
          $fb->setDefaultAccessToken($_SESSION['access_token']);
          $res=$fb->get('/me?fields=name,email,picture');
          $user= $res->getGraphUser();
          $_SESSION["facebook"]="true";
          $_SESSION["usuario"]= $user->getField('name');
          $_SESSION["imagen"]=$user->getPicture()->getUrl();


        } catch (Exception $exc) {
            echo("error");
            echo $exc->getTraceAsString();
          
          
        }
   }
?>