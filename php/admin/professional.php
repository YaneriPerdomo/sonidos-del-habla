<?php

session_start();

include '../connectionBD.php';
include '../auxiliary.php';
try {
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $state = $_POST['state'];

        switch ($state) {
            case 'update':
                
                $id_user = $_SESSION['id_user'];
                $user = $_POST['user'];
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $work_center = $_POST['work-center'];
                $specialty = $_POST['specialty'];

                
                $original_data_query = "SELECT usuarios.usuario, profesionales.id_especialidad, 
                profesionales.nombre, profesionales.apellido, profesionales.correo_electronico, profesionales.centro_trabajo
                FROM profesionales INNER JOIN usuarios ON profesionales.id_usuario = usuarios.id_usuario 
                WHERE usuarios.id_usuario = :id_user";
                $original_data_stmt = $pdo->prepare($original_data_query);
                $original_data_stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $original_data_stmt->execute();
                $row_original_data = $original_data_stmt->fetch(PDO::FETCH_ASSOC);


                $isModified = false;
                if (
                    $user == $row_original_data['usuario'] &&
                    $specialty == $row_original_data['id_especialidad'] &&
                    $name == $row_original_data['nombre'] &&
                    $lastname == $row_original_data['apellido'] &&
                    $email == $row_original_data['correo_electronico'] &&
                    $work_center == $row_original_data['centro_trabajo']
                ) {
                    return Header("Location:./../../view/professional/account/profile.php");
                }
 

                if ($user != $row_original_data['usuario']) {
                    $search_user_query = "SELECT usuario FROM usuarios WHERE usuario = :user AND id_usuario != :id_user; ";
                    $search_user_stmt = $pdo->prepare($search_user_query);
                    $search_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
                    $search_user_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);                    
                    $search_user_stmt->execute();
                    if ($search_user_stmt->rowCount() > 0) {
                        showMsg("Lo sentimos, la dirección de correo electrónico \"$user\" ya está en uso.", './../../view/professional/account/profile.php');
                        exit();
                    }
                }
 
                if ($email != $row_original_data['correo_electronico']) {
                    $search_email_query = "SELECT correo_electronico FROM profesionales WHERE correo_electronico = :email AND id_usuario != :id_user";
                    $search_email_stmt = $pdo->prepare($search_email_query);
                    $search_email_stmt->bindParam('email', $email, PDO::PARAM_STR);
                    $search_email_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);

                    $search_email_stmt->execute();
                    if ($search_email_stmt->rowCount() > 0) {
                         showMsg("Lo sentimos, la dirección de correo electrónico \"$email\" ya está en uso.", './../../view/professional/account/profile.php');
                        exit();
                    }
                }

                 $pdo->beginTransaction();
                $update_professional_query = 'UPDATE profesionales SET id_especialidad = :id_especialidad , nombre = :nameP,
                                                    apellido =:lastname, correo_electronico = :email, centro_trabajo = :work_center 
                                                        WHERE id_usuario = :id_usuario';
                $update_professional_stmt = $pdo->prepare($update_professional_query);
                $update_professional_stmt->bindParam('id_especialidad', $specialty , PDO::PARAM_INT );
                $update_professional_stmt->bindParam('nameP', $name , PDO::PARAM_STR );
                $update_professional_stmt->bindParam('lastname', $lastname , PDO::PARAM_STR );
                $update_professional_stmt->bindParam('work_center', $work_center , PDO::PARAM_STR );
                $update_professional_stmt->bindParam('email', $email , PDO::PARAM_STR );
                $update_professional_stmt->bindParam('id_usuario', $id_user , PDO::PARAM_INT );
                $update_professional_stmt->execute();

                 $update_user_query = 'UPDATE usuarios SET usuario = :user WHERE id_usuario = :id_user';
                $update_user_stmt = $pdo->prepare($update_user_query);
                $update_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
                $update_user_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
                $update_user_stmt->execute();

                if($update_professional_stmt->rowCount() > 0 || $update_user_stmt->rowCount() > 0){
                    showMsg('¡Datos actualizados exitosamente!', './../../view/professional/account/profile.php');
                    $_SESSION['email'] = $email;
                    $_SESSION['user'] = $user;
                    $pdo->commit();
                }else{
                    showMsg('Sucedio algun error', './../../view/professional/account/profile.php');
                    $pdo->rollBack();
                }
                break;
            case 'change_password';

                $id_user = $_SESSION['id_user'];
                $new_password = $_POST['new-password'];

                $hash_password = password_hash($new_password, PASSWORD_DEFAULT);

                $update_password_query = 'UPDATE usuarios SET clave = :cloud WHERE id_usuario = :id_user';
                $update_password_stmt = $pdo->prepare($update_password_query);
                $update_password_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
                $update_password_stmt->bindParam('cloud', $hash_password , PDO::PARAM_STR);
                $update_password_stmt->execute();
                if($update_password_stmt->rowCount() > 0){
                    showMsg('¡Contraseña cambiada exitosamente!', './../../view/professional/account/profile.php');
                }else{
                    showMsg('Sucedio algun error', './../../view/professional/account/profile.php');
                }

            break;
            case 'delete_account';

            break;
            default:
                echo 'Que paso con el valor state. :/';
            break;
        }
    }
} catch (PDOException $ex) {
    echo 'Oh no... Hay un error por parte de la base de datos: ' .$ex->getMessage();
}

?>