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
    <title>Acerca de</title>
    <link rel="shortcut icon" href="../recursos/img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
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
                            <a class="nav-link active" style="color: black" href="HomeAdmin.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" onclick='mostrarReglas()' href="#" >Reglas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="aceca.php">Acerca de</a>
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
    <div class="container d-flex justify-content-center align-items-center min-vh-100 margin-top: 30px;">     
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
           <center>
            <div class="col-md-12 ring-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-wrap text-center">
                        <h2 class="text-center"><b>Acerca de CasinoCheros</b></h2>
                        <div class="descripcion">
                            <p>Rueda y Gana, es un producto de casino Cheros con todos los derechos
                                reservados 2024. Desarrollado por el siguiente grupo de estudiantes:
                            </p>
                        </div>
                        <div class="featured-image mb-3">
                            <div class="integrante">
                                <img class="imgInt" src="../recursos/img/Daniel.png" class="img-fluid fotoPerfil" style="width: 150px;">
                                <p>
                                    <b>Daniel Reyes</b> SysAdmin y Full Stack, encargado del desarrollo de la infraestructura
                                    del sitio.
                                </p><br>
                                <img class="imgInt" src="../recursos/img/jenni.jpg" class="img-fluid fotoPerfil" style="width: 150px;">
                                <p>
                                    <b>Jennifer Guerra</b> CISO, Backend, encargada de la seguridad del sitio, desarrollando
                                    el funcionamiento del juego del sitio. 
                                </p><br>
                                <img class="imgInt" src="../recursos/img/yeimi.jpg" class="img-fluid fotoPerfil" style="width: 150px;">
                                <p>
                                    <b>Yeimi García</b> Diseñadora, encargada del arte de las imagenes del juego, y
                                     aporte de validaciones de seguridad.  
                                </p><br>
                                <img class="imgInt" src="../recursos/img/owen.jpg" class="img-fluid fotoPerfil" style="width: 150px;">
                                <p>
                                    <b>Owen Gomez</b> Frontend, encargado de estilo del sitioo y documentación del sitioo y manual
                                    de usuario.
                                </p><br>
                                <img class="imgInt" src="../recursos/img/gil.png" class="img-fluid fotoPerfil" style="width: 150px;">
                                <p>
                                    <b>Gilberto Mennendez</b> Estudiante de ingenieria en sistemas, proactivo, entusiasta.
                                    Colaborador del diseño del sitio y estilo.
                                </p><br>
                            </div>
                        </div>
                        
                        <!--<table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" scope="col">Datos</th>
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
                        </table>-->
                    </div>
                </div>
            </div>
           </center> 
        </div>
    </div>
    <script src="../js/javascrip.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>