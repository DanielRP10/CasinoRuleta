<?php

include "../modelo/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query("SELECT * FROM Jugadores WHERE idJugador=$id");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Jugadores</title>
    <link rel="shortcut icon" href="recursos/img/logo.png"/>
    <link rel="shortcut icon" href="../recursos/img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="lg">
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <form action="" class="d-flex" method="POST" enctype="multipart/form-data" onsubmit="return verificarEdad()">
            <div class="row border rounded-5 p-1 bg-white shadow box-area registro-conte">
                <div class="header-text mb-4 text-wrap text-center">
                    <h2>Modificando Jugador</h2>
                </div>
                <input type="hidden" name="id" value="<?=$_GET["id"]?>">
                <?php 
                    include "../controlador/Modificar_jugador.php";
                    
                    if($sql === false) {
                        echo "Error SQL: " . $conexion->error;
                    } else {
                        if($sql->num_rows > 0) {
                            while($datos = $sql->fetch_object()) { ?>
                                <div class="featured-image mb-3 text-center">
                                    <img src="../recursos/img/logo.png" class="img-fluid" style="width: 100px;">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Nombre completo</label><br>
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="nombre" value="<?= $datos->nombres ?>">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Apellidos completos</label><br>
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="apellido" value="<?= $datos->apellidos ?>">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Fecha Nacimiento</label><br>
                                    <input type="date" class="form-control form-control-lg bg-light fs-6" name="fecha" id="fecha" value="<?= $datos->fechaNacimiento ?>">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Usuario</label><br>
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="usuario" value="<?= $datos->usuairo ?>">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Contraseña</label><br>
                                    <input type="password" class="form-control form-control-lg bg-light fs-6"  name="contra" value="<?= $datos->contrasena ?>">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Foto</label><br>
                                    <input type="file" class="form-control form-control-lg bg-light fs-6" name="foto" value="<?= $datos->foto ?>">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Puntaje</label><br>
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="punto" value="<?= $datos->puntaje ?>">
                                </div>
                            <?php }
                        } else {
                            echo "No se encontraron resultados para el ID proporcionado.";
                        }
                    }
                ?>
                <div class="col-6 mb-3 ">
                    <center>
                        <button type="submit" class="btn btn-sm btn-success fs-6 bregistrar" name="btnmodificar" id="btnregistrar" value="ok">Actualizar</button>
                    </center>
                </div>
                <div class="col-6 mb-3 ">
                    <center>
                        <a href="CRUD Usuarios.php" class="btn btn-small btn-danger fs-6 bregistrar" >Regresar</i></a>
                    </center>
                </div>
            </div>
        </form>
    </div>

    <script>
       
        var inputFecha = document.getElementById("fecha");
        var btnRegistrar = document.getElementById("btnregistrar");

        // Agregar un evento para detectar cuando se cambia la fecha de nacimiento
        inputFecha.addEventListener("change", function() {
            // Obtener la fecha de nacimiento del input
            var fechaNacimiento = inputFecha.value;
            var fechaNacimientoObj = new Date(fechaNacimiento);
            var añoActual = new Date().getFullYear();
            var edad = añoActual - fechaNacimientoObj.getFullYear();

            if (edad < 18) {
                alert("Lo siento no puedes registrarte, debes tener al menos 18 años para acceder.");
                inputFecha.value = "";
                btnRegistrar.disabled = true;
            } else {
                btnRegistrar.disabled = false;
            }
        });
        function verificarEdad() {
            var fechaNacimiento = inputFecha.value;
            var fechaNacimientoObj = new Date(fechaNacimiento);

            // Obtener el año actual
            var añoActual = new Date().getFullYear();
            var edad = añoActual - fechaNacimientoObj.getFullYear();
            if (edad < 18) {
                alert("Lo siento no puedes registrarte, debes tener al menos 18 años para acceder.");
                inputFecha.value = "";
                return false; // No enviar el formulario
            }
            return true; // Enviar el formulario
        }
    </script>
</body>
</html>