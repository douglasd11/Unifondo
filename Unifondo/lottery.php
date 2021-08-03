<?php 
 session_start();
    require_once './php/conexion.php';

   

    $id_sorteo = $_GET['id'];

    if(isset($_SESSION['usuario'])){

        $query = "SELECT * FROM usuarios";
        $ejecutar = mysqli_query($conexion, $query);

        while($linea = mysqli_fetch_array($ejecutar)){
            if($linea['correo'] == $_SESSION['usuario']){
 
                $id_user = $linea['id'];
                $nombre = $linea['nombre'];
                $estudiante = $linea['estudiante'];
            }
        }
    }
    else{
        echo '
            <script>
                window.location = "../index.php";
            </script>
        ';
    }

    $query = "SELECT * FROM sorteos";
    $ejecutar = mysqli_query($conexion, $query);

    while($linea = mysqli_fetch_array($ejecutar)){
        if($linea['id'] == $id_sorteo){
 
            $nombre_st = $linea['nombre'];
            $fecha = $linea['fecha'];
            $valor = $linea['valor'];
            $info = $linea['info'];
            $premio = $linea['premio'];
            $participantes = $linea['participantes'];
            $metodo = $linea['metodo_pago'];
        }
    }


    $query = "SELECT * FROM participaciones";
    $ejecutar = mysqli_query($conexion, $query);

    $numeros = array();

    while($linea = mysqli_fetch_array($ejecutar)){
        if($linea['id_sorteo'] == $id_sorteo){
 
            array_push($numeros, $linea['numero']);
        }
    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unifondos</title>
    <link rel="stylesheet" href="css/main.css?1.9">
    <link rel="stylesheet" href="css/lottery.css?1.9">
</head>
<body>
    <header>
        <nav>
            <div class="cont-logo">
                <img src="img/logoUni.png" alt="">
                <h1>UNIFONDOS</h1>
            </div>
            <div class="cont-user">
                <div class="img">
                    <img src="img/foto1.png" alt="">
                </div>
                <div class="name">
                    <h2><?php echo $nombre ?></h2>
                    <?php
                        if($estudiante == 1){
                            echo '<p>Estudiante</p>';
                        }
                        else{
                            echo '<p>Particular</p>';
                        }
                    ?> 
                </div>
                <div class="close">
                    <a href="php/cerrar_cuenta.php">X</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="cont-principal">
            
            <form action="php/participation_be.php?id_sorteo=<?php echo $id_sorteo ?>&id_part=<?php echo $id_user ?>" method="POST">
                <h2><?php echo $nombre_st ?></h2>
                <p>Sorteo activo. Entre más números escojas más oportunidades tendrás de ganar.</p>

                <div class="cont-date">
                    <label for="date">Fecha del sorteo</label>
                    <input id="input-date" type="date" name="date" value=<?php echo $fecha ?> readonly>
                </div>
                <label for="price">Valor del número</label>
                <input type="number" name="price" value=<?php echo $valor ?> readonly>
                <label for="prize">Premio</label>
                <input type="text" name="prize" value=<?php echo $premio ?> readonly>
                <label for="select">Números disponibles</label>
                <select name="select" aria-placeholder="numeros" require>
                    <?php
                        for ($i = 1; $i <= $participantes; $i++) {
                            $sw = 1;
                            
                                for ($j = 0; $j < count($numeros); $j++){
                                    if($numeros[$j] == $i){
                                        $sw = 0;
                                        
                                    }
                                }
                            
                            if($sw == 1){
                    ?>
                                <option value=<?php echo $i ?>><?php echo $i ?></option>
                    <?php
                            }  
                        }
                    ?>
                </select>
                <p>Información</p>
                <p><?php echo $info ?></p>
                <p>Método de pago</p>
                <p><?php echo $metodo ?></p>

                <button>Participar</button>
            </form>
        </section>
        <section class="cont-secundario">
            <a href="home.php">Regresar</a>
        </section>
    </main>

    <div class="cont-contact">
            <div class="marco">

                <div class="cont-main">
                    <div class="cont-head">
                        <button class="close-contact">X</button>
                    </div>

                    <form action="php/correo.php" method="POST">
                        <h2>Contactanos</h2>
                        <input type="text" name="name" placeholder="Nombre Completo" require>
                        <input type="text" name="email" placeholder="Correo electronico" require>
                        <textarea name="message" placeholder="Dejanos tu mensaje" cols="30" rows="8" require></textarea>
                            
                        <button>Send</button>

                       <div class="data-icon">
                            <p>Universidad de cartagena, sede piedra bolivar</p>
                        </div>
                        <div class="data-icon">
                            <p>+57 304 360 3419</p>
                        </div>
                        <div class="data-icon">
                            <p>+57 305 442 0591</p>
                        </div>
                    </form>
                </div>
                <div class="cont-back">
                </div>
            </div>
        </div>
        
    </main>

    <footer>
        <div class="derechos">
            <p>Todos los derechos reservados</p>
        </div>
        <div class="contacto">
            <i class="btn-contact">Contacto</i>
        </div>
        
    </footer>

    <script src="js/show-vent.js" defer></script>
</body>
</html>
