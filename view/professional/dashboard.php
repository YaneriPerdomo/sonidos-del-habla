<?php
include '../../php/validation/authorized-user.php';
?>

<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de control | Sonidos del habla</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../../css/components/body.css">
    <link rel="stylesheet" href="../../css/components/footer.css">
    <link rel="stylesheet" href="../../css/components/button.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../css/admin/header.css">
    <link rel="stylesheet" href="../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../css/components/table.css">
    <style>
        .card-patient {
            display: flex;
            flex-direction: column;
        }

        .card-patient>div:nth-of-type(2) {
            flex-grow: 2;
        }

        @media screen and (max-width: 992px) {
            .col-lg-3>.history{
                height: 200px !important;
                margin-bottom: 1rem !important;
            }

            .col-lg-3 {
                height: 200px !important;
            }

            .row {
                height: auto !important;
                gap: 1rem
            }

            .history>div {
                justify-content: space-between;
            }

            .reportHistory {
                justify-content: center;
            }
            
        }
    </style>
</head>

<body>

    <?php include '../include/professional/header.php'; ?>
    <main class="flex-start-full">
        <section class=" h-100  z-1 w-100 p-3 ">
            <div class="row ">
                <div class="col-12 col-lg-9">
                    <div>
                        <h1 class="">Panel de control</h1>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button class="button__blue"><a href="../../php/admin/report.php" class="text-decoration-none text__white">Reporte en <b>PDF</b></a></button>
                            </div>
                        </div><br>
                        <div class="show-patients d-flex   flex-row gap-2  flex-wrap">
                            <?php

                            // Incluimos el archivo de conexión a la base de datos
                            include '../../php/connectionBD.php';

                            $id_professional = $_SESSION['id_professional'];
                            $pagina_actual = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                            $count_all_patients_query = 'SELECT COUNT(*) as total FROM pacientes WHERE id_profesional = :id_professional';
                            $count_all_patients_stmt = $pdo->prepare($count_all_patients_query);
                            $count_all_patients_stmt->bindParam('id_professional', $id_professional, PDO::PARAM_INT);
                            $count_all_patients_stmt->execute();
                            $total = $count_all_patients_stmt->fetch(PDO::FETCH_ASSOC);
                            $total_registros = $total["total"];
                            $registros_por_pagina = 5;
                            $total_paginas = ceil($total_registros / $registros_por_pagina);

                            $get_information_patients_query = "SELECT 
                                            pacientes.id_usuario AS 'Id_usuario', 
                                           pacientes.id_paciente AS 'Id_paciente',
                                           nombre AS 'Nombre', 
                                           apellido AS 'Apellido',
                                           COALESCE( SUBSTRING(DATE(NOW()), 1, 4) - SUBSTRING(DATE(fecha_nacimiento), 1, 4), 0) AS 'Edad', 
                                           usuario AS 'Usuario', 
                                           ejercicios AS 'Terapias', 
                                           pacientes.id_genero AS 'Id_genero' 
                                       FROM 
                                           `pacientes` 
                                       INNER JOIN 
                                           terapias_lenguaje ON pacientes.id_paciente = terapias_lenguaje.id_paciente
                                       INNER JOIN 
                                           usuarios on pacientes.id_usuario = usuarios.id_usuario
                                       WHERE id_profesional =:id_professional 
                                       LIMIT :inicio, :registros_por_pagina";


                            $inicio = ($pagina_actual - 1) * $registros_por_pagina;

                            // Preparamos la sentencia SQL para evitar inyección SQL
                            $get_information_patients_stmt = $pdo->prepare($get_information_patients_query);
                            $get_information_patients_stmt->bindParam('id_professional', $id_professional, PDO::PARAM_INT);
                            $get_information_patients_stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
                            $get_information_patients_stmt->bindValue(':registros_por_pagina', $registros_por_pagina, PDO::PARAM_INT);
                            // Ejecutamos la consulta
                            $get_information_patients_stmt->execute();

                            if ($get_information_patients_stmt->rowCount() > 0) {
                                // Si hay resultados, los obtenemos en un array asociativo
                                $row_patients = $get_information_patients_stmt->fetchAll(PDO::FETCH_ASSOC);
                                // Iteramos sobre cada fila del resultado
                                foreach ($row_patients as $value) {
                                    // Obtenemos la categoría de actividad y la asignamos a una variable

                                    $joint = '';
                                    $muscle_strengthening = '';
                                    $fluency = '';
                                    if (preg_match("/rotacismo0|rotacismo1|seseo0|seseo1/", $value['Terapias'])) {
                                        $joint = 'Ejercicios de pronunciación de fonemas. ';
                                    }

                                    if (preg_match("/musculos de la lengua0|musculos de la lengua1|el ritmo del habla0|el ritmo del habla1|labio0|labio1|mejilla0|mejilla1/", $value['Terapias'])) {
                                        $muscle_strengthening = 'Fortalecimiento muscular. ';
                                    }
                                    if (preg_match("/el ritmo del habla0|el ritmo del habla1/", $value['Terapias'])) {
                                        $fluency = 'Fluidez. ';
                                    }
                                    $img_gender = $value['Id_genero'] == 1 ? 'boy' : 'girl';
                                    $bg_card_patient = $value['Id_genero'] == 1 ? '' : 'card-patient--bgPink';
                                    echo '
                                        <div class="card-patient p-2 ' . $bg_card_patient . '">
                                          
                                           <div class="card-patient__img flex-center-full">
                                               <img src="../../img/patients/childs/' . $img_gender . '.png" class="" alt="">
                                           </div>
                                           <div class="card-patiente_information ">
                                               <b>Usuario:</b><span> ' . $value['Usuario'] . '</span><br>
                                               <b>Nombre:</b><span>  ' . $value['Nombre'] . '</span><br>
                                               <b>Apellido:</b>  ' . $value['Apellido'] . '<span></span><br>
                                               <b>Edad:</b><span>  ' . $value['Edad'] . '</span><br>
                                               <b>Ejercicios: </b><span>' . $joint . '' . $muscle_strengthening . '' . $fluency . '</span>
                                         
                                               </div>
                                      
                                           <div class="">
                                           <hr>
                                           <div class="card-patient__operation flex-center-full gap-4">
                                           <i class="bi bi-trash openModalDelete" data-idPatient="' . $value['Id_paciente'] . '"  data-idUser = "' . $value['Id_usuario'] . '"   ></i>
                                               <a href="./patient/modify.php?id=' . $value['Id_paciente'] . '" class="text-decoration-none text__black" > <i class="bi bi-person-lines-fill" > </i></a>
                                               <a href="./patient/attendance.php?id='.$value['Id_paciente'].'"class="text-doration-none text__black"  >  <i class="bi bi-calendar3" data-idProgress="' . $value['Id_paciente'] . '"></i> </a>
                                               </div>
                                           </div>
                                       </div> 
                                   
                                   ';
                                }
                            } else {
                                // Si no hay resultados, mostramos un mensaje
                                echo "<p>No hay registros disponibles en este momento.</p>";
                            }
                            echo '    </div>';
                            echo "<div class='d-flex justify-content-between px-2'>";


                            if ($total_registros == 0) {
                            } else if ($total_registros == 1) {
                                if ($pagina_actual > 1) {
                                    echo "<a href='?page=" . ($pagina_actual - 1) . "'> <i class='bi bi-caret-left-fill text__blue fs-2' ></i></a> ";
                                }
                                if ($pagina_actual < $total_paginas) {
                                    echo "<a href='?page=" . ($pagina_actual + 1) . "'> <i class='bi bi-caret-right-fill text__blue fs-2'></i></a>";
                                }
                                echo " </div>";
                            } else {
                                if ($pagina_actual > 1) {
                                    echo "<a href='?page=" . ($pagina_actual - 1) . "'> <i class='bi bi-caret-left-fill text__blue fs-2'></i></a> ";
                                }
                                if ($pagina_actual < $total_paginas) {
                                    echo "<a style='visibility: hidden'> <i class='bi bi-caret-left-fill text__blue fs-2' >2</i></a>";
                                    echo "<a href='?page=" . ($pagina_actual + 1) . "'> <i class='bi bi-caret-right-fill text__blue fs-2'></i></a>";
                                }
                                echo " </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 h-100">
                        <div class="history">
                            <div>
                            <a href="./patient/add.php" class="text-decoration-none w-100">
                                <button class="button__green w-100">
                                    Agregar paciente
                                </button>
                            </a>
                            <hr style="  margin-bottom: 0.5rem;">
                            <section class="activities-patients">
                                <span class=" fs-3 activities-patients__title">Actividades</span>

                                <?php

                                include '../../php/admin/show-history.php';

                                show_historys();
                                ?>
                            </section>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
    </main>

    </div>

    <?php include '../include/footer.php'; ?>

    <div class="container-modal align-items-start" style="display: none;" data-modal="search-data">
        <div class="modal-content content mt-2 ">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title modal-title-green fs-5 text-center" id="exampleModalLabel">
                        Buscar usuarios...
                    </h1>
                </div>
            </div>
            <div class="modal-body p-3 search-overflow-y">
                <article>
                    <div class="search-message text-center mb-2 text__grey">
                        <small class="">Solo se le mostrarán 3 registros para no sobrecargar la página. Por favor sea muy preciso en la búsqueda de usuarios.</small>
                    </div>
                    <div class="form-check form-switch flex-center-full mb-3">
                        <input class="form-check-input"
                            type="checkbox"
                            name="on-show-all"
                            role="switch"
                            id="flexSwitchCheckChecked"
                            value="true"
                            checked>
                    </div>
                    <div class="input-group">
                        <label id="search-data-activities" class="input-group-text" id="basic-addon1">
                            <i class="bi bi-search"></i>
                        </label>
                        <input type="search" id="search-data-input" name="search-data__patients" class="form-control"
                            placeholder="Buscar..." aria-label="Username" class="" data-php="search-patients"
                            aria-describedby="basic-addon1">

                    </div>
                    <hr>
                    <div class="results-data">
                    </div>
                </article>

            </div>
        </div>
    </div>

    <div class="container-modal flex-center-full" style="display: none;" data-modal="delete-patient">
        <div class="modal-content content mt-2  ">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title modal-title-red fs-5 text-center" id="exampleModalLabel">
                        Eliminar paciente
                    </h1>
                </div>
            </div>
            <div class="modal-body p-3 pb-4">
                <p class="text-center">
                    Antes de confirmar, tenga en cuenta que al eliminar este paciente perderá el acceso a su plan de aprendizaje, incluido su historial de actividades registradas
                    de aprendizaje.
                </p>
                <form action="../../php/admin/patient.php" method="POST">
                    <input type="hidden" name="state" value='delete'>
                    <input type="hidden" name="id_patient" class="id_patient_delete">
                    <input type="hidden" name="id_user" class="id_user_delete">
                    <div class="modal-footer flex-center-full gap-4">
                        <button class="button__grey cancel-modal-delete" type="button">Cancelar</button>
                        <button type="submit" class="button__red">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        let $modal_search_activities = document.querySelector('[data-modal="search-data"]');
        let $modal_delete_patient = document.querySelector('[data-modal="delete-patient"]')
        let $id_patient_delete_input = document.querySelector('.id_patient_delete');
        let $id_user_delete_input = document.querySelector('.id_user_delete');
        document.addEventListener('click', e => {

            if (e.target.matches('.openModalDelete')) {
                $modal_delete_patient.removeAttribute("style");
                $id_patient_delete_input.value = e.target.getAttribute('data-idPatient');
                $id_user_delete_input.value = e.target.getAttribute('data-idUser')
            }

            if (e.target.matches('.search-data__input')) {
                console.info($modal_search_activities)
                $modal_search_activities.removeAttribute('style');
            }

            if (e.target.matches('.cancel-modal-delete')) {
                $modal_delete_patient.style.display = "none";
            }
            if (e.target.matches('[data-modal="search-data"]')) {
                $modal_search_activities.style.display = 'none';
            }
        })
    </script>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
    <script src="../../js/helpers/get-data-search.js"></script>

    <script src="../js/validations/login.js" type="module"></script>
</body>

</html>