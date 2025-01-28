<?php

include './../../php/connectionBD.php';
include './../../php/validation/authorized-user.php';

$id_profesional = $_SESSION["id_professional"];
$inicio = $_POST["inicio"];

// Obtener el total de mensajes
$sqlCountHistorial = "SELECT count(mensaje) AS mensajes FROM actividades
                  INNER JOIN pacientes on actividades.id_paciente = pacientes.id_paciente
                    WHERE   pacientes.id_profesional = :id ";
$queryCount = $pdo->prepare($sqlCountHistorial);
$queryCount->bindParam('id', $id_profesional, PDO::PARAM_INT);

$queryCount->execute();
$resultsCount = $queryCount->fetch(PDO::FETCH_ASSOC); // Obtener solo el primer resultado
$totalMensajes = $resultsCount['mensajes'];

// Obtener los siguientes 2 mensajes
$sqlHistorial = "SELECT id_actividad, mensaje, fecha_hora FROM actividades
                  INNER JOIN pacientes on actividades.id_paciente = pacientes.id_paciente
                 WHERE    pacientes.id_profesional = :id ORDER by actividades.fecha_hora DESC LIMIT 4 OFFSET :offs ";
$query = $pdo->prepare($sqlHistorial);
$query->bindParam('id', $id_profesional, PDO::PARAM_INT);

$query->bindParam('offs', $inicio, PDO::PARAM_INT);
$query->execute();



if ($query->rowCount() > 0) {
    $resultadosJSON = json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    // Enviar el encabezado y los datos
    header('Content-Type: application/json');
    echo $resultadosJSON;
} else {
    $error = array('statu' => true);
    $resultJson = json_encode($error);
    header('Content-Type: application/json');
    echo $resultJson;
}
