<?php

//get form data and send to mysql database
//import connection variables
include_once 'Conex.inc';
session_start();
// Create connection - OOP
$conn = new mysqli($servidor, $user, $password, $basedato);

// Check connection - OOP
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);          
}

$nombre_nuevo = $_POST["nombre-nuevo"];
$apellido_nuevo = $_POST["apellido-nuevo"];
$nombre_nuevo = $_POST["nombre-nuevo"];
$nombre_nuevo = $_POST["nombre-nuevo"];



//insert form data into database
if(isset($_SESSION["inicio"])){
    $sql = "SELECT * FROM rutina WHERE Idusuario='$Idusuario'";
    $result = $conn->query($sql);
}


$arr = array();
$contador = 0;

while($row = mysqli_fetch_assoc($result)){
    $arr[$contador] = $row;
    $contador += 1;
 }
    


$response = array();
if ($result) {
    $response['success'] = $arr;
    $response['contador'] = $contador;
    exit(json_encode($response));
} else {
    $response['success'] = HTTP_response_code() . $conn->error;
    exit(json_encode($response));
}

$conn->close();