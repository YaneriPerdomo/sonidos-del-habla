<?php

session_start();

include '../../connectionBD.php';
include '../../auxiliary.php';

$id_patient = $_SESSION['id_patient'];
$user = $_SESSION['user'];
$id_support_material = intval($_POST['id_support_material']);
$grade_end = $_POST['grade_end']    ;
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        add_history_material_support($id_support_material, $id_patient, $user, $grade_end);
        //Si existe calificación 
        $get_rating_display_query = "SELECT calificacion FROM calificaciones_materiales_apoyo WHERE id_paciente = :id_patient AND id_material_apoyo = :id_support_material";
        $get_rating_display_stmt = $pdo->prepare($get_rating_display_query);
        $get_rating_display_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
        $get_rating_display_stmt->bindParam('id_support_material', $id_support_material, PDO::PARAM_INT);
        $get_rating_display_stmt->execute();

   
        if ($get_rating_display_stmt->rowCount() > 0) {
            //Update data
            $update_rating_display_query = "UPDATE calificaciones_materiales_apoyo 
                                SET   calificacion = :grade WHERE  id_paciente = :id_patient AND id_material_apoyo = :id_support_material";
            $update_rating_display_stmt = $pdo->prepare($update_rating_display_query);
            if ($update_rating_display_stmt === false) { //Si la consulta no esta preparada correctamente entonces//
                throw new Exception("Error preparing statement: " . print_r($pdo->errorInfo(), true)); 
            }
            $update_rating_display_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
            $update_rating_display_stmt->bindParam('id_support_material', $id_support_material, PDO::PARAM_INT);
            $update_rating_display_stmt->bindParam('grade', $grade_end, PDO::PARAM_STR);
            $update_rating_display_stmt->execute();
            if ($update_rating_display_stmt->rowCount() == 1) {
                echo 'success'; //Code 200 operacion exitosa
                 
            } else {
                http_response_code(204);
            }
        } else {
            $insert_rating_display_query = "INSERT INTO calificaciones_materiales_apoyo (id_material_apoyo , id_paciente , calificacion) VALUES (:id_support_material, :id_patient, :grade)";
            $insert_rating_display_stmt = $pdo->prepare($insert_rating_display_query);
            $insert_rating_display_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
            $insert_rating_display_stmt->bindParam('id_support_material', $id_support_material, PDO::PARAM_INT);
            $insert_rating_display_stmt->bindParam('grade', $grade_end, PDO::PARAM_STR);
            $insert_rating_display_stmt->execute();
            if ($insert_rating_display_stmt->rowCount() > 0) {
                echo 'success'; //Code 200 operacion exitosa
               
            } else {
                http_response_code(204);
            }
        }
    } else {
        echo http_response_code(405);
        exit();
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}finally{
    $pdo = null;
}

?>
