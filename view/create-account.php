<!doctype html>
<html lang="es" class="full-heigh">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicia sesion | Sonidos de habla</title>
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/components/body.css">
  <link rel="stylesheet" href="../css/components/footer.css">
  <link rel="stylesheet" href="../css/components/button.css">
  <link rel="stylesheet" href="../css/components/input.css">
  <link rel="stylesheet" href="../css/components/header.css">
  <link rel="stylesheet" href="../css/components/validation.css">
  <link rel="stylesheet" href="../css/components/auxiliary.css">
  <link rel="stylesheet" href="../css/create-account-login.css">
</head>

<body>

  <?php include './include/header.php'; ?>
  <main class="flex-center-full">
    <div class="main__content shadow z-1 ">
      <div class="row main__content--height-lc">
        <div class="col-6 presentation">
          <div class="presentation__content">
            <section class="logo flex-center-full">
              <a href="../index.php">
                <figure>
                  <img src="../img/logo-2.png" class="logo__img" alt="">
                </figure>
              </a>
            </section><br>
            <section class="qualities">
              <h2 class="color-white">Una herramienta interactiva innovadora para sesiones de terapia del lenguaje en dislalia.</h2>
              <ul class="list-delete-style">
                <li>
                  <i class="bi bi-check-circle"></i>
                  Diseño personalizado de ejercicios de logopedia en función de las necesidades individuales del niño.
                </li>
                <li>
                  <i class="bi bi-check-circle"> </i>
                  Protegemos la información de los niños y cumplimos con los más altos estándares de seguridad.
                </li>
              </ul>
            </section>
          </div>
        </div>
        <div class="col-6 create-account flex-center-full">
          <form action="../php/createAccount.php" class="w-100" method="post">
            <legend class="text-center create-account__title">
              <h2 class=" fw-bold">Crea una cuenta</h2>
            </legend>
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
                <label for="email">Correo electronico</label><br>
                <div class="input-group mb-2">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Introduzca su correo electronico"
                    aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                </div>
                <label for="specialty">Especialidad </label><br>
                <div class="input-group mb-3">
                  <span class="input-group-text" for="inputGroupSelect01"><i class="bi bi-person-bounding-box"></i></span>
                  <select class="form-select" name="specialty" id="specialty">
                    <option selected disabled>Seleccione una opcion...</option>
                    <option value="1">Terapia de lenguaje</option>
                    <option value="2">Foniatría</option>
                    <option value="3">Otro</option>
                  </select>
                </div>
                <label for="work-center">Centro de trabajo</label><br>
                <div class="input-group mb-2">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-buildings"></i></span>
                  <input type="text" name="work-center" id="work-center" class="form-control" placeholder="Introduzca su centro de trabajo"
                    aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                </div>

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
                </div><br>
              </div>
            </div>
            <div class="flex-center-full mt-3 flex-column">
              <input type="submit" class="button__green" value="Registrate">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <?php include './include/footer.php'; ?>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

</body>

</html>