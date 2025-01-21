<?php
session_start();

include '../../connectionBD.php';
$id_patient = $_SESSION['id_patient'];

function add_history($state_messege, $id_paciente)
{
    include '../../connectionBD.php';

    try {
        $id_patient = $id_paciente;

        // Get necessary treatment from the database
        $get_necessary_treatment_query = 'SELECT ejercicios FROM terapias_lenguaje WHERE id_paciente = :id_paciente';
        $get_necessary_treatment_stmt = $pdo->prepare($get_necessary_treatment_query);
        $get_necessary_treatment_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
        $get_necessary_treatment_stmt->execute();
        $row_necessary_treatment = $get_necessary_treatment_stmt->fetch(PDO::FETCH_ASSOC);

        // Determine exercise types based on 'ejercicios' field
        $exercise_types = [];
        if (preg_match("/rotacismo0|rotacismo1|seseo0|seseo1/", $row_necessary_treatment['ejercicios'])) {
            $exercise_types[] = '<i>Ejercicios de pronunciación de fonemas.</i>';
        }
        if (preg_match("/musculos de la lengua0|musculos de la lengua1|el ritmo del habla0|el ritmo del habla1|labio0|labio1|mejilla0|mejilla1/", $row_necessary_treatment['ejercicios'])) {
            $exercise_types[] = '<i>Fortalecimiento muscular.</i>';
        }
        if (preg_match("/el ritmo del habla0|el ritmo del habla1/", $row_necessary_treatment['ejercicios'])) {
            $exercise_types[] = '<i>Fluidez.</i>';
        }

        // Construct the exercise list
        $exercises = implode(', ', $exercise_types);

        // Prepare the message
        $user = '<b> '. $_SESSION['user'].'</b>';
        $messege = '';
        if ($state_messege == 'completed') {
            $messege = "$user ha completado su sesión de terapia de: $exercises";
        } else {
            $messege = "$user ha completado de nuevo su sesión de terapia de: $exercises";
        }

        // Insert the history record
        $insert_history_query = 'INSERT INTO actividades (id_paciente, mensaje, fecha_hora) VALUES (:id_paciente, :mensaje, NOW())';
        $insert_history_stmt = $pdo->prepare($insert_history_query);
        $insert_history_stmt->bindParam('id_paciente', $id_paciente, PDO::PARAM_INT);
        $insert_history_stmt->bindParam('mensaje', $messege, PDO::PARAM_STR);
        $insert_history_stmt->execute();

        if ($insert_history_stmt->rowCount() > 0) {
        } else {
            echo 'error ';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}


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
