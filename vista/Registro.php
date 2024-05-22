<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
                    <h2>Registro</h2>
                </div>
                <div class="featured-image mb-3 text-center">
                    <img src="../recursos/img/logo.png" class="img-fluid" style="width: 100px;">
                    <?php
                        include "../modelo/conexion.php";
                        include "../controlador/Registro_jugador.php";
                    ?>
                </div>
                <div class="col-6 mb-3">
                    <label>Nombre completo</label><br>
                    <input type="text" class="form-control form-control-lg bg-light fs-6" 
                    placeholder="Nombres" name="nombre">
                </div>
                <div class="col-6 mb-3">
                    <label>Apellidos completos</label><br>
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Apellidos" name="apellido">
                </div>
                <div class="col-6 mb-3">
                    <label>Fecha Nacimiento</label><br>
                    <input type="date" class="form-control form-control-lg bg-light fs-6" name="fecha" id="fecha">
                </div>
                <div class="col-6 mb-3">
                    <label>Usuario</label><br>
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Usuario" name="usuario">
                </div>
                <div class="col-6 mb-3">
                    <label>Contraseña</label><br>
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña" name="contra">
                </div>
                <div class="col-6 mb-3">
                    <label>Foto</label><br>
                    <input type="file" class="form-control form-control-lg bg-light fs-6" name="foto">
                </div>
                <input type="hidden" name="puntos" value="0">
                <input type="hidden" name="intentos" value="0">
                <div class="col-12 mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkboxTerminos" required>
                    <label class="form-check-label" for="checkboxTerminos">Acepto los <small><a href="#" onclick="mostrarTerminos()">Términos y condiciones</a></small></label>
                </div>
                <div class="row">
                    <small>¿Ya tienes cuenta? <a href="../index.php">Iniciar Sesion</a></small>
                </div>
                <br><br>
                <!-- Enlace para los términos y condiciones -->
                <div class="col-12 mb-3 ">
                    <center>
                        <button type="submit" class="btn btn-sm btn-success fs-6 bregistrar" name="btnregistrar" id="btnregistrar" value="ok" disabled>Registrarme</button>
                    </center>
                </div>
            </div>
        </form>
    </div>

    <!-- Script para mostrar los términos y condiciones -->
    <script>
        function mostrarTerminos() {
            // Aquí defines los términos y condiciones
            var terminos = "\nTérminos y condiciones:\n\n1. Uso del servicio: El usuario acepta utilizar este servicio únicamente para fines legales y de acuerdo con estos términos y condiciones.\n2. Privacidad de los datos: Los datos proporcionados por el usuario serán tratados de acuerdo con nuestra política de privacidad. No compartiremos ni venderemos sus datos a terceros.\n3. Responsabilidad: No nos hacemos responsables por el uso inadecuado del servicio por parte del usuario. El usuario asume toda la responsabilidad por su conducta mientras utiliza este servicio.\n4. Seguridad: Nos comprometemos a mantener la seguridad de los datos del usuario y a protegerlos contra accesos no autorizados o divulgación.\n5. Modificaciones: Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. Se notificará al usuario de cualquier cambio significativo.\n";

            // Muestra una alerta con los términos y condiciones
            alert(terminos);
        }

        var inputFecha = document.getElementById("fecha");
        var checkboxTerminos = document.getElementById("checkboxTerminos");
        var btnRegistrar = document.getElementById("btnregistrar");

        // Agregar un evento al checkbox para habilitar o deshabilitar el botón de registro
        checkboxTerminos.addEventListener("change", function() {
            btnRegistrar.disabled = !checkboxTerminos.checked;
        });

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
                // Habilitar o deshabilitar el botón de registro dependiendo del estado del checkbox
                btnRegistrar.disabled = !checkboxTerminos.checked;
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
            // Verificar si el checkbox está marcado
            if (!checkboxTerminos.checked) {
                alert("Debes aceptar los términos y condiciones para continuar.");
                return false; // No enviar el formulario
            }
            return true; // Enviar el formulario
        }
    </script>
</body>
</html>
