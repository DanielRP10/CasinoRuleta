<?php
    include "../modelo/conexion.php";
    if(!empty($_GET["id"])){
        $id=$_GET["id"];
        $sql=$conexion->query("DELETE FROM Jugadores WHERE idJugador=$id");
        if($sql==1){
            echo '<div class="alert alert-success">Jugador se elimino con exito.</div>';
        }else{
            echo '<div class="alert alert-danger">Error al eliminar.</div>';
        }
    }
?>