<?php
include '../../../php/validation/authorized-user.php';

function showInformationProfessional()
{

    include '../../../php/connectionBD.php';

    try {


        $id_user = $_SESSION["id_user"];

        $get_professional_query = 'SELECT id_especialidad, nombre, apellido, correo_electronico, centro_trabajo 
                                                FROM profesionales WHERE id_usuario = :id_user';
        $get_professional_stmt = $pdo->prepare($get_professional_query);
        $get_professional_stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
        $get_professional_stmt->execute();

        $get_user_query = 'SELECT usuario FROM usuarios WHERE id_usuario = :id_user';
        $get_user_stmt = $pdo->prepare($get_user_query);
        $get_user_stmt->bindParam('id_user', $id_user,  PDO::PARAM_INT);
        $get_user_stmt->execute();
        $row_user = $get_user_stmt->fetch(PDO::FETCH_ASSOC);

        if ($get_professional_stmt->rowCount() > 0) {

            $row_professional = $get_professional_stmt->fetch(PDO::FETCH_ASSOC);
            $show_specialty = match ($row_professional['id_especialidad']) {
                1 => '<select class="form-select" name="specialty" id="specialty" disabled>
                                            <option  disabled>Seleccione una opcion...</option>
                                            <option value="1" selected>Terapia de Lenguaje</option>
                                            <option value="2">Foniatría </option>
                                            <option value="3">Otro</option>
                                        </select>',
                2 => '<select class="form-select" name="specialty" id="specialty" disabled>
                                            <option  disabled>Seleccione una opcion...</option>
                                            <option value="1" >Terapia de Lenguaje</option>
                                            <option value="2" selected>Foniatría</option>
                                            <option value="3">Otro</option>
                                        </select>',
                3 => '<select class="form-select" name="specialty" id="specialty" disabled>
                                            <option  disabled>Seleccione una opcion...</option>
                                            <option value="1">Terapia de Lenguaje</option>
                                            <option value="2">Foniatría</option>
                                            <option value="3" selected>Otro</option>
                                        </select>',
            };

            echo ' <div class="row">
                            <div class="col-6">
                                <b>Datos personales</b><br>
                                <label for="name">Nombre</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Introduzca su nombre"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled autofocus="false" value="' . $row_professional['nombre'] . '">
                                </div>
                                <label for="lastname">Apellido</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="lastname" id="lastname"  class="form-control" placeholder="Introduzca su apellido"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled autofocus="false" value="' . $row_professional['apellido'] . '">
                                </div>
                                <label for="email">Correo electronico</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Introduzca su correo electronico"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled autofocus="false"  value="' . $row_professional['correo_electronico'] . '">
                                </div>
                                <label for="specialty">Especialidad </label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" for="inputGroupSelect01"><i class="bi bi-person-bounding-box"></i></span>
                                    ' . $show_specialty . '
                                </div>
                                 <label for="work-center">Centro de trabajo</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-buildings"></i></span>
                                    <input type="text" name="work-center" id="work-center"  class="form-control" placeholder="Introduzca su centro de trabajo"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled autofocus="false"  value="' . $row_professional['centro_trabajo'] . '">
                                </div>
                                </div>
                                <div class="col-6">
                                    <b>Datos de la cuenta</b><br>
                                    <label for="user">Usuario</label><br>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                        <input type="text" name="user" id="user" class="form-control" placeholder="Introduzca su nombre de usuario"
                                            aria-label="Username" aria-describedby="basic-addon1" disabled autofocus="false" value="' . $row_user['usuario'] . '">
                                    </div>
                                ';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
?>

<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil | Sonidos de habla</title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/../reset.css">
    <link rel="stylesheet" href="../../../css/components/body.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/input.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../css/admin/header.css">
    <link rel="stylesheet" href="../../../css/admin/profile.css">
</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-start-full ">
        <section class=" h-100  z-1 w-100 p-3 ">
            <div class="row">
                <div class="col-9">
                    <div class="z-1 ">
                        <form action="../../../php/admin/professional.php" method="post">
                            <input type="hidden" value="update" name="state">
                            <h1 class=" fw-bold ">
                                Perfil
                            </h1>
                            <div class="text__grey">
                                <p>Administra tu información y las opciones de privacidad y seguridad a fin de que sonidos de
                                    habla sea más relevante para ti. </p>
                            </div>
                            <?php
                            showInformationProfessional()
                            ?>
                            <hr>
                            <div class="change-password-operation d-none">
                                <small>Actualiza tu contraseña de forma regular para mantener tu cuenta segura.</small><br>
                                <button class="btn-change-password m-0 bg-none p-0 text__blue">Cambiar tu contraseña</button>
                            </div>
                    </div>
                </div>
                <hr>
                <div class="flex-center-full mt-3 gap-3 profile-operations d-none">
                    <a href="../dashboard.php" class="text-decoration-none button__grey button-a text-white">Regresar</button></a>
                    <button class="button__red">Elimnar cuenta</button>
                    <input type="submit" class="button__orange" value="Actualizar">
                </div>
                </form>
            </div>
            </div>
            <div class="col-3">
                <div>
                    <div class="modify-professional">
                        <button class="w-100 modify-professional__button  button__green w-100">
                            Editar perfil
                        </button>
                    </div>
                    <hr style="  margin-bottom: 0.5rem;">
                    <section class="qualities-administrator m-0 p-0">
                        <span class="text__green fs-3 ">Administrador</span><br>
                        <span class="text__grey">Administracion de usuarios</span><br>
                        <p> <b>Acceso a la gestión de usuarios para crear perfiles personalizados, programar sesiones y realizar un seguimiento del progreso de sus pacientes.</b></p>
                        <span class="text__grey">Contactos</span>
                        <p> <b class="">Acceso a los representantes de sus pacientes de una forma más rápida y confiable para enviar mensajes a través de Gmail.</b></p>
                    </section>
                </div>
            </div>
            </div>
        </section>
    </main>

    <div class="container-modal" data-modal="change-password" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title modal-title-blue fs-5 text-center" id="exampleModalLabel"><b>Cambiar contraseña</b></h1>
                </div>
            </div>
            <form action="./../../../php/admin/professional.php" class="modal-form" method="post">
                <div class="modal-body">
                    <input type="hidden" name="state" value="change_password">
                    <div class="validations fw-bold">
                        <span class="one"></span>
                        <span class="two"></span>
                    </div>
                    <label for="">Contraseña Actual</label><br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-person-lock"></i>
                        </span>
                        <input type="password" name="old-password" class="form-control"
                            placeholder="Ingrese contraseña actual" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <label for="">Contraseña Nueva</label><br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-key"></i></i>
                        </span>
                        <input type="password" name="new-password" class="form-control"
                            placeholder="Ingrese nueva contraseña" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div><label for="">Confirmar contraseña</label><br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-key"></i></i>
                        </span>
                        <input type="password" name="password-again" class="form-control"
                            placeholder="Repita nueva contraseña" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <hr>
                <div class="modal-footer flex-center-full gap-4">
                    <button type="button" class="btn-cancel-cp button__grey">Cancelar</button>
                    <input type="submit" value="Cambiar contraseña" class="button__blue">
                </div>
            </form>
        </div>
    </div>
    <?php include '../../include/footer.php'; ?>

    <script>
        let $input_group = document.querySelectorAll(".input-group > input");

        let $change_password_modal = document.querySelector("[data-modal='change-password']");
        let $change_password_modal_content = document.querySelector("[data-modal='change-password'] > .content");
        let $profile_operations = document.querySelector(".profile-operations");
        let $change_password_operation = document.querySelector(".change-password-operation");
        let $select = document.querySelector('select ');
        let $select_option = document.querySelector('select > option');
        document.addEventListener("click", e => {
            if (e.target.matches('.modify-professional__button ')) {
                $input_group.forEach(el => {
                    el.removeAttribute("disabled");
                });
                $profile_operations.classList.remove("d-none");
                $change_password_operation.classList.remove('d-none');
                $select.removeAttribute("disabled");
            }
            if (e.target.matches('.btn-change-password')) {
                e.preventDefault()
                $change_password_modal_content.classList.remove('animation-modal-close')
                $change_password_modal_content.classList.add('animation-modal-open');
                $change_password_modal.removeAttribute("style");
            }

            if (e.target.matches(".btn-cancel-cp")) {
                $change_password_modal_content.classList.remove('animation-modal');
                $change_password_modal_content.classList.add('animation-modal-close');
                setTimeout(() => {
                    $change_password_modal.style.display = "none";
                }, 1000);
            }
        })
    </script>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

    <script src="../js/validations/login.js" type="module"></script>
</body>

</html>