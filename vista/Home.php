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
    <title>inicio</title>
</head>
<body>
    <div>
        <?php 
          echo  $_SESSION["nombres"]." ".$_SESSION["apellidos"];
        ?>
    </div>
    <a href="../controlador/CerrarSessionControlador.php">Salir</a>
</body>
</html>