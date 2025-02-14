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
    <link rel="stylesheet" href="../../../../css/components/input.css">
    <link rel="stylesheet" href="../../../../css/components/header.css">
    <link rel="stylesheet" href="../../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../../css/components/modal-window.css">
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
        <section class="main__content support-materials ">
            <div class="back mb-3">
                <a href="../../home.php" class="text-decoration-none text__more-black">
                    <i class="bi bi-arrow-left-square"></i>
                    Regresar
                </a>
            </div>
            <strong class="support-materials__title fs-4"><span>Vocabulario</span> </strong>
            <hr>
            <div class="gap-3 flex-wrap flex-center-full  flex-row flex-wrap">
                <details class="vocabulary">
                    <summary class="">
                        <img src="../../../../img/vocabulary/tecnologia/tecnologia.png" class="fluid-img vocabulary__img" alt="">
                    </summary>
                    <div class="vocabulary__show-more">
                        <details>
                            <summary>Computadora</summary>
                            <p>Es una máquina electrónica que está diseñada para realizar tareas específicas.</p>
                        </details>
                        <details>
                            <summary>Programacion</summary>
                            <p>Es la forma en que nos comunicamos con las computadoras. El código le dice a la computadora qué acciones debe realizar, y escribir código es como crear un conjunto de instrucciones y esas mismas instrucciones permiten la creación de programas.</p>
                        </details>
                        <details>
                            <summary>Lenguaje de programacion</summary>
                            <p>Se trata de un código informático que permite crear programas mediante instrucciones. Un ejemplo muy claro de ello es que gracias a los lenguajes de programacion se pudo crear esta aplicación web a la que uno entra de vez en cuando.</p>
                        </details>
                    </div>
                </details><br>
                <details>
                    <summary class="">
                        <img src="../../../../img/vocabulary/sociedad/sociedad.png" class="fluid-img vocabulary__img" alt="">
                    </summary>
                    <div class="vocabulary__show-more">
                        <details>
                            <summary>Cambio social</summary>
                            <p>
                                Es el proceso de transformación de las normas, valores, relaciones, políticas y formas de gobierno de una sociedad.
                            </p>
                        </details>
                        <details>
                            <summary>Grupo colectivo </summary>
                            <p>
                                Es un grupo en su conjunto que tiene un mismo pensar u objetivo.
                            </p>
                        </details>
                        <details>
                            <summary>Cultura compartida</summary>
                            <p>
                                conjunto de valores, creencias, tradiciones, costumbres, idioma, arte y música que comparten un grupo de personas
                            </p>
                        </details>
                    </div>
                </details>
                <details>
                    <summary class="">
                        <img src="../../../../img/vocabulary/lengua/lengua.jpg" class="fluid-img vocabulary__img" alt="">
                    </summary>
                    <div class="vocabulary__show-more">
                        <details>
                            <summary>Dialecto</summary>
                            <p>
                                Un dialecto es una variante de una lengua que se habla en una determinada región geográfica o social
                            </p>
                        </details>
                        <details>
                            <summary>Gramática</summary>
                            <p>
                                La gramática es el conjunto de reglas que rigen la estructura de una lengua.
                            </p>
                        </details>
                        <details>
                            <summary>Semántica</summary>
                            <p>
                                La semántica es el estudio del significado de las palabras y las oraciones.
                            </p>
                        </details>
                    </div>
                </details>
                <details>
                    <summary class="">
                        <img src="../../../../img/vocabulary/arte/arte.png" class="fluid-img vocabulary__img" alt="">
                    </summary>
                    <div class="vocabulary__show-more">
                        <details>
                            <summary>Arte artistico</summary>
                            <p>
                                Es la capacidad de expresar sentimientos y emociones mediante la creación de objetos, mensajes o significados.
                            </p>
                        </details>
                        <details>
                            <summary>Arte digital</summary>
                            <p>
                                Es una forma de arte que utiliza la tecnología digital para crear imágenes, sonidos, textos y otras formas de expresión.
                            </p>
                        </details>
                        <details>
                            <summary>Ilustración </summary>
                            <p>
                                Es la capacidad de proyectar y crear imágenes que tienen una función comunicativa específica.
                            </p>
                        </details>
                    </div>
                </details>
            </div>
            <hr>
            <div class="support-materials__button-next text-center mt-3">
                <a href="./vocabulary-practice.php" class="button-a">
                    <button class="button__green">Practicar</button>
                </a>
            </div>
        </section>
    </main>

    <?php include '../../../include/footer.php'; ?>

    <script src="../../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>