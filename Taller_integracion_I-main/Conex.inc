<?php
   $servidor = "localhost";
   $user     = "root";
   $password = "";
   $basedato = "pagina_web";
   $db = mysqli_connect($servidor, $user, $password, $basedato);

   if(!$db) {
         echo "Error de conexión a la BD";
         exit();
   }
?>