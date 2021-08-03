<?php 
   session_start();
    require_once './php/conexion.php';

 

    if(isset($_SESSION['usuario'])){

        $query = "SELECT * FROM usuarios";
        $ejecutar = mysqli_query($conexion, $query);

        while($linea = mysqli_fetch_array($ejecutar)){
            if($linea['correo'] == $_SESSION['usuario']){
 
                $id = $linea['id'];
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

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unifondos</title>
    <link rel="stylesheet" href="css/main.css?1.7">
    <link rel="stylesheet" href="css/participations.css?1.6">
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

            <div class="contenedor">
                <h2>Tus participaciones</h2>
                
                <p>Aquí podrás ver los sorteos en los que participaste y estás participando</p>

                <div class="cards">

                    <?php
                    $query = "SELECT * FROM participaciones";
                    $ejecutar = mysqli_query($conexion, $query);
                        
                    while($linea = mysqli_fetch_array($ejecutar)){
                        if($linea['id_participante'] == $id){

                            $id_st = $linea['id_sorteo'];
                            $numero = $linea['numero'];
                            
                            $query = "SELECT * FROM sorteos";
                            $run = mysqli_query($conexion, $query);

                            while($linea = mysqli_fetch_array($run)){
                                if($linea['id'] == $id_st){

                                    $nombre_st = $linea['nombre'];
                                    $fecha = $linea['fecha'];
                                    $info = $linea['info'];
                                    $ganador = $linea['ganador'];
                                    $estado = $linea['estado'];
                                }
                            }

                            if($estado == 1){
                                echo '<div class="card">';
                                $textE = "En Curso";
                            }
                            else{
                                echo '<div class="card close-lot">';
                                $textE = "Finalizado";
                            }

                        ?>
                        <a class="cont-card">
                            <img src="img/foto5.png" alt="">
                            
                                <div class="info">
                                    <h3 class="title-sorteo"><?php echo $nombre_st ?></h3>
                                    <p><?php echo $fecha." - ".$textE ?></p>
                                    <p><?php echo $info ?></p>
                                    <?php echo "Numero: ".$numero ?></p>
                                    <?php if($estado == 0) echo "Ganador: ".$ganador ?></p>
                                </div>
                        </a>
                    </div>
                        <?php
                        }
                    }
                    ?>
                    
                </div>
            </div>

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
