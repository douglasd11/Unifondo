<?php 
    session_start();
    require_once './php/conexion.php';
    
    if(isset($_SESSION['usuario'])){
     
        $query = "SELECT * FROM usuarios";
        $ejecutar = mysqli_query($conexion, $query);

        $cont = 0;
        while($linea = mysqli_fetch_array($ejecutar)){
            if($linea['correo'] == $_SESSION['usuario']){
 
                $id = $linea['id'];
                $nombre = $linea['nombre'];
                $estudiante = $linea['estudiante'];
                $cont++;
            }
        }
        if($cont = 0){
            echo '
                <script>
                    window.location = "../index.php";
                </script>
            ';
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
    <link rel="stylesheet" href="css/home.css?1.2">
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
        <section class="home-menu">
            <div class="caja" style="background-image: url('img/foto2.png')">
                <a href="create.php">Crea Tu Sorteo</a>
            </div>
            
            <div class="caja" style="background-image: url('img/foto3.png')">
                <a href="raffles.php">Participa</a>
            </div>

            <div class="caja" style="background-image: url('img/foto4.png')">
                <a href="management.php">Tus Sorteos</a>
            </div>

            <div class="caja" style="background-image: url('img/foto5.png')">
                <a href="participations.php">Tus Participaciones</a>
            </div>
        </section>

        <div class="cont-contact">
            <div class="marco">

                <div class="cont-main">
                    <div class="cont-head">
                        <button class="close-contact">X</button>
                    </div>

                    <form action="php/correo.php" method="POST">
                        <h2>Contactanos</h2>
                        <input type="text" name="name" placeholder="Nombre Completo" require>
                        <input type="text" name="email" placeholder="Correo electrónico" require>
                        <textarea name="message" placeholder="Déjanos tu mensaje" cols="30" rows="8" require></textarea>
                            
                        <button>Send</button>

                       <div class="data-icon">
                            <p>Universidad de cartagena, sede Piedra Bolívar</p>
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