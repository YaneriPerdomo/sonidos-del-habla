<?php
include '../../php/validation/authorized-user.php';
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
    <link rel="stylesheet" href="../../css/components/body.css">
    <link rel="stylesheet" href="../../css/components/footer.css">
    <link rel="stylesheet" href="../../css/components/button.css">
    <link rel="stylesheet" href="../../css/components/input.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/auxiliary.css">

    <style>
        .header-img{
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

        .dropdown-menu__img{
            width: 200px;
        }

        .dropstart .dropdown-toggle::before{
            content:none;
        }

        .color-grey{
            color: #828282;
        }

        .dropdown-menu__information-email{
            word-break: break-all;
        }
    </style>
</head>

<body>

    <?php include '../include/professional/header.php'; ?>
    <main class="flex-center-full">
        <div class="main__content shadow z-1 ">

        </div>
    </main>

    <?php include '../include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script src="../js/validations/login.js" type="module"></script>
</body>

</html>