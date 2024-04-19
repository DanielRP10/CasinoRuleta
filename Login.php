<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="shortcut icon" href="recursos/img/logo.png"/>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="lg"> 
    <div class="container d-flex justify-content-center align-items-center min-vh-100">     
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #daeaf6">
                <div class="featured-image mb-3">
                    <img src="recursos/img/logo.png" class="img-fluid" style="width: 150px;">
                </div>
            </div>
            <div class="col-md-6 ring-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-wrap text-center">
                         <h2>Hola de nuevo</h2>
                         <p>Estamos felices de tenerte de vuelta.</p>
                    </div>
                    <?php
                        include "modelo/conexion.php";
                        include "controlador/LoginControlador.php";
                    ?>
                    <form action="" method="POST"> 
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Nombre de usuario" name="usuario">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña" name="contra">
                            <!-- <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div> -->
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" name="btniniciar" value="ok">Iniciar Sesion</button>
                        </div>
                        <div class="row">
                            <small>¿No tienes cuenta? <a href="vista/Registro.php">Regístrate ahora</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>