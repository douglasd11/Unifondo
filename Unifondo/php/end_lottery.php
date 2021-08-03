<?php
    include 'conexion.php';

    session_start();
    var_dump($_GET);

    $id_st = $_GET['id_st'];
    $part = $_GET['part'];
    $estado = 0;

    $random = rand(1, $part);

    $query = "UPDATE sorteos SET estado='$estado', ganador='$random' WHERE id='$id_st'";
    
    $run = mysqli_query($conexion, $query);

    
    if(!empty($run)){
        echo'
            <script>
                alert("Sorteo Finalizado con exito");
                window.location = "../management.php";
            </script>
        ';
    }
    else{
        echo'
            <script>
                alert("Error para finalizar sorteo");
                window.location = "../management.php";
            </script>
        ';
    }