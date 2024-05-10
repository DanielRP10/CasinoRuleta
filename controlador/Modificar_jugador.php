<?php 
    include "../modelo/conexion.php";
    if(!empty($_POST["btnmodificar"])){
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["fecha"]) and !empty($_POST["usuario"]) and !empty($_POST["contra"])){
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $fecha = $_POST["fecha"];
            $usuario = $_POST["usuario"];
            $contra = $_POST["contra"];
            $archivo = $_FILES['foto'];
            $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
            $img = $extension;
            $punto = $_POST["punto"];

            ///password_hash
            $hash = password_hash($contra, PASSWORD_DEFAULT,['cost'=>10]);

            if($img == 'jpg' or $img == 'jpeg' or $img == 'png'){
                $carpeta_destino = "../recursos/img/fotoPerfil/";
                $ruta_imagen = $carpeta_destino . $archivo['name'];
                if (move_uploaded_file($archivo['tmp_name'], $ruta_imagen)) {
                    // La imagen se ha movido exitosamente, ahora guardamos la ruta en la base de datos
                    $sql = $conexion->query("UPDATE jugadores SET nombres='$nombre', apellidos='$apellido', fechaNacimiento='$fecha', usuairo='$usuario', contrasena='$hash', foto='$ruta_imagen', puntaje=$punto WHERE idJugador=$id");

                    if($sql == 1){
                        header("../vista/CRUD Usuarios.php");
                    }else{
                        echo '<div class="alert alert-danger">Jugador no se modifico</div>';
                    }
                } else {
                    // Hubo un error al mover la imagen
                    echo '<div class="alert alert-danger">Error al subir la imagen</div>';
                }
            }else{
                echo '<div class="alert alert-danger">Formato incorrecto</div>';
            }
            
        }else{
            echo '<div class="alert alert-warning">Algunos de los campos estan vacios</div>';
        }
    }
?>