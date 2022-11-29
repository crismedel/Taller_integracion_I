<?php

session_start();


if(!isset($_SESSION["inicio"]) || $_SESSION["inicio"] !== true){
    $cuenta = "<a href='./registro/login.php' class='boton-sesion'>Iniciar Sesión</a>";
} else {
    $cuenta = "<a href='./registro/logout.php' class='boton-sesion'>Cerrar Sesión</a><br><a href='./subir_publicacion.php' class='boton-sesion'>Crear Publicación</a><a href='./miperfil.php' class='boton-sesion'>Mi Perfil</a>";
}

require_once "Conex.inc";

$arriendos = header("locate: Arriendos.php");

$boton = "";

$Lista="SELECT * FROM publicacion";
$show = mysqli_query($db, $Lista);

if(isset($_GET['filtrar'])){

    if(empty($_GET["minimo"])){
        $valor_min = "Valor > 0";
    } else {
        $valor_min = "Valor >= ".trim($_GET['minimo']);
    }

    if(empty($_GET['maximo'])){
        $valor_max = "Valor < 700000000";
    } else {
        $valor_max = "Valor <= ".trim($_GET['maximo']);
    }

    if(isset($_GET['tipo_vivienda'])){
        $tipo_arriendo = "AND Tipo_Arriendo = '".trim($_GET['tipo_vivienda'])."'";
    } else {
        $tipo_arriendo = "";
    }

    if(isset($_GET['cant_hab'])){
        $cant_hab = "AND Cant_Habitaciones ".trim($_GET['cant_hab']);
    } else {
        $cant_hab = "";
    }

    if(empty($_GET["minimo"]) && empty($_GET["maximo"]) && empty($_GET["tipo_vivienda"]) && empty($_GET["cant_hab"])){
        $boton = "";
    } else {
        $lista_filtro = "SELECT * FROM publicacion WHERE $valor_min AND $valor_max $tipo_arriendo $cant_hab";
        $show = mysqli_query($db, $lista_filtro);
    
        $boton = "<input id='boton_lista' onclick='$arriendos' type='submit' value='Quitar Filtro'>";
    }

    
}

if(isset($_GET['buscar'])){
    $busqueda = $_GET['busqueda'];

    $lista_busqueda = "SELECT * FROM publicacion where Titulo_Arriendo LIKE '%$busqueda%' OR Direccion LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%'";
    $show = mysqli_query($db, $lista_busqueda);

    $boton = "<input id='boton_lista' onclick='$arriendos' type='submit' value='Quitar buscador de: $busqueda'>";
}

$db->close();
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
            <?php echo $cuenta; ?>
            <form action="" method="get">
                <input id="barra-buscador" name="busqueda" type="search" placeholder="Buscar Arriendos...">
                <input id="boton-buscador" name="buscar" type="submit">
            </form>
        </nav>
    </header>

    <main>
        <div class="main-div">
            <div class="filtros">
                <form id="form-filtro" action="" method="get">
                    <h2>Filtros</h2>
                    <?php echo $boton; ?>
                    <div class="flex-divcolumn-filtros">
                        <span>Rango de precio</span>
                    </div>

                    <div class="flex-divrow-filtros">
                        <input type="number" name="minimo" class="input_minimo" min="0"  placeholder="Minimo">
                        <input type="number" name="maximo" class="input_maximo" min="150000" placeholder="Máximo">
                    </div>

                    <div class="flex-divrow-filtros">
                        <span>Tipo de vivienda</span>
                    </div>

                    <div class="flex-filtros-boton">
                        <input type="radio" id="Departamento" name="tipo_vivienda" value="Departamento">
                        <label for="Departamento"><img src="img/inicio.svg" alt=""><br><span>Departamento</span></label>
                        <input type="radio" id="Casa" name="tipo_vivienda" value="Casa">
                        <label for="casa"><img src="img/inicio.svg" alt=""><br><span>Casa</span></label>
                        <input type="radio" id="Habitacion" name="tipo_vivienda" value="Habitacion">
                        <label for="habitacion"><img src="img/inicio.svg" alt=""><br><span>Habitacion</span></label>
                    </div>
                    <div class="flex-divcolumn-filtros">
                        <div class="flex-divcolumn-filtros">
                            <span>Cantidad Habitaciones</span>
                            <div class="flex-divrow-filtros">
                                <input type="radio" name="cant_hab" id="1_Hab" value="=1">
                                <label for="valor-1">1</label>
                                <input type="radio" name="cant_hab" id="2_Hab" value="=2">
                                <label for="valor-2">2</label>
                                <input type="radio" name="cant_hab" id="3_Hab" value="=3">
                                <label for="valor-3">3</label>
                                <input type="radio" name="cant_hab" id="mas_Hab" value=">3">
                                <label for="valor-mas">Más</label>
                            </div>
                        </div>
                        <div class="flex-divcolumn-filtros">
                            <input type="submit" id="cargar-resultados" name="filtrar" value="Filtrar"><br>
                            <input type="reset" id="reiniciar_filtro" value="Restablecer">
                        </div>
                    </div>
                </form>
            </div>

            <div class="main-div-publicaciones">
                <div class="grid-div-publicaciones">
                    <?php
                    $numeros = mysqli_num_rows($show);

                    if($numeros == 0){
                        echo "<h1>No se han encontrado resultados</h1>";
                    } else {
                        while($row = mysqli_fetch_array($show)){
                            $publicacion = 'location.href="publicacion.php?id='.$row['ID_Publicacion'].'"';
                            echo '<div onclick='.$publicacion.' id='.$row['ID_Publicacion'].'><div class="imagen-publicacion">
                                    <img src="img/inicio.svg" alt="">
                                </div>';
                            echo '<div class="info-publicacion">
                                    <p>'.$row['Titulo_Arriendo'].'</p>
                                    <p>'.$row['Tipo_Arriendo'].'</p>
                                    <p>$'.$row['Valor'].'</p>
                                    <p>'.$row['Cant_Habitaciones'].' Habitación(es)</p>
                                </div></div>';
                        }
                    }
                    ?>
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
</body>
</html>