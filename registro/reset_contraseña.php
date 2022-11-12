<?php
session_start();
 
require_once "../Conex.inc";
 
$correo = $nueva_contraseña = $confirmar_contraseña = "";
$error_correo = $error_nueva_contraseña = $error_confirmar_contraseña = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["correo"]))){
        $error_correo = "Ingrese su correo.";
    } elseif(!preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', trim($_POST["correo"]))){
        $error_correo = "Ingrese un correo valido.";
    }  else {
        $sql = "SELECT * FROM cuenta WHERE Correo = ?";

        if($stmt = $db->prepare($sql)){
            $stmt->bind_param("s", $param_correo);

            $param_correo = trim($_POST["correo"]);

            if($stmt->execute()){
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $correo = trim($_POST["correo"]);
                } else {
                    $error_correo = "No hay ninguna cuenta vinculada a este correo.";
                }
            } else {
                echo "Ocurrió un error. Inténtelo más tarde.";
            }

            $stmt->close();
        }
    }
 
    if(empty(trim($_POST["nueva_contraseña"]))){
        $error_nueva_contraseña = "Ingrese una nueva contraseña.";     
    } elseif(strlen(trim($_POST["nueva_contraseña"])) < 6){
        $error_nueva_contraseña = "La contraseña debe tener como mínimo 6 caracteres.";
    } else{
        $nueva_contraseña = trim($_POST["nueva_contraseña"]);
    }
    
    if(empty(trim($_POST["confirmar_contraseña"]))){
        $error_confirmar_contraseña = "Confirme su contraseña.";
    } else{
        $confirmar_contraseña = trim($_POST["confirmar_contraseña"]);
        if(empty($error_nueva_contraseña) && ($nueva_contraseña != $confirmar_contraseña)){
            $error_confirmar_contraseña = "Las contraseñas con coinciden.";
        }
    }
        
    if(empty($error_correo) && empty($error_nueva_contraseña) && empty($error_confirmar_contraseña)){
        $sql = "UPDATE cuenta SET Contraseña = ? WHERE Correo = ?";
        
        if($stmt = $db->prepare($sql)){
            $stmt->bind_param("ss", $param_contraseña, $param_correo);
            
            $param_contraseña = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
            $param_correo = $correo;
            
            if($stmt->execute()){
                session_destroy();
                header("location: login.php");
                exit();
            } else{
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
    <title>Cambiar Contraseña</title>
</head>
<body>
    <script type="text/javascript">
    function mostrarPassword(){
		const cambio = document.getElementsByClassName("contraseña");
		if(cambio[0].type == "password" && cambio[1].type == "password"){
			cambio[0].type = "text";
            cambio[1].type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio[0].type = "password";
            cambio[1].type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
    </script>

    <input type="button" onclick="document.location='../index.php'" value="Volver">
    <h2>Cambiar contraseña</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label>Correo Electronico</label><br>
            <input type="email" name="correo"><br>
            <span><?php echo $error_correo; ?></span>
        </div>
        <div>
            <label>Nueva Contraseña</label><br>
            <input type="password" class="contraseña" name="nueva_contraseña"><br>
            <span><?php echo $error_nueva_contraseña; ?></span>
        </div>
        <div>
            <label>Confirmar Contraseña</label><br>
            <input type="password" class="contraseña" name="confirmar_contraseña">
            <button id="mostrar_contraseña" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button><br>
            <span><?php echo $error_confirmar_contraseña; ?></span><br>
        </div>
        <div>
            <input type="submit" value="Cambiar">
        </div>
        <p>¿No tienes una cuenta? <a href="registro.php">Crea una aquí</a>.</p>
    </form>
</body>
</html>