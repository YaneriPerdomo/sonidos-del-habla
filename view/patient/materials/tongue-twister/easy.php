<?php
include '../../../../php/validation/authorized-user.php';

?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materiales de apoyo | Sonidos de habla</title>
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

</head>

<body>

<?php include '../../../include/patient/header-support-materials.php'; ?>
<main class="flex-start-full ">
        <section class="main__content support-materials ">
            <div class="back mb-3">
                <a href="../../home.php" class="text-decoration-none text__more-black">
                    <i class="bi bi-arrow-left-square"></i>
                    Regresar
                </a>
            </div>
            <strong class="support-materials__title fs-4">Trabalenguas faciles</strong>
            <hr>
            <div class="d-flex gap-3 flex-wrap tongueTwister flex-center-full">
                <img src="../../../../img/tongue-twister/trabalengua-01.png" class="img-fluid" alt="">
                <img src="../../../../img/tongue-twister/trabalengua-02.png" class="img-fluid" alt="">
                <img src="../../../../img/tongue-twister/trabalengua-03.png" class="img-fluid" alt="">
                <img src="../../../../img/tongue-twister/trabalengua-04.png" class="img-fluid" alt="">
                <img src="../../../../img/tongue-twister/trabalengua-05.png" class="img-fluid" alt="">
            </div>
        </section>
    </main>

    <?php include '../../../include/footer.php'; ?>

    <script src="../../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>