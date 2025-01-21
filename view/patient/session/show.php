<?php

include '../../../php/validation/authorized-user.php';

function show_welcome_message()
{
    include '../../../php/connectionBD.php';
    $id_patient = $_SESSION['id_patient'];
    $get_information_therapy_query = 'SELECT nota, duracion_cada_ejercicio, duracion_total, ejercicios FROM terapias_lenguaje WHERE id_paciente = :id_patient';
    $get_information_therapy_stmt = $pdo->prepare($get_information_therapy_query);
    $get_information_therapy_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
    $get_information_therapy_stmt->execute();
    $row_information_therapy = $get_information_therapy_stmt->fetch(PDO::FETCH_ASSOC);
    echo '
     <p  data-exercise="' . $row_information_therapy['ejercicios'] . '" > En primer lugar, cada ejercicio tendrá una duración  de
     <span class="duration_each_exercise"> ' . intval($row_information_therapy['duracion_cada_ejercicio']) / 1000 . ' </span>segundos, en un
         total de ' . $row_information_therapy['duracion_total'] . ' minutos.';
    if (strlen($row_information_therapy['nota']) != 0) {
        echo ' Por otro lado, tu profesional te envió una nota para que la tengas en cuenta, la cual es 
                la siguiente: " ' . $row_information_therapy['nota'] . '"<p>';
    } else {
        echo '</p>';
    }
}
?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sesión de terapias de lenguaje | Sonidos de habla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/body.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../css/admin/header.css">
    <link rel="stylesheet" href="../../../css/user/session.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    
</head>

<body>


    <main class="flex-start-full w-100 session">
        <section class="session__horizontal-bar w-100" data-count="0">
            <div class="flex-between-full">
                <div class="d-flex gap-4">
                    <button class="back">
                        <i class="bi bi-box-arrow-left fs-2"></i>
                    </button>
                    <div class="sound">
                        <i class="bi bi-volume-up fs-2"></i>
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <div class="amount">
                        <div class="px-2 p-2">
                            <span class="fs-3">1</span>
                        </div>
                        <i class="bi-images fs-2"></i>
                    </div>
                    <div class="time">
                        <div class="fs-3 p-2 px-3">
                            00:<span class="fs-3">00</span>
                        </div>
                        <i class="bi-stopwatch-fill fs-2"></i>
                    </div>
                </div>
            </div>
        </section>
        <div class="flex-center-full">
            <div class="session-therapy">
                <figure class="" draggable="false">
                    <img src="../../../img/patients/childs/" class="img-fluid" alt="" draggable="false">
                </figure>
            </div>
        </div>
    </main>

    <div class="modal-welcome container-modal">
        <div class="content flex-center-full flex-column animation__back-left">
            <div class="content__header w-100  ">
                <h1>¡<?php
                        echo $_SESSION['id_gender'] == 1 ?  'Bienvenido'  : 'Bienvenida';
                        echo ' ' . $_SESSION['user']
                        ?>!
                </h1>
            </div>
            <div class="p-3">
                <div class="content__body">
                    <?php
                    show_welcome_message()
                    ?>
                </div>
                <div class="content__footer text-end">
                    <button class="button__orange btn-exit-welcome">Comenzar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-end container-modal d-none">
        <div class="content flex-center-full flex-column ">
            <div class="content__header w-100  ">
                <h1 class="content__header-title-end">Felicidades </h1>
            </div>
            <div class="p-3">
                <div class="content__body">
                    <p class="">
                        ¿Le gustaría que su representante comparta sus observaciones sobre esta sesión?
                        Si responde que sí, se abrirá un formulario para la verificacion de sus datos.
                    </p>
                    <div class="content__body-form">
                        <form action="" class="form-representative-verify d-none">
                            <input type="text" name="email">
                            <input type="text" name="password">
                            <button class="button__orange">Verificar</button>
                        </form>
                        <form action="" class="form-representative-send d-none">
                            <input type="text" name="observations">
                            <input type="text" name="evaluation">
                            <input type="number" name="objectives">
                            <button class="button__orange">Enviar</button>
                        </form>
                    </div>
                </div>
                <div class="content__footer text-end">
                    <div class="content__footer-buttons-end">
                        <a href="../home.php" class="text-decoration-none"> <button class="btn-one button__grey">No, gracias.</button></a>
                        <button clasS="btn-two button__orange">Si.</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-counting container-modal d-none">
        <div class="content flex-center-full flex-column" style="background:none;">
            <strong class="from-one-to-three fs-2 flex-center-full">3</strong>
        </div>
    </div>

    <section class="audios">
        <audio src="../../../sound/count_down.mp3" class="audio__count-down"></audio>
        <audio src="../../../sound/background_song.mp3" class="audio__background-song" loop></audio>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<script src="../../../js/components/session/variable.js" type="module"></script>
<script src="../../../js/components/session/modal.js" type="module"></script>
<script src="../../../js/components/session/session.js" type="module"></script>
<script src="../../../js/components/session/ajax.js" type="module"></script>

</html>