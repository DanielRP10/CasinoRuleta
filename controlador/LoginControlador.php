<?php
    session_start();
    if (!empty( $_POST["btniniciar"])){
        if(!empty($_POST["usuario"]) and !empty($_POST["contra"])){
            $usuario = $_POST["usuario"];
            $contra = $_POST["contra"];

            $sql=$conexion->query("SELECT * FROM jugadores WHERE usuairo = '$usuario' AND contrasena='$contra'");

            if($datos = $sql->fetch_object()){
                $_SESSION["idJugador"] = $datos->idJugador;
                $_SESSION["nombres"] = $datos->nombres;
                $_SESSION["apellidos"] = $datos->apellidos;
                header("location: vista/Home.php");
            }else{
                echo '<div class="alert alert-danger">Acceso Denegado</div>';
            }
        }else{
            echo '<div class="alert alert-danger">Algunos de los campos estan vacios</div>';
        }
    }
?>