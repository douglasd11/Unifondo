<?php 

    session_start();

    if(isset($_SESSION['usuario'])){
        echo '
            <script>
                window.location = "home.php";
            </script>
        ';
    }
    else{
        session_destroy();
    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unifondos</title>
    <link rel="stylesheet" href="css/main.css?1.6">
    <link rel="stylesheet" href="css/index.css?1.6">
</head>
<body>
    <header>
        <nav>
            <div class="cont-logo">
                <img src="img/logoUni.png" alt="">
                <h1>UNIFONDOS</h1>
            </div>
            <ul>
                <li><i class="btn-login">Ingresar</i></li>
                <li><i class="btn-register" id="btn-crear">Crear cuenta</i></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="cont-portada">
            <div class="portada">
                <h2 id="text1">CREA AQUI</h2>
                <h2 id="text2">TUS PROPIOS</h2>
                <h2 id="text3">SORTEOS</h2>

                <button class="btn-login2">Ingresar</button>
            </div>
        </section>
        <section class="paneles">

            <div class="cont-login">
                <div class="marco">

                    <div class="cont-main">
                        <div class="cont-head">
                            <button class="close-login">X</button>
                        </div>

                        <form action="php/login.php" method="POST">
                            <h2>Iniciar Sesión</h2>
                            <input type="email" name="email" placeholder="Correo electronico" required>
                            <input type="password" name="clave" placeholder="Contraseña" required>
    
                            <button>Iniciar sesión</button>
    
                            <p>¿Aún no tienes una cuenta?</p>
                            <p onclick="cambiar()" style="cursor: pointer; color: white">Registrate</p>
                        </form>
                    </div>

                    <div class="cont-back">
                    </div>
                </div>
            </div>

            <div class="cont-register">
                <div class="marco">

                    <div class="cont-main">
                        <div class="cont-head">
                            <button class="close-register">X</button>
                        </div>

                        <form action="php/register.php" method="POST">
                            <h2>Registrarse</h2>
                            <input type="text" name="name" placeholder="Nombre" required>
                            <input type="text" name="lastname" placeholder="Apellido" required>
                            <input type="text" name="tel" placeholder="Número telefónico" required>
                            <input type="email" name="email" placeholder="Correo electrónico" required>
                            <input type="password" name="clave" placeholder="Contraseña" required>
                            <label class="input-check"><input id="check" type="checkbox" value="1" name="check" required>Estudiante</label> 
    
                            <button>Registrarse</button>
    
                            <p>¿Ya estás registrado?</p>
                            <p onclick="cambiar()" style="cursor: pointer; color: white">Iniciar sesión</p>
                        </form>
                    </div>
                    <div class="cont-back">
                    </div>
                </div>
            </div>

            <div class="cont-contact">
                <div class="marco">

                    <div class="cont-main">
                        <div class="cont-head">
                            <button class="close-contact">X</button>
                        </div>

                        <form action="php/correo.php" method="POST">
                            <h2>Contactanos</h2>
                            <input type="text" name="name" placeholder="Nombre Completo" required>
                            <input type="text" name="email" placeholder="Correo electrónico" required>
                            <textarea name="message" placeholder="Déjanos tu mensaje" cols="30" rows="8" required></textarea>
                            
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

        </section>

    </main>

    <footer>
        <div class="derechos">
            <p>Todos los derechos reservados</p>
        </div>
        
        <div class="contacto">
            <i class="btn-contact">Contacto</i>
        </div>
        
    </footer>

    <script>
        function cambiar(){
            menu_items = document.querySelector('.cont-login');
            menu_items.classList.toggle('show-ventana');

            menu_items = document.querySelector('.cont-register');
            menu_items.classList.toggle('show-ventana');
        }
    </script>
    <script src="js/show-vent.js?2.0" defer></script>
</body>
</html>