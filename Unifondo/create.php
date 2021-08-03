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
    <link rel="stylesheet" href="css/main.css?1.8">
    <link rel="stylesheet" href="css/create.css?1.8">
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
            
            <form action="php/create_be.php?id=<?php echo $id ?>" method="POST">
                <h2>Crear un sorteo</h2>
                <p>Aquí puedes crear tu sorteo para que las personas puedan participar en el</p>

                <input type="text" name="name" placeholder="Nombre del sorteo" required>
                
                <div class="cont-date">
                    <label for="date">Fecha del sorteo</label>
                    <input id="input-date" type="date" name="date" required>
                </div>
               
                <textarea name="message" id="" cols="30" rows="3" placeholder="Motivo de tu sorteo" required></textarea>
                <input type="number" name="participantes" placeholder="Cantidad de participantes" required>
                <input type="number" name="price" placeholder="Valor del número" required>
                <input type="text" name="prize" placeholder="Premio" required>
                <input type="text" name="pago" placeholder="Método de pago" required>

                <button>Crear Sorteo</button>
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