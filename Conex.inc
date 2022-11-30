<?php
   $servidor = "db.inf.uct.cl";
   $user     = "A2022_tcurihual";
   $password = "A2022_tcurihual";
   $basedato = "A2022_tcurihual";
   $db = mysqli_connect($servidor, $user, $password, $basedato);

   if(!$db) {
         echo "Error de conexión a la BD";
         exit();
   }
?>