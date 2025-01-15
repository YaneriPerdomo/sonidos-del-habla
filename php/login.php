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



           
  //Search if the user already exists
  $search_user_query = "SELECT usuario FROM usuarios WHERE usuario = :user ";
  $search_user_stmt = $pdo->prepare($search_user_query);
  $search_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
  $search_user_stmt->execute();
  if ($search_user_stmt->rowCount() > 0) {
      echo "<script> 
                   alert('Lo sentimos, el nombre de usuario \"$user\" ya está en uso.')
                   window.location.href = './../view/createAccount.php';
                </script>";
      exit();
  }

  $pdo->beginTransaction();

  $hash = password_hash($password, PASSWORD_DEFAULT);
  $add_user_query = 'INSERT INTO usuarios (id_rol, usuario, clave, fecha_hora_creacion) VALUES (1, :user, :clave, NOW())';
  $add_user_stmt = $pdo->prepare($add_user_query);
  $add_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
  $add_user_stmt->bindParam('clave', $hash, PDO::PARAM_STR);
  $add_user_stmt->execute();

  $id_user = $pdo->lastInsertId();
  $add_patient_query = 'INSERT INTO pacientes (id_genero, id_usuario, id_profesional, nombre, apellido, fecha_nacimiento )
       VALUES (:id_gender, :id_user , :id_professional, :name_patient, :lastname, :date_birth)';
  $add_patient_stmt = $pdo->prepare($add_patient_query);
  $add_patient_stmt->bindParam('id_gender', $id_gender, PDO::PARAM_INT);
  $add_patient_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
  $add_patient_stmt->bindParam('id_professional', $id_professional, PDO::PARAM_INT);
  $add_patient_stmt->bindParam('name_patient', $name,  PDO::PARAM_STR);
  $add_patient_stmt->bindParam('lastname', $lastname, PDO::PARAM_STR);
  $add_patient_stmt->bindParam('date_birth', $date_birth, PDO::PARAM_STR);
  $add_patient_stmt->execute();

  $id_patient = $pdo->lastInsertId();

  $add_therapy_query = 'INSERT INTO terapias_lenguaje (id_paciente, ejercicios, duracion_cada_ejercicio, duracion_total, nota)
       VALUES (:id_paciente, :ejercicios, :duracion_cada_ejercicio, :duracion_total, :nota)';
  $add_therapy_stmt = $pdo->prepare($add_therapy_query);
  $add_therapy_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
  $add_therapy_stmt->bindParam('ejercicios', $input_therapys, PDO::PARAM_STR);
  $add_therapy_stmt->bindParam('duracion_cada_ejercicio', $duration_each_exercise, PDO::PARAM_STR);
  $add_therapy_stmt->bindParam('duracion_total', $session_duration, PDO::PARAM_STR);
  $add_therapy_stmt->bindParam('nota', $note, PDO::PARAM_STR);
  $add_therapy_stmt->execute();

  if (
      $representative_name != "" && $representative_lastname != "" && $representative_email != ""
      && $representative_phone_number != "" && $representative_secret_code != ""
  ) {
      $add_representative_query = 'INSERT INTO representantes (id_paciente, nombre, apellido, correo_electronico, numero_telefono, 
      clave_secreta)
           VALUES (:id_paciente, :nombre, :apellido, :correo_electronico, :numero_telefono, :codigo_secreto)';
      $add_representative_stmt = $pdo->prepare($add_representative_query);
      $add_representative_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
      $add_representative_stmt->bindParam('nombre', $representative_name, PDO::PARAM_STR);
      $add_representative_stmt->bindParam('apellido', $representative_lastname, PDO::PARAM_STR);
      $add_representative_stmt->bindParam('correo_electronico', $representative_email, PDO::PARAM_STR);
      $add_representative_stmt->bindParam('numero_telefono', $representative_phone_number, PDO::PARAM_INT);
      $add_representative_stmt->bindParam('codigo_secreto', $representative_secret_code, PDO::PARAM_STR);
      $add_representative_stmt->execute();
  }

  $dyslalia_phonemes_result = '';
  if(is_array($dyslalia_phonemes)){
      $dyslalia_phonemes_result = implode(',', $dyslalia_phonemes);
  }else{
      $dyslalia_phonemes_result = $dyslalia_phonemes;
  }

$add_patient_diagnosis_query = 'INSERT INTO pacientes_diagnostico (id_paciente, id_tipo_dislalia, fonemas, fecha_diagnostico, gravedad, observacion)
VALUES (:id_paciente, :id_tipo_dislalia, :fonemas, NOW(), :gravedad, :observacion);
';
$add_patient_diagnosis_stmt = $pdo->prepare($add_patient_diagnosis_query);
$add_patient_diagnosis_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
$add_patient_diagnosis_stmt->bindParam('id_tipo_dislalia',  $dyslalia_type, PDO::PARAM_INT);
$add_patient_diagnosis_stmt->bindParam('fonemas', $dyslalia_phonemes_result, PDO::PARAM_STR);

$add_patient_diagnosis_stmt->bindParam('gravedad', $dyslalia_gravity, PDO::PARAM_STR);
$add_patient_diagnosis_stmt->bindParam('observacion', $dyslalia_observations, PDO::PARAM_STR);


if (count($support_materials) != 0) {
foreach ($support_materials as $value) {
$add_support_material_query = 'INSERT INTO pacientes_materiales_apoyo (id_paciente, id_material_apoyo) VALUES (:id_paciente, :id_material_apoyo)';
$add_support_material_stmt = $pdo->prepare($add_support_material_query);
$add_support_material_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
$add_support_material_stmt->bindParam('id_material_apoyo', $value, PDO::PARAM_INT); 
$add_support_material_stmt->execute();
}
}

$pdo->commit();
