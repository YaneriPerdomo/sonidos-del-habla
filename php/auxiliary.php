<?php
function showMsg($smg, $location = '')
{
    if ($location != '') {
        echo '<script>
                alert (" ' . $smg . ' ");
                window.location.href = "' . $location . '"
             </script>';
    } else {
        echo '<script>
                alert (" ' . $smg . ' ");
             </script>';
    }
}

function show_rating_material_support($id_support_material, $id_patient){
    include '../../../../php/connectionBD.php';

    try {
        $get_rating_display_query = "SELECT calificacion FROM calificaciones_materiales_apoyo WHERE id_paciente = :id_patient AND id_material_apoyo = :id_support_material";
        $get_rating_display_stmt = $pdo->prepare($get_rating_display_query);
        $get_rating_display_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
        $get_rating_display_stmt->bindParam('id_support_material', $id_support_material, PDO::PARAM_INT);
        $get_rating_display_stmt->execute();
    
        if($get_rating_display_stmt->rowCount() > 0){
            $row_reting_display = $get_rating_display_stmt->fetch(PDO::FETCH_ASSOC);
            return 'Calificación previa: ' . $row_reting_display['calificacion'];
        }else{
            return 'Calificación previa: Aun nada';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function add_history_material_support($id_support_material, $id_patient, $u, $grade_end)
{
    include '../../connectionBD.php';

   try {
    $name_support_material = match ($id_support_material) {
        1 => 'Actividades para discriminar sonidos',
        2 => 'Vocabulario',
        default => "Calificación Inválida",
    };
    $messege = "<b>$u </b>calificó con $grade_end en el material de apoyo de: $name_support_material";


    // Insert the history record
    $insert_history_query = 'INSERT INTO actividades (id_paciente, mensaje, fecha_hora) VALUES (:id_paciente, :mensaje, NOW())';
    $insert_history_stmt = $pdo->prepare($insert_history_query);
    $insert_history_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
    $insert_history_stmt->bindParam('mensaje', $messege, PDO::PARAM_STR);
    $insert_history_stmt->execute();
    
   } catch (PDOException $th) {
    echo $th;
   }finally{
    $pdo = null;
   }
   
}

function add_history($state_messege, $id_paciente)
{
    include '../../connectionBD.php';

    try {
        $id_patient = $id_paciente;

        // Get necessary treatment from the database
        $get_necessary_treatment_query = 'SELECT ejercicios FROM terapias_lenguaje WHERE id_paciente = :id_paciente';
        $get_necessary_treatment_stmt = $pdo->prepare($get_necessary_treatment_query);
        $get_necessary_treatment_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
        $get_necessary_treatment_stmt->execute();
        $row_necessary_treatment = $get_necessary_treatment_stmt->fetch(PDO::FETCH_ASSOC);

        // Determine exercise types based on 'ejercicios' field
        $exercise_types = "";
        if (preg_match("/rotacismo0|rotacismo1|seseo0|seseo1/", $row_necessary_treatment['ejercicios'])) {
            $exercise_types .= '<i>Ejercicios de pronunciación de fonemas.</i>';
        }
        if (preg_match("/musculos de la lengua0|musculos de la lengua1|el ritmo del habla0|el ritmo del habla1|labio0|labio1|mejilla0|mejilla1/", $row_necessary_treatment['ejercicios'])) {
            $exercise_types .= '<i>Fortalecimiento muscular.</i>';
        }
        if (preg_match("/el ritmo del habla0|el ritmo del habla1/", $row_necessary_treatment['ejercicios'])) {
            $exercise_types .= '<i>Fluidez.</i>';
        }
 
        // Prepare the message
        $user = '<b> ' . $_SESSION['user'] . '</b>';
        $messege = '';

        if ($state_messege == 'completed') {
            $messege = "$user ha completado su sesión de terapia de: $exercise_types";
        } else {
            $messege = "$user ha completado de nuevo su sesión de terapia de: $exercise_types";
        }

        // Insert the history record
        $insert_history_query = 'INSERT INTO actividades (id_paciente, mensaje, fecha_hora) VALUES (:id_paciente, :mensaje, NOW())';
        $insert_history_stmt = $pdo->prepare($insert_history_query);
        $insert_history_stmt->bindParam('id_paciente', $id_paciente, PDO::PARAM_INT);
        $insert_history_stmt->bindParam('mensaje', $messege, PDO::PARAM_STR);
        $insert_history_stmt->execute();

        if ($insert_history_stmt->rowCount() > 0) {
        } else {
            echo 'error ';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
