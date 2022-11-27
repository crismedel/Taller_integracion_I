<?php

session_start();

if(!isset($_SESSION["ID_Cuenta"]) || $_SESSION["ID_Cuenta"] !== true){
    $cuenta = "<a href='./registro/logout.php' class='boton-sesion'>Cerrar Sesión</a>";
} else {
    $cuenta = "<a href='./registro/login.php' class='boton-sesion'>Iniciar Sesión</a>";
}

require_once "Conex.inc";

$id_cuenta = $_SESSION["ID"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
$Titulo_Arriendo = $Tipo_Arriendo = $Valor = $Cant_Habitaciones = $Direccion = $Num_Depto = $Descripcion = "";
$error_Titulo_Arriendo = $error_Tipo_Arriendo = $error_Valor = $error_Cant_Habitaciones = $error_Direccion = $error_Num_Depto = $error_Descripcion = "";


    if(empty(trim($_POST["Titulo_Arriendo"]))){
        $error_Titulo_Arriendo = "Ingrese el Titulo de su publicación";
    } else {
        $Titulo_Arriendo = trim($_POST["Titulo_Arriendo"]);
    }

    if(empty(trim($_POST["Tipo_Arriendo"]))){
        $error_Titulo_Arriendo = "Seleccione su tipo de arriendo";
    }  else {
        $Tipo_Arriendo = trim($_POST["Tipo_Arriendo"]);
    }
    
    if(empty(trim($_POST["Valor"]))){
        $error_Valor = "Ingrese el valor de su publicación";
    } else {
        $Valor = trim($_POST["Valor"]);
    }
    
    if(empty(trim($_POST["Cant_Habitaciones"]))){
        $error_Cant_Habitaciones = "Ingrese la cantidad de habitaciones";
    } else {
        $Cant_Habitaciones = trim($_POST["Cant_Habitaciones"]);
    }

    if(empty(trim($_POST["Direccion"]))){
        $error_Direccion = "Ingrese su Direccion.";
    } else {
        $Direccion = trim($_POST["Direccion"]);
    }

    if(!empty(trim($_POST["Num_Depto"]))){
        $error_Num_Depto = "Ingrese el Número de Departamento.";
    } else {
        $Num_Depto = NULL;
    }

    if(!empty(trim($_POST["Descripcion"]))){
        $Descripcion = trim($_POST["Descripcion"]);
    }

    if(empty($error_Titulo_Arriendo) && empty($error_Tipo_Arriendo) && empty($error_Valor) && empty($error_Cant_Habitaciones)  && empty($error_Direccion) && empty($error_Num_Depto) && empty($error_Descripcion)){
        $sql = "INSERT INTO publicacion (ID_Cuenta, Titulo_Arriendo, Direccion, Num_Depto, Tipo_Arriendo, Cant_Habitaciones, Descripcion, Valor) VALUES (?, ?, ?, ?, ? ,? ,?, ?)";

        if($stmt = $db->prepare($sql)){
            $stmt->bind_param("issssisi", $param_id_cuenta, $param_Titulo_Arriendo, $param_Direccion, $param_Num_Depto, $param_Tipo_Arriendo, $param_Cant_Habitaciones, $param_Descripcion, $param_Valor);

            $param_id_cuenta = $id_cuenta;
            $param_Titulo_Arriendo = $Titulo_Arriendo;
            $param_Tipo_Arriendo = $Tipo_Arriendo;
            $param_Valor = $Valor;
            $param_Cant_Habitaciones = $Cant_Habitaciones;
            $param_Direccion = $Direccion;
            $param_Num_Depto = $Num_Depto;
            $param_Descripcion = $Descripcion;

            if($stmt->execute()){
                echo "<script> alert('La publicación se realizó con exito <?php echo $param_Num_Depto ?>'); location.href='Arriendos.php'</script>";
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
    <link rel="stylesheet" href="css/Arriendos-estilos.css">
    <link rel="stylesheet" href="css/estilo_FPublicacion.css">
    <title>Publicar</title>
</head>

<body>   
    <header>
        <nav class="menu">
            <a href="Index.php">Inicio</a>
            <a href="Arriendos.php">Arriendos</a> 
            <a href="Soporte.php">Soporte</a>
            <?php echo $cuenta; ?>
            <input id="barra-buscador" type="search" placeholder="Buscar Arriendos..">
            <input id="boton-buscador" type="image" src="img/lupa.png">
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="title">¡Publica Tu Vivienda!</div>
        <div class="content">    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Título</span>
                    <input type="text" name="Titulo_Arriendo"><br>
                </div><br>
                <div class="input-box">
                    <span class="details">Tipo de vivienda</span>
                    <select class="opciones" name="Tipo_Arriendo" require>
                        <option  value="Departamento" selected>Departamento</option>
                        <option  value="Casa">Casa</option>
                        <option  value="Habitacion">Habitación</option>
                    </select><br>
                </div><br>
                <div class="input-box">
                    <span class="details">Valor</span>
                    <input class="valor" type="number" name="Valor" id="Valor" min="0" require>
                </div><br>
                <div class="input-box">
                    <span class="details">Cantidad de habitaciones</span>
                    <input type="number" id="Cant_Habitaciones" name="Cant_Habitaciones" min="1" max="10">
                </div><br>
                <div class="input-box">
                    <span class="details">Dirección</span>
                    <input type="text" name="Direccion"><br>
                </div><br>
                <div class="input-box">
                    <span class="details">Num Depto(opcional)</span>
                    <input type="text" name="Num_Depto"><br>
                </div><br>
                <div class="input-box">
                    <span class="details">Descripción</span>
                    <textarea class="Descripcion" name="Descripcion" rows="8" cols="55" placeholder="Escriba una pequeña descripción su vivienda..."></textarea>
                    
                </div><br>
                <div class="button">
                    <input type="submit" value="Publicar">
                </div><br>
            </div>
            </div>
        </form>
    </div>
    </main>     
</body>
</html>
