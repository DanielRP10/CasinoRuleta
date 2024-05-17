<?php
session_start();
include "../modelo/conexion.php";

if (isset($_POST['puntaje'])) {
    $iduser = $_SESSION["idJugador"];
    $puntaje = $_POST['puntaje'];

    $sql = $conexion->prepare("SELECT intentos FROM Jugadores WHERE idJugador = ?");
    $sql->bind_param("i", $iduser);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();
    $intentos = $row['intentos'];

    $intentos += 1;

    if ($intentos > 5) {
        echo json_encode(["success" => false, "error" => "Máximo de intentos alcanzado"]);
    } else {
        $sql = $conexion->prepare("UPDATE Jugadores SET puntaje = ?, intentos = ? WHERE idJugador = ?");
        $sql->bind_param("iii", $puntaje, $intentos, $iduser);

        if ($sql->execute()) {
            echo json_encode(["success" => true, "intentos" => $intentos]);
        } else {
            echo json_encode(["success" => false, "error" => $sql->error]);
        }
    }
}
?>
