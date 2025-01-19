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
    <title>Inicia sesion | Sonidos de habla</title>
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

    <style>
        .session {
            padding: 1rem;
        }

        .time,
        .amount {

            color: white;
            border: 0rem;
            min-width: 40px !important;
            min-height: 40px;
            color: rgb(255, 255, 255);
            font-weight: bold;
            font-size: clamp(1rem, 3vw, 1.5rem);

        }

        .amount {

            color: white;
            border: 0rem;
            min-width: 40px !important;
            min-height: 40px;
            color: rgb(255, 255, 255);
            font-weight: bold;
            font-size: clamp(1rem, 3vw, 1.5rem);
        }

        .bi-stopwatch-fill {
            background: #3f8ddf;
            padding: 0.5rem;
            border-radius: 0.5rem;
            color: white;

        }

        .bi-images {
            padding: 0.5rem;
            border-radius: 0.5rem;
            color: white;
            background: var(--color-pink)
        }

        .time,
        .amount {
            display: flex;
            flex-direction: row-reverse;

            align-items: center;
            background: rgb(47, 47, 47);
            color: white;
            border-radius: 0.5rem;
        }


        .amount>div>span {
            padding: 0.5rem
        }

        .back {
            background: var(--color-grey);
            padding: .4rem 0.9rem;

            color: white;
            border: 0rem;
            min-width: 40px !important;
            min-height: 40px;
            color: rgb(255, 255, 255);
            font-weight: bold;
            font-size: clamp(1rem, 3vw, 1.5rem);
            border-radius: 6px;
        }

        .sound {
            background: var(--color-red);
            padding: .4rem 0.9rem;
            color: white;

            border: 0rem;
            min-width: 40px !important;
            min-height: 40px;
            color: rgb(255, 255, 255);
            font-weight: bold;
            font-size: clamp(1rem, 3vw, 1.5rem);
            border-radius: 6px;
            cursor: pointer;
        }

        .session-therapy {
            width: 400px;
            height: 350px;
            border: 0rem;
            min-width: 40px !important;
            min-height: 40px;
            color: rgb(255, 255, 255);
            font-weight: bold;
            font-size: clamp(1rem, 3vw, 1.5rem);
            filter: drop-shadow(2px 3px #222);
            background: var(--color-green);
            border-radius: 6px;
            position: relative;
        }

        .button__audio {
            position: absolute;
            border: 0;
            bottom: -2rem;
            left: 40%;
            background: var(--color-orange);
            padding: 0.4rem 1rem;
            border-radius: 6px;
            cursor: pointer;

        }

        .from-one-to-three {
            font-size: clamp(10rem, 90vw, 12rem) !important;
            color: white;
            filter: drop-shadow(2px 2px #260303);
        }

        main {
            background-image: url(../../../img/background-letters.png);
        }

        .modal-welcome {
            background: rgb(47, 47, 47);
            background: rgb(0, 168, 168);
            background: linear-gradient(0deg, rgba(0, 168, 168, 1) 35%, rgba(10, 139, 139, 1) 84%);
        }

        .session-therapy>figure>img {
            border-radius: 6px;
        }

        .animation__back-left {
            animation: back-left 3.4s both;
        }

        @keyframes back-left {
            0% {
                overflow-x: hidden;
                transform: perspective(10rem) translateX(-100rem);
            }

            50% {
                transform: perspective(10rem) translate3d(9px, 10%, 3em);
                overflow: visible;
            }

            100% {
                transform: perspective(10rem) translate3d(0, 0, 0)
            }



        }
    </style>
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

    <div class="modal-welcome container-modal ">
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
<script>
    let $session_horizontal_bar = document.querySelector(".session__horizontal-bar");
    let $data_exercise = document.querySelector("[data-exercise]");
    let $modal_welcome = document.querySelector(".modal-welcome");
    let $amount_span = document.querySelector(".amount > div > span")
    let $duration_each_exercise = document.querySelector(".duration_each_exercise");
    let $session_duration = document.querySelector('[data-duration_each_exercise]');
    let $session_img = document.querySelector(".session-therapy > figure > img");


    let $count_down = document.querySelector(".audio__count-down") //Audio 
    let $background_song = document.querySelector('.audio__background-song')
    let $modal_counting = document.querySelector(".modal-counting");
    let $modal_counting_number = document.querySelector(".modal-counting > div > strong");
    document.addEventListener('click', e => {
        if (e.target.matches('.btn-exit-welcome')) {
            $modal_welcome.style.display = 'none';
            let amount_e = $data_exercise.getAttribute('data-exercise').split(',').length;
            let exercises = $data_exercise.getAttribute('data-exercise').replace('sonidos-habla,', '')
            $session_horizontal_bar.setAttribute('data-exercise', exercises);
            $session_horizontal_bar.setAttribute('data-amount', parseInt(amount_e) - 1)
            console.info($data_exercise.getAttribute('data-exercise').split(',').length)
            $session_horizontal_bar.setAttribute('data-duration_each_exercise', $duration_each_exercise.textContent);
            $modal_counting.classList.remove("d-none")
            counting_1_3();
            $count_down.play()
            $background_song.play()
            setTimeout(() => {
                show_img();
            }, 3000);
        }
    })

    function show_img() {
        if ($session_horizontal_bar.getAttribute('data-count') != $session_horizontal_bar.getAttribute("data-amount")) {
            let pattern_joint = new RegExp('/rotacismo0|seseo0|rotacismo1|seseo1/\d');
            let pattern_fluency = new RegExp('/el ritmo del habla0|el ritmo del habla1/');
            let type_exercise = '';
            let fluency = ''
            let arreglo_ejercicios = $session_horizontal_bar.getAttribute('data-exercise').split(',');
            if (arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('rotacismo0') ||
                arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('rotacismo1') ||
                arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('seseo0') ||
                arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('seseo1')) {
                type_exercise = 'joint'
            } else if (arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('el ritmo del habla0') ||
                arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('el ritmo del habla1')) {
                type_exercise = 'fluency'
            } else if (arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('musculos de la lengua0') ||
                arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')].includes('musculos de la lengua1')
            ) {
                type_exercise = 'muscle-strengthening'
            }
            $session_img.src = '../../../img/exercises/' + type_exercise + '/' + arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')] + '.png';
            $session_img.alt = arreglo_ejercicios[$session_horizontal_bar.getAttribute('data-count')];
            console.info(arreglo_ejercicios)
            duration_each_exercise($session_horizontal_bar.getAttribute('data-duration_each_exercise'));
        } else {
            fetch("../../../php/user/session/insert.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                }
            }).then(
                (response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.text()
                }).then((data) => {
                    console.info(data);
                    if(data == 'success'){
                        console.info('Se guardo')
                    }
                }).catch((error ) => {
                    console.warn('Sucedio un error')
                }).finally()
        }
    }
    //duration of each exercise
    function duration_each_exercise(ms) {
        let count = ms;
        const countdownElement = document.querySelector(".countDownBody > div > h2");
        let $time_span = document.querySelector('.time > div > span');
        let countdown = setInterval(() => {
            count--;
            $time_span.textContent = count;
            if (count === 0) {
                clearInterval(countdown);
                counting_1_3();
                $count_down.play();
                $modal_counting.classList.remove("d-none")
                setTimeout(() => {
                    $session_horizontal_bar.setAttribute('data-count', parseInt($session_horizontal_bar.getAttribute('data-count')) + 1);
                    $amount_span.innerHTML = parseInt($amount_span.textContent) + 1;
                    show_img();
                }, 3000);
            }
        }, 1000);
    }

    function counting_1_3() {
        let count = 3
        let countdown = setInterval(() => {
            count--;
            $modal_counting_number.textContent = count;
            if (count === 0) {
                clearInterval(countdown);
                $modal_counting.classList.add('d-none')
            }
        }, 1000);
    }
</script>

</html>