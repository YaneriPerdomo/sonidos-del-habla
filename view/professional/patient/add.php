<?php
include '../../../php/validation/authorized-user.php';
?>

<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicia sesion | Sonidos de habla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/body.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../css/admin/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
    <style>
        .main__content {
            background: white;
            padding: 1rem;
            border: solid 1px #e8d8ff;
            margin: 1rem;
            width: 1200px;
            min-width: 400px;
            border-radius: 0rem 0rem 1rem 1rem;
        }

        .checked {
            filter: drop-shadow(0px 4px 0px rgb(47, 47, 47));
            transform: perspective(500px) translateZ(20px);
            transform-style: preserve-3d;
            transition: all 0.5s linear;
        }

        .selection-gender>label>img {
            cursor: pointer;
            border: 0rem;
            width: 100px;
            clip-path: circle();
        }

        .selection-gender>label>input {
            display: none;
        }

        .card-exercise>figure>img {
            width: 200px;
            border: solid 2px rgb(47, 47, 47);
            border-radius: 0.4rem;
        }

        .therapy {
            height: 150px;
            width: 120px;
            background: white;
            background: wheat;
            border-radius: 0.5rem;
            margin: 1rem;
            position: relative;
            background: #ffa2c1;
        }

        .therapy>.delete-therapy {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            right: 0;
            left: 0;
            position: absolute;
            border: 0;
            left: 90%;
        }

        .therapy>figure>img {
            width: 100%;
            height: 100%;
        }

        .combo-header,
        [data-default-text="Elige matariales de apoyo"] {
            padding: 0 !important;
            width: 100% !important;
            border: 0 !important;
            border-radius: 0rem !important;
            appearance: none !important;
            background-color: var(--bs-body-bg) !important;
            background-clip: padding-box !important;
            border: var(--bs-border-width) solid var(--bs-border-color) !important;
            border-radius: var(--bs-border-radius) !important;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
            height: 75% !important;
            width: 100% !important;
            border-radius: 0rem 0.5rem 0.5rem 0rem !important;
        }

        .combo-header>span {
            appearance: none !important;
            background-color: var(--bs-body-bg) !important;
            background-clip: padding-box !important;
            border: var(--bs-border-width) solid var(--bs-border-color) !important;
            border-radius: var(--bs-border-radius) !important;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
            padding: 0.5rem;
        }

        .item-container {
            padding: 0.5rem !important;
        }

        .modal-body__therapy_img {
            width: 217px;
        }
    </style>
</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-start-full ">
        <div class="main__content shadow z-1 ">
            <h1 class="text-center fw-bold">Agregar paciente</h1>
            <div class="flex-center-full color-grey">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum laborum mollitia culpa esse, temporibus soluta distinctio quidem quis cupiditate fugiat ea reiciendis. Necessitatibus, labore dolore in ut beatae sit deleniti.</p>
            </div>
            <form action="../../../php/admin/patient.php" method="post">
                <input type="hidden" name="state" value="add">
                <div class="row">
                    <div class="col-6">
                        <b>Datos personales</b><br>
                        <label for="name">Nombre</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Introduzca su nombre"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="lastname">Apellido</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Introduzca su apellido"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="date">Fecha de nacimiento</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="date" name="date-birth" id="date" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="gender">Genero </label><br>

                        <p class="d-flex gap-2 selection-gender">
                            <label for="M" data-checked="true">
                                <input type="radio" id="M" name="id-gender" value="1" checked>
                                <img src="../../../img/childs/boy.png" alt="" class="checked">
                            </label>
                            <label for="F">
                                <input type="radio" id="F" name="id-gender" value="2">
                                <img src="../../../img/childs/girl.png" alt="">
                            </label>
                        </p>

                    </div>
                    <div class="col-6">
                        <b>Datos de la cuenta</b><br>
                        <label for="user">Usuario</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="user" id="user" class="form-control" placeholder="Introduzca su nombre de usuario"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="password">Contraseña</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Introduzca su contraseña"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="again-password">Confirmar la contraseña</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                            <input type="password" name="again-password" id="again-password" class="form-control" placeholder="Confirme la contraseña"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                    </div>
                    <hr>
                    <section class="about-dyslalia">
                        <span><b>Información sobre la dislalia</b></span><br>
                        <label for="dyslalia-type">Tipo </label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <select name="dyslalia-type" class="form-control">
                                <option value="" selected disabled>Elige el tipo de dislalia</option>
                                <option value="1">Dislalia funcional</option>
                                <option value="2">Dislalia orgánica</option>
                                <option value="2">Dislalia evolutiva</option>
                                <option value="2">Dislalia audiógena</option>
                            </select>
                        </div>
                        <label for="classification">Clasificacion</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <select name="classification" id="classification" class="form-control">
                                <option value="0" disabled selected>Elige una clasificacion</option>
                                <option value="1">Simple</option>
                                <option value="2">Múltiple</option>
                                <option value="3">Hotentotismo</option>
                                <option value="4">Afín</option>
                            </select>
                        </div>
                        <label for="">Fonemas afectados</label>
                        <div class="input-group mb-2 selection-phonemes d-flex">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <div class="add-select-phonemes" style="flex-grow: 2">
                                <select name="classification" id="classification" class="form-control">
                                </select>
                            </div>
                        </div>
                        <label for="gravity">Gravedad</label>
                        <div class="input-group mb-2 selection-phonemes mb-3 ">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <select name="gravity" id="gravity" class="form-control">
                                <option value="" selected disabled>Elige la gravedad de la dificultad</option>
                                <option value="Leve">Leve</option>
                                <option value="Moderada">Moderada</option>
                                <option value="Severa">Severa</option>
                            </select>
                        </div>
                        <label for="observations">Observaciones</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <textarea name="observations" id="observations" class="form-control"></textarea>
                        </div>
                    </section>
                    <hr>
                    <section class="personalization-therapy-session">
                        <span><b>Datos de la personalizacion de la sesion</b></span>
                        <input type="" class="input-therapys" name="input-therapys" value="sonidos-habla">
                        <div class="flex-center-full">
                            <div class="therapy flex-center-full" data-state="inactive" data-state-one="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <div class="therapy flex-center-full" data-state="inactive">
                                <figure>
                                    <img src="" alt="">
                                </figure>
                                <div class="delete-therapy">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="aim">Objetivo:</label>
                                <div class="input-group mb-2 selection-phonemes mb-3 ">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                                    <select name="aim" id="aim" class="form-control">
                                        <option value="" selected disabled>Elige la gravedad de la dificultad</option>
                                        <option value="muscle-strengthening">Fortalecimiento muscular</option>
                                        <option value="joint"> Articulación</option>
                                        <option value="fluency">Fluidez</option>
                                    </select>
                                </div>
                                <label for="exercises">Ejercicios para mejorar:</label>
                                <div class="input-group mb-2 selection-phonemes mb-3 ">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                                    <select name="exercises" id="exercises" class="form-control">
                                        <option value="" selected disabled>...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 flex-center-full gap-2">
                                <div class="card-exercise" data-exercise="one">
                                    <figure>
                                        <img src="" alt="">
                                    </figure>
                                    <span></span>
                                </div>
                                <div class="card-exercise" data-exercise="two">
                                    <figure>
                                        <img src="" alt="">
                                    </figure>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <label for="">Duración de cada ejercicio</label>
                        <div class="input-group mb-2 selection-phonemes mb-3 ">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-stopwatch"></i></i></span>
                            <select name="duration-each-exercise" id="duration-each-exercise" class="form-control">
                                <option value="" selected disabled>Elige la duración de cada ejercicio</option>
                                <option value="10000">10 segundos</option>
                                <option value="15000">15 segundos</option>
                                <option value="20000">20 segundos</option>
                                <option value="30000">30 segundos</option>
                                <option value="40000">40 segundos</option>
                                <option value="50000">50 segundos</option>
                            </select>
                        </div>
                        <label for="session_duration">Duracion total</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-stopwatch"></i></span>
                            <input type="text" name="session_duration" id="session_duration" disabled class="form-control"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label class="support-materials">Materiales de apoyo</label>
                        <select name="support-materials[]" class="form-control" id="support-materials" multiple>
                            <option value="1">Ejercicios en formato PDF para pronunciar el fonema r y la doble rr</option>
                            <option value="2">Juego para discriminar sonidos</option>
                            <option value="3">Juego para identificar errores en la propia pronunciación</option>
                            <option value="4">Juego para mejorar el vocabulario, nivel basico</option>
                            <option value="5">Imágenes de trabalenguas fáciles para niños entre 7 y 10 años</option>
                            <option value="6">Video para aprende a pronunciar el fonema Ñ</option>
                            <option value="7" selected>Imagenes de Trabalenguas </option>
                        </select>
                        <label for="note">Nota</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <textarea name="note" id="note" class="form-control"></textarea>
                        </div>
                    </section>
                    <br><br><br><br>
                    <section class="representative">
                        <span class="mt-3"><b>Datos del representante</b></span><br>
                        <label for="representative__name">Nombre</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="text" name="representative__name" id="representative__name" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="representative__lastname">Apellido</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="text" name="representative__lastname" id="representative__lastname" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="representative__email">Correo electronico</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="email" name="representative__email" id="representative__email" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="representative-phone-number">Numero telefonico</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="text" name="representative-phone-number" id="representative-phone-number" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="representative__secret-code">Clave secreta</label><br>
                        <small>Esta opción permite al representante utilizar una contraseña especial al final de cada sesión para dejar comentarios sobre el desempeño de su niño/a, si es necesario.</small>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="password" name="representative__secret-code" id="representative__secret-code" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                    </section>
                    <hr>
                    <div class="flex-center-full gap-3">
                        <button class="button-grey"><a href="../dashboard.php" class="text-decoration-none text-white">Regresar</a></button>
                        <input type="submit" class="button-pink" value="Agregar">
                    </div>


                </div>
            </form>
        </div>
    </main>

    <div class="container-modal" data-modal="show_therapy_img" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title modal-title-blue fs-5 text-center" id="exampleModalLabel"><b>Mostrar imagen</b></h1>
                </div>
            </div>
            <div class="modal-body flex-center-full">
                <img src="" class="modal-body__therapy_img mt-3" alt="">
            </div>
            <hr>
            <div class="flex-center-full  mb-3">
                <button class="button-red btn-close-therapy-img">Cerrar </button>
            </div>
        </div>
    </div>
    <script>
        let $show_modal_image_therapy = document.querySelector("[ data-modal='show_therapy_img']");
        let $show_therapy_img_content = document.querySelector("[data-modal='show_therapy_img'] > .content");
        let $therapy_img_modal = document.querySelector(".modal-body__therapy_img");
        document.addEventListener("click", e => {
            if (e.target.matches('.therapy  > figure > img')) {
                $show_therapy_img_content.classList.remove('animation-modal-close')
                $show_therapy_img_content.classList.add('animation-modal-open');
                $therapy_img_modal.src = e.target.getAttribute('src');
                $show_modal_image_therapy
                    .removeAttribute("style");
            }

            if (e.target.matches(".btn-close-therapy-img")) {
                $show_therapy_img_content.classList.remove('animation-modal');
                $show_therapy_img_content.classList.add('animation-modal-close');
                setTimeout(() => {
                    $show_modal_image_therapy
                        .style.display = "none";
                }, 1000);
            }
        })
    </script>
    <?php include '../../include/footer.php'; ?>
    <script type="module" src="https://unpkg.com/@padawanstrainer/select-multiple"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
    <script>
        $input_therapy_elements = document.querySelector(".input-therapys");
        let $card_exercise_img = document.querySelectorAll(".card-exercise > figure > img");
        let $therapy_elements = document.querySelectorAll(".therapy");
        let $delete_therapy = document.querySelectorAll(".delete-therapy > i")
        $therapy_imgs = document.querySelectorAll(".therapy > figure > img")
        document.addEventListener("click", e => {

            if (e.target.matches('.delete-therapy > i')) {
                let therapy_image_elements = $input_therapy_elements.value.split(',');
                if (e.target.getAttribute('data-name-t').length != 0) {
                    for (let i = 0; i < $therapy_elements.length; i++) {
                        if (e.target.getAttribute('data-name-t') === $therapy_imgs[i].getAttribute('alt')) {
                            if ($therapy_elements[i].getAttribute("data-state-one") == 'active') {
                                $therapy_elements[i].setAttribute('data-state-one', 'inactive');
                                $input_therapy_elements.value = $input_therapy_elements.value.replace($delete_therapy[i].getAttribute('data-name-t') + ',', '');
                                let therapy_image_elements = $input_therapy_elements.value.split(',');
                                if (therapy_image_elements.includes($delete_therapy[i].getAttribute('data-name-t'))) {
                                    $input_therapy_elements.value = $input_therapy_elements.value.replace(',' + $delete_therapy[i].getAttribute('data-name-t'), '')
                                }
                                console.info(0)
                            } else {
                                $input_therapy_elements.value = $input_therapy_elements.value.replace(',' + $delete_therapy[i].getAttribute('data-name-t'), '');
                            }
                            $therapy_elements[i].setAttribute('data-state', 'inactive');
                            $therapy_imgs[i].src = "";
                            $therapy_imgs[i].alt = "";
                            $delete_therapy[i].setAttribute('data-name-t', '')
                            break;
                        }
                    }
                }
            }




            if (e.target.matches(".card-exercise > figure >img")) {
                let therapy_image_elements = $input_therapy_elements.value.split(',');
                let should_update_input = true;
                for (let i = 0; i < $therapy_elements.length; i++) {
                    if ($therapy_elements[i].getAttribute('data-state') == 'inactive') {
                        if ($therapy_elements[i].getAttribute('data-state-one') == 'inactive') {
                            console.info(typeof(therapy_image_elements));
                            console.info(therapy_image_elements.length);
                            for (let i = 0; i < therapy_image_elements.length; i++) {
                                if (e.target.getAttribute('alt').includes(therapy_image_elements[i])) {
                                    should_update_input = false;
                                    break;
                                }
                            }
                            if (should_update_input == false) {
                                console.info('updaenot')
                                return
                            }
                            $therapy_elements[i].setAttribute('data-state-one', 'active')
                            if (therapy_image_elements.length == 0) {
                                $input_therapy_elements.value = e.target.getAttribute('alt');
                            } else {
                                $input_therapy_elements.value = $input_therapy_elements.value + ',' + e.target.getAttribute('alt');
                            }
                        } else {
                            for (let i = 0; i < therapy_image_elements.length; i++) {
                                if (e.target.getAttribute('alt').includes(therapy_image_elements[i])) {
                                    should_update_input = false;
                                    break;
                                }
                            }
                            if (should_update_input == false) {
                                console.info('updaenot')
                                return
                            }
                            $input_therapy_elements.value = $input_therapy_elements.value + ',' + e.target.getAttribute('alt');
                        }
                        $therapy_imgs[i].src = e.target.getAttribute('src');
                        $therapy_imgs[i].alt = e.target.getAttribute('alt');
                        $delete_therapy[i].setAttribute('data-name-t', e.target.getAttribute('alt'))
                        $therapy_elements[i].setAttribute('data-state', 'active')
                        break;
                    }
                }
            }
        })



        let $data_checked = document.querySelectorAll(".selection-gender > label > img");
        let $exercises = document.querySelector('#exercises');
        let $aim = document.querySelector("#aim");
        document.addEventListener('change', e => {
            if (e.target.matches('#aim')) {
                console.info(0);
                $card_exercise_img[0].src = "";
                $card_exercise_img[1].src = "";
                switch (e.target.value) {

                    case "muscle-strengthening":
                        $exercises.innerHTML = `
                                <option value="Musculos de la lengua">Los músculos de la lengua</option>
                                <option value="Labios"> Labios </option>
                                <option value="mejillas">Mejillas</option>
                        `;
                        //muscle-strengthening;
                        $card_exercise_img[0].src = `../../../img/exercises/muscle-strengthening/Musculos de la lengua0.png`;
                        $card_exercise_img[1].src = `../../../img/exercises/muscle-strengthening/Musculos de la lengua1.png`;
                        $card_exercise_img[0].alt = 'Musculos de la lengua0';
                        $card_exercise_img[1].alt = 'Musculos de la lengua1';
                        break;
                    case 'joint':

                        $exercises.innerHTML = `
                          <option value="rotacismo">Rotacismo (La no articulación del fonema /r/)</option>
                        <option value="ceceo">Ceceo (pronunciación de /s/ por /z/)</option>
                        <option value="seseo">Seseo: pronunciación de /z/ por /s/.</option>
                        <option value="sigmatismo">Sigmatismo (la no articulación del fonema /s/)</option>
                        <option value="jotacismo">Jotacismo: la no articulación del fonema /x/.</option>
                        <option value="mitacismo">Mitacismo (la no articulación del fonema /m/)</option>
                        <option value="lambdacismo">Lambdacismo (la no articulación del fonema /l/)</option>
                        <option value="mumación">Numación (la no articulación del fonema /n/)</option>
                        <option value="muñación">Nuñación (la no articulación del fonema /ñ/)</option>
                        <option value="kappacismo">Kappacismo (la no articulación del fonema /k/)</option>
                        <option value="gammacismo">Gammacismo (la no articulación del fonema /g/)</option>
                        <option value="ficismo">Ficismo (la no articulación del fonema /f/)</option>
                        <option value="chuitismo">Chuitismo (la no articulación del fonema /ch/)</option>
                        <option value="piscismo">Piscismo (la no articulación del fonema /p/)</option>
                        <option value="tetacismo">Tetacismo (la no articulación del fonema /t/)</option>
                        <option value="yeismo">Yeismo (la no articulación del fonema /ll/)</option>
                        <option value="chionismo">Chionismo (sustitución de /rr/ por /l/)</option>
                        <option value="checheo">Checheo (sustitución de /s/ por /ch/)</option>`;
                        $card_exercise_img[0].src = `../../../img/exercises/joint/rotacismo0.png`;
                        $card_exercise_img[1].src = `../../../img/exercises/joint/rotacismo1.png`;
                        $card_exercise_img[0].alt = 'rotacismo0';
                        $card_exercise_img[1].alt = 'rotacismo1';
                        break;
                    case 'fluency':
                        $exercises.innerHTML = `
                         <option value="el ritmo del habla">El ritmo</option>
                        <option value="the-cadence-of-speech">La cadencia del habla</option>
                        `;
                        //fluency;
                        $card_exercise_img[0].src = `../../../img/exercises/fluency/el ritmo del habla0.png`;
                        $card_exercise_img[1].src = `../../../img/exercises/fluency/el ritmo del habla1.png`;
                        $card_exercise_img[0].alt = 'el ritmo del habla0';
                        $card_exercise_img[1].alt = 'el ritmo del habla1';
                        break;
                    default:
                        break;
                }
            }

            if (e.target.matches('#duration-each-exercise')) {
                let $session_duration = document.querySelector("#session_duration");
                let $duration_each_exercise = document.querySelector("#duration-each-exercise");
                const ms = e.target.value * 10

                console.log(new Date(ms).toISOString().slice(11, 19)) // 18:30:55

                $session_duration.value = new Date(ms).toISOString().slice(11, 19)
            }
            if (e.target.matches('#exercises')) {
                $card_exercise_img[0].src = `../../../img/exercises/${$aim.value}/${e.target.value}0.png`;
                $card_exercise_img[1].src = `../../../img/exercises/${$aim.value}/${e.target.value}1.png`;
                $card_exercise_img[0].alt = e.target.value + '0';
                $card_exercise_img[1].alt = e.target.value + '1';
            }
        })





        document.addEventListener("click", e => {
            if (e.target.matches(".selection-gender > label > img")) {
                for (let i = 0; i < $data_checked.length; i++) {
                    $data_checked[i].removeAttribute("data-checked");
                    $data_checked[i].classList.remove("checked")

                }
                e.target.classList.add("checked");
                e.target.setAttribute("data-checked", "true");

            }
        })

        let $classification = document.querySelector("#classification");
        let $phonemes = document.querySelector("#phonemes");
        let $selection_phonemes = document.querySelector(".selection-phonemes")
        let $add_select_phonemes = document.querySelector('.add-select-phonemes');
        $classification.addEventListener("change", e => {
            console.info(e.target.value)
            if (e.target.value != '1') {
                $add_select_phonemes.innerHTML = `
                <select-multiple name="phonemes" class="form-control" id="Fonemas" label="Fonemas" multiple >
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                    <option value="d">d</option>
                    <option value="e">e</option>
                    <option value="f">f</option>
                    <option value="g">g</option>
                    <option value="h">h</option>
                    <option value="i">i</option>
                    <option value="j">j</option>
                    <option value="k">k</option>
                    <option value="l">l</option>
                    <option value="m">m</option>
                    <option value="n">n</option>
                    <option value="ñ">ñ</option>
                    <option value="o">o</option>
                    <option value="p">p</option>
                    <option value="q">q</option>
                    <option value="r">r</option>
                    <option value="s">s</option>
                    <option value="t">t</option>
                    <option value="u">u</option>
                    <option value="v">v</option>
                    <option value="w">w</option>
                    <option value="x">x</option>
                    <option value="y">y</option>
                    <option value="z">z</option>
                </select-multiple>`;
            } else {
                $add_select_phonemes.innerHTML = `<select name="phonemes" id="phonemes" class="form-control">
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                    <option value="d">d</option>
                    <option value="e">e</option>
                    <option value="f">f</option>
                    <option value="g">g</option>
                    <option value="h">h</option>
                    <option value="i">i</option>
                    <option value="j">j</option>
                    <option value="k">k</option>
                    <option value="l">l</option>
                    <option value="m">m</option>
                    <option value="n">n</option>
                    <option value="ñ">ñ</option>
                    <option value="o">o</option>
                    <option value="p">p</option>
                    <option value="q">q</option>
                    <option value="r">r</option>
                    <option value="s">s</option>
                    <option value="t">t</option>
                    <option value="u">u</option>
                    <option value="v">v</option>
                    <option value="w">w</option>
                    <option value="x">x</option>
                    <option value="y">y</option>
                    <option value="z">z</option>
                </select>`;
            }

        })



        new MultiSelectTag('support-materials', {
            rounded: true, // default true
            shadow: false, // default false
            placeholder: 'Search', // default Search...
            tagColor: {
                textColor: 'rgb(47,47,47)',
                borderColor: '#ffa2c1',
                bgColor: '#eaffe6',
            },
            onChange: function(values) {
                console.log(values)
            }
        })
    </script>
</body>

</html>