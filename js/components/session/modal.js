import {
  $content_header_title_end,
  $content_footer_buttons_end,
  $modal_end_parrafo,
  $modal_welcome,
  $session_horizontal_bar,
  $modal_counting,
  $background_song,
  $count_down,
  $data_exercise,
  $duration_each_exercise,
  $session_img,
  $amount_span,
  $modal_counting_number,
  $form_representative_send,
  $form_representative_verify
} from "./variable.js";

import { counting_1_3, show_img } from "./functions.js";
document.addEventListener("click", (e) => {
  if (e.target.matches(".btn-two")) {
    $form_representative_verify.classList.remove("d-none");
    $content_footer_buttons_end.classList.add("d-none");
    $content_header_title_end.innerHTML = "Verificacion";
    $modal_end_parrafo.innerHTML =
      "Para garantizar la calidad de la atención, es necesario que el representante valide la veracidad de los datos suministrados. Posterior a esta verificación, podrá realizar sus observaciones.";
  }

  if (e.target.matches('.btn-exit-welcome')) {
    $modal_welcome.style.display = 'none';
    let amount_e = $data_exercise.getAttribute('data-exercise').split(',').length;
    let exercises = $data_exercise.getAttribute('data-exercise').replace('sonidos-habla,', '')
    $session_horizontal_bar.setAttribute('data-exercise', exercises);
    $session_horizontal_bar.setAttribute('data-amount', parseInt(amount_e) - 1)
    console.info($data_exercise.getAttribute('data-exercise').split(',').length)
    $session_horizontal_bar.setAttribute('data-duration_each_exercise', $duration_each_exercise.textContent);
    $modal_counting.classList.remove("d-none")
    counting_1_3();
    $count_down.play()
    $background_song.play()
    setTimeout(() => {
      show_img();
    }, 3000);
  }
});
