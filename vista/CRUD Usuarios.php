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
    <link rel="shortcut icon" href="../recursos/img/logo.png"/>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>GRUD USUAIROS</title>
</head>
<body class="lg">
    <script>
        function eliminar(){
            var respuesta=confirm("¿Estas seguro de eliminar este registro?");
            return respuesta;
        }
    </script>
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
                            <a class="nav-link" style="color: black" href="HomeAdmin.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" onclick='mostrarReglas()' href="#" >Reglas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="AcercaAdmin.php">Acerca de</a>
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
    <div class="container-fluid row">
        <div class="col-1"></div>
        <div class="col-10 p-4 " >
            <?php 
                include "../modelo/conexion.php";
                include "../controlador/Eliminar_jugador.php";
            ?>
            <table class="table">
                <thead class="table-info">
                    <tr>
                    <th scope="col">IdJugador</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Fecha.N</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Puntaje</th>
                    <th scope="col">Intentos</th>
                    <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include "../modelo/conexion.php";
                        $sql = "SELECT * FROM Jugadores ORDER BY puntaje DESC";
                        $resultado = $conexion->query($sql);
                        while($datos=$resultado->fetch_object()){?>
                        <tr>
                        <td><?=$datos->idJugador?></td>
                        <td><?=$datos->nombres?></td>
                        <td><?=$datos->apellidos?></td>
                        <td><?=$datos->fechaNacimiento?></td>
                        <td><?=$datos->usuairo?></td>
                        <td><img src="<?=$datos->foto?>" class="img-fluid perfilFoto"  style="width: 30px;"></td>
                        <td><?=$datos->puntaje?></td>
                        <td><?=$datos->intentos?></td>
                        <td>
                            <a href="Modificar_jugadores.php?id=<?=$datos->idJugador?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href="CRUD Usuarios.php?id=<?=$datos->idJugador?>" class="btn btn-small btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                        </tr>
                        <?php    
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="../js/javascrip.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/63eca5d12a.js" crossorigin="anonymous"></script>
</body>
</html>