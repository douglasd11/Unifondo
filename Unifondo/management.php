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
    <link rel="stylesheet" href="css/main.css?1.2">
    <link rel="stylesheet" href="css/management.css?1.2">
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
                <h2>Tus Sorteos</h2>
                
                <p>Aquí podrás administrar tus sorteos, finalizarlos y/o ver los fondos recaudados</p>

                <div class="cards">

                <?php
                    $query = "SELECT * FROM sorteos";
                    $ejecutar = mysqli_query($conexion, $query);
                        
                    while($linea = mysqli_fetch_array($ejecutar)){
                        if($linea['id_organizador'] == $id){

                            $id_st = $linea['id'];
                            $nombre = $linea['nombre'];
                            $fecha = $linea['fecha'];
                            $info = $linea['info'];
                            $estado = $linea['estado'];
                            $total = $linea['total'];
                            $part = $linea['participantes'];
                            $ganador = $linea['ganador'];
                            
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
                            <h3 class="title-sorteo"><?php echo $nombre ?></h3>

                                <div class="info">
                                <p><?php echo "Fecha: ".$fecha ?></p>
                                <p><?php echo "Estado: ".$textE ?></p>
                                <p><?php echo "Informacion: ".$info ?></p>
                                <?php echo "Recaudado: ".$total ?></p>
                                <?php if($estado == 1){
                                ?>
                                    <a id="btn-finalizar" href="php/end_lottery.php?id_st=<?php echo $id_st?>&part=<?php echo $part?>">Finalizar</a>
                                <?php
                                }else{
                                ?>
                                    <?php echo "Ganador: ".$ganador ?></p>
                                <?php
                                }
                                ?>
                                
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
