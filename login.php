<?php
    include('conexion.php');

    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['Contraseña'];
    $query = "SELECT * FROM cuenta WHERE Correo = '$Correo' and
                Contraseña = '$Contraseña'";

    $validar_login = mysqli_query($db, $query);

    if(mysqli_num_rows($validar_login) > 0){
        header("location: usuarios.html");
    }else{
        echo '
            <script>
                alert("Usuario no encontrado");
            </script>
        ';
    }
?>