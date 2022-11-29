<?php

session_start();

require_once "../Conex.inc";

$ID_Favorito = $_GET['ID_Favorito'];

$eliminar = "DELETE FROM favoritos WHERE ID_Favorito = '$ID_Favorito'";

$resultadoEliminar = mysqli_query($db, $eliminar);

if($resultadoEliminar){
    header("Location: favoritos.php");
} else{
    echo"<script>alert('Error al eliminar de favoritos'); window.history.go(-1);</script>";
}