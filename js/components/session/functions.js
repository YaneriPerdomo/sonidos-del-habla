import {
  $session_horizontal_bar,
  $session_img,
  $modal_counting,
  $amount_span,
  $modal_counting_number,
  $count_down,
  $data_exercise,
} from "./variable.js";

export function show_img() {
  if (
    $session_horizontal_bar.getAttribute("data-count") !=
    $session_horizontal_bar.getAttribute("data-amount")
  ) {
    let pattern_joint = new RegExp("/rotacismo0|seseo0|rotacismo1|seseo1/d");
    let pattern_fluency = new RegExp(
      "/el ritmo del habla0|el ritmo del habla1/"
    );
    let type_exercise = "";
    let fluency = "";
    let arreglo_ejercicios = $session_horizontal_bar
      .getAttribute("data-exercise")
      .split(",");
    if (
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("rotacismo0") ||
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("rotacismo1") ||
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("seseo0") ||
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("seseo1")
    ) {
      type_exercise = "joint";
    } else if (
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("el ritmo del habla0") ||
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("el ritmo del habla1")
    ) {
      type_exercise = "fluency";
    } else if (
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("musculos de la lengua0") ||
      arreglo_ejercicios[
        $session_horizontal_bar.getAttribute("data-count")
      ].includes("musculos de la lengua1")
    ) {
      type_exercise = "muscle-strengthening";
    }
    $session_img.src =
      "../../../img/exercises/" +
      type_exercise +
      "/" +
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")] +
      ".png";
    $session_img.alt =
      arreglo_ejercicios[$session_horizontal_bar.getAttribute("data-count")];
    console.info(arreglo_ejercicios);
    duration_each_exercise(
      $session_horizontal_bar.getAttribute("data-duration_each_exercise")
    );
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
          alertify.success("¡Sesion guardada exitosamente!");
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
export function duration_each_exercise(ms) {
  let count = ms;
  let $time_span = document.querySelector(".time > div > span");
  let countdown = setInterval(() => {
    count--;
    $time_span.textContent = count;
    if (count === 0) {
      clearInterval(countdown);
      counting_1_3();
      $count_down.play();
      $modal_counting.classList.remove("d-none");
      setTimeout(() => {
        $session_horizontal_bar.setAttribute(
          "data-count",
          parseInt($session_horizontal_bar.getAttribute("data-count")) + 1
        );
        $amount_span.innerHTML = parseInt($amount_span.textContent) + 1;
        show_img();
      }, 3000);
    }
  }, 1000);
}

export function counting_1_3() {
  let count = 3;
  let countdown = setInterval(() => {
    count--;
    $modal_counting_number.textContent = count;
    if (count === 0) {
      clearInterval(countdown);
      $modal_counting.classList.add("d-none");
    }
  }, 1000);
}
