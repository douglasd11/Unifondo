<?php
    include 'conexion.php';

    session_start();
    var_dump($_POST);

    $id_org = $_GET['id'];

    $nombre = $_POST['name'];
    $fecha = $_POST['date'];
    $info = $_POST['message'];
    $premio = $_POST['prize'];
    $valor = $_POST['price'];
    $participantes = $_POST['participantes'];
    $metodo = $_POST['pago'];

    $total = 0;
    $estado = 1;
    $ganador = 0;
    

    $query = "INSERT INTO sorteos(nombre, id_organizador, fecha, info, premio, valor, participantes, metodo_pago, total, estado, ganador) VALUES('$nombre', '$id_org', '$fecha', '$info', '$premio','$valor','$participantes','$metodo','$total','$estado','$ganador')";

    
    $run = mysqli_query($conexion, $query);

    if(!empty($run)){
        echo'
            <script>
                alert("Registro del sorteo exitoso");
                window.location = "../index.php";
            </script>
        ';
    }
    else{
        echo'
            <script>
                alert("Error con el registro del sorteo");
                window.location = "../index.php";
            </script>
        ';
    }
