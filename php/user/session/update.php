<?php
session_start();

include '../../connectionBD.php';
$id_patient = $_SESSION['id_patient'];

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $observations = $_POST['observations'] ?? '';
        $evaluation = $_POST['evaluation'] ?? '';
        $objectives = $_POST['objectives'] ?? '';

        $add_observations_query = 'UPDATE sesiones
        SET observaciones = :observaciones, 
        objetivos_alcanzados = :objetivos_alcanzados, 
        evaluacion = :evaluacion WHERE id_paciente = :id_paciente AND DATE(fecha) = CURDATE()';
        $add_observations_stmt  = $pdo->prepare($add_observations_query);
        $add_observations_stmt->bindParam('observaciones', $observations, PDO::PARAM_STR);
        $add_observations_stmt->bindParam('evaluacion', $evaluation, PDO::PARAM_INT);
        $add_observations_stmt->bindParam('objetivos_alcanzados', $objectives, PDO::PARAM_STR);
        $add_observations_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_STR);
        $add_observations_stmt->execute();

        if ($add_observations_stmt->rowCount() > 0) {
            http_response_code(200);
            echo 'success';
        } else {
            http_response_code(404);
            echo 'not found';
        }
    } else {
        http_response_code(405);
    }
} catch (PDOException $ex) {
    http_response_code(500);
    echo $ex->getMessage();
}
?>