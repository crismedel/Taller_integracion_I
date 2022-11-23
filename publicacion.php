<?php

session_start();

if(!isset($_SESSION["inicio"]) || $_SESSION["inicio"] !== true){
    $cuenta = "<a href='./registro/login.php' class='boton-sesion'>Iniciar Sesión</a>";
} else {
    $cuenta = "<a href='./registro/logout.php' class='boton-sesion'>Cerrar Sesión</a><br><a href='./publicacion.php' class='boton-sesion'>Crear Publicación</a><a href='./miperfil.php' class='boton-sesion'>Mi Perfil</a>";
}

?>
<!DOCTYPE html>
<html lang="es">
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
            <input id="barra-buscador" type="search" placeholder="Buscar Arriendos..">
            <input id="boton-buscador" type="image" src="img/lupa.png">
        </nav>
    </header>

    <main>
        
    </main>
        
</body>
</html>