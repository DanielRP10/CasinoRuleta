<?php
session_start();

if (!empty($_POST["btniniciar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["contra"])) {
        $usuario = $_POST["usuario"];
        $contra = $_POST["contra"];

        $sql = $conexion->query("SELECT * FROM jugadores WHERE usuairo = '$usuario'");

        if ($datos = $sql->fetch_object()) {
            if (password_verify($contra, $datos->contrasena)) {
                $_SESSION["idJugador"] = $datos->idJugador;
                $_SESSION["nombres"] = $datos->nombres;
                $_SESSION["apellidos"] = $datos->apellidos;

                if ($datos->idJugador == 1) {
                    header("location: vista/HomeAdmin.php");
                } else {
                    header("location: vista/Home.php");
                }
                exit; 
            } else {
                echo '<div class="alert alert-danger">Acceso Denegado</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Acceso Denegado</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Algunos de los campos están vacíos</div>';
    }
}
?>