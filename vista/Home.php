<?php 
    session_start();
    if (empty($_SESSION["idJugador"])){
        header("location: ../Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="shortcut icon" href="../recursos/img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="titulo">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="Home.php">
                    <img src="../recursos/img/logo.png" class="img-fluid" style="width: 25px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" >Reglas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../controlador/CerrarSessionControlador.php">Salir</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <p style="color: #fff">Bienvenid@ 
                                <?php 
                                    echo  $_SESSION["nombres"]." ".$_SESSION["apellidos"];
                                ?>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        <div class="section">
            <div class="cuadro">
                <div class="avatar"></div>
                <div class="boton">
                    <a href="">JUGAR</a>
                </div>
            </div>

            <div class="cuadro">
                <div class="avatar"></div>
                <div class="boton">
                    <a href="#">PERFIL</a>
                </div>
            </div>

            <div class="cuadro">
                <div class="avatar"></div>
                <div class="boton">
                    <a href="tablero.php">TABLA DE POSICIONES</a>
                </div>
            </div>
        </div>   

        <script src="../js/javascrip.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>