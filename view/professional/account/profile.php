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
                1 => '<select class="form-select" name="specialty" id="specialty">
                                            <option  disabled>Seleccione una opcion...</option>
                                            <option value="1" selected>Logopeda</option>
                                            <option value="2">Foniatra</option>
                                            <option value="3">Terapeuta del Lenguaje</option>
                                        </select>',
                2 => '<select class="form-select" name="specialty" id="specialty">
                                            <option  disabled>Seleccione una opcion...</option>
                                            <option value="1" >Logopeda</option>
                                            <option value="2" selected>Foniatra</option>
                                            <option value="3">Terapeuta del Lenguaje</option>
                                        </select>',
                3 => '<select class="form-select" name="specialty" id="specialty">
                                            <option  disabled>Seleccione una opcion...</option>
                                            <option value="1">Logopeda</option>
                                            <option value="2">Foniatra</option>
                                            <option value="3" selected>Terapeuta del Lenguaje</option>
                                        </select>',
            };

            echo ' <div class="row">
                            <div class="col-6">
                                <b>Datos personales</b><br>
                                <label for="name">Nombre</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Introduzca su nombre"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true" value="' . $row_professional['nombre'] . '">
                                </div>
                                <label for="lastname">Apellido</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Introduzca su apellido"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true" value="' . $row_professional['apellido'] . '">
                                </div>
                                <label for="email">Correo electronico</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Introduzca su correo electronico"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true"  value="' . $row_professional['correo_electronico'] . '">
                                </div>
                                <label for="specialty">Especialidad </label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" for="inputGroupSelect01"><i class="bi bi-person-bounding-box"></i></span>
                                    ' . $show_specialty . '
                                </div>
                                 <label for="work-center">Centro de trabajo</label><br>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-buildings"></i></span>
                                    <input type="text" name="work-center" id="work-center" class="form-control" placeholder="Introduzca su centro de trabajo"
                                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true"  value="' . $row_professional['centro_trabajo'] . '">
                                </div>
                                </div>
                                <div class="col-6">
                                    <b>Datos de la cuenta</b><br>
                                    <label for="user">Usuario</label><br>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                        <input type="text" name="user" id="user" class="form-control" placeholder="Introduzca su nombre de usuario"
                                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true" value="' . $row_user['usuario'] . '">
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
    <title>Inicia sesion | Sonidos de habla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/../reset.css">
    <link rel="stylesheet" href="../../../css/components/body.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/input.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/auxiliary.css">

    <style>
        .header-img {
            width: 50px;
        }

        header>nav {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem;
            height: 100%;
            align-items: center;
        }

        .dropdown-toggle {
            background: none;
            border: none;
        }

        .dropdown-menu__img {
            width: 200px;
        }

        .dropstart .dropdown-toggle::before {
            content: none;
        }

        .color-grey {
            color: #828282;
        }

        .dropdown-menu__information-email {
            word-break: break-all;
        }



        .main__content {
            background: white;
            padding: 1rem;
            border-radius: 1rem;
            border: solid 1px #e8d8ff;
            margin: 1rem;
            width: 992px;
            min-width: 400px;
        }


        .container-modal {
            width: 100vw;
            height: 100vh;
            position: absolute;
            display: flex;
            justify-content: center;
            background: green;
            align-items: center;
            background: rgb(0, 0, 0, 0.5);
            z-index: 999;
        }

        .container-modal>.content {
            max-width: 500px;
            background: white;
            min-width: 200px;
           
        }

        .modal-title-blue {
            margin: 0rem;
            background: var(--color-blue);
            padding: 1rem;
            color: white;
        }

        .modal-form{
            padding: 1rem;
        }

        .modal-footer{
        }

        .animation-modal-open{
            animation: animation-modal-open 1s both;
        }

        @keyframes animation-modal-open {
            0%{
                transition: all 0.5s linear;
                opacity: 0;
                transform: scale(0);
            }

            40%{
                opacity: 1;
            }

            100%{
                transform: scale(1);
            }
        }

        .animation-modal-close{
            animation: animation-modal-close 1s both;
        }

        @keyframes animation-modal-close {
            0%{
                transition: all 0.5s linear;
                opacity: 1;
                transform: scale(1);
            }

            100%{
                opacity: 1;
                transform: scale(0);
            }
        }
    </style>
</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-center-full">
        <div class="main__content shadow z-1 ">
            <form action="../../../php/admin/professional.php" method="post">
                <input type="hidden" value="update" name="state">
                <h2 class="text-center">
                    Perfil
                </h2>
                <div class="flex-center-full">
                    <p>Administra tu información y las opciones de privacidad y seguridad a fin de <br> que sonidos de
                        habla sea más relevante para ti. </p>
                </div>
                <?php
                showInformationProfessional()
                ?><hr>
                  <p>Actualiza tu contraseña de forma regular para mantener tu cuenta segura.</p>
                <button class="btn-change-password">Cambiar contraseña</button>
        </div>
        </div>
        <div class="flex-center-full mt-3 gap-3">
            <button class="button-grey">Regresar</button>
            <button class="button-red">Elimnar cuenta</button>
            <input type="submit" class="button-pink" value="Registrate">
        </div>
        </form>
        </div>
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
                <div class="modal-footer flex-center-full gap-4 "style='padding-top: 1rem;'>
                    <button type="button" class="btn-cancel-cp button-grey">Cancelar</button>
                    <input type="submit" value="Cambiar contraseña" class="">
                </div>
            </form>
        </div>
    </div>
    <?php include '../../include/footer.php'; ?>

        <script>

            let $change_password_modal = document.querySelector("[data-modal='change-password']");
            let $change_password_modal_content = document.querySelector("[data-modal='change-password'] > .content")
            document.addEventListener("click" ,  e => {
                if(e.target.matches('.btn-change-password')){
                    e.preventDefault()
                    $change_password_modal_content.classList.remove('animation-modal-close')
                    $change_password_modal_content.classList.add('animation-modal-open');                
                    $change_password_modal.removeAttribute("style");
                }

                if(e.target.matches(".btn-cancel-cp")){
                    $change_password_modal_content.classList.remove('animation-modal');
                    $change_password_modal_content.classList.add('animation-modal-close');
                    setTimeout(() => {
                    $change_password_modal.style.display = "none";
                    }, 1000);
                }
            })
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="../js/validations/login.js" type="module"></script>
</body>

</html>