<?php
include '../../php/validation/authorized-user.php';
?>

<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de control | Sonidos de habla</title>
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
    <style>
        .search-datas-icon,
        .search-datas-input {
            background: #0F8A8A !important;
            border: solid 1px rgb(112, 212, 212) !important;
        }

        .search-datas-input{
            border-radius: 0rem 0.5rem 0.5rem 0rem !important;
        }

        .search-datas-input::placeholder{
            color:white;
        }

        .search-datas{
            width: 25vw !important;
        }
    </style>
</head>

<body>

    <?php include '../include/professional/header.php'; ?>
    <main class="flex-start-full">
        <section class=" h-100  z-1 w-100 p-3 ">
            <div class="row ">
                <div class="col-9">
                    <div>
                        <h1 class="">Panel de control</h1>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button class="button__blue"><a href="../../php/admin/report.php" class="text-decoration-none text__white">Reporte en <b>PDF</b></a></button>
                            </div>
                        </div><br>
                        <div class="show-patients d-flex   flex-column">
                            <div class="card-patient">
                                <br>
                                <div class="card-patient__img flex-center-full">
                                    <img src="../../img/patients/childs/girl.png" class="" alt="">
                                </div>
                                <div class="card-patiente_information ">
                                    <b>Usuario:</b><span> Yaneri</span><br>
                                    <b>Nombre:</b><span> Yaneri</span><br>
                                    <b>Apellido:</b> Perdomo<span></span><br>
                                    <b>Edad:</b><span> 10</span><br>
                                    <b>Ejercicios: </b><span>Lorem ipsum dolor sit amet, consectetur</span>
                                </div>
                                <hr>
                                <div class="card-patient__operation flex-center-full gap-4">
                                    <i class="bi bi-trash"></i>
                                    <i class="bi bi-person-lines-fill"></i>
                                    <i class="bi bi-calendar3"></i>
                                </div>

                            </div>
                            <hr>
                            <div class="d-flex justify-content-between px-2">
                                <i class="bi bi-caret-left-fill color-blue fs-2"></i>
                                <i class="bi bi-caret-right-fill color-blue fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
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
        </section>
    </main>

    </div>

    <?php include '../include/footer.php'; ?>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

    <script src="../js/validations/login.js" type="module"></script>
</body>

</html>