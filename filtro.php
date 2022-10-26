<?php
//get form data and send to mysql database
//connection variables
include_once 'config.php';


// Create connection - OOP
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection - OOP
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//recibe datos inputs

$minimo = $_POST['minimo'];
$maximo = $_POST['maximo'];
$radio = $_POST['canthabitacion'];
$tipo = $_POST['tipo'];


//insert form data into database

if($radio >= 4){
    $sql = "SELECT * FROM publicacion WHERE (Cant_Habitaciones >= '$radio' ) AND (Valor BETWEEN '$minimo' AND '$maximo') AND (Tipo_Arriendo = '$tipo') ";
}else if($radio < 4 && $minimo > 0 && $maximo > 0){
    $sql = "SELECT * FROM publicacion WHERE (Cant_Habitaciones = '$radio' ) AND (Valor BETWEEN '$minimo' AND '$maximo') AND (Tipo_Arriendo = '$tipo')";
}else{
    $sql = "SELECT * FROM publicacion";
}


$result = $conn->query($sql);
$response = array();

while($row = mysqli_fetch_assoc($result)){
    $response['titulo'] = $row['Titulo_Arriendo'];
    $response['direccion'] = $row['Direccion'];
    $response['canthab'] = $row['Cant_Habitaciones'];
    $response['valor'] = $row['Valor'];
}

exit(json_encode($response));

$conn->close();
