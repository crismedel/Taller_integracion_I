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
    <link rel="stylesheet" href="css/miperfil-estilos.css">
    <title>Perfil De Usuario</title>
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
        <div id="miperfil-div-principal">

            <!--Apartado izquierdo de la pagina (informacion actual del usuario)-->
            <div id="contenedor-foto-perfil">
                <img src="./img/lupa.png" alt="">
            </div>
            <div id="contenedor-datos-usuario">
                <p>  <?php	echo "Nombre: " . $_SESSION["Nombre"]?>  </p>
                <p><?php	echo "Apellido: " . $_SESSION["Apellido"]?></p>
                <p><?php	echo "Fecha De Nacimiento: " . $_SESSION["Fecha_Nacimiento"]?></p>
                <p><?php	echo "Correo Electronico: " . $_SESSION["Correo"]?></p>
                <p><?php	echo "Numero: " . $_SESSION["Num_Contacto"]?></p>

            </div>
            <div id="contenedor-link-favoritos">
                <a href="#">Lista de Favoritos</a>
            </div>

            <!--Apartado derecho de la pagina (editar informacion actual del usuario)-->
            <div id="contenedor-editar-informacion">
                <form action="" id="editar-informacion-formulario" method="post">
                    <label for="nombre-nuevo">Cambiar Nombre</label>
                    <input type="text" name="nombre-nuevo">
                    <label for="nombre-nuevo">Cambiar Apellido</label>
                    <input type="text" name="apellido-nuevo">
                    <label for="nombre-nuevo">Cambiar Fecha De Nacimiento</label>
                    <input type="text" name="fechadenacimiento-nuevo">
                    <label for="nombre-nuevo">Cambiar Número</label>
                    <input type="text" name="numero-nuevo">
                    <label for="nombre-nuevo">Cambiar Contraseña</label>
                    <input type="text" name="contrasena-nuevo">
                    <div>___________________________________</div>
                    <input type="submit" name="enviar" value="Aplicar Cambios" id="submit-nuevosdatos-usuario">
                </form>
            </div>

            <div id="info-extra">
                <p>* Recuerda mantener actualizados tus datos y no compartas tu información personal con extraños. En caso de que necesites ayuda contacta con nosotros en la sección "Soporte" * </p>
            </div>

        </div>
    </main>
        
</body>
</html>