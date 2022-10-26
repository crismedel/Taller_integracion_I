<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Arriendos-estilos.css">
    <title>Arriendos</title>
</head>

<body>   
    <header>
        <nav class="menu">
            <a href="Index.php">Inicio</a>
            <a href="Arriendos.php">Arriendos</a> 
            <a href="Soporte.php">Soporte</a>
            <a href="./registro/login.php" class="boton-sesion">Iniciar Sesión</a>
            <input id="barra-buscador" type="search" placeholder="Buscar Arriendos..">
            <input id="boton-buscador" type="image" src="img/lupa.png">
        </nav>
    </header>

    <main>
        <div class="main-div">
            <div class="filtros">
                <h2>Filtros</h2>

                <div class="flex-divcolumn-filtros">
                    <span>Rango de precio</span>
                </div>

                <div class="flex-divrow-filtros">
                    <input type="text" placeholder="Min">
                    <span>-</span>
                    <input type="text" placeholder="Max">
                </div>

                <div class="flex-divrow-filtros">
                    <span>Tipo de vivienda</span>
                </div>

                <div class="flex-filtros-boton">
                    <button>
                        <div>
                            <img src="img/inicio.svg" alt="">
                        </div>
                        <span>Departamento</span>
                    </button>
                    <button>
                        <div>
                            <img src="img/inicio.svg" alt="">
                        </div>
                        <span>Casa</span>
                    </button>
                    <button>
                        <div>
                            <img src="img/inicio.svg" alt="">
                        </div>
                        <span>Pieza</span>
                    </button>
                    
                </div>
                <div class=".flex-divcolumn-filtros">
                    <div class="flex-divcolumn-filtros">
                        <span>Cantidad Habitaciones</span>
                        <div class="flex-divrow-filtros">
                            <span>1</span>
                            <input type="radio" name="" id="">
                            <span>2</span>
                            <input type="radio" name="" id="">
                            <span>3</span>
                            <input type="radio" name="" id="">
                            <span>otro</span>
                            <input type="radio" name="" id="">
                        </div>
                    </div>
                    <div class="flex-divcolumn-filtros">
                        <button id="cargar-resultados">
                            <span>Cargar Resultados</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="main-div-publicaciones">
                <div class="grid-div-publicaciones">
                    <div class="imagen-publicacion"> <!--aqui se iran añadiendo las publicaciones esto es temporal-->
                        <img src="img/inicio.svg" alt="">
                    </div>
                    <div class="info-publicacion">
                        <p>Se arrienda departamento en fundo el carmen</p>
                        <p>Departamento</p>
                        <p>300000</p>
                        <p>1 habitacion</p>
                    </div>
                    <div class="imagen-publicacion">
                        <img src="img/inicio.svg" alt="">
                    </div>
                    <div class="info-publicacion">
                        <p>Se arrienda departamento en fundo el carmen</p>
                        <p>Departamento</p>
                        <p>300000</p>
                        <p>1 habitacion</p>
                    </div>
                    <div class="imagen-publicacion">
                        <img src="img/inicio.svg" alt="">
                    </div>
                    <div class="info-publicacion">
                        <p>Se arrienda departamento en fundo el carmen</p>
                        <p>Departamento</p>
                        <p>300000</p>
                        <p>1 habitacion</p>
                    </div>
                </div>
            </div>
        </div>




        <div class="contenedor-popup">
            <div class="ventana-emergente-login">
                <div class="flex-divrow-popup">
                    <p>Iniciar Sesion</p>
                    <button class="cerrar-login">
                        <img src="img/x.png" alt="">
                    </button>
                </div>
                <form action="">
                    <input type="text" placeholder="Correo Electronico" required>
                    <input type="password" placeholder="Contraseña" required>
                </form>
                <div class="flex-divrow-popup">
                    <a href="">Crear Cuenta</a>
                </div>
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
    <script src="js/popup.js"></script>
</body>
</html>