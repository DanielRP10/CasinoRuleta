<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="../recursos/img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="lg">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form action="">
            <div class="row row border rounded-5 p-1 bg-white shadow box-area registro-conte">
                <div class="header-text mb-4 text-wrap text-center">
                    <h2>Registro</h2>
                </div>
                <div class="featured-image mb-3 text-center">
                    <img src="../recursos/img/logo.png" class="img-fluid" style="width: 100px;">
                </div>
                <div class="col-6 mb-3">
                    <label for="">Nombre completo</label><br>
                    <input type="text" class="form-control form-control-lg bg-light fs-6" 
                    placeholder="Nombres">
                </div>
                <div class="col-6 mb-3">
                    <label for="">Apellidos completos</label><br>
                    <input type="tex" class="form-control form-control-lg bg-light fs-6" placeholder="Apellidos">
                </div>
                <div class="col-6 mb-3">
                    <label for="">Fecha Nacimiento</label><br>
                    <input type="date" class="form-control form-control-lg bg-light fs-6">
                </div>
                <div class="col-6 mb-3">
                    <label for="">Usuario</label><br>
                    <input type="tex" class="form-control form-control-lg bg-light fs-6" placeholder="Usuario">
                </div>
                <div class="col-6 mb-3">
                    <label for="">contraseña</label><br>
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña">
                </div>
                <div class="col-6 mb-3">
                    <label for="">Foto</label><br>
                    <input type="file" class="form-control form-control-lg bg-light fs-6">
                </div>
                <div class="mb-3">
                    <button class="btn btn-lg btn-primary w-100 fs-6">Registrame</button>
                </div>
                <div class="row">
                    <small>¿Ya tienes cuenta? <a href="Login.php">Iniciar Sesion</a></small>
                </div>
            </div>
        </form>
    </div>
</body>
</html>