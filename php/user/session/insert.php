<?php
session_start();

include '../../connectionBD.php';
include '../../auxiliary.php';
$id_patient = $_SESSION['id_patient'];



try {


    // Verificar si ya se ha registrado una sesión para el paciente hoy
    $get_therapy_exercises_today_query = 'SELECT fecha FROM sesiones WHERE id_paciente = :id_patient AND DATE(fecha) =  CURDATE()';
    $get_therapy_exercises_today_stmt = $pdo->prepare($get_therapy_exercises_today_query);
    $get_therapy_exercises_today_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
    $get_therapy_exercises_today_stmt->execute();

    if ($get_therapy_exercises_today_stmt->rowCount() > 0) {
        // Si ya existe una sesión registrada hoy, mostrar mensaje y detener la ejecución
        add_history('completed_again', $id_patient);
        echo 'Muy bien, pero hoy ya hiciste tu terapia de lenguaje, pero que bueno que la vuelvas a hacer, eso la hace única!!';
        exit();
    } else {
        // Obtener las terapias de lenguaje del paciente
        $get_speech_therapys_query = 'SELECT ejercicios FROM terapias_lenguaje WHERE id_paciente = :id_patient';
        $get_speech_therapys_stmt = $pdo->prepare($get_speech_therapys_query);
        $get_speech_therapys_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
        $get_speech_therapys_stmt->execute();

        // Insertar registro de sesión
        if ($get_speech_therapys_stmt->rowCount() > 0) {
            $row_speech_therapys = $get_speech_therapys_stmt->fetch(PDO::FETCH_ASSOC);
            $speech_therapys = $row_speech_therapys['ejercicios'];
            $state = 'Completado';
            $insert_speech_therapies_query = 'INSERT INTO sesiones ( id_paciente,  ejercicios , fecha,estado,  observaciones,
             objetivos_alcanzados, evaluacion) VALUES (:id_paciente, :exercises , NOW(), :estado, :observaciones, 
             :objetivos_alcanzados, :evaluacion)';
            $insert_speech_therapies_stmt = $pdo->prepare($insert_speech_therapies_query);
            $insert_speech_therapies_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
            $insert_speech_therapies_stmt->bindParam('exercises', $speech_therapys, PDO::PARAM_STR);
            $insert_speech_therapies_stmt->bindParam('estado', $state, PDO::PARAM_STR);
            $insert_speech_therapies_stmt->bindParam('observaciones', $observations, PDO::PARAM_STR);
            $insert_speech_therapies_stmt->bindParam('objetivos_alcanzados', $objectives, PDO::PARAM_STR);
            $insert_speech_therapies_stmt->bindParam('evaluacion', $evaluacion, PDO::PARAM_STR);
            $insert_speech_therapies_stmt->execute();

            if ($insert_speech_therapies_stmt->rowCount() > 0) {
                echo 'success';
                //Insertar un historial indicando que el paciente completó su sesión
                add_history('completed', $id_patient);
            } else {
                echo 'error';
            }
        }
    }
} catch (PDOException $ex) {

    echo error_log($ex->getMessage());
    echo 'Oh no... Hay un error por parte de la base de datos: ' . $ex->getMessage();
}
