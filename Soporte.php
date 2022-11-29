<?php

session_start();

if(!isset($_SESSION["inicio"]) || $_SESSION["inicio"] !== true){
    $cuenta = "<a href='../registro/login.php' class='boton-sesion'>Iniciar Sesión</a>";
} else {
    $cuenta = "<a href='../registro/logout.php' class='boton-sesion'>Cerrar Sesión</a>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Soporte-estilos.css">
    <title>Soporte</title>
</head>
<body>
    <header>
        <nav class="menu">
            <a href="Index.php">Inicio</a>
            <a href="./Arriendos/Arriendos.php">Arriendos</a> 
            <a href="Soporte.php">Soporte</a>
            <?php echo $cuenta; ?>
            <input id="barra-buscador" type="search" placeholder="Buscar Arriendos..">
            <input id="boton-buscador" type="image" src="img/lupa.png">
        </nav>
    </header>

    <main>

        <div class="main-div-soporte">
            <div class="flex-divrow-soporte">
                    <form action="" id="formulario-soporte">
                        <label for="correo">Correo Electronico</label>
                        <input id="correo" type="email" required>
    
                        <label for="eleccion-soporte">¿Cual es el motivo del mensaje?</label>
                        <select name="" id="eleccion-soporte">
                            <option value="sugerencia">Sugerencia</option>
                            <option value="denuncia">Denuncia</option>
                            <option value="testimonio">Testimonio</option>
                            <option value="otro">Otro</option>
                        </select>

                        <label for="asunto">Asunto</label>
                        <input id="asunto" type="text">
                        <label for="mensaje">Mensaje</label>
                        <textarea name="" id="mensaje"></textarea>

                        <input type="submit" value="Enviar">
                  </form>
            </div>
        </div>

    </main>
    <!--Solucionar el footer-->
    <footer id="contacto">
        <div class="contenedor footer-content">
            <div class="contact-us">
                <h2 class="Marca">Proyecto Semestral</h2>
             <p> Taller de integracion I</p>
            </div>
            <div class="social-media">
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-whatsapp'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-facebook'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-instagram'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-twitter'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-linkedin'></i>
                </a>
            </div>
        </div>
        <div id="line"></div>
    </footer>

</body>
</html>