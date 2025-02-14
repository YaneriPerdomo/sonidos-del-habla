<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina principal | Sonidos del habla</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/components/body.css">
    <link rel="stylesheet" href="./css/components/footer.css">
    <link rel="stylesheet" href="./css/components/button.css">
    <link rel="stylesheet" href="./css/components/input.css">
    <link rel="stylesheet" href="./css/components/header.css">
    <link rel="stylesheet" href="./css/components/validation.css">
    <link rel="stylesheet" href="./css/components/auxiliary.css">
    <link rel="stylesheet" href="./css/create-account-login.css">
    <link rel="stylesheet" href="./css/index.css">
    <style>
     
    </style>
</head>

<body>

    <?php include './view/include/header-index.php' ?>
    <main class=" w-100 ">
        <section class="h-75 p-3 w-100 front-page">
            <div class="row w-100 h-100">
                <div class="col-6 flex-center-full">
                    <div>
                        <h1 class="fs-1"><b>
                                Sesiones de logopedia <br> personalizadas
                            </b></h1>
                        <p>Más allá de la consulta, la terapia continúa en casa. Nuestra herramienta <br>interactiva online, el
                            aliado tecnológico para reforzar el aprendizaje del lenguaje.</p>
                        <button class="button__orange">
                            <a href="./view/login.php" class="text-decoration-none button-a fw-bold">
                                Iniciar sesion
                            </a>
                        </button> <span class="text__black"> o</span>
                        <a href="./view/create-account.php" class="text-decoration-none text__green fw-bold"> Registrate</a>
                    </div>

                </div>
                <div class="col-6 flex-center-full" class="front-page__img">
                    <img src="./img/presentation-index-1.png" class="animate--jackInTheBox" alt="">
                </div>
            </div>
        </section>
        <section class="w-100 flex-center-full latest-innovations">
            <div class="text-center">
                <b class="fs-2">
                    Ofrecemos innovación terapéutica para tus pacientes
                </b><br>
                <p class="fs-5 text__green p-0 m-2">
                    <b> Estas son algunas de las características que "Sonidos del habla" destaca:</b>
                </p>
                <p class="text__grey">
                    2025
                </p>
                <div class="flex-center-full gap-3">
                    <div class="card-innovation">
                        <div class="card-innovation__top-content">
                            <i class="card-innovation__icon bi bi-exclude fs-1"></i>
                        </div>
                        <div class="card-innovation__button-content">
                            <p class="m-1"><b>Más de 70 ejercicios de habla:</b></p>
                            <small>
                                <ul class="p-0">
                                    <li>1. Fortalecimiento muscular.</li>
                                    <li>2. Pronunciación de fonemas.</li>
                                    <li>3. Fluidez.</li>
                                </ul>
                            </small>
                        </div>
                    </div>
                    <div class="card-innovation">
                        <div class="card-innovation__top-content">
                            <i class="card-innovation__icon bi bi-calendar2-range fs-1"></i>
                        </div>
                        <div class="card-innovation__button-content">
                            <p class="m-1"><b>Calendario de asistencia </b></p>
                            <small>
                                Podrás ver los días que tus pacientes completaron su sesión.
                            </small>
                        </div>
                    </div>
                    <div class="card-innovation">
                        <div class="card-innovation__top-content">
                            <i class="card-innovation__icon bi bi-journals fs-1"></i>
                        </div>
                        <div class="card-innovation__button-content">
                            <p class="m-1"><b>Materiales adicionales</b></p>
                            <small>
                                Tus pacientes contarán tambien con materiales de apoyo que serán de gran ayuda.
                            </small>
                        </div>
                    </div>
                    <div class="card-innovation">
                        <div class="card-innovation__top-content">
                            <i class="card-innovation__icon bi bi-clock-history fs-1"></i>
                        </div>
                        <div class="card-innovation__button-content">
                            <p class="m-1"><b>Historial de actividades</b></p>
                            <small>
                                Podrás acceder a un registro detallado de todas las actividades realizadas por tus pacientes.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="w-100  testimony ">
            <div class="text-center">
                <b class="fs-2 text__blue">
                    Testimonios
                </b><br>
                <p class="fs-5 p-0 m-2">
                    <b> Nuestros profesionales y pacientes opinan:</b>
                </p>
                <div class="flex-center-full">
                    <div class="car-testimony">
                        <div class="car-testimony__img">

                        </div>
                        <div class="car-testimony__content">
                            <span class="car-testimony__name">Persona uno</span><br>
                            <small>Profesional</small>
                            <p class="car-testimony__text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat molestias esse, deleniti adipisci suscipit
                            </p>
                        </div>

                    </div>
                    <div class="car-testimony">
                        <div class="car-testimony__img">

                        </div>
                        <div class="car-testimony__content">
                            <span class="car-testimony__name">Persona dos</span><br>
                            <small>Paciente</small>
                            <p class="car-testimony__text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat molestias esse, deleniti adipisci suscipit
                            </p>
                        </div>

                    </div>
                    <div class="car-testimony">
                        <div class="car-testimony__img">

                        </div>
                        <div class="car-testimony__content">
                            <span class="car-testimony__name">Persona uno</span><br>
                            <small>Paciente</small>
                            <p class="car-testimony__text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat molestias esse, deleniti adipisci suscipit
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <div class="d-s ">
            <section class="frequently-asked-questions w-100  p-3">
                <b class="fs-2 ">Preguntas frecuentes:</b>
                <p class="frequently-asked-questions__p">Estas son las preguntas más frecuentes que nos hacen nuestros profesionales</p>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus doloribus amet at facilis,
                                quibusdam animi dolore magni consectetur dolorem est eos aliquam! Reiciendis, ipsum soluta
                                blanditiis consectetur quis ea hic!
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo officiis doloribus sunt
                                tempora magni? Impedit at repellat perferendis nesciunt, totam excepturi aliquid? At
                                pariatur veritatis fugit placeat doloribus illum nisi.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus doloribus amet at facilis,
                                quibusdam animi dolore magni consectetur dolorem est eos aliquam! Reiciendis, ipsum soluta
                                blanditiis consectetur quis ea hic!
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo officiis doloribus sunt
                                tempora magni? Impedit at repellat perferendis nesciunt, totam excepturi aliquid? At
                                pariatur veritatis fugit placeat doloribus illum nisi.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="send p-3">
                    <p class="m-0"><b>¿Tienes alguna duda sobre la herramienta tecnológica?</b> <br> <i> Te responderemos lo antes posible por via Gmail</i></p>
                    <a href="">perdomopaolabarrios@gmail.com</a>
                </div>
            </section>

        </div>

    </main>
    <br><br>
    <?php include './view/include/footer.php'; ?>

    <div class=" scroll-up-button hidden"><i class="bi bi-arrow-up"></i></div>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

</body>

<script>
    let $scroll_up_button = document.querySelector(".scroll-up-button");

    // Función para manejar el scroll
    const toggle_scroll_up_button = () => {
        if (window.scrollY > 20) {
            $scroll_up_button.classList.remove("hidden");
        } else {
            $scroll_up_button.classList.add("hidden");
        }
    };

    const $HEADER = document.querySelector("header")
    const add_shadow_header = () => {

        if (window.scrollY < 700) {
            $HEADER.classList.remove("shadow");
        } else {
            $HEADER.classList.add("shadow");
        }
    }

    // Escuchar el evento scroll una sola vez y usar la función
    window.addEventListener("scroll", e => {
        toggle_scroll_up_button();
        add_shadow_header()
    });

    // Llamar la función al cargar la página para que el botón aparezca si ya está en la posición correcta
    toggle_scroll_up_button();

    $scroll_up_button.addEventListener("click", (e) => {
        window.scrollTo({
            behavior: "smooth",
            top: 0,
        });
    });
</script>

</html>