<?php
session_start();

include '../connectionBD.php';
include '../auxiliary.php';
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $state = $_POST['state'];

        switch ($state) {
            case 'add':
                //Patient
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $date_birth = $_POST['date-birth'];
                $id_gender = $_POST['id-gender'];
                $id_professional =  $_SESSION['id_professional'];
                //representative
                $representative_name = $_POST['representative__name'] ?? '';
                $representative_lastname = $_POST['representative__lastname'] ?? '';
                $representative_email = $_POST['representative__email'] ?? '';
                $representative_phone_number = $_POST['representative-phone-number'] ?? '';
                $representative_secret_code = $_POST['representative__secret-code'] ?? '';

                //User
                $user = $_POST['user'];
                $password = $_POST['password'];
                $id_avatar = $_POST['id-avatar'] ?? 0;

                //Information about dyslalia
                $dyslalia_type = $_POST['dyslalia-type'] ?? NULL;
                $dyslalia_classification = $_POST['classification'] ?? NULL;
                $dyslalia_observations = $_POST['observations'] ?? '';
                $dyslalia_phonemes = $_POST['phonemes'] ?? null;
                $dyslalia_gravity = $_POST['gravity'] ?? null;

                //Personalization of the therapy session
                $duration_each_exercise = $_POST['duration-each-exercise'] ?? NULL;
                $session_duration = $_POST['duration-each-exercise'] ?? NULL;
                $input_therapys = $_POST['input-therapys'];
                $support_materials = $_POST['support-materials'] ?? [];
                $note = $_POST['note'] ?? null;

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
                //Search if the email of representative already exists
                $search_email_representative_query = "SELECT correo_electronico FROM representantes WHERE correo_electronico = :email ";
                $search_email_representative_stmt = $pdo->prepare($search_email_representative_query);
                $search_email_representative_stmt->bindParam('email', $representative_email, PDO::PARAM_STR);
                $search_email_representative_stmt->execute();
                if ($search_email_representative_stmt->rowCount() > 0) {
                    echo "<script> 
                        alert('Lo siento, el correo electrónico del representante del paciente \"$representative_email\" ya está en uso.')
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

                $add_avatar_query = 'INSERT INTO pacientes_avatar(id_paciente, id_avatar) VALUES (:id_patient, :id_avatar)';
                $add_avatar_stmt = $pdo->prepare($add_avatar_query);
                $add_avatar_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $add_avatar_stmt->bindParam('id_avatar', $id_avatar, PDO::PARAM_INT);
                $add_avatar_stmt->execute();

                if (
                    $representative_name != "" || $representative_lastname != "" || $representative_email != ""
                    && $representative_phone_number != "" || $representative_secret_code != ""
                ) {
                    $add_representative_query = 'INSERT INTO representantes (id_paciente, nombre, apellido, correo_electronico, numero_telefonico, 
                    clave_secreta) VALUES (:id_paciente, :nombre, :apellido, :correo_electronico, :numero_telefonico, :codigo_secreto)';
                    $add_representative_stmt = $pdo->prepare($add_representative_query);
                    $add_representative_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                    $add_representative_stmt->bindParam('nombre', $representative_name, PDO::PARAM_STR);
                    $add_representative_stmt->bindParam('apellido', $representative_lastname, PDO::PARAM_STR);
                    $add_representative_stmt->bindParam('correo_electronico', $representative_email, PDO::PARAM_STR);
                    $add_representative_stmt->bindParam('numero_telefonico', $representative_phone_number, PDO::PARAM_INT);
                    $hash_secrect_code = password_hash($representative_secret_code, PASSWORD_DEFAULT);
                    $add_representative_stmt->bindParam('codigo_secreto', $hash_secrect_code, PDO::PARAM_STR);
                    $add_representative_stmt->execute();
                }
                $add_patient_diagnosis_query = 'INSERT INTO pacientes_diagnosticados (id_paciente, id_tipo_dislalia,id_calificacion_dislalia ,  fecha_diagnostico , fonemas, 
                gravedad, observacion) VALUES (:id_paciente, :id_tipo_dislalia, :id_calificacion_dislalia, DATE(NOW()),  :fonemas,  :gravedad,  :observacion)';

                $add_patient_diagnosis_stmt = $pdo->prepare($add_patient_diagnosis_query);
                $add_patient_diagnosis_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                $add_patient_diagnosis_stmt->bindParam('id_tipo_dislalia',  $dyslalia_type, PDO::PARAM_INT);
                $add_patient_diagnosis_stmt->bindParam('id_calificacion_dislalia', $dyslalia_classification, PDO::PARAM_INT);
                $add_patient_diagnosis_stmt->bindParam('fonemas', $dyslalia_phonemes, PDO::PARAM_STR);
                $add_patient_diagnosis_stmt->bindParam('gravedad', $dyslalia_gravity, PDO::PARAM_STR);
                $add_patient_diagnosis_stmt->bindParam('observacion', $dyslalia_observations, PDO::PARAM_STR);
                $add_patient_diagnosis_stmt->execute();

                if (count($support_materials) != 0) {
                    foreach ($support_materials as $value) {
                        $add_support_material_query = 'INSERT INTO pacientes_materiales_apoyo (id_paciente, id_material_apoyo) VALUES (:id_paciente, :id_material_apoyo)';
                        $add_support_material_stmt = $pdo->prepare($add_support_material_query);
                        $add_support_material_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                        $add_support_material_stmt->bindParam('id_material_apoyo', $value, PDO::PARAM_INT);
                        $add_support_material_stmt->execute();
                    }
                }

                $pdo->commit(); //Confirmacion de la transaccion

                //Mostrar mensaje de manera exitosa
                showMsg('Datos del paciente registrados exitosamente', './../../view/professional/dashboard.php');

                break;
            case 'update';

                $id_patient = $_POST['id_patient'];

                //Datos del paciente
                $name = trim($_POST['name']);
                $lastname = trim($_POST['lastname']);
                $date_birth = trim($_POST['date-birth']);
                $id_gender = trim($_POST['id-gender']);
                $id_professional = trim($_SESSION['id_professional']);

                //representative
                $representative_name = trim($_POST['representative__name'] ?? '');
                $representative_lastname = trim($_POST['representative__lastname'] ?? '');
                $representative_email = trim($_POST['representative__email'] ?? '');
                $representative_phone_number = trim($_POST['representative-phone-number'] ?? '');
                $representative_secret_code = trim($_POST['representative__secret-code'] ?? '');

                //User
                $user = trim($_POST['user']);
                $password = trim($_POST['password']);
                $id_avatar = $_POST['id-avatar'] ?? 0;

                //Information about dyslalia
                $dyslalia_type = trim($_POST['dyslalia-type'] ?? NULL);
                $dyslalia_classification = trim($_POST['classification'] ?? NULL);
                $dyslalia_observations = trim($_POST['observations'] ?? '');
                $dyslalia_phonemes = trim($_POST['phonemes'] ?? null);
                $dyslalia_gravity = trim($_POST['gravity'] ?? null);

                //Personalization of the therapy session
                $duration_each_exercise = trim($_POST['duration-each-exercise'] ?? NULL);
                $session_duration = trim($_POST['duration-each-exercise'] ?? NULL); 
                $input_therapys = trim($_POST['input-therapys']);
                $support_materials = $_POST['support-materials'] ?? []; 
                $note = trim($_POST['note'] ?? null);
                $search_user_query = "SELECT 
                                        usuario , usuarios.id_usuario AS id_usuario
                                    FROM 
                                        usuarios
                                    INNER JOIN 
                                        pacientes ON usuarios.id_usuario = pacientes.id_usuario
                                    WHERE 
                                        usuario = :user AND id_paciente != :id_paciente";
                $search_user_stmt = $pdo->prepare($search_user_query);
                $search_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
                $search_user_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_STR);
                $search_user_stmt->execute();

                if ($search_user_stmt->rowCount() > 0) {
                    showMsg(
                        "Lo sentimos, el nombre de usuario \"$user\" ya está en uso.",
                        "./../../view/professional/patient/modify.php?id=" . $id_patient . ""
                    );
                    return false;
                }

                $search_representative_query = "SELECT correo_electronico FROM representantes WHERE correo_electronico = :email AND id_paciente != :id_paciente";
                $search_representative_stmt = $pdo->prepare($search_representative_query);
                $search_representative_stmt->bindParam('email', $representative_email, PDO::PARAM_STR);
                $search_representative_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                $search_representative_stmt->execute();

                if ($search_representative_stmt->rowCount() > 0) {
                    showMsg(
                        "Lo sentimos, el correo electronico del representante \"$representative_email\" ya está en uso.",
                        "./../../view/professional/patient/modify.php?id=" . $id_patient . ""
                    );

                    return false;
                }

                if (
                    $representative_name != "" || $representative_lastname != "" || $representative_email != ""
                    && $representative_phone_number != "" || $representative_secret_code != ""
                ) {
                    $if_representative_query = "SELECT nombre FROM representantes WHERE id_paciente =:id_paciente";
                    $if_representative_stmt = $pdo->prepare($if_representative_query);
                    $if_representative_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                    $if_representative_stmt->execute();
                    echo 'end2 <br>';
                    if ($if_representative_stmt->rowCount() > 0) {

                        if ($representative_secret_code != "") {
                            $update_representative_query = 'UPDATE  representantes SET nombre = :nombre, apellido =:apellido ,correo_electronico =:correo_electronico,  
                            numero_telefonico =:numero_telefonico, clave_secreta =:clave_secreta WHERE id_paciente =:id_paciente';
                            $update_representative_stmt = $pdo->prepare($update_representative_query);
                            $update_representative_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                            $update_representative_stmt->bindParam('nombre', $representative_name, PDO::PARAM_STR);
                            $update_representative_stmt->bindParam('apellido', $representative_lastname, PDO::PARAM_STR);
                            $update_representative_stmt->bindParam('correo_electronico', $representative_email, PDO::PARAM_STR);
                            $update_representative_stmt->bindParam('numero_telefonico', $representative_phone_number, PDO::PARAM_INT);
                            $hash_secrect_code = password_hash($representative_secret_code, PASSWORD_DEFAULT);
                            $update_representative_stmt->bindParam('clave_secreta', $hash_secrect_code, PDO::PARAM_STR);
                            $update_representative_stmt->execute();
                        } else {
                            $update_representative_query = 'UPDATE  representantes SET nombre = :nombre, apellido =:apellido ,correo_electronico =:correo_electronico,  
                            numero_telefonico =:numero_telefonico WHERE id_paciente =:id_paciente';
                            $update_representative_stmt = $pdo->prepare($update_representative_query);
                            $update_representative_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                            $update_representative_stmt->bindParam('nombre', $representative_name, PDO::PARAM_STR);
                            $update_representative_stmt->bindParam('apellido', $representative_lastname, PDO::PARAM_STR);
                            $update_representative_stmt->bindParam('correo_electronico', $representative_email, PDO::PARAM_STR);
                            $update_representative_stmt->bindParam('numero_telefonico', $representative_phone_number, PDO::PARAM_INT);
                            $hash_secrect_code = password_hash($representative_secret_code, PASSWORD_DEFAULT);
                            $update_representative_stmt->execute();
                        }
                    } else {
                        $add_representative_query = 'INSERT INTO representantes (id_paciente, nombre, apellido, correo_electronico, numero_telefonico, 
                        clave_secreta) VALUES (:id_paciente, :nombre, :apellido, :correo_electronico, :numero_telefonico, :codigo_secreto)';
                        $add_representative_stmt = $pdo->prepare($add_representative_query);
                        $add_representative_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                        $add_representative_stmt->bindParam('nombre', $representative_name, PDO::PARAM_STR);
                        $add_representative_stmt->bindParam('apellido', $representative_lastname, PDO::PARAM_STR);
                        $add_representative_stmt->bindParam('correo_electronico', $representative_email, PDO::PARAM_STR);
                        $add_representative_stmt->bindParam('numero_telefonico', $representative_phone_number, PDO::PARAM_INT);
                        $hash_secrect_code = password_hash($representative_secret_code, PASSWORD_DEFAULT);
                        $add_representative_stmt->bindParam('codigo_secreto', $hash_secrect_code, PDO::PARAM_STR);
                        $add_representative_stmt->execute();
                    }
                }

                $get_id_user_query = "SELECT 
                                    usuarios.id_usuario AS id_usuario
                                    FROM 
                                        usuarios
                                    INNER JOIN 
                                        pacientes ON usuarios.id_usuario = pacientes.id_usuario
                                    WHERE 
                                        id_paciente =:id_paciente";
                $get_id_user_stmt = $pdo->prepare($get_id_user_query);
                $get_id_user_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_STR);
                $get_id_user_stmt->execute();
                $row_id_user = $get_id_user_stmt->fetch(PDO::FETCH_ASSOC);
                $id_user = $row_id_user['id_usuario'];

                if ($password != "") {
                    $update_user_query = 'UPDATE usuarios SET usuario =:user, clave =:clave WHERE id_usuario =:id_user';
                    $update_user_stmt = $pdo->prepare($update_user_query);
                    $update_user_stmt->bindParam('user', $user, PDO::PARAM_STR);
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $update_user_stmt->bindParam('clave', $hash, PDO::PARAM_STR);
                    $update_user_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
                    $update_user_stmt->execute();
                } else {
                    $update_user_query = 'UPDATE usuarios SET usuario =:user WHERE id_usuario =:id_user';
                    $update_user_stmt = $pdo->prepare($update_user_query);
                    $update_user_stmt->bindParam('user', $user, PDO::PARAM_STR);

                    $update_user_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
                    $update_user_stmt->execute();
                }

                $update_patient_query = 'UPDATE pacientes SET nombre = :nombre, apellido = :apellido, id_genero = :id_genero, fecha_nacimiento = :fecha_nacimiento 
                WHERE id_paciente = :id_paciente';
                $update_patient_stmt = $pdo->prepare($update_patient_query);
                $update_patient_stmt->bindParam('nombre', $name, PDO::PARAM_STR);
                $update_patient_stmt->bindParam('apellido', $lastname, PDO::PARAM_STR);
                $update_patient_stmt->bindParam('fecha_nacimiento', $date_birth, PDO::PARAM_STR);
                $update_patient_stmt->bindParam('id_genero', $id_gender, PDO::PARAM_INT);
                $update_patient_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                $update_patient_stmt->execute();

                $update_patient_diagnosis_query = 'UPDATE pacientes_diagnosticados SET 
                id_tipo_dislalia = :id_tipo_dislalia, id_calificacion_dislalia = :id_calificacion_dislalia,
                fonemas = :fonemas, gravedad = :gravedad, observacion =:observacion WHERE id_paciente  = :id_paciente';

                $update_patient_diagnosis_stmt = $pdo->prepare($update_patient_diagnosis_query);
                $update_patient_diagnosis_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                $update_patient_diagnosis_stmt->bindParam('id_tipo_dislalia',  $dyslalia_type, PDO::PARAM_INT);
                $update_patient_diagnosis_stmt->bindParam('id_calificacion_dislalia', $dyslalia_classification, PDO::PARAM_INT);
                $update_patient_diagnosis_stmt->bindParam('fonemas', $dyslalia_phonemes, PDO::PARAM_STR);
                $update_patient_diagnosis_stmt->bindParam('gravedad', $dyslalia_gravity, PDO::PARAM_STR);
                $update_patient_diagnosis_stmt->bindParam('observacion', $dyslalia_observations, PDO::PARAM_STR);
                $update_patient_diagnosis_stmt->execute();

                $update_therapy_query = 'UPDATE   terapias_lenguaje SET  ejercicios = :ejercicios, duracion_cada_ejercicio = :duracion_cada_ejercicio, duracion_total =:duracion_total, 
                nota = :nota WHERE  id_paciente = :id_paciente ';
                $update_therapy_stmt = $pdo->prepare($update_therapy_query);
                $update_therapy_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                $update_therapy_stmt->bindParam('ejercicios', $input_therapys, PDO::PARAM_STR);
                $update_therapy_stmt->bindParam('duracion_cada_ejercicio', $duration_each_exercise, PDO::PARAM_STR);
                $update_therapy_stmt->bindParam('duracion_total', $session_duration, PDO::PARAM_STR);
                $update_therapy_stmt->bindParam('nota', $note, PDO::PARAM_STR);
                $update_therapy_stmt->execute();

                $delete_support_matarials_query = "DELETE FROM pacientes_materiales_apoyo WHERE id_paciente =:id_paciente";
                $delete_support_matarials_stmt = $pdo->prepare($delete_support_matarials_query);
                $delete_support_matarials_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                $delete_support_matarials_stmt->execute();

                if (count($support_materials) != 0) {
                    foreach ($support_materials as $value) {
                        $add_support_material_query = 'INSERT INTO pacientes_materiales_apoyo (id_paciente, id_material_apoyo) VALUES (:id_paciente, :id_material_apoyo)';
                        $add_support_material_stmt = $pdo->prepare($add_support_material_query);
                        $add_support_material_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
                        $add_support_material_stmt->bindParam('id_material_apoyo', $value, PDO::PARAM_INT);
                        $add_support_material_stmt->execute();
                    }
                }

                $update_avatar_query = 'UPDATE pacientes_avatar SET id_avatar = :id_avatar WHERE id_paciente = :id_patient';
                $update_avatar_stmt = $pdo->prepare($update_avatar_query);
                $update_avatar_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $update_avatar_stmt->bindParam('id_avatar', $id_avatar, PDO::PARAM_INT);
                $update_avatar_stmt->execute();
                echo $id_avatar;
                showMsg(
                    "Datos del paciente actualizados con éxito.",
                    './../../view/professional/dashboard.php'
                );

              

                break;
            case 'delete';

                $id_patient = $_POST['id_patient'];
                $id_user = $_POST['id_user'];

                $pdo->beginTransaction();
                $delete_activities_query = "DELETE FROM actividades WHERE id_paciente = :id_patient";
                $delete_activities_stmt = $pdo->prepare($delete_activities_query);
                $delete_activities_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_activities_stmt->execute();

                $delete_therapy_query = "DELETE FROM terapias_lenguaje WHERE id_paciente = :id_patient";
                $delete_therapy_stmt = $pdo->prepare($delete_therapy_query);
                $delete_therapy_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_therapy_stmt->execute();

                $delete_patient_diagnosticodo_query = "DELETE FROM pacientes_diagnosticados WHERE id_paciente = :id_patient";
                $delete_patient_diagnosticodo_stmt = $pdo->prepare($delete_patient_diagnosticodo_query);
                $delete_patient_diagnosticodo_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_patient_diagnosticodo_stmt->execute();

                $delete_paciente_materiales_apoyo_query = "DELETE FROM pacientes_materiales_apoyo WHERE id_paciente = :id_patient";
                $delete_paciente_materiales_apoyo_stmt = $pdo->prepare($delete_paciente_materiales_apoyo_query);
                $delete_paciente_materiales_apoyo_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_paciente_materiales_apoyo_stmt->execute();

                $delete_avatar_query = "DELETE FROM pacientes_avatar WHERE id_paciente = :id_patient";
                $delete_avatar_stmt = $pdo->prepare($delete_avatar_query);
                $delete_avatar_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_avatar_stmt->execute();

                $delete_representative_query = "DELETE FROM representantes WHERE id_paciente = :id_patient";
                $delete_representative_stmt = $pdo->prepare($delete_representative_query);
                $delete_representative_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_representative_stmt->execute();

                $delete_sessions_query = "DELETE FROM sesiones WHERE id_paciente = :id_patient";
                $delete_sessions_stmt = $pdo->prepare($delete_sessions_query);
                $delete_sessions_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_sessions_stmt->execute();

                $delete_user_query = "DELETE FROM usuarios WHERE id_usuario = :id_user";
                $delete_user_stmt = $pdo->prepare($delete_user_query);
                $delete_user_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
                $delete_user_stmt->execute();

                $delete_patient_query = "DELETE FROM pacientes WHERE id_paciente = :id_patient";
                $delete_patient_stmt = $pdo->prepare($delete_activities_query);
                $delete_patient_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_patient_stmt->execute();

                $delete_grades_support_materials_query = "DELETE FROM calificaciones_materiales_apoyo WHERE id_paciente = :id_patient";
                $delete_grades_support_materials_stmt = $pdo->prepare($delete_activities_query);
                $delete_grades_support_materials_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
                $delete_grades_support_materials_stmt->execute();

              
                $pdo->commit();
                showMsg('Datos del paciente eliminados exitosamente', './../../view/professional/dashboard.php');


                
              
                break;
            default:
                echo 'Que paso con el valor de state. :/';
                break;
        }
    }
} catch (PDOException $ex) {

    echo 'Oh no... Hay un error por parte de la base de datos: ' . $ex->getMessage();
    $pdo->rollBack();
} finally {
    $pdo = null;
}
