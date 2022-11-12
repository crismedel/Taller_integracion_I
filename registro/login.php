<?php

session_start();

if(isset($_SESSION["inicio"]) && $_SESSION["inicio"] === true){
    header("location: ../index.php");
    exit;
}

require_once "../Conex.inc";

$correo = $contraseña = "";
$error_correo = $error_contraseña = $error_inicio = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["correo"]))){
        $error_correo = "Ingrese su correo.";
    } else {
        $correo = trim($_POST["correo"]);
    }

    if(empty(trim($_POST["contraseña"]))){
        $error_contraseña = "Ingrese su contraseña";
    } else {
        $contraseña = trim($_POST["contraseña"]);
    }

    if(empty($error_contraseña) && empty($error_correo)){
        $sql = "SELECT * FROM cuenta WHERE Correo = ?";

        if($stmt = $db->prepare($sql)){
            $stmt->bind_param("s", $param_correo);

            $param_correo = $correo;

            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $stmt->bind_result($id, $nombre, $apellido, $fecha_nacimiento, $genero, $correo, $hash_contraseña, $num_contacto, $tipo_usuario);
                    if($stmt->fetch()){
                        if(password_verify($contraseña, $hash_contraseña)){
                            session_start();

                            $_SESSION["inicio"] = true;
                            $_SESSION["ID"] = $id;
                            $_SESSION["Nombre"] = $nombre;
                            $_SESSION["Apellido"] = $apellido;
                            $_SESSION["Fecha_Nacimiento"] = $fecha_nacimiento;
                            $_SESSION["Correo"] = $correo;
                            $_SESSION["Num_Contacto"] = $num_contacto;
                            $_SESSION["Tipo_usuario"] = $tipo_usuario;
                            
                            header("location: ../index.php");
                        } else {
                            $error_inicio = "Correo y/o contraseña erróneas.";
                        }
                    }
                } else {
                    $error_inicio = "Correo y/o contraseña erróneas.";
                }
            } else {
                echo "Ocurrió un error. Inténtelo más tarde.";
            }

            $stmt->close();
        }
    }

    $db->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Iniciar Sesión</title>
</head>
<body>
    <script type="text/javascript">
    function mostrarPassword(){
		var cambio = document.getElementById("contraseña");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
    </script>

    <input type="button" onclick="document.location='../index.php'" value="Volver">
    <h2>Iniciar Sesión</h2>

    <?php 
        if(!empty($error_inicio)){
            echo '<div>' . $error_inicio . '</div>';
        }        
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label>Correo Electronico</label><br>
            <input type="email" name="correo"><br>
            <span><?php echo $error_correo; ?></span>
        </div>
        <div>
            <label>Contraseña</label><br>
            <input type="password" id="contraseña" name="contraseña">
            <button id="mostrar_contraseñas" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button><br>
            <span><?php echo $error_contraseña; ?></span>
            <p><a href="reset_contraseña.php">¿Olvidaste tu contraseña?</a></p>
        </div>
        <div>
            <input type="submit" value="Iniciar Sesión">
        </div>
        <p>¿No tienes una cuenta? <a href="registro.php">Crea una aquí</a>.</p>
    </form>
</body>
</html>