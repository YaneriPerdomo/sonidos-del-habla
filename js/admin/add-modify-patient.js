let $input_therapy_elements = document.querySelector(".input-therapys");
let $card_exercise_img = document.querySelectorAll(".card-exercise > figure > img");
let $therapy_elements = document.querySelectorAll(".therapy");
let $delete_therapy = document.querySelectorAll(".delete-therapy > i");
let $data_checked = document.querySelectorAll(".selection-gender > label > img");
let $exercises = document.querySelector('#exercises');
let $aim = document.querySelector("#aim");
let $session_duration = document.querySelector("#session_duration");
let $duration_each_exercise = document.querySelector("#duration-each-exercise");
let $therapy_imgs = document.querySelectorAll(".therapy > figure > img")

let $classification = document.querySelector("#classification");
let $phonemes = document.querySelector("#phonemes");
let $selection_phonemes = document.querySelector(".selection-phonemes")
let $add_select_phonemes = document.querySelector('.add-select-phonemes');

//Ventanas modal
let $show_modal_image_therapy = document.querySelector("[ data-modal='show_therapy_img']");
let $show_therapy_img_content = document.querySelector("[data-modal='show_therapy_img'] > .content");
let $therapy_img_modal = document.querySelector(".modal-body__therapy_img");

new MultiSelectTag('support-materials', {
    rounded: true, // default true
    shadow: false, // default false
    placeholder: 'Search', // default Search...
    tagColor: {
        textColor: 'rgb(47,47,47)',
        borderColor: '#ffa2c1',
        bgColor: '#eaffe6',
    },
    onChange: function (values) {
        console.log(values)
    }
})


document.addEventListener('change', e => {

    if (e.target.matches('#aim')) {
        console.info(0);
        $card_exercise_img[0].src = "";
        $card_exercise_img[1].src = "";
        switch (e.target.value) {
            case "muscle-strengthening":
                $exercises.innerHTML = `
                        <option value="musculos de la lengua">Los músculos de la lengua</option>
                        <option value="labios"> Labios </option>
                        <option value="mejillas">Mejillas</option>
                `;
                //muscle-strengthening;
                $card_exercise_img[0].src = `../../../img/exercises/muscle-strengthening/musculos de la lengua0.png`;
                $card_exercise_img[1].src = `../../../img/exercises/muscle-strengthening/musculos de la lengua1.png`;
                $card_exercise_img[0].alt = 'musculos de la lengua0';
                $card_exercise_img[1].alt = 'musculos de la lengua1';
                break;
            case 'joint':

                $exercises.innerHTML = `
                  <option value="rotacismo">Rotacismo (La no articulación del fonema /r/)</option>
                <option value="ceceo">Ceceo (pronunciación de /s/ por /z/)</option>
                <option value="seseo">Seseo: pronunciación de /z/ por /s/.</option>
                <option value="sigmatismo">Sigmatismo (la no articulación del fonema /s/)</option>
                <option value="jotacismo">Jotacismo: la no articulación del fonema /x/.</option>
                <option value="mitacismo">Mitacismo (la no articulación del fonema /m/)</option>
                <option value="lambdacismo">Lambdacismo (la no articulación del fonema /l/)</option>
                <option value="mumación">Numación (la no articulación del fonema /n/)</option>
                <option value="muñación">Nuñación (la no articulación del fonema /ñ/)</option>
                <option value="kappacismo">Kappacismo (la no articulación del fonema /k/)</option>
                <option value="gammacismo">Gammacismo (la no articulación del fonema /g/)</option>
                <option value="ficismo">Ficismo (la no articulación del fonema /f/)</option>
                <option value="chuitismo">Chuitismo (la no articulación del fonema /ch/)</option>
                <option value="piscismo">Piscismo (la no articulación del fonema /p/)</option>
                <option value="tetacismo">Tetacismo (la no articulación del fonema /t/)</option>
                <option value="yeismo">Yeismo (la no articulación del fonema /ll/)</option>
                <option value="chionismo">Chionismo (sustitución de /rr/ por /l/)</option>
                <option value="checheo">Checheo (sustitución de /s/ por /ch/)</option>`;
                $card_exercise_img[0].src = `../../../img/exercises/joint/rotacismo0.png`;
                $card_exercise_img[1].src = `../../../img/exercises/joint/rotacismo1.png`;
                $card_exercise_img[0].alt = 'rotacismo0';
                $card_exercise_img[1].alt = 'rotacismo1';
                break;
            case 'fluency':
                $exercises.innerHTML = `
                 <option value="el ritmo del habla">El ritmo</option>
                <option value="the-cadence-of-speech">La cadencia del habla</option>
                `;
                //fluency;
                $card_exercise_img[0].src = `../../../img/exercises/fluency/el ritmo del habla0.png`;
                $card_exercise_img[1].src = `../../../img/exercises/fluency/el ritmo del habla1.png`;
                $card_exercise_img[0].alt = 'el ritmo del habla0';
                $card_exercise_img[1].alt = 'el ritmo del habla1';
                break;
            default:
                break;
        }
    }

    if (e.target.matches('#duration-each-exercise')) {

        const ms = e.target.value * parseInt($input_therapy_elements.value.replace('sonidos-habla,', '').split(',').length)

        console.log(new Date(ms).toISOString().slice(11, 19)) // 18:30:55

        $session_duration.value = new Date(ms).toISOString().slice(11, 19)
    }

    if (e.target.matches('#exercises')) {
        $card_exercise_img[0].src = `../../../img/exercises/${$aim.value}/${e.target.value}0.png`;
        $card_exercise_img[1].src = `../../../img/exercises/${$aim.value}/${e.target.value}1.png`;
        $card_exercise_img[0].alt = e.target.value + '0';
        $card_exercise_img[1].alt = e.target.value + '1';
    }

    if (e.target.matches('#classification')) {
        console.info(e.target.value)
        if (e.target.value == '2' || e.target.value == "4") {
            $add_select_phonemes.innerHTML = `
            <select-multiple name="phonemes" class="form-control" id="Fonemas" label="Fonemas" multiple >
                <option value="a" >a</option>
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
        } else if (e.target.value == "3") {
            $add_select_phonemes.innerHTML = `
            `;
        }
        else {
            $add_select_phonemes.innerHTML = `
            <select name="phonemes" id="phonemes" class="form-control">
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
    }

})


document.addEventListener("click", e => {
    //Eliminar el ejercicio x en el contenedor de ejercicios seleccionados
    if (e.target.matches('.delete-therapy > i')) {  
        if (e.target.getAttribute('data-name-t').length != 0) {
            for (let i = 0; i < $therapy_elements.length; i++) {
                if (e.target.getAttribute('data-name-t') === $therapy_imgs[i].getAttribute('alt')) {
                    if ($therapy_elements[i].getAttribute("data-state-one") == 'active') {
                        $therapy_elements[i].setAttribute('data-state-one', 'inactive');
                        $input_therapy_elements.value = $input_therapy_elements.value.replace($delete_therapy[i].getAttribute('data-name-t') + ',', '');
                        let therapy_image_elements = $input_therapy_elements.value.split(',');
                        if (therapy_image_elements.includes($delete_therapy[i].getAttribute('data-name-t'))) {
                            $input_therapy_elements.value = $input_therapy_elements.value.replace(',' + $delete_therapy[i].getAttribute('data-name-t'), '')
                        }
                        console.info(0)
                    } else {
                        $input_therapy_elements.value = $input_therapy_elements.value.replace(',' + $delete_therapy[i].getAttribute('data-name-t'), '');
                    }
                    $therapy_elements[i].setAttribute('data-state', 'inactive');
                    $therapy_imgs[i].src = "";
                    $therapy_imgs[i].alt = "";
                    $delete_therapy[i].setAttribute('data-name-t', '')
                    break;
                }
            }
        }
    }

    if (e.target.matches(".selection-gender > label > img")) {
        for (let i = 0; i < $data_checked.length; i++) {
            $data_checked[i].removeAttribute("data-checked");
            $data_checked[i].classList.remove("checked")
        }
        e.target.classList.add("checked");
        e.target.setAttribute("data-checked", "true");
    }

    if (e.target.matches(".card-exercise > figure >img")) {
        let therapy_image_elements = $input_therapy_elements.value.split(',');
        let should_update_input = true;
        for (let i = 0; i < $therapy_elements.length; i++) {
                if ($therapy_elements[i].getAttribute('data-state') == 'inactive') {
                    if ($therapy_elements[i].getAttribute('data-state-one') == 'inactive') {
                        console.info(typeof(therapy_image_elements));
                        console.info(therapy_image_elements.length);
                        for (let i = 0; i < therapy_image_elements.length; i++) {
                            if (e.target.getAttribute('alt').includes(therapy_image_elements[i])) {
                                should_update_input = false;
                                break;
                            }
                        }
                        if (should_update_input == false) {
                            console.info('updaenot')
                            return
                        }
                        $therapy_elements[i].setAttribute('data-state-one', 'active')
                        if (therapy_image_elements.length == 0) {
                            $input_therapy_elements.value = e.target.getAttribute('alt');
                        } else {
                            $input_therapy_elements.value = $input_therapy_elements.value + ',' + e.target.getAttribute('alt');
                        }
                    } else {
                        for (let i = 0; i < therapy_image_elements.length; i++) {
                            if (e.target.getAttribute('alt').includes(therapy_image_elements[i])) {
                                should_update_input = false;
                                break;
                            }
                        }
                        if (should_update_input == false) {
                            console.info('updaenot')
                            return
                        }
                        $input_therapy_elements.value = $input_therapy_elements.value + ',' + e.target.getAttribute('alt');
                    }
                    $therapy_imgs[i].src = e.target.getAttribute('src');
                    $therapy_imgs[i].alt = e.target.getAttribute('alt');
                    $delete_therapy[i].setAttribute('data-name-t', e.target.getAttribute('alt'))
                    $therapy_elements[i].setAttribute('data-state', 'active')
                    break;
                }
        }
    }

    if (e.target.matches('.therapy  > figure > img')) { //Abrir ventana modal para poder mostrarle al administrador la foto del ejercicio
        $show_therapy_img_content.classList.remove('animation-modal-close')
        $show_therapy_img_content.classList.add('animation-modal-open');
        $therapy_img_modal.src = e.target.getAttribute('src');
        $show_modal_image_therapy
            .removeAttribute("style");
    }

    if (e.target.matches(".btn-close-therapy-img")) {//Cerrar la ventana modal
        $show_therapy_img_content.classList.remove('animation-modal');
        $show_therapy_img_content.classList.add('animation-modal-close');
        setTimeout(() => {
            $show_modal_image_therapy
                .style.display = "none";
        }, 1000);
    }
})









