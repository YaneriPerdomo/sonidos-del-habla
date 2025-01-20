<?php

include '../../connectionBD.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $get_representative_query = 'SELECT nombre FROM representantes WHERE correo_electronico = :email AND clave_secreta = :clave_secreta';
        $get_representative_stmt  = $pdo->prepare($get_representative_query);
        $get_representative_stmt->bindParam('email', $email, PDO::PARAM_STR);
        $get_representative_stmt->bindParam('clave_secreta', $password, PDO::PARAM_STR);
        $get_representative_stmt->execute();

        if ($get_representative_stmt->rowCount() > 0) {
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
    echo $ex->getMessage();
}
?>
