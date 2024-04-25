<?php 
    session_start();
    if (empty($_SESSION["idJugador"])){
        header("location: ../Login.php");
    }
    include "../modelo/conexion.php";
    $iduser = $_SESSION["idJugador"];
    $sql = "SELECT nombres, apellidos, fechaNacimiento, usuairo, foto, puntaje FROM Jugadores WHERE idJugador = '$iduser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="shortcut icon" href="../recursos/img/logo.png"/>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="lg">
    <header class="titulo">
        <nav class="navbar navbar-expand-lg navbar-dark" id="menu-principal">
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
                            <a class="nav-link" style="color: black" href="Home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" onclick='mostrarReglas()' href="#" >Reglas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="#">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="../controlador/CerrarSessionControlador.php">Salir</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <p style="color: black" class="bienvenido">Bienvenid@ 
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
    <div class="container d-flex justify-content-center align-items-center min-vh-100">     
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex flex-column left-box" style="background: #daeaf6">
                <h2 class="text-center">Perfil</h2>
                <div class="featured-image mb-3">
                    <center>
                        <img src="<?php echo $row['foto'];?>" class="img-fluid perfilFoto" style="width: 150px;">
                    </center>
                </div>
                <p style="color: black" class="text-center"> 
                    <?php 
                        echo  $_SESSION["nombres"]." ".$_SESSION["apellidos"];
                    ?>
                </p>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Datos:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Nombre</th>
                            <td>
                                <?php 
                                    echo $row['nombres'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Apellido</th>
                            <td>
                                <?php 
                                    echo $row['apellidos'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">F.Nacimiento</th>
                            <td>
                                <?php 
                                    echo $row['fechaNacimiento'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Correo</th>
                            <td>
                                <?php 
                                    echo $row['usuairo'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Puntos</th>
                            <td>
                                <?php
                                    if( $row['puntaje'] <=0){
                                        echo '0';
                                    }else{
                                        echo $row['puntaje'];
                                    }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 ring-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-wrap text-center">
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>