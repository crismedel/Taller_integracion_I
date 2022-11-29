<?php

//get form data and send to mysql database
//import connection variables
include_once '../Conex.inc';
session_start();
// Create connection - OOP
$conn = new mysqli($servidor, $user, $password, $basedato);

// Check connection - OOP
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);          
}

$nombre_nuevo = $_POST["nombrenuevo"];
$apellido_nuevo = $_POST["apellidonuevo"];
$numero_nuevo = $_POST["numeronuevo"];

if(isset($_SESSION["inicio"])){
    $idusuario = $_SESSION["ID"];
    $sql = "UPDATE cuenta SET Nombre='$nombre_nuevo',Apellido='$apellido_nuevo',Num_Contacto='$numero_nuevo' WHERE ID_Cuenta='$idusuario'";
    $result = $conn->query($sql);
}

$response = array();
if ($result) {
    $_SESSION["Nombre"] = $nombre_nuevo;
    $_SESSION["Apellido"] = $apellido_nuevo;
    $_SESSION["numero"] = $numero_nuevo;
    echo "<script> alert('Se editaron los datos correctamente.'); location.href='miperfil.php'</script>";
} else {
    echo "<script> alert('Hubo un error, intentelo más tarde.'); location.href='miperfil.php'</script>";
}

$conn->close();