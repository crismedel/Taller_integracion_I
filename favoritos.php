<?php

session_start();


if(!isset($_SESSION["inicio"]) || $_SESSION["inicio"] !== true){
    header("locate: Index.php");
} else {
    $cuenta = "<a href='./registro/logout.php' class='boton-sesion'>Cerrar Sesión</a><br><a href='./subir_publicacion.php' class='boton-sesion'>Crear Publicación</a><a href='./miperfil.php' class='boton-sesion'>Mi Perfil</a>";
}


require_once "Conex.inc";

$id_cuenta = $_SESSION["ID"];

$consulta = "SELECT publicacion.* , favoritos.ID_Favorito FROM publicacion INNER JOIN favoritos ON publicacion.ID_Publicacion=favoritos.ID_Publicacion WHERE favoritos.ID_Cuenta = $id_cuenta ";
$show = mysqli_query($db, $consulta);



$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Arriendos-estilos.css">
    <title>Mis Favoritos</title>
</head>

<body>   
    <header>
        <nav class="menu">
            <a href="Index.php">Inicio</a>
            <a href="Arriendos.php">Arriendos</a> 
            <a href="Soporte.php">Soporte</a>
            <?php echo $cuenta; ?>
            <form action="" method="get">
                <input id="barra-buscador" name="busqueda" type="search" placeholder="Buscar Arriendos...">
                <input id="boton-buscador" name="buscar" type="submit">
            </form>
        </nav>
    </header>

            <!--PUBLICACIÓN FAVORITA-->
            <div class="main-div-publicaciones">
                <div class="grid-div-publicaciones">
                    <?php
                    $numeros = mysqli_num_rows($show);

                    if($numeros == 0){
                        echo "<h1>No ha guardado ninguna publicación en favoritos</h1>";
                    } else {
                        while($row = mysqli_fetch_array($show)){
                            $publicacion = 'location.href="favoritos.php?id='.$row['ID_Publicacion'].'"';
                            echo '<button onclick='.$publicacion.'><div class="imagen-publicacion">
                                    <img src="img/inicio.svg" alt="">
                                </div>';
                            echo '<div id='.$row['ID_Publicacion'].' class="info-publicacion">
                                    <p>'.$row['Titulo_Arriendo'].'</p>
                                    <p>'.$row['Tipo_Arriendo'].'</p>
                                    <p>$'.$row['Valor'].'</p>
                                    <p>'.$row['Cant_Habitaciones'].' Habitación(es)</p>
                                </div></button>';
                        }
                    }
                    ?>                  
                    <a href="eliminar.php?id=<?php echo $row["$ID_Favoritos"];?>" class="eliminar_favoritos">Eliminar de Favoritos</a>
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

    <script src="js/confirmacion.js"></script>
</body>
</html>