<?php
    session_start();
    include 'conexion.php';

    
    var_dump($_POST);

    $id_sorteo = $_GET['id_sorteo'];
    $id_part = $_GET['id_part'];

    $precio = (int)$_POST['price'];
    $numero = (int)$_POST['select'];
    

    $query = "INSERT INTO participaciones(id_sorteo, id_participante, numero) VALUES('$id_sorteo', '$id_part', '$numero')";

    
    $run = mysqli_query($conexion, $query);

    /*
    if(!empty($run)){
        echo'
            <script>
                alert("Registro de la participacion exitosa");
            </script>
        ';
    }
    else{
        echo'
            <script>
                alert("Error con el registro de la participacion");
                window.location = "../index.php";
            </script>
        ';
    }*/

    $query = "SELECT * FROM sorteos";
    $ejecutar = mysqli_query($conexion, $query);

    while($linea = mysqli_fetch_array($ejecutar)){
        if($linea['id'] == $id_sorteo){
 
            $total = $linea['total'];
        }
    }
    $total += $precio;
    

    $query = "UPDATE sorteos SET total='$total' WHERE id='$id_sorteo'";
    $run = mysqli_query($conexion, $query);

    echo'
        <script>
            window.location = "../index.php";
        </script>
    ';
