<?php

session_start();

if(!isset($_SESSION["inicio"]) || $_SESSION["inicio"] !== true){
    $cuenta = "<a href='./registro/login.php' class='boton-sesion'>Iniciar Sesión</a>";
} else {
    $cuenta = "<a href='./Perfil/miperfil.php' class='boton-sesion'>Mi Perfil</a>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><!--codificacion de caracteres-->
    <meta name="robots" content="noindex"><!-- buscar mas metas de busqueda de robots-->
    <meta name="description" content="Proyecto ">  <!-- descripcion de la pagina, aparece cuando se busca la pagna-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'><!--iconos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe:ital@0;1&family=Sansita&display=swap" rel="stylesheet">
    
    <title>Arriendos universitarios Temuco</title>

</head>
<body>

    <header class="header" id="inicio">

        <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
        <img src="img/home.svg" alt="" class="house" ><!--icono del menu -->
        <nav class="menu-navegacion">
            <a href="index.php"><lord-icon src="https://cdn.lordicon.com/kxoxiwrf.json" trigger="loop" style="width:30px;height:30px"></lord-icon>Inicio</a>
            <a href="./Arriendos/Arriendos.php">Arriendos<lord-icon src="https://cdn.lordicon.com/alnsmmtf.json"trigger="loop" colors="primary:#4be1ec,secondary:#a866ee" style="width:32px;height:32px"></lord-icon></a>
            <a href="Soporte.php"><lord-icon src="https://cdn.lordicon.com/hursldrn.json" trigger="loop" delay="500" colors="primary:#5fffff,secondary:#FF00FF" stroke="30"style="width:32px;height:32px"></lord-icon>Soporte</a> 
            <a href="#equipo">Equipo<lord-icon src="https://cdn.lordicon.com/dqxvvqzi.json" trigger="loop" colors="outline:#FF00FF,primary:#d1e3fa,secondary:#5fffff" state="morph-group" style="width:32px;height:32px"></lord-icon></a>
            <a href="#contacto"><lord-icon src="https://cdn.lordicon.com/sdhhsgeg.json" trigger="loop" colors="primary:#4be1ec,secondary:#a866ee" stroke="70" style="width:40px;height:40px"></lord-icon>Contacto</a>
            <?php echo $cuenta; ?>
        </nav>
        <div class="contenedor head">
            <h1 class="titulo">Arrriendos universitarios Temuco </h1>
            <p class="copy">¡Desde la comodidad de tu hogar busca tu arriendo ideal!</p>
        </div>

    </header>
    <main>

        <!--seccion de produccion y servicios poner una foto adecuada a la empresa de tecnologia de imagenes y añadirle texto coherente a ello-->
    <section class="contenedor" id="sugerencias">
     <h2 class="subtitulo">Sugerencias</h2>
     <div class="contenedor-sugerencias">
        <img src="img/arriendo.svg" alt="">
        <div class="a-sugerencias">
            <div class="b-sugerencias">
                <h3 class="n-sugerencia"> <span class="number"> 1 </span>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Excepturi consectetur aliquam beatae. Repudiandae, repellendus
                 deserunt ut nesciunt aperiam quaerat minus.</p>
            </div>
            <div class="b-sugerencias">
                <h3 class="n-sugerencia"> <span class="number"> 2 </span>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Excepturi consectetur aliquam beatae. Repudiandae, repellendus
                 deserunt ut nesciunt aperiam quaerat minus.</p>
            </div>
            <div class="b-sugerencias">
                <h3 class="n-sugerencia"> <span class="number"> 3 </span>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Excepturi consectetur aliquam beatae. Repudiandae, repellendus
                 deserunt ut nesciunt aperiam quaerat minus.</p>
            </div>
        </div>
     </div>
    </section>
        <!--seccion de quienes somos, agregar fotos de arriendos o imagenes de piezas -->
      <section class="qs" id="piezas">
        <div class="contenedor">
            <h2 class="subtitulo"> piezas</h2>
            <div class="contenedor-qs">
                <img src="img/uno.jpg" alt="" class="img-qs">
                <img src="img/dos.jpg" alt="" class="img-qs">
                <img src="img/tres.jpg" alt="" class="img-qs">
              
            </div>
        </div>
       </section> 
       
       <!-- equis de galeria-->
        <section class="imagen-close">
        <img src="img/close.svg" alt="" class="close">
        <img src="" alt="" class="agregar-imagen">
       </section>

       <!--seccion del equipo-->

       <section class="contenedor" id="equipo">
        <h2 class="subtitulo">Equipo</h2>
        <section class="equipo">
        
        <div class="cont-equipo">
            <img src="img/cuatro.gif" alt="" >
            
             <ul class="n-equipo"><li>Deyanira Sepúlveda</li>
             <li>Nataly Huaiquinao</li>
             <li>Jeferson Placensia</li>
             <li>Tomas Curihual</li>
             <li>Cristobal Medel</li>
             <li>Sion Arancibia</li>
            </ul> 
                         
        </div>
        </section>
       </section>
       <section  id="contacto" class="form-contact">
       
       <a  style="color:transparent"href="Soporte.php"><input id="soporte" type="submit" value="¡SOPORTE!" ></a>
        
       </section>
    </main>
  
    <footer id="contacto">
        <div class="contenedor footer-content">
            <div class="contact-us">
                <h2 class="Marca">Proyecto Semestral</h2>
             <p> Taller de integracion I</p>
            </div>
            <div class="social-media">
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-whatsapp bx-tada'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-facebook bx-tada'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-instagram bx-tada'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-twitter bx-tada'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-linkedin bx-tada'></i>
                </a>
            </div>
        </div>
        <div id="line"></div>
    </footer>
   
  <script src="js/hoja.js"></script>  
</body>


</html>