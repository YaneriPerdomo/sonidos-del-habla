<?php

include '../../connectionBD.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $get_representative_query = 'SELECT clave_secreta FROM representantes WHERE correo_electronico = :email';
        $get_representative_stmt  = $pdo->prepare($get_representative_query);
        $get_representative_stmt->bindParam('email', $email, PDO::PARAM_STR);
        $get_representative_stmt->execute();
        $row_representative = $get_representative_stmt->fetch(PDO::FETCH_ASSOC);
        $hash_stored = $row_representative['clave_secreta'];
        if ($get_representative_stmt->rowCount() > 0) {
            if(password_verify($password, $hash_stored)){
                http_response_code(200);
                echo 'success';
            }
        } else {
            echo 'not found';
        }
    } else {
        http_response_code(405);
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>
