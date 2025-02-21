<?php

session_start();


include "../connectionBD.php";

try {
    $id_patient = $_POST['id_patient'];
    $start = $_POST['start'];  // <-- Recibir la fecha de inicio
    $end = $_POST['end'];      // <-- Recibir la fecha de fin

    $get_attendance_query = 'SELECT id_sesion, fecha FROM sesiones WHERE id_paciente = :id_patient AND fecha >= :start AND fecha <= :end'; // <-- Filtrar por fecha

    $get_attendance_stmt = $pdo->prepare($get_attendance_query);
    $get_attendance_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
    $get_attendance_stmt->bindParam('start', $start, PDO::PARAM_STR); // <-- BindParam para start
    $get_attendance_stmt->bindParam('end', $end, PDO::PARAM_STR);   // <-- BindParam para end
    $get_attendance_stmt->execute();

    $row_attendace = $get_attendance_stmt->fetchAll(PDO::FETCH_ASSOC);

     
    $resultados_JSON = json_encode($row_attendace); // Codificar el array formateado

    header('Content-Type: application/json');
    echo $resultados_JSON;
} catch (PDOException $ex) {
    echo $ex->getMessage();
} finally {
    $pdo = null;
}
