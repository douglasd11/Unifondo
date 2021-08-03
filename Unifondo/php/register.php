<?php
    include 'conexion.php';

    //var_dump($_POST);

    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $telefono = $_POST['tel'];
    $correo = $_POST['email'];
    $clave = $_POST['clave'];
    $estudiante = "0";

    if(isset($_POST['check'])){
        $estudiante = $_POST['check'];
    }

    $query = "INSERT INTO usuarios(nombre, apellido, telefono, correo, clave, estudiante) VALUES('$nombre', '$apellido', '$telefono', '$correo', '$clave','$estudiante')";

    
    $run = mysqli_query($conexion, $query);

    if(!empty($run)){
        echo'
            <script>
                alert("Registro exitoso");
                window.location = "../index.php";
            </script>
        ';
    }
    else{
        echo'
            <script>
                alert("Error con el registro");
                window.location = "../index.php";
            </script>
        ';
    }

?>