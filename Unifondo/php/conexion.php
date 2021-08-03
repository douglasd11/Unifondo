<?php

    $conexion = mysqli_connect("localhost", "root","","unifondo_db");
    //$conexion = mysqli_connect("localhost", "id16201409_unifondo_db_u","8@U_gkof(((Vj>9e","id16201409_unifondo_db");
    
    if($conexion){
        echo '
            <script>
                //alert("conectado");
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No conectado");
            </script>
        ';
    }
    
