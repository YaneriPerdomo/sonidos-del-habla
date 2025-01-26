<?php
include '../../../../php/validation/authorized-user.php';

?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materiales de apoyo | Sonidos del  habla</title>
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
        <section class="main__content   ">
            <div class="back mb-3">
                <a href="./../../support-materials.php" class="text-decoration-none text__more-black">
                    <i class="bi bi-arrow-left-square"></i>
                    Regresar
                </a>
            </div> 
            <strong class="support-materials__title fs-4"> Aprende a pronunciar el fonema Ñ 👅👀🧠 (Video)</strong>
            <hr>
            <div class="flex-center-full">
                <iframe 
                    width="560" 
                    height="315" 
                    src="https://www.youtube.com/embed/n77bkcTVs4Q?si=RJppnmRisv4Wo_de" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            </div>
        </section>
    </main>

    <?php include '../../../include/footer.php'; ?>

    <script src="../../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>