<?php
include '../../../php/validation/authorized-user.php';
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
    <link rel="stylesheet" href="../../../css/components/body.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../css/admin/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
    <style>
        .main__content {
            background: white;
            padding: 1rem;
            border: solid 1px #e8d8ff;
            margin: 1rem;
            width: 1200px;
            min-width: 400px;
            border-radius: 0rem 0rem 1rem 1rem;
        }

        .checked {
            filter: drop-shadow(0px 4px 0px rgb(47, 47, 47));
            transform: perspective(500px) translateZ(20px);
            transform-style: preserve-3d;
            transition: all 0.5s linear;
        }

        .selection-gender>label>img {
            cursor: pointer;
            border: 0rem;
            width: 100px;
            clip-path: circle();
        }

        .selection-gender>label>input {
            display: none;
        }
    </style>
</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-start-full ">
        <div class="main__content shadow z-1 ">
            <h1 class="text-center fw-bold">Agregar paciente</h1>
            <div class="flex-center-full color-grey">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum laborum mollitia culpa esse, temporibus soluta distinctio quidem quis cupiditate fugiat ea reiciendis. Necessitatibus, labore dolore in ut beatae sit deleniti.</p>
            </div>
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
                        <input type="date" name="date" id="date" class="form-control" placeholder="Introduzca su correo electronico"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                    </div>
                    <label for="gender">Genero </label><br>

                    <p class="d-flex gap-2 selection-gender">
                        <label for="M" data-checked="true">
                            <input type="radio" id="M" name="gender" value="1" checked>
                            <img src="../../../img/childs/boy.png" alt="" class="checked">
                        </label>
                        <label for="F">
                            <input type="radio" id="F" name="gender" value="2">
                            <img src="../../../img/childs/girl.png" alt="">
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
                <span><b>Información sobre la dislalia</b></span>
                <label for="">Tipo </label>
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                    <select name="dyslaliay-type" class="form-control">
                        <option value="" selected disabled>Elige el tipo de dislalia</option>
                        <option value="1">Dislalia funcional</option>
                        <option value="2">Dislalia orgánica</option>
                        <option value="2">Dislalia evolutiva</option>
                        <option value="2">Dislalia audiógena</option>
                    </select>
                </div><br>
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
                </div><br>
                <label for="">Fonemas afectados</label>
                <div class="input-group mb-2 selection-phonemes">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                    <div class="add-select-phonemes">
                        <select name="classification" id="classification" class="form-control">
                        </select>
                    </div>
                </div><br>
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
                <hr>
                <span><b>Datos de la personalizacion de la sesion</b></span>
                <hr>
                <span><b>Datos del representante</b></span>
                <label for="date">Nombre</label><br>
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                    <input type="text" name="date" id="date" class="form-control" placeholder="Introduzca su correo electronico"
                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                </div>
                <label for="date">Apellido</label><br>
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                    <input type="text" name="date" id="date" class="form-control" placeholder="Introduzca su correo electronico"
                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                </div>
                <label for="date">Correo electronico</label><br>
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                    <input type="email" name="date" id="date" class="form-control" placeholder="Introduzca su correo electronico"
                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                </div>
                <label for="date">Numero telefonico</label><br>
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                    <input type="text" name="date" id="date" class="form-control" placeholder="Introduzca su correo electronico"
                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                </div>
                <label for="date">Clave secreta</label><br>
                <small>Esta opción permite al representante utilizar una contraseña especial al final de cada sesión para dejar comentarios sobre el desempeño de su niño/a, si es necesario.</small>
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                    <input type="text" name="date" id="date" class="form-control" placeholder="Introduzca su correo electronico"
                        aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                </div>
                <hr>
                <div class="flex-center-full gap-3">
                    <button class="button-grey"><a href="../dashboard.php" class="text-decoration-none text-white">Regresar</a></button>
                    <input type="submit" class="button-pink" value="Agregar">
                </div>

                <select name="countries" id="countries">
                    <option value="1">Afghanistan</option>
                    <option value="2">Australia</option>
                    <option value="3">Germany</option>
                    <option value="4">Canada</option>
                    <option value="5">Russia</option>
                </select>
            </div>
        </div>
    </main>

    <?php include '../../include/footer.php'; ?>
    <script type="module" src="https://unpkg.com/@padawanstrainer/select-multiple"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
    <script>
        let $data_checked = document.querySelectorAll(".selection-gender > label > img");
        document.addEventListener("click", e => {
            if (e.target.matches(".selection-gender > label > img")) {
                for (let i = 0; i < $data_checked.length; i++) {
                    $data_checked[i].removeAttribute("data-checked");
                    $data_checked[i].classList.remove("checked")

                }
                e.target.classList.add("checked");
                e.target.setAttribute("data-checked", "true");

            }
        })

        let $classification = document.querySelector("#classification");
        let $phonemes = document.querySelector("#phonemes");
        let $selection_phonemes = document.querySelector(".selection-phonemes")
        let $add_select_phonemes = document.querySelector('.add-select-phonemes');
        $classification.addEventListener("change", e => {
            console.info(e.target.value)
            if (e.target.value != '1') {
                $add_select_phonemes.innerHTML = `
                <select-multiple name="phonemes[]" class="form-control" id="phonemes" label="phonemes" multiple >
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                    <option value="d">d</option>
                    <option value="e">e</option>
                    <option value="f">f</option>
                    <option value="g">g</option>
                    <option value="h">h</option>
                    <option value="i">i</option>
                    <option value="j">j</option>
                    <option value="k">k</option>
                    <option value="l">l</option>
                    <option value="m">m</option>
                    <option value="n">n</option>
                    <option value="ñ">ñ</option>
                    <option value="o">o</option>
                    <option value="p">p</option>
                    <option value="q">q</option>
                    <option value="r">r</option>
                    <option value="s">s</option>
                    <option value="t">t</option>
                    <option value="u">u</option>
                    <option value="v">v</option>
                    <option value="w">w</option>
                    <option value="x">x</option>
                    <option value="y">y</option>
                    <option value="z">z</option>
                </select-multiple>`;
            } else {
                $add_select_phonemes.innerHTML = `<select name="phonemes" id="phonemes" class="form-control">
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                    <option value="d">d</option>
                    <option value="e">e</option>
                    <option value="f">f</option>
                    <option value="g">g</option>
                    <option value="h">h</option>
                    <option value="i">i</option>
                    <option value="j">j</option>
                    <option value="k">k</option>
                    <option value="l">l</option>
                    <option value="m">m</option>
                    <option value="n">n</option>
                    <option value="ñ">ñ</option>
                    <option value="o">o</option>
                    <option value="p">p</option>
                    <option value="q">q</option>
                    <option value="r">r</option>
                    <option value="s">s</option>
                    <option value="t">t</option>
                    <option value="u">u</option>
                    <option value="v">v</option>
                    <option value="w">w</option>
                    <option value="x">x</option>
                    <option value="y">y</option>
                    <option value="z">z</option>
                </select>`;
            }

        })


        new MultiSelectTag('countries') // id
    </script>
</body>

</html>