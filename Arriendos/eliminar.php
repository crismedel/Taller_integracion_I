<?php

session_start();

require_once "../Conex.inc";

$ID_Favorito = $_GET['id'];

$eliminar = "DELETE FROM favoritos WHERE ID_Favorito = '$ID_Favorito'";

$resultadoEliminar = mysqli_query($db, $eliminar);

if($resultadoEliminar){
    echo "<script> alert('La publicación se elimino con exito'); location.href='favoritos.php'</script>";
} else {
    echo "<script> alert('Ocurrió un error. Inténtelo más tarde.'); location.href='favoritos.php'</script>";
}