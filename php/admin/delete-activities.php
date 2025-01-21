<?php
include './../../php/connectionBD.php';

if ($pdo->errorCode() != 0) {
    echo "Error de conexión: " . $pdo->errorInfo()[2];
}
try {
    $id = $_GET["id"];
    $sqlDeleteHistoryChild = "DELETE FROM actividades WHERE id_actividad = :id";
    $query = $pdo->prepare($sqlDeleteHistoryChild);
    $query->bindParam('id', $id, PDO::PARAM_INT);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "<script>alert('El historial seleccionado ha sido eliminado.');
             window.location.href = './../../view/professional/dashboard.php';</script>";
    } else {
        echo "sucedio un error";
    }
} catch (PDOException $ex) {
    echo $ex;
}

$pdo = null;
