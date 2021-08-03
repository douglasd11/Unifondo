<?php

session_start();

if(isset($_SESSION['usuario'])){
        
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $mensaje = $_POST['message'];

    $asunto = "Mensaje de contacto - UNIFONDO";

    $msg = "Mensaje enviado por ".$nombre.": \r\n";
    $msg.= $mensaje."\r\n";

        
    $header="Form:unifondoSA@unicartagena.edu.co \r\n";
    $header.="Reply-To:noreply.ejemplo@hotmail.com \r\n";
    $header.="X-Mailer:PHP/".phpversion();
    $mail=mail($correo,$asunto,$msg,$header);
    
    if($mail){
        echo "<script>
            alert('Envio de mensaje correcto');
        </script>";
        header("location: ../index.php");
    }
}
else{
    header("location: ../index.php");
}



