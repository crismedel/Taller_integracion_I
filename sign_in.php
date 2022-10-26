<?php

    include ('conexion.php');

    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['Contraseña'];
    $query = "INSERT INTO cuenta(Nombre, Apellido, Correo, Contraseña)
                VALUES('$Nombre','$Apellido','$Correo','$Contraseña')";

    $ejecutar = mysqli_query($db, $query);
    
?>