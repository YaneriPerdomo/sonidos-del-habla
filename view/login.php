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
            </section>
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
          <form action="../php/login.php" class="w-100" method="POST">
            <legend class="text-center create-account__title">
              <h2 class=" fw-bold">Inicia sesión</h2>
            </legend>
            <div class="validations text-center fw-bold">
              <span class="one"></span>
              <span class="two"></span>
              <span class="thren"></span>
            </div>
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
            <div class="flex-center-full mt-3 flex-column gap-2">
              <input type="submit" class="button__green" value="Acceder">
              <a href="./create-account.php" class="text-decoration-none text__blue"> No tengo una cuenta</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <?php include './include/footer.php'; ?>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
  <script src="../js/validations/login.js" type="module"></script>
</body>

</html>