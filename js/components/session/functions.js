import {
  $session_horizontal_bar,
  $session_img,
  $modal_counting,
  $amount_span,
  $modal_counting_number,
  $count_down,
  $background_song,
} from "./variable.js";

export function show_img() {
  if ($session_horizontal_bar.getAttribute("data-count") != $session_horizontal_bar.getAttribute("data-amount")) {
    let pattern_joint = new RegExp("/rotacismo0|seseo0|rotacismo1|seseo1/d");
    let pattern_fluency = new RegExp(
      "/el ritmo del habla0|el ritmo del habla1/"
    );
    let type_exercise = "";
    let fluency = "";
    let arreglo_ejercicios = $session_horizontal_bar.getAttribute("data-exercise").split(",");
    if (arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("rotacismo0") ||
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("rotacismo1") ||
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("seseo0") ||
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("seseo1")) {
      type_exercise = "joint";
    } else if (
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("el ritmo del habla0") ||
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("el ritmo del habla1")
    ) {
      type_exercise = "fluency";
    } else if (
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("musculos de la lengua0") ||
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")].includes("musculos de la lengua1")) {
      type_exercise = "muscle-strengthening";
    }
    $session_img.src = "../../../img/exercises/" + type_exercise + "/" + arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")] + ".png";
    $session_img.alt = arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")];
    console.info(arreglo_ejercicios);
    duration_each_exercise($session_horizontal_bar.getAttribute("data-duration_each_exercise"));

    return sound_img($session_img.getAttribute("alt"));
  } else {
    let $modal_end = document.querySelector(".modal-end ");
    $modal_end.classList.remove("d-none");
    fetch("../../../php/user/session/insert.php", {
      method: "POST",
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
          var delay = alertify.get("notifier", "delay");
          alertify.set("notifier", "delay", 5);
          alertify.success("¡Sesion de hoy guardada exitosamente!");
          alertify.set("notifier", "delay", delay);

        } else if (data == "error") {
          alertify.error("Error message");
        } else {
          console.warn(data);
        }
      })
      .catch((error) => {
        console.warn("Sucedio un error");
      })
      .finally();
  }


}
//duration of each exercise

let countdown; // Declarar countdown fuera de la función para que sea accesible
let count; // Declarar count fuera de la función

export function duration_each_exercise(ms = 0, action = "start") { // Usar "action" en lugar de "pause"
  let $time_span = document.querySelector(".time > div > span");

  if (action === "start") {
    count = ms; // Inicializar count solo cuando se inicia o reanuda
    countdown = setInterval(() => {
      count--;
      $time_span.textContent = count;
      if (count === 0) {
        clearInterval(countdown);
        counting_1_3();
        $background_song.pause()
        $count_down.play();

        $modal_counting.classList.remove("d-none");
        setTimeout(() => {

          $background_song.play()
          $session_horizontal_bar.setAttribute(
            "data-count",
            parseInt($session_horizontal_bar.getAttribute("data-count")) + 1
          );
          $amount_span.innerHTML = parseInt($amount_span.textContent) + 1;
          show_img();
        }, 3000);
      }
    }, 1000);
  } else if (action === "pause") {
    clearInterval(countdown);
  } else if (action === "resume") {
    if (count > 0) { // Solo reiniciar si el contador no ha llegado a cero
      duration_each_exercise(count, "start"); // Usar el valor actual de 'count'
    }
  }
}

export function sound_img(exercise = null) {


  if (exercise != null) {
    switch (exercise) {
      case 'seseo0':
        voice_exercise("Abrimos la boca y decimos el fonema a durante 5 segundos.")
        break;
      case 'rotacismo0':
        voice_exercise('Respira profundamente mientras exhalas. Puedes decir estas combinaciones: la, la, le, le, li, li, as y las demás, teniendo en cuenta la posición de tu lengua.')
        break;

      case 'el ritmo del habla0':
        voice_exercise('Con la espalda recta y los hombros bajos, inhala por la nariz y exhala lentamente. Hazlo varias veces.')
        break;
      default:
        break;
    }
  }


}

export const voice_exercise = (text) => {
 
  const message = new SpeechSynthesisUtterance(text);
  speechSynthesis.speak(message);
}
export const cancel_voice = () => speechSynthesis.cancel();

export function counting_1_3() {
  let count = 3;
  cancel_voice()
  let countdown = setInterval(() => {
    count--;
    $modal_counting_number.textContent = count;
    if (count === 0) {
      clearInterval(countdown);
      $modal_counting.classList.add("d-none");
    }
  }, 1000);
}
