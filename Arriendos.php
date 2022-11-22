<?php

session_start();

if(!isset($_SESSION["inicio"]) || $_SESSION["inicio"] !== true){
    $cuenta = "<a href='./registro/login.php' class='boton-sesion'>Iniciar Sesión</a>";
} else {
    $cuenta = "<a href='./registro/logout.php' class='boton-sesion'>Cerrar Sesión</a><br><a href='./publicacion.php' class='boton-sesion'>Crear Publicación</a>";
}

require_once "Conex.inc";

$sql="SELECT * FROM publicacion";
$show = mysqli_query($db, $sql);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    

    $valor_min = trim($_POST["minimo"]);
    $valor_max = trim($_POST["maximo"]);
    $tipo_arriendo = trim($_POST["tipo_vivienda"]);
    $cant_hab = trim($_POST["Cant_Hab"]);

    $sql = "SELECT * FROM 'publicacion' WHERE Valor < ? AND Valor > ? and Tipo_Arriendo = ? Cant_Habitaciones = ?";

    if($stmt = $db->prepare($sql)){
        $stmt->bind_param("iisi", $param_valor_min, $param_valor_max, $param_tipo_arriendo, $param_cant_hab);

        $param_valor_min = $valor_min;
        $param_valor_max = $valor_max;
        $param_tipo_arriendo = $tipo_arriendo;
        $param_cant_hab = $cant_hab;

        if($stmt->execute()){
            header("location: Arriendos.php");
        } else {
            echo "Ocurrió un error. Inténtelo mmás tarde.";
        }

        $stmt->close();
    }
}

if(isset($_GET['buscar'])){
    $busqueda = $_GET['busqueda'];

    $sql = "SELECT * FROM publicacion where Titulo_Arriendo LIKE '%$busqueda%' OR Direccion LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%'";
    $show = mysqli_query($db, $sql);
}
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
                <input id="boton-buscador" name="buscar" type="submit" src="img/lupa.png">
            </form>
        </nav>
    </header>

    <main>
        <div class="main-div">
            <div class="filtros">
                <form id="form-filtro" action="" method="POST">
                    <h2>Filtros</h2>

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
                                <input type="radio" name="Cant_Hab" id="1_Hab" value="1">
                                <label for="valor-1">1</label>
                                <input type="radio" name="Cant_Hab" id="2_Hab" value="2">
                                <label for="valor-2">2</label>
                                <input type="radio" name="Cant_Hab" id="3_Hab" value="3">
                                <label for="valor-3">3</label>
                                <input type="radio" name="Cant_Hab" id="mas_Hab" value=">4">
                                <label for="valor-mas">Más</label>
                            </div>
                        </div>
                        <div class="flex-divcolumn-filtros">
                            <input type="submit" id="cargar-resultados" value="Filtrar"><br>
                            <input type="reset" id="reiniciar_filtro" value="Restablecer">
                        </div>
                    </div>
                </form>
            </div>

            <div class="main-div-publicaciones">
                <div class="grid-div-publicaciones">
                    <?php
                    
                    while($row = mysqli_fetch_array($show)){
                        echo '<div class="imagen-publicacion">
                                <img src="img/inicio.svg" alt="">
                              </div>';
                        echo '<div class="info-publicacion">
                                <p>'.$row['Titulo_Arriendo'].'</p>
                                <p>'.$row['Tipo_Arriendo'].'</p>
                                <p>$'.$row['Valor'].'</p>
                                <p>'.$row['Cant_Habitaciones'].' Habitación(es)</p>
                              </div>';
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