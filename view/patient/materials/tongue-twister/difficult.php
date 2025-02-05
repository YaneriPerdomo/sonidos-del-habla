<?php
include '../../../../php/validation/authorized-user.php';

?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materiales de apoyo | Sonidos del habla</title>
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
            <strong class="support-materials__title fs-4"><span>Trabalenguas dificiles</span> <br> <small><i>Juegos de palabras dificiles de pronunciar</i> </small></strong>

            <hr>
            <div class="d-flex gap-3 flex-wrap tongueTwister flex-center-full">
                <div class="card mb-3 w-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Tengo una gallina.</b></h5>
                                <p class="card-text">Tengo una gallina pinta, pipiripinta, pipirialegre y gorda, que tiene tres pollitos pintos, pipiripintos, pipirialegres y gordos. Si la gallina no hubiera sido pinta pipiripinta, pipirialegre y gorda; los pollitos no hubieran sido pintos, pipiripintos, pipirialegres y gordos.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 w-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Pablito clavó un clavito.</b></h5>
                                <p class="card-text">Pablito clavó un clavito en la calva de un calvito. Un clavito clavó Pablito en la calva de un calvito. ¿Qué clavito clavó Pablito? </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 w-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Cuando cuentes cuentos.</b></h5>
                                <p class="card-text">Cuando cuentes cuentos, cuenta cuántos cuentos cuentas, porque si no cuentas cuántos cuentos cuentas, nunca sabrás cuántos cuentos cuentas tú. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 w-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Pedro Pablo Pérez Pereira.</b></h5>
                                <p class="card-text">Pedro Pablo Pérez Pereira, pobre pintor portugués, pinta preciosos paisajes por poca plata, para poder pasar por París. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include '../../../include/footer.php'; ?>

    <script src="../../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>