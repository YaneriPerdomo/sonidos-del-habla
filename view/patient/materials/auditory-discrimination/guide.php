<?php
include '../../../../php/validation/authorized-user.php';

?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vocabulario | Sonidos del habla</title>
    <link rel="stylesheet" href="../../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../../css/reset.css">
    <link rel="stylesheet" href="../../../../css/components/body.css">
    <link rel="stylesheet" href="../../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../../css/components/button.css">
    <link rel="stylesheet" href="../../../../css/components/input.css">
    <link rel="stylesheet" href="../../../../css/components/header.css">
    <link rel="stylesheet" href="../../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../../css/admin/header.css">
    <link rel="stylesheet" href="../../../../css/user/support-materials.css">
    <link rel="stylesheet" href="../../../../css/user/main.css">
    <link rel="stylesheet" href="../../../../css/components/validation.css">


<style>
    .animation__rotate{
        animation: rotate 2s both ease-out ;
    }

    @keyframes rotate {
        from{
            transform: rotateZ(0deg);
            transition: all 1.5s ease-out;
        }

        to{
            color: var(--color-green);
            font-weight: bold;
            transform: rotateZ(360deg);
        }
    }
</style>

</head>

<body>

    <?php include '../../../include/patient/header-support-materials.php'; ?>
    <main class="flex-start-full ">
        <article class="main__content support-materials  ">
            <div class="support-materials__back  mb-3  flex-between-full">
                <a href="../../home.php" class="text-decoration-none text__more-black">
                    <i class="bi bi-arrow-left-square"></i>
                    Regresar
                </a>
                <span class="support-materials__exam_grade">
                    <?php
                    include '../../../../php/auxiliary.php';
                    echo show_rating_material_support(1 	, $_SESSION['id_patient']);
                    ?>
                </span>
            </div>
            <strong class="support-materials__title fs-4"><span>Discriminación auditiva</span> </strong>
            <hr>
            <div class="gap-3 auditory-discrimination flex-wrap flex-center-full  flex-column">
                <form action="" class="w-100 auditory-discrimination__form">
                    <div class="auditory-discrimination__activity--one w-100">
                        <b>1. ¿Quien hace el sonido?</b>
                        <div class="row w-100 text-center">
                            <div class="col-6 ">
                                <i class="bi bi-volume-up fs-1 text-center" data-audio="roaring-lion"></i>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-ear"></i></span>
                                    <select name="" id="" class="form-control auditory-discrimination__select" data-answer="lion"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                                        <option selected disabled>Elige la respuesta</option>
                                        <option value="lion">Leon</option>
                                        <option value="monkey">Mono</option>
                                        <option value="dog">Perro</option>
                                    </select><br>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="auditory-discrimination__activity--two w-100">
                        <b>2. ¿Quien hace el sonido?</b>
                        <div class="row w-100 text-center">
                            <div class="col-6 ">
                                <i class="bi bi-volume-up fs-1 text-center" data-audio="campaign"></i>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-ear"></i></span>
                                    <select name="" id="" class="form-control auditory-discrimination__select" data-answer="campaign"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                                        <option selected disabled>Elige la respuesta</option>
                                        <option value="backpack">Mochila</option>
                                        <option value="campaign">Campana</option>
                                        <option value="Notebook">Cuaderno</option>
                                    </select><br>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="auditory-discrimination__activity--thren w-100">
                        <b>3. ¿Quien hace el sonido?</b>
                        <div class="row w-100 text-center">
                            <div class="col-6 ">
                                <i class="bi bi-volume-up fs-1 text-center" data-audio="barking-dog"></i>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-ear"></i></span>
                                    <select name="" id="" class="form-control auditory-discrimination__select" data-answer="barking-dog"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                                        <option selected disabled>Elige la respuesta</option>
                                        <option value="barking-dog">Perro</option>
                                        <option value="cat">Gato</option>
                                        <option value="bear">Oso</option>
                                    </select><br>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="auditory-discrimination__activity--four w-100">
                        <b>4. ¿Quien hace el sonido?</b>
                        <div class="row w-100 text-center">
                            <div class="col-6 ">
                                <i class="bi bi-volume-up fs-1 text-center" data-audio="water-glass"></i>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-ear"></i></span>
                                    <select name="" id="" class="form-control auditory-discrimination__select" data-answer="water-glass"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                                        <option selected disabled>Elige la respuesta</option>
                                        <option value="water-glass">Agua en vaso</option>
                                        <option value="fire">Fuego</option>
                                        <option value="car">Carro</option>
                                    </select><br>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="auditory-discrimination__activity--five w-100">
                        <b>5. ¿Quien hace el sonido?</b>
                        <div class="row w-100 text-center">
                            <div class="col-6 ">
                                <i class="bi bi-volume-up fs-1 text-center" data-audio="guitar"></i>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-ear"></i></span>
                                    <select name="" id="" class="form-control auditory-discrimination__select" data-answer="guitar"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                                        <option selected disabled>Elige la respuesta</option>
                                        <option value="guitar">Guitarra</option>
                                        <option value="piano">Piano</option>
                                        <option value="violin">Violin</option>
                                    </select><br>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="auditory-discrimination__button-verify text-center">
                        <button type="submit" class="button__green">Terminado</button>
                    </div>
                </form>
            </div>
        </article>
    </main>

    <?php include '../../../include/footer.php'; ?>

    <audio src="../../../../sound/" class="audio-play--auditory-descrimination"></audio>
    <script src="../../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let $audio_auditory_discrimination_HTML = document.querySelector('.audio-play--auditory-descrimination');
        let $auditory_discrimination_form = document.querySelector(".auditory-discrimination__form");

        function evaluate_practice($stored_responses, $input_group_text) {

            for (let i = 0; i < 5; i++) {

                $stored_responses[i].classList.remove('not-Valid');
                $input_group_text[i].classList.remove("not-Valid")
            }

            let accepted_points = 0;
            for (let i = 0; i < $stored_responses.length; i++) {
                $stored_responses[i].disabled = true;
                if ($stored_responses[i].getAttribute('data-answer') != $stored_responses[i].value) {
                    $stored_responses[i].classList.add('not-Valid');
                    $input_group_text[i].classList.add("not-Valid")

                } else {
                    accepted_points++;
                }
            }

            const GRADE_END = Math.round((accepted_points / 5) * 100);
            return GRADE_END
        }

        function show_note(numerical_grade) {

            if (numerical_grade === 0) {
                return 'E';
            } else if (numerical_grade === 20 || numerical_grade === 40) {
                return 'D';
            } else if (numerical_grade === 60) {
                return 'C';
            } else if (numerical_grade === 80) {
                return 'B';
            } else if (numerical_grade === 100) {
                return 'A';
            } else {
                return 'E';
            }

        }

        let $AUDITORY_DISCRIMINATION_SELECT  =document.querySelectorAll('.auditory-discrimination__select');
        let $input_group_text = document.querySelectorAll('.input-group-text');
        let $exam_grade = document.querySelector(".support-materials__exam_grade");

        $auditory_discrimination_form.addEventListener('submit',async e => {

            e.preventDefault();

            const GRADE_END = await evaluate_practice($AUDITORY_DISCRIMINATION_SELECT , $input_group_text);

            console.log(show_note(GRADE_END))

            await fetch("./../../../../php/user/materials-support/exam_grade.php", {
                    method: "POST",
                    body: new URLSearchParams({
                        id_support_material: 1 	,
                        grade_end: await show_note(GRADE_END)
                    }),
                })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.text();
                })
                .then((data) => {
                    console.info(data);
                    if (data == 'success' || data.length == "") {
                        $exam_grade.innerHTML = `Calificación previa: ${show_note(GRADE_END)}`
                    }

                    if(show_note(GRADE_END) == "A"){
                        $audio_auditory_discrimination_HTML.src = '../../../../sound/winner.mp3';
                        $audio_auditory_discrimination_HTML.play()
                        $exam_grade.classList.add('animation__rotate')
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        })




        document.addEventListener('click', e => {
            if (e.target.matches('.bi-volume-up ')) {
                $audio_auditory_discrimination_HTML.src = '../../../../sound/' + e.target.getAttribute('data-audio') + '.mp3';
                $audio_auditory_discrimination_HTML.play()
            }
        })
    </script>
</body>

</html>