<?php
    $host = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "integracion1";
    $db = mysqli_connect($host,$username,$dbpassword,$dbname);
    if($db){
        echo 'Conectado';
    }else{
        echo 'No conectado';
    }
?>