<?php
include '../../php/validation/authorized-user.php';

function show_additional_information():void
{
    include '../../php/connectionBD.php';
    try {

        $get_necessary_treatment_query = 'SELECT ejercicios FROM terapias_lenguaje WHERE id_paciente = :id_paciente';

        $id_patient = $_SESSION['id_patient'];
        $get_necessary_treatment_stmt = $pdo->prepare($get_necessary_treatment_query);
        $get_necessary_treatment_stmt->bindParam('id_paciente', $id_patient, PDO::PARAM_INT);
        $get_necessary_treatment_stmt->execute();

        $row_necessary_treatment = $get_necessary_treatment_stmt->fetch(PDO::FETCH_ASSOC);

        $therapy_exercises_today_query = 'SELECT fecha AS "today" FROM sesiones WHERE id_paciente = :id_patient AND DATE(fecha) = CURDATE(); ';
        $therapy_exercises_today_stmt = $pdo->prepare($therapy_exercises_today_query);
        $therapy_exercises_today_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
        $therapy_exercises_today_stmt->execute();

        $row_therapy_exercises_today = $therapy_exercises_today_stmt->fetch(PDO::FETCH_ASSOC);
        $result_today =  $therapy_exercises_today_stmt->rowCount() > 0 ? '<i class="bi bi-check fs-4"> </i>' : '<i class="bi bi-hourglass-top fs-4"> </i>';

        $joint = '';
        $muscle_strengthening = '';
        $fluency = '';
        if (preg_match("/rotacismo0|rotacismo1|seseo0|seseo1/", $row_necessary_treatment['ejercicios'])) {
            $joint = '<li>Ejercicios de pronunciación de fonemas.  </li>';
        }

        if (preg_match("/musculos de la lengua0|musculos de la lengua1|el ritmo del habla0|el ritmo del habla1|labio0|labio1|mejilla0|mejilla1/", $row_necessary_treatment['ejercicios'])) {
            $muscle_strengthening = '<li> Fortalecimiento muscular. </li> ';
        }
        if (preg_match("/el ritmo del habla0|el ritmo del habla1/", $row_necessary_treatment['ejercicios'])) {
            $fluency = '<li> Fluidez. </li> ';
        }

        echo '  <div class="col-12 col-lg-6">
                    <div class="start flex-center-full flex-column h-100 w-100">                  
                    <a href="./session/show.php" class="  text-decoration-none " >
                            <button class="fs-2 d-flex mb-1 button__orange">
                            <em> COMENZAR</em> <i class="bi bi-caret-right-fill"></i>
                            ' . $result_today . '
                            </button>
                        <a>
                        <a href="./support-materials.php" class="text__black"> Materiales de apoyo </a>
                    </div>
                </div>
                </div>
                <hr>
                <ul class="exercises flex-around-full p-0">
                    ' . $joint . '' . $muscle_strengthening . '' . $fluency . '
                </ul>
                <hr>
                ';
    } catch (PDOException $ex) {
        echo 'Sucedio un error en la base de datos:' . $ex->getMessage();
    }
}


?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plan de terapia | Sonidos del habla</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/components/body.css">
    <link rel="stylesheet" href="../../css/components/footer.css">
    <link rel="stylesheet" href="../../css/components/button.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../css/admin/header.css">
    <link rel="stylesheet" href="../../css/user/home.css">
    <link rel="stylesheet" href="../../css/user/main.css">
 
    <style>
        .sessions-completed__number{
            position: absolute;
                left: 0;
                top: 0;
                padding: 1rem;
                background: none;
                display: flex;
                justify-content: center;
                align-items: center;
        }

        .card-patient{
            position: relative;
        }
    </style>
</head>

<body>

    <?php include '../include/patient/header.php'; ?>
    <main class="flex-start-full ">
        <section class="main__content session ">
            <div class="row">
                <div class="col-12 col-lg-6 card-patient flex-center-full flex-column"0>
                    <div class="card-patient__img">
                        <img src="<?php echo "../../img/patients/avatares/".$_SESSION['avatar'] .".png"
                                    ?>" alt="<?php echo $_SESSION['avatar'] != NULL ? $_SESSION['avatar'] : 'No hay ningun avatar seleccionado' ?>" 
                                       class="img-fluid"
                                       title="<?php echo $_SESSION['avatar'] != NULL ? $_SESSION['avatar'] : 'No hay ningun avatar seleccionado' ?>">
                    </div>
                    <div class="card-patient__information">
                        <h1 class="card-patient__information-user text-center">
                            <b> <?php echo $_SESSION['user'] ?></b>
                        </h1>
                        <h2 class="card-patient__informaton-nameL"><?php echo $_SESSION['name_lastname'] ?></h2>
                    </div>
                    <div class="sessions-completed">
                        <i class="sessions-completed__number">
                            <?php
                                include '../../php/connectionBD.php';   
                                $get_progress_query = 'SELECT COUNT(estado) AS "sesionesCumplidas" FROM sesiones WHERE id_paciente = :id_paciente';
                                $get_progress_stmt = $pdo->prepare($get_progress_query);
                                $get_progress_stmt->bindParam('id_paciente', $_SESSION['id_patient'], PDO::PARAM_INT);
                                $get_progress_stmt->execute();
                                $row_progress = $get_progress_stmt->fetch(PDO::FETCH_ASSOC);
                                $progress = $row_progress['sesionesCumplidas'];
                                echo '<a href="./attendance.php?id='.$_SESSION['id_patient'] .'" class="text-decoration-none text__blue"> 
                                    ' . match ($progress) {
                                        NULL =>  0 .' dia cumplido',
                                        0, 1 => $progress . ' dia cumplido',
                                        default => $progress . ' dias cumplidos'
                                    }. ' </a>';
                            ?>
                        </i>
                    </div>
                </div>
                <?php
                show_additional_information()
                ?>
        </section>
    </main>

    <?php include '../include/footer.php'; ?>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>