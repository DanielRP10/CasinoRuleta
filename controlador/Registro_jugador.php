<?php

    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["fecha"]) and !empty($_POST["usuario"]) and !empty($_POST["contra"])){
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $fecha = $_POST["fecha"];
            $usuario = $_POST["usuario"];
            $contra = $_POST["contra"];
            $archivo = $_FILES['foto'];
            $puntos = $_POST["puntos"];
            $intentos = $_POST["intentos"];
            $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
            $img = $extension;

            ///password_hash
            $hash = password_hash($contra, PASSWORD_DEFAULT,['cost'=>10]);            

            // Verificar si el usuario ya existe
            $sql_check = $conexion->query("SELECT * FROM jugadores WHERE usuairo = '$usuario'");
            if ($sql_check->num_rows > 0) {
                echo '<div class="alert alert-danger">El nombre de usuario ya existe</div>';
            } else {
                if ($img == 'jpg' or $img == 'jpeg' or $img == 'png') {
                    $carpeta_destino = "../recursos/img/fotoPerfil/";
                    $ruta_imagen = $carpeta_destino . $archivo['name'];
                    if (move_uploaded_file($archivo['tmp_name'], $ruta_imagen)) {
                        // La imagen se ha movido exitosamente, ahora guardamos la ruta en la base de datos
                        $sql = $conexion->query("INSERT INTO jugadores (nombres, apellidos, fechaNacimiento, usuairo, contrasena, foto, puntaje, intentos) VALUES ('$nombre', '$apellido', '$fecha', '$usuario', '$hash', '$ruta_imagen', $puntos, $intentos)");

                        if ($sql == 1) {
                            echo '<div class="alert alert-success">Jugador registrado</div>';
                        } else {
                            echo '<div class="alert alert-danger">Jugador no registrado</div>';
                        }
                    } else {
                        // Hubo un error al mover la imagen
                        echo '<div class="alert alert-danger">Error al subir la imagen</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Formato incorrecto</div>';
                }
            }
        } else {
            echo '<div class="alert alert-warning">Algunos de los campos están vacíos</div>';
        }
    }
?>