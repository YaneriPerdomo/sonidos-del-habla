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
    <link rel="stylesheet" href="../../../../css/components/header.css">
    <link rel="stylesheet" href="../../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../../css/components/validation.css">
    <link rel="stylesheet" href="../../../../css/admin/header.css">
    <link rel="stylesheet" href="../../../../css/user/support-materials.css">
    <link rel="stylesheet" href="../../../../css/user/main.css">

    <style>
        .vocabulary__img {
            width: 150px;
        }
    </style>
</head>

<body>

    <?php include '../../../include/patient/header-support-materials.php'; ?>
    <main class="flex-start-full ">
        <div class="main__content support-materials support-materials--vocabulary-practice">
            <div class="support-materials__back mb-3 flex-between-full">
                <a href="../../home.php" class="back__link text-decoration-none text__more-black">
                    <i class="back__icon bi bi-arrow-left-square"></i>
                    Regresar
                </a>
                <span class="support-materials__exam_grade">
                    <?php
                    include '../../../../php/auxiliary.php';
                    echo show_rating_material_support(2, $_SESSION['id_patient']);
                    ?>
                </span>
            </div>

            <strong class="support-materials__title fs-4">
                <span class="support-materials__title-text">Examen</span>
                <small>de:</small>
            </strong>
            <hr>
            <div class="topic-selection d-flex gap-3 mb-3">
                <div class="topic-selection__tecnologia">
                    <label for="tecnologia">Tecnologia</label>
                    <input type="radio" name="selection-exam" id="tecnologia" value="technology" checked><br>
                </div>
                <div class="topic-selection__sociedad">
                    <label for="sociedad">Sociedad</label>
                    <input type="radio" name="selection-exam" id="sociedad" value="society"><br>
                </div>
                <div class="topic-selection__lengua">
                    <label for="lengua">Lenguaje</label>
                    <input type="radio" name="selection-exam" id="lengua" value="language"><br>
                </div>
                <div class="topix-selection__arte">
                    <label for="arte">Arte</label>
                    <input type="radio" name="selection-exam" id="arte" value="art">
                </div>
            </div>

            <div class="vocabulary-practice">
                <form class="vocabulary-practice__questions vocabulary-practice--form">
                    <input type="hidden" name="id_support_material" value="3">
                    <input type="hidden" name="">
                    <label class="vocabulary-practice__question-title"><b>1. ¿Que es la computadora?</b></label><br>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi  bi-question-square"></i></span>
                        <select name="" id="" class="form-control vocabulary-practice__select" data-answer-true=""
                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true">

                        </select><br>
                    </div>
                    <label class="vocabulary-practice__question-title"><b>2. ¿Que hace la computadora?</b></label><br>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi  bi-question-square"></i></span>
                        <select name="" id="" class="vocabulary-practice__select form-control " data-answer-true=""
                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true"><br>
                        </select><br>
                    </div>

                    <label class="vocabulary-practice__question-title"><b>3. ¿La programación permite la creación de programas?</b></label><br>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi  bi-question-square"></i></span>
                        <select name="" id="" class="vocabulary-practice__select  form-control" data-answer-true=""
                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true">

                        </select><br>
                    </div>

                    <label class="vocabulary-practice__question-title"><b>4. ¿Gracias a los lenguajes de programación, es posible programar programas?</b></label><br>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi  bi-question-square"></i></span>
                        <select name="" id="" class="vocabulary-practice__select  form-control" data-answer-true=""
                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true">

                        </select><br>
                    </div>
                    <label class="vocabulary-practice__question-title"><b>6. ¿Un lenguaje de programación NO trabaja con instrucciones para crear programas?</b></label><br>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi  bi-question-square"></i></span>
                        <select name="" id="" class="vocabulary-practice__select  form-control" data-answer-true=""
                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true">

                        </select><br>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="button__green">Terminado</button>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <?php include '../../../include/footer.php'; ?>

    <script>
        let selection_questions = {
            technology: {
                questions: ['Es una máquina electrónica', 'Es una caja',
                    'Está diseñada para realizar tareas específicas',
                    'Está diseñada para jugar',
                    'Verdad', 'Falso', 'Verdad', 'Falso',
                    'Verdad', 'Falso'
                ],
                answer: ['a', 'a', 'a', 'a', 'b']
            },
            sociedad: {
                questions: [],
                answer: '',
            },
            lengua: {
                questions: [],
                answer: '',
            },
            arte: {
                questions: [],
                answer: ''
            }

        }
        let $selection_exam = document.querySelector("[name='selection-exam']");
        const $SELECTS_HTML = document.querySelectorAll('[data-answer-true=""]');
        const $QUESTIONS_TITLE = document.querySelectorAll('.vocabulary-practice__question-title > b');
        const $VOCABULARY_QUESTIONS = document.querySelectorAll('.vocabulary-practice__select');
        let $input_group_text = document.querySelectorAll('.input-group-text');
        let $id_support_material = document.querySelector("[name='id_support_material']")
        document.addEventListener('change', e => {
            if (e.target.matches('[name="selection-exam"]')) {
                load_questions_exam(e.target.value);
            }
        })
        document.addEventListener('DOMContentLoaded', e => {
            load_questions_exam('technology');
        })

        let $vocabulary_form = document.querySelector('.vocabulary-practice--form');
        let $exam_grade = document.querySelector(".support-materials__exam_grade");

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

        $vocabulary_form.addEventListener('submit', async e => {


            e.preventDefault();


            const GRADE_END = await evaluate_practice($VOCABULARY_QUESTIONS, $input_group_text);
            await fetch("./../../../../php/user/materials-support/exam_grade.php", {
                    method: "POST",
                    body: new URLSearchParams({
                        id_support_material: 2,
                        grade_end: await showNote(GRADE_END)
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


                })
                .catch((error) => {
                    console.error("Error:", error);
                });








        })


        function load_questions_exam(topic) {
            const SELECTION_QUESTIONS = {
                technology: {
                    titles: [
                        '1. ¿Que es la computadora?',
                        '2. ¿Que hace la computadora?',
                        '3. ¿La programación permite la creación de programas?',
                        '4. ¿Gracias a los lenguajes de programación, es posible programar programas?',
                        '5. ¿Un lenguaje de programación NO trabaja con instrucciones para crear programas?'
                    ],
                    questions: [
                        'Elige la respuesta', 'Es una máquina electrónica', 'Es una caja',
                        'Elige la respuesta', 'Está diseñada para realizar tareas específicas', 'Está diseñada para jugar',
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Verdad', 'Falso'
                    ],
                    answers: ['Es una máquina electrónica', 'Está diseñada para realizar tareas específicas', 'Verdad', 'Verdad', 'Falso']
                },
                society: {
                    titles: [
                        '1. ¿Cuál es la diferencia entre el cambio social y la cultura compartida?',
                        '2. ¿Un grupo colectivo no comparte arte ni música?',
                        '3. ¿Cómo se les llama a las personas que tienen un mismo objetivo o sentimiento?',
                        '4. ¿El cambio social puede ocurrir en cualquier momento?',
                        '5. ¿Pueden los valores verse influenciados por un cambio de gobierno?'
                    ],

                    questions: [
                        'Elige la respuesta', 'El cambio social ocurre en algún momento, mientras que la cultura no ocurre en absoluto', 'Es el proceso de transformación de las normas, valores, relaciones, políticas y formas de gobierno de una sociedad',
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Ideología', 'Grupo colectivo',
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Verdad', 'Falso'
                    ],
                    answers: ['El cambio social ocurre en algún momento, mientras que la cultura no ocurre en absoluto', 'Falso', 'Grupo colectivo', 'Verdad', 'Verdad'],
                },
                language: {
                    titles: [
                        '1. ¿Es importante la gramática porque ayuda a mejorar la ortografía de una persona?',
                        '2. ¿Cómo se llama el estudio del significado de las palabras y oraciones?',
                        '3. ¿Las palabras dialecto y acento son lo mismo?',
                        '4. ¿Que es el Dialecto?',
                        '5. ¿La gramática es el pilar para aprender un idioma de forma coherente?'
                    ],
                    questions: [
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Semántica', 'Acento',
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Es una variante de una lengua que se habla en una determinada región geográfica o social', 'Es una variante de una lengua que se habla en una determinada escuela', 'Elige la respuesta', 'Verdad', 'Falso'
                    ],
                    answers: ['Verdad', 'Semántica', 'Falso', 'Es una variante de una lengua que se habla en una determinada región geográfica o social',
                        'Verdad'
                    ],
                },
                art: {
                    titles: [
                        '1. ¿El arte, y en concreto el dibujo, permite crear un mensaje?',
                        '2. ¿Se utiliza ampliamente el arte digital en la era actual?',
                        '3. ¿Cuál es la función del arte?',
                        '4. ¿Cada arte NO es unico?',
                        '5. ¿El artista se nace o se hace?'
                    ],
                    questions: [
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'La creacion de estudiar', 'La creación de objetos, mensajes o significados',
                        'Elige la respuesta', 'Verdad', 'Falso',
                        'Elige la respuesta', 'Se hace', 'Se nace',
                    ],
                    answers: ['Verdad', 'Verdad', 'La creación de objetos, mensajes o significados', 'Falso', 'Se hace']
                }
            }

            function populate_selects(topic) {
                const QUESTIONS_DATA = SELECTION_QUESTIONS[topic];
                if (!QUESTIONS_DATA) {
                    console.warn(`No hay datos para el tema: ${topic}`);
                    return;
                }
                let index_start_t = 0;
                let index_end_t = 3;
                try {
                    for (i = 0; i < 5; i++) {
                        $SELECTS_HTML[i].innerHTML = '';
                        $QUESTIONS_TITLE[i].innerHTML = QUESTIONS_DATA.titles[i];
                        for (index_start_t = index_start_t; index_start_t < index_end_t; index_start_t++) {
                            if (QUESTIONS_DATA.questions[index_start_t] !== undefined) {
                                let default_option = QUESTIONS_DATA.questions[index_start_t] === 'Elige la respuesta' ? 'selected disabled' : '';
                                $SELECTS_HTML[i].innerHTML += `<option value="${QUESTIONS_DATA.questions[index_start_t ]}" ${default_option}>
                                                                ${QUESTIONS_DATA.questions[index_start_t ]}
                                                            </option>`;
                            } else {
                                console.warn('La pregunta no existe');
                            }
                        }
                        $SELECTS_HTML[i].setAttribute('data-answer', QUESTIONS_DATA.answers[i]);
                        index_start_t = index_end_t;
                        index_end_t += 3;
                    }
                } catch (error) {
                    console.error(error)
                }
            }
            return populate_selects(topic);
        }
    </script>

    <script src="../../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>