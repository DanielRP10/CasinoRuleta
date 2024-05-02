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
    <title>HOME</title>
    <link rel="shortcut icon" href="../recursos/img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
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
                            <a class="nav-link active" style="color: black" href="Home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" onclick='mostrarReglas()' href="#" >Reglas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="acerca.php">Acerca de</a>
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
    <div class="section">
            <div class="cuadro">
                <div class="avatar">
                    <img src="<?php echo $row['foto'];?>" class="img-fluid fotoPerfil">
                </div>
                <div class="boton">
                    <a href="PerfilUsuario.php">PERFIL</a>
                </div>
            </div>
            <div class="cuadro">
                <div class="avatar">
                    <img src="../recursos/img/logo-juego.jpg" class="img-fluid fotoPerfil">
                </div>
                <div class="boton">
                    <a href="tablero.php">JUGAR</a>
                </div>
            </div>
            <div class="cuadro">
                <div class="avatar">
                    <img src="../recursos/img/logo-lugares.jpg" class="img-fluid fotoPerfil">
                </div>
                <div class="boton">
                    <a href="Posiciones.php">POSICIONES</a>
                </div>
            </div>
        </div>

    <script src="../js/javascrip.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>