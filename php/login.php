<?php

include './connectionBD.php';
include './auxiliary.php';
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $user = trim($_POST["user"]);
        $password = trim($_POST["password"]);

        $search_user_query = 'SELECT usuario, clave, id_usuario, id_rol FROM usuarios WHERE usuario = :user';
        $search_user_stmt = $pdo->prepare($search_user_query);
        $search_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
        $search_user_stmt->execute();

        if ($search_user_stmt->rowCount() > 0) {
            $row_user = $search_user_stmt->fetch(PDO::FETCH_ASSOC);
            $hash_stored = $row_user['clave'];

            if (password_verify($password, $hash_stored)) {
                $update_last_access_query = 'UPDATE usuarios SET ultimo_acceso = NOW() WHERE usuario = :user';
                $update_last_access_stmt = $pdo->prepare($update_last_access_query);
                $update_last_access_stmt->bindParam('user', $user, PDO::PARAM_STR);
                $update_last_access_stmt->execute();
                session_start();
                switch ($row_user['id_rol']) {
                    case 1:

                        break;
                    case 2:
                        $get_dates_professional_query = 'SELECT id_profesional, nombre, apellido, correo_electronico FROM profesionales WHERE id_usuario = :id_user';
                        $get_dates_professional_stmt = $pdo->prepare($get_dates_professional_query);
                        $get_dates_professional_stmt->bindParam('id_user', $row_user['id_usuario'], PDO::PARAM_INT);
                        $get_dates_professional_stmt->execute();

                        $row_professional = $get_dates_professional_stmt->fetch(PDO::FETCH_ASSOC);

                        $_SESSION['id_user'] = $row_user["id_usuario"];
                        $_SESSION['id_professional'] = $row_professional['id_profesional'];
                        $_SESSION['user'] = $row_user['usuario'];
                        $_SESSION['email'] = $row_professional['correo_electronico'];
                        header('Location: ../view/professional/dashboard.php', true, 301);
                        break;
                    default:

                        break;
                }
                echo "Sesión iniciada";
            } else {
                showMsg('Lo sentimos, no pudimos encontrar una cuenta con esos datos.', './../view/login.php');
            }
        } else {
            showMsg('Lo sentimos, no pudimos encontrar una cuenta con esos datos.', './../view/login.php');
        }
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
