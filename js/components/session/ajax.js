import {
  $form_representative_send,
  $form_representative_verify,
  $content_header_title_end,
  $modal_end_parrafo,
} from "./variable.js";

$form_representative_verify.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData($form_representative_verify);
  let formJson = JSON.stringify(Object.fromEntries(formData.entries()));
  let formArray = JSON.parse(formJson);
  console.info(formJson);
  console.info("login_represent");
  fetch("../../../php/user/session/representative.php", {
    method: "POST",
    body: new URLSearchParams({
      email: formArray.email,
      password: formArray.password,
    }),
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((data) => {
      console.info(data);
      if (data == "success") {
        alertify.success("Datos del representante válidos");
        $modal_end_parrafo.innerHTML =
          "Bienvenido representante, ahora tendrá la oportunidad de enviar observaciones sobre su niño a su profesional para que las tenga en cuenta.";
        $form_representative_verify.classList.add("d-none");
        $form_representative_send.classList.remove("d-none");
        $content_header_title_end.innerHTML = "Observaciones";
      } else if ((data = "not found")) {
        alertify.error("No existe un representante registrado con esos datos");
      }
    })
    .catch((error) => {
      console.warn("Sucedio un error");
    })
    .finally();
});

$form_representative_send.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData($form_representative_send);
  let formJson = JSON.stringify(Object.fromEntries(formData.entries()));
  let formArray = JSON.parse(formJson);
  console.info(formJson);
  fetch("../../../php/user/session/update.php", {
    method: "POST",
    body: new URLSearchParams({
      observations: formArray.observations,
      evaluation: formArray.evaluation,
      objectives: formArray.objectives,
    }),
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((data) => {
      console.info(data);
      if (data == "success") {
        alertify.success("Observaciones enviadas");
      }
    })
    .catch((error) => {
      console.warn("Sucedio un error");
    })
    .finally();
});
