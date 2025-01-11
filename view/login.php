<!doctype html>
<html lang="es" class="full-heigh">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicia sesion | Sonidos de habla</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
              <span>LOGO</span>
              <figure></figure>
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
        <div class="col-6 create-account">
          <form action="../php/login.php" method="POST">
            <legend class="text-center create-account__title">
              <h3>Inicia sesion</h3>
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
              <input type="submit" class="button-pink" value="Entrar">
              <a href="./create-account.php" class="text-decoration-none color-blue"> No tengo una cuenta</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <?php include './include/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
  </script>
  <script src="../js/validations/login.js" type="module"></script>
</body>

</html>