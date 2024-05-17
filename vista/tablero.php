<?php 
    session_start();
    if (empty($_SESSION["idJugador"])){
        header("location: ../Login.php");
    }
    include "../modelo/conexion.php";
    include "../controlador/Modificar_jugador.php";
    $iduser = $_SESSION["idJugador"];
    $sql = "SELECT nombres, apellidos, fechaNacimiento, usuairo, foto, puntaje, intentos FROM Jugadores WHERE idJugador = '$iduser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                    echo $_SESSION["nombres"] . " " . $_SESSION["apellidos"];
                                ?>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script>
        let números = [];
        let girando = false;
        let puntaje = <?php echo $row['puntaje']; ?>;
        let intentos = <?php echo $row['intentos']; ?>;

        function generarNúmeros() {
            let contenedor = document.getElementById("contenedor-numeros");
            let radio = 120;
            let ángulo = -90;
            for (let i = 1; i <= 16; i++) {
                let elementoNúm = document.createElement("div");
                let x = 150 + radio * Math.cos(ángulo * Math.PI / 180);
                let y = 150 + radio * Math.sin(ángulo * Math.PI / 180);
                elementoNúm.textContent = i;
                elementoNúm.classList.add("numero");
                elementoNúm.style.left = x - 20 + "px";
                elementoNúm.style.top = y - 20 + "px";
                elementoNúm.onclick = function() {
                    if (!girando) {
                        seleccionarNúmero(elementoNúm, i);
                    }
                };
                contenedor.appendChild(elementoNúm);
                ángulo += 360 / 16;
            }
        }

        function seleccionarNúmero(elemento, número) {
            if (números.includes(número)) {
                alert("Este número ya fue seleccionado.");
            } else {
                números.push(número);
                alert("Número seleccionado: " + número);
                elemento.classList.add("seleccionado");
                deshabilitarNúmerosRestantes();
            }
        }

        function deshabilitarNúmerosRestantes() {
            let elementosNúm = document.querySelectorAll('.numero:not(.seleccionado)');
            elementosNúm.forEach(function(elemento) {
                elemento.classList.add("deshabilitado");
                elemento.onclick = null;
                elemento.style.cursor = 'not-allowed';
            });
        }

        function girar() {
            if (girando) return;
            if (números.length === 0) {
                alert("Por favor selecciona un número primero.");
                return;
            }
            if (intentos >= 5) {
                alert("Máximo de intentos alcanzado. No puedes jugar más.");
                return;
            }

            girando = true;
            let deg = Math.floor(Math.random() * 360) + 360 * 5;
            document.getElementById("contenedor-numeros").style.transition = "transform 5s ease-in-out";
            document.getElementById("flecha").style.transition = "transform 5s ease-in-out";
            document.getElementById("contenedor-numeros").style.transform = `rotate(${deg}deg)`;

            setTimeout(() => {
                girando = false;
                document.getElementById("contenedor-numeros").style.transition = "none";
                let númeroGanador = calcularGanador(deg);
                let ánguloGanador = (360 / 16) * (númeroGanador - 1) * -1;
                document.getElementById("contenedor-numeros").style.transform = `rotate(${ánguloGanador}deg)`;
                let ánguloFlecha = ánguloGanador - 90; // Ajuste para apuntar al número ganador
                document.getElementById("flecha").style.transition = "none";
                document.getElementById("flecha").style.transform = `rotate(${ánguloFlecha}deg)`;
                if (númeroGanador % 2 === 0) {
                    puntaje += 50;
                    alert("¡Felicidades, ganaste 50 puntos! Puntuación total: " + puntaje);
                } else {
                    alert("¡Perdiste! El número ganador fue: " + númeroGanador);
                }
                números = [];
                intentos += 1;
                actualizarPuntaje(puntaje, intentos);
                actualizarPuntuación();
                reiniciarNúmeros();
            }, 5000);
        }

        function calcularGanador(deg) {
            let degNormalizado = (deg % 360 + 360) % 360;
            let tamañoSector = 360 / 16;
            let númeroGanador = Math.floor(degNormalizado / tamañoSector) + 1;
            return númeroGanador;
        }

        function reiniciarNúmeros() {
            let elementosNúm = document.querySelectorAll('.numero');
            elementosNúm.forEach(function(elemento) {
                elemento.classList.remove("seleccionado", "deshabilitado");
                elemento.onclick = function() {
                    if (!girando) {
                        seleccionarNúmero(elemento, parseInt(elemento.textContent));
                    }
                };
                elemento.style.cursor = 'pointer';
            });
        }

        function reiniciar() {
            números = [];
            reiniciarNúmeros();
            alert("Selección reiniciada. Por favor selecciona un número.");
        }

        function actualizarPuntaje(puntaje, intentos) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../controlador/Actualizar_puntaje.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        console.log("Puntaje actualizado exitosamente.");
                        document.querySelector('.contenedor-puntaje').textContent = "Intentos: " + response.intentos;
                    } else {
                        console.log("Error al actualizar puntaje: " + response.error);
                    }
                }
            };
            xhr.send("puntaje=" + puntaje);
        }

        function mostrarMensaje(mensaje) {
            document.getElementById("mensaje").textContent = mensaje;
        }

        function actualizarPuntuación() {
            document.getElementById("puntaje").textContent = "Puntuación: " + puntaje;
        }

        window.onload = function() {
            generarNúmeros();
            actualizarPuntuación();
        };
    </script>

    <main>
        <section class="section1">
            <div class="fotoPerfil">
                <img src="<?php echo $row['foto'];?>" class="img-fluid" style="width: 150px; border-radius: 50%;">
                <h1 class="nombreJugador"></h1>
            </div>
            <center>
                <h1 class="tab">RULETA</h1>
                <p>Escoger una numero</p>
            </center>
            <div class="row">
                <div class="contenedor-numeros col-6" id="contenedor-numeros">
                    <div class="flecha" id="flecha"></div>
                    <!-- JavaScript generará los números aquí -->
                </div>
                <div class="col-6">
                    <center>
                        <a id="girar" onclick="girar()" class="btn btn-md">Jugar</a>
                        <a id="reiniciar" onclick="reiniciar()" class="btn btn-md">Reiniciar selección</a>
                    </center>
                    <!-- <button>Jugar</button>
                    <button>Reiniciar selección</button> -->
                    <div class="contenedor-puntaje">Intentos: <?php echo $row['intentos']; ?></div>         
                    <div class="contenedor-puntaje" id="puntaje"></div>
                    <div class="mensaje" id="mensaje"></div>
                </div>
            </div>
        </section>
    </main>
    <script src="../js/javascrip.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

