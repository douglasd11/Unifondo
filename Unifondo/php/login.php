<?php
    session_start();
    include 'conexion.php';

    //var_dump($_POST);

    

    $correo = $_POST['email'];
    $clave = $_POST['clave'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and clave='$clave'");
  
    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
          
        echo '
            <script>
                window.location = "../home.php";
            </script>
        ';
    }
    else{
        echo '
            <script>
                window.location = "../index.php";
            </script>
        ';
    }

?>