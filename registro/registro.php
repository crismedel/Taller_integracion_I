<?php

require_once "../Conex.inc";

$nombre = $apellido = $correo = $cel = $genero = $fecha_nacimiento = $tipo_usuario = $contraseña = $confirmar_contraseña = "";
$error_nombre = $error_apellido = $error_correo = $error_cel = $error_genero = $error_fecha_nacimiento = $error_tipo_usuario = $error_contraseña = $error_confirmar_contraseña = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["nombre"]))){
        $error_nombre = "Ingrese su nombre.";
    } elseif(!preg_match('/^[a-zA-Zá-ú-Á-Ú]+$/', trim($_POST["nombre"]))){
        $error_nombre = "El nombre sólamente puede contener letras.";
    } else {
        $nombre = trim($_POST["nombre"]);
    }

    if(empty(trim($_POST["apellido"]))){
        $error_apellido = "Ingrese su apellido.";
    } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["apellido"]))){
        $error_apellido = "El apellido sólamente puede contener letras.";
    } else {
        $apellido = trim($_POST["apellido"]);
    }
    
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
                    $error_correo = "Ya hay una cuenta vinculada a este correo.";
                } else {
                    $correo = trim($_POST["correo"]);
                }
            } else {
                echo "Ocurrió un error. Inténtelo más tarde.";
            }

            $stmt->close();
        }
    }
    
    if(!empty(trim($_POST["cel"]))){
        $cel = trim($_POST["cel"]);
    }
    
    if(empty(trim($_POST["genero"]))){
        $error_genero = "Seleccione su genero.";
    }  else {
        $genero = trim($_POST["genero"]);
    }
    
    if(!empty(trim($_POST["fecha_nacimiento"]))){
        $fecha_nacimiento = trim($_POST["fecha_nacimiento"]);
    }
    
    if(empty(trim($_POST["tipo_usuario"]))){
        $error_tipo_usuario = "Seleccione que tipo de usuario vas a ser.";
    } else {
        $tipo_usuario = trim($_POST["tipo_usuario"]);
    }
    
    if(empty(trim($_POST["contraseña"]))){
        $error_contraseña = "Ingrese una contraseña.";
    } elseif(strlen(trim($_POST["contraseña"])) < 6){
        $error_contraseña = "La contraseña debe tener mínimo 6 carácteres.";
    } else {
        $contraseña = trim($_POST["contraseña"]);
    }

    if(empty(trim($_POST["confirmar_contraseña"]))){
        $error_confirmar_contraseña = "Confirme la contraseña";
    } else {
        $confirmar_contraseña = trim($_POST["confirmar_contraseña"]);
        if(empty($error_contraseña) && ($contraseña != $confirmar_contraseña)){
            $error_confirmar_contraseña = "La contraseña no coincide";
        }
    }

    if(empty($error_nombre) && empty($error_apellido) && empty($error_correo) && empty($error_cel)  && empty($error_contraseña) && empty($error_confirmar_contraseña)){
        $sql = "INSERT INTO cuenta (Nombre, Apellido, Fecha_Nacimiento, Genero, Correo, Contraseña, Num_Contacto, Tipo_Usuario) VALUES (?, ?, ?, ?, ? ,? ,?, ?)";

        if($stmt = $db->prepare($sql)){
            $stmt->bind_param("ssssssss", $param_nombre, $param_apellido, $param_fecha_nacimiento, $param_genero, $param_correo, $param_contraseña, $param_cel, $param_tipo_usuario);

            $param_nombre = $nombre;
            $param_apellido = $apellido;
            $param_fecha_nacimiento = $fecha_nacimiento;
            $param_genero = $genero;
            $param_correo = $correo;
            $param_contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
            $param_cel = $cel;
            $param_tipo_usuario = $tipo_usuario;

            if($stmt->execute()){
                header("location: ../registro/login.php");
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
    <title>Regístrate</title>
</head>
<body>
    <input type="button" onclick="document.location='../index.php'" value="Volver">
    <h2>Regístrate</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label>Nombre</label><br>
            <input type="text" name="nombre"><br>
            <span><?php echo $error_nombre; ?></span>
        </div>
        <div>
            <label>Apellido</label><br>
            <input type="text" name="apellido"><br>
            <span><?php echo $error_apellido; ?></span>
        </div>
        <div>
            <label>Correo Electronico</label><br>
            <input type="email" name="correo"><br>
            <span><?php echo $error_correo; ?></span>
        </div>
        <div>
            <label>Numero Celular</label><br>
            <input type="tel" name="cel" placeholder="(Código de área) Número"><br>
            <span><?php echo $error_cel; ?></span>
        </div>
        <div>
            <label>Genero</label><br>
            <select name="genero">
                <option value="Hombre" selected>Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
            </select><br>
            <span><?php echo $error_genero; ?></span>
        </div>
        <div>
            <label>Fecha de Nacimiento</label><br>
            <input type="date" name="fecha_nacimiento" min="1925-01-01" max="2005-12-31" value="2005-12-31"><br>
            <span><?php echo $error_fecha_nacimiento; ?></span>
        </div>
        <div>
            <label>¿Qué tipo de usuario vas ser?</label><br>
            <select name="tipo_usuario">
                <option value="Estudiante" selected>Estudiante</option>
                <option value="Arrendador">Arrendador</option>
            </select><br>
            <span><?php echo $error_tipo_usuario; ?></span>
        </div>
        <div>
            <label>Contraseña</label><br>
            <input type="password" name="contraseña"><br>
            <span><?php echo $error_contraseña; ?></span>
        </div>
        <div>
            <label>Confirmar Contraseña</label><br>
            <input type="password" name="confirmar_contraseña"><br>
            <span><?php echo $error_confirmar_contraseña; ?></span><br>
        </div>
        <div>
            <input type="submit" value="Registrarse">
        </div>
        <p>¿Tienes una cuenta? <a href="login.php">Ingresa una aquí</a>.</p>
    </form>
</body>
</html>