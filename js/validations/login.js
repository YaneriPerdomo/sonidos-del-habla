import { $spanValidation, $formUser, $formPassword, $inputGroupAll, arrayFormLogin, $form } 
from "../helpers/variables.js";

// Inicialmente oculta el mensaje de validación (span)
$spanValidation.style.display = "none";

// Agrega un detector de eventos 'submit' al formulario
$form.addEventListener("submit", (evento) => {
  // Evita que el formulario se envíe de forma predeterminada
  evento.preventDefault();

  // Crea un objeto FormData a partir de los datos del formulario
  let datosFormulario = new FormData($form);

  // Registra cada elemento del formulario con fines de depuración (opcional)
  console.info("Datos del formulario:");
  datosFormulario.forEach(elemento => {
    console.info(elemento);
  });

  // Elimina cualquier clase de validación previa de los elementos del formulario
  for (let i = 0; i < arrayFormLogin.length; i++) {
    arrayFormLogin[i].classList.remove("not-Valid");
    $inputGroupAll[i].classList.remove("not-Valid");
  }

  // Inicializa variables para la validación
  let hayError = false;
  let mensajeValidacion = "";
  let cantidadCamposVacios = 0;

  // Valida el campo de nombre de usuario
  if ($formUser.value.length === 0) {
    mensajeValidacion += "Ingrese su nombre de usuario <br>";
    hayError = true;
    cantidadCamposVacios++;
    $inputGroupAll[0].classList.add("not-Valid");
    $formUser.classList.add("not-Valid");
  }

  // Valida el campo de contraseña
  if ($formPassword.value.length === 0) {
    mensajeValidacion += "Ingrese su contraseña <br>";
    hayError = true;
    cantidadCamposVacios++;
    $inputGroupAll[1].classList.add("not-Valid");
    $formPassword.classList.add("not-Valid");
  }

  // Muestra el mensaje de validación según el estado del error
  if (cantidadCamposVacios === 2) {
    $spanValidation.removeAttribute("style"); // Muestra el mensaje
    $spanValidation.innerHTML = "Complete todos los campos"; // Mensaje genérico para todos los campos vacíos
  } else if (hayError) {
    $spanValidation.removeAttribute("style");
    $spanValidation.innerHTML = mensajeValidacion; // Muestra mensajes de error específicos
  } else if (!hayError) {
    // Si no hay errores, envía el formulario de la manera habitual
    $form.submit();
  }
});