<?php
include '../../../php/validation/authorized-user.php';
?>

<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar paciente | Sonidos del habla</title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/body.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../css/admin/header.css">
    <link rel="stylesheet" href="../../../css/components/view-add-modify-patient.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">

</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-start-full ">
        <div class="main__content shadow z-1 ">
            <h1 class="text-center fw-bold">Agregar paciente</h1>
            <div class="flex-center-full text__grey">
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
                                <img src="../../../img/patients/childs/boy.png" alt="" class="checked">
                            </label>
                            <label for="F">
                                <input type="radio" id="F" name="id-gender" value="2">
                                <img src="../../../img/patients/childs/girl.png" alt="">
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
                        <input type="hidden" class="input-therapys" name="input-therapys" value="sonidos-habla">
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
                        <label for="duration-each-exercise">Duración de cada ejercicio</label>
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
                        <label for="note">Nota</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <textarea name="note" id="note" class="form-control"></textarea>
                        </div>
                        <label class="support-materials">Materiales de apoyo</label>
                        <select name="support-materials[]" class="form-control" id="support-materials" multiple>
                            <option value="0">Ejercicios para pronunciación el fonema r y la doble rr</option>
                            <option value="1">Actividades para discriminar sonidos</option>
                            <option value="2">Ejercicios para identificar errores en la propia pronunciación</option>
                            <option value="3">Actividades para mejorar el vocabulario</option>
                            <option value="4">Trabalenguas fáciles</option>
                            <option value="5">Aprende a pronunciar el fonema Ñ</option>
                            <option value="6">Trabalenguas</option>
                            <option value="7">Ejercicios de respiración</option>
                        </select>
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
                        <a href="../dashboard.php" class="text-decoration-none text-white button__grey button-a">Regresar</a>
                        <input type="submit" class="button__orange" value="Agregar">
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
                <button class="button__blue btn-close-therapy-img">Cerrar </button>
            </div>
        </div>
    </div>

    <?php include '../../include/footer.php'; ?>
    <script type="module" src="https://unpkg.com/@padawanstrainer/select-multiple"></script>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
    <script src="../../../js/admin/add-modify-patient.js" type="module"> </script>
</body>

</html>