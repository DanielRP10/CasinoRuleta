<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/63eca5d12a.js" crossorigin="anonymous"></script>
    <title>GRUD CON PHP Y MYSQL</title>
</head>
<body>
    <div class="container-fluid row">
        <div class="col-8 p-4">
        <table class="table">
            <thead class="bg-info">
                <tr>
                <th scope="col">IdJugador</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Puntaje</th>
                
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    include "conexion.php";
                    $sql = "SELECT * FROM Jugadores ORDER BY puntaje DESC";
                    $resultado = $conexion->query($sql);
                    while($datos=$resultado->fetch_object()){?>
                    <tr>
                    <td><?=$datos->idJugador?></td>
                    <td><?=$datos->nombres?></td>
                    <td><?=$datos->apellidos?></td>
                    <td><?=$datos->puntaje?></td>
                    </tr>
                    <?php    
                    }
                ?>

                
            </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>