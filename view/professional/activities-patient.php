<?php
include './../../php/validation/authorized-user.php';
?>
<!DOCTYPE html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades | Sonidos del habla </title>
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
    <link rel="stylesheet" href="../../css/admin/activities.css">
    <style>
        .activities--search {
            background: white;
            padding: 1rem;
            border-radius: 1rem;
            border: solid 1px #e8d8ff;
            margin: 1rem;
            max-width: 700px;
            min-width: 200px;
        }
    </style>
</head>

<body>
    <?php include "./../include/professional/header-activities.php" ?>
    <main class="flex-start-full ">
        <div class="container-activities h-100 z-1 w-100 p-3 flex-center-full    align-items-start">
            <section class="container-activities__show activities--search">
                <div class="">
                    <h1>Actividades</h1>
                    <p class="text__grey">
                        La aplicación web <em>"Eres capaz"</em> te muestra actualizaciones en vivo
                        de las actividades que tus niños pueden realizar en la plataforma de aprendizaje.
                    </p>
                    <hr>

                    <?php
                    include './../../php/connectionBD.php';

                    // Obtener el ID del profesional de la sesión
                    $id_professional = $_SESSION['id_professional'];
                    $start = 0; // Página inicial
                    $search = $_GET['search_query'] ?? '';
                    $search_term = '%' . $search . '%';

                    //Obtener el total de mensajes que tiene el profesional      
                    $get_total_messages_query = 'SELECT count(mensaje) AS mensajes FROM actividades
                                            actividades  INNER JOIN pacientes ON 
                                            actividades.id_paciente = pacientes.id_paciente
                                            WHERE  mensaje Like :search AND pacientes.id_profesional = :id_professional';

                    $get_total_messages_stmt = $pdo->prepare($get_total_messages_query);
                    $get_total_messages_stmt->bindParam('search', $search_term, PDO::PARAM_STR);

                    $get_total_messages_stmt->bindParam('id_professional', $id_professional, PDO::PARAM_INT);
                    $get_total_messages_stmt->execute();
                    $row_total_messages = $get_total_messages_stmt->fetch(PDO::FETCH_ASSOC);
                    $total_messages = $row_total_messages['mensajes'];

                    // Obtener los primeros mensajes            
                    $get_message_query = 'SELECT id_actividad, mensaje, fecha_hora FROM actividades
                                        actividades  INNER JOIN pacientes on actividades.id_paciente = pacientes.id_paciente
                                        WHERE mensaje Like :search AND pacientes.id_profesional = :id  ORDER by fecha_hora DESC LIMIT 4   ';
                    $get_message_stmt = $pdo->prepare($get_message_query);
                    $get_message_stmt->bindParam('search', $search_term, PDO::PARAM_STR);
                    $get_message_stmt->bindParam('id', $id_professional, PDO::PARAM_INT);
                    $get_message_stmt->execute();
                    if ($get_message_stmt->rowCount() > 0) {
                        $row_message = $get_message_stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo " <div class='results' data-limit='4'>";
                        foreach ($row_message as $value) {
                            echo "
                                    <div class='d-flex gap-1'>
                                        <div style='flex-grow: 1;'>
                                            <p class='m-0'>" . $value["mensaje"] . "</p>
                                            <small style='color: #6f6f6f;'>" . $value["fecha_hora"] . "</small>
                                        </div>
                                        <div>
                                            <a href='./../../php/admin/delete-activitie.php?id=" . $value["id_actividad"] . "' class='btn-delete-activitie'>
                                                <i class='bi bi-x-lg '></i>
                                            </a>
                                        </div>
                                    </div>
                                <hr>";
                        }
                        echo '</div>';
                        // Verificar si hay más mensajes para mostrar
                        if ($start + 4 < $total_messages) {
                            echo "<small class='load-more text__blue'> <a href='#' class='text-decoration-none' > Ver registros anteriores </a></small>";
                        }
                    } else {

                        echo "<div> No se han encontrado historiales registrados </div>";
                    }
                    ?>

                </div>
            </section>
        </div>
    </main>
    <?php include "./../include/footer.php" ?>
</body>

<div class="container-modal " data-modal="detele-activities" style="display:none">
    <div class="modal-content ">
        <div class="modal-header">
            <div class="text-center w-100">
                <h1 class="modal-title modal-title-red fs-5 text-center" id="exampleModalLabel">
                    ¿Deseas borrar todas las actividades?
                </h1>
            </div>
        </div>
        <div class="p-3">
            <div class="modal-body ">
                <p class="p-0">Todas las actividades registradas de sus pacientes se eliminarán y no podrán recuperarse.</p>
            </div>
            <hr>
            <div class="modal-footer flex-center-full gap-4">
                <button type="button" class="btn-cancel-activities button__grey">Cancelar</button>
                <a href="../../php/admin/detele-all-activies.php" class="text-decoration-none">
                    <button class="button__red btn-delete-activities">Eliminar actividades </button>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

<script src="./../../js/admin/ajax/get-activities-search.js" type="module"></script>

</html>