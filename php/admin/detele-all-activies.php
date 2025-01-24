<?php
include './../../php/connectionBD.php';

session_start();

try {
    $id_professional = $_SESSION['id_professional'];
    $delete_all_activities_query = "
    DELETE actividades FROM actividades INNER JOIN pacientes on actividades.id_paciente =
    pacientes.id_paciente WHERE pacientes.id_profesional = :id_professional
    ";
    $delete_all_activities_stmt = $pdo->prepare($delete_all_activities_query);
    $delete_all_activities_stmt->bindParam('id_professional', $id_professional, PDO::PARAM_INT);
    $delete_all_activities_stmt->execute();
    if($delete_all_activities_query == 0){
        echo "<script>alert('Error, debido a que no hay acividades');
        window.location.href = './../../view/professional/activities.php';</script>";
    }else if($delete_all_activities_stmt->rowCount() > 0) {
        echo "<script>alert('Operacion exitosa.');
             window.location.href = './../../view/professional/activities.php';</script>";
    } else {
        echo "<script>alert('Sucedio algun error.');
             window.location.href = './../../view/professional/activities.php';</script>";
    }
} catch (PDOException $ex) {
    echo $ex;
} finally {
    $pdo = null;
}
