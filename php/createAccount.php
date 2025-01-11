<?php

include_once './connectionBD.php';

try {
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $name = trim($_POST['name']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $specialty = trim($_POST['specialty']);
        $work_center = trim($_POST['work-center']);
        $user = trim($_POST['user']);
        $password = trim($_POST['password']);

        $search_user_query = "SELECT usuario FROM usuarios WHERE usuario = :user ";
        $search_user_stmt = $pdo->prepare($search_user_query);
        $search_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
        $search_user_stmt->execute();
        if($search_user_stmt->rowCount() > 0){
            echo "<script> 
                    alert('Lo sentimos, el nombre de usuario \"$user\" ya está en uso.')
                    window.location.href = './../view/createAccount.php';
                 </script>";
            exit();
        } 
        
        $search_email_query = "SELECT correo_electronico FROM profesionales WHERE correo_electronico = :email";
        $search_email_stmt = $pdo->prepare($search_email_query);
        $search_email_stmt->bindParam('email', $email, PDO::PARAM_STR);
        $search_email_stmt->execute();
        if($search_email_stmt->rowCount() > 0){
            echo "<script> 
                    alert('Lo sentimos, la dirección de correo electrónico \"$email\" ya está en uso.')
                    window.location.href = './../view/createAccount.php';
                 </script>";
            exit();
        } 

        $pdo->beginTransaction();

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $insert_user_query = 'INSERT INTO usuarios (id_rol , usuario, clave, fecha_hora_creacion) VALUES ( 2, :user, :clue, NOW())';
        $insert_user_stmt = $pdo->prepare($insert_user_query);
        $insert_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
        $insert_user_stmt->bindParam('clue', $hash, PDO::PARAM_STR);
        $insert_user_stmt->execute();

        $id_user = $pdo->lastInsertId();

        $insert_professional_query = 'INSERT INTO profesionales (id_usuario, id_especialidad,  nombre, apellido, correo_electronico, centro_trabajo) 
                                            VALUES (:id_user, :specialty,  :nameP, :lastname, :email, :work_center)';
        $insert_professional_stmt = $pdo->prepare($insert_professional_query);
        $insert_professional_stmt->bindParam('specialty',  $specialty , PDO::PARAM_INT);
        $insert_professional_stmt->bindParam('id_user',$id_user, PDO::PARAM_INT);
        $insert_professional_stmt->bindParam('nameP', $name, PDO::PARAM_STR);
        $insert_professional_stmt->bindParam('lastname', $lastname, PDO::PARAM_STR);
        $insert_professional_stmt->bindParam('email', $email, PDO::PARAM_STR);
        $insert_professional_stmt->bindParam('work_center', $work_center, PDO::PARAM_STR);
        $insert_professional_stmt->execute();

        if($insert_professional_stmt->rowCount() > 0 && $insert_user_stmt->rowCount() > 0){
            
            $pdo->commit();
            echo "<script> window.location.href = './../view/login.php';</script>";
        
        }     
    }
} catch (PDOException $ex) {
    $pdo->rollBack();
    echo $ex->getMessage();
}finally{
    $pdo = null;
}
?>