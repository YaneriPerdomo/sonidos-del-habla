<?php
include '../../../php/validation/authorized-user.php';

function show_information_patient()
{

    include '../../../php/connectionBD.php';

    try {

        $id_patient = $_GET['id'] ?? '';

        $get_information_patient_query = "SELECT 
                                            pacientes.nombre, pacientes.apellido, pacientes.id_genero, pacientes.fecha_nacimiento, usuarios.usuario,
                                            pacientes_diagnosticados.id_tipo_dislalia, pacientes_diagnosticados.id_calificacion_dislalia, pacientes_diagnosticados.fonemas,
                                            pacientes_diagnosticados.gravedad, pacientes_diagnosticados.observacion,
                                            SUBSTRING(terapias_lenguaje.ejercicios,15) AS ejercicios, terapias_lenguaje.duracion_cada_ejercicio, terapias_lenguaje.nota, terapias_lenguaje.duracion_total
                                        FROM
                                            usuarios
                                        INNER JOIN 
                                            pacientes ON usuarios.id_usuario = pacientes.id_usuario
                                        INNER JOIN
                                            pacientes_diagnosticados ON pacientes.id_paciente = pacientes_diagnosticados.id_paciente
                                        INNER JOIN 
                                            terapias_lenguaje ON pacientes_diagnosticados.id_paciente = terapias_lenguaje.id_paciente
                                        WHERE 
                                            pacientes.id_paciente = :id";
        $get_information_patient_stmt = $pdo->prepare($get_information_patient_query);
        $get_information_patient_stmt->bindParam("id", $id_patient, PDO::PARAM_INT);
        $get_information_patient_stmt->execute();

        $row_information_patient = $get_information_patient_stmt->fetch(PDO::FETCH_ASSOC);


        $get_representative_query = "SELECT nombre, apellido , correo_electronico, numero_telefonico FROM representantes WHERE id_paciente = :id_patient";
        $get_representative_stmt = $pdo->prepare($get_representative_query);
        $get_representative_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
        $get_representative_stmt->execute();

        $get_materiales_apoyo_query = "SELECT  	id_material_apoyo  FROM `pacientes_materiales_apoyo` WHERE id_paciente = :id_patient ";
        $get_materiales_apoyo_stmt = $pdo->prepare($get_materiales_apoyo_query);
        $get_materiales_apoyo_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
        $get_materiales_apoyo_stmt->execute();


        $row_materiales_apoyo = $get_materiales_apoyo_stmt->fetchAll(PDO::FETCH_ASSOC);
        /*  <option value="1">Ejercicios en formato PDF para pronunciar el fonema r y la doble rr</option>
                            <option value="2">Juego para discriminar sonidos</option>
                            <option value="3">Juego para identificar errores en la propia pronunciación</option>
                            <option value="4">Juego para mejorar el vocabulario, nivel basico</option>
                            <option value="5">Imágenes de trabalenguas fáciles para niños entre 7 y 10 años</option>
                            <option value="6" selected>Video para aprende a pronunciar el fonema Ñ</option>
                            <option value="7" >Imagenes de Trabalenguas </option> */
        $id_materiales_apoyo = array(
            0 => 'Ejercicios para pronunciación el fonema r y la doble rr',
            1 => 'Actividades para discriminar sonidos',
            2 => 'Ejercicios para identificar errores en la propia pronunciación',
            3 => 'Actividades para mejorar el vocabulario',
            4 => 'Trabalenguas fáciles',
            5 => 'Aprende a pronunciar el fonema Ñ',
            6 => 'Trabalenguas',
            7 => 'Ejercicios de respiración',
        );

        $options_materiales_apoyo = '';
        for ($i = 0; $i < count($id_materiales_apoyo); $i++) {
            echo $row_information_patient[$i]['id_material_apoyo'] ?? '';
            if ($row_materiales_apoyo[$i]['id_material_apoyo'] ?? '' == $i) {
                $options_materiales_apoyo .= '<option value="' . $id_materiales_apoyo[$i] . '" selected  >' . $id_materiales_apoyo[$i] . '</option>';
            } else {
                $options_materiales_apoyo .= '<option value="' . $id_materiales_apoyo[$i] . '" >' . $id_materiales_apoyo[$i] . '</option>';
            }
        }


        $information_representative = [];
        if ($get_representative_stmt->rowCount() > 0) {
            $row_representative = $get_representative_stmt->fetch(PDO::FETCH_ASSOC);
            $information_representative = [$row_representative['nombre'], $row_representative['apellido'], $row_representative['correo_electronico'], $row_representative['numero_telefonico']];
        } else {
            $information_representative = ['', '', '', ''];
        }




        $patient_gender = '';
        $patient_gender =  match ($row_information_patient['id_genero']) {
            1 =>  '<label for="M" data-checked="true">
                                <input type="radio" id="M" name="id-gender" value="1" checked>
                                <img src="../../../img/patients/childs/boy.png" alt="" class="checked">
                            </label>
                            <label for="F">
                                <input type="radio" id="F" name="id-gender" value="2">
                                <img src="../../../img/patients/childs/girl.png" alt="">
                            </label>',
            2 => '<label for="M" data-checked="true">
                                <input type="radio" id="M" name="id-gender" value="1" >
                                <img src="../../../img/patients/childs/boy.png" alt="" >
                            </label>
                            <label for="F">
                                <input type="radio" id="F" name="id-gender" value="2" checked>
                                <img src="../../../img/patients/childs/girl.png" alt="" class="checked">
                            </label>'
        };

        $id_type_dyslalia = array(
            1 => 'Dislalia funcional',
            2 => 'Dislalia orgánica',
            3 => 'Dislalia evolutiva',
            4 => 'Dislalia audiógena'
        );

        $id_qualification_dyslalia = array(
            1 => 'Simple',
            2 => 'Múltiple',
            3 => 'Hotentotismo',
            4 => 'Afín'
        );

        $gravity = ['Leve', 'Moderada', 'Severa'];


        $duration_each_exercise = array(
            10000 => '10 segundos',
            15000 => '15 segundos',
            20000 => '20 segundos',
            30000 => '30 segundos',
            40000 => '40 segundos',
            50000 => '50 segundos'
        );

        $options_type_dislalia = '';
        $options_qualification_dyslalia = '';
        $options_gravity = '';
        $options_duration_each_exercise = '';
        for ($i = 0; $i < count($gravity); $i++) {
            if ($row_information_patient['gravedad'] == $gravity[$i]) {
                $options_gravity .= '<option value="' . $gravity[$i] . '" selected  >' . $gravity[$i] . '</option>';
            } else {
                $options_gravity .= '<option value="' . $gravity[$i] . '" >' . $gravity[$i] . '</option>';
            }
        }

        foreach ($id_qualification_dyslalia as $key => $value) {
            if ($row_information_patient['id_calificacion_dislalia'] == $key) {
                $options_qualification_dyslalia .= '<option value="' . $key . '" selected  >' . $value . '</option>';
            } else {
                $options_qualification_dyslalia .= '<option value="' . $key . '" >' . $value . '</option>';
            }
        }

        foreach ($duration_each_exercise as $key => $value) {
            if ($row_information_patient['duracion_cada_ejercicio'] == $key) {
                $options_duration_each_exercise .= '<option value="' . $key . '" selected  >' . $value . '</option>';
            } else {
                $options_duration_each_exercise .= '<option value="' . $key . '" >' . $value . '</option>';
            }
        }


        foreach ($id_type_dyslalia as $key => $value) {
            if ($row_information_patient['id_tipo_dislalia'] == $key) {
                $options_type_dislalia .= '<option value="' . $key . '" selected  >' . $value . '</option>';
            } else {
                $options_type_dislalia .= '<option value="' . $key . '" >' . $value . '</option>';
            }
        }

        $qualification_dyslalia_s_m_a = array(
            'a' => 'a',
            'b' => 'b',
            'c' => 'c',
            'd' => 'd',
            'e' => 'e',
            'f' => 'f',
            'g' => 'g',
            'h' => 'h',
            'i' => 'i',
            'j' => 'j',
            'k' => 'k',
            'l' => 'l',
            'm' => 'm',
            'n' => 'n',
            'ñ' => 'ñ',
            'o' => 'o',
            'p' => 'p',
            'q' => 'q',
            'r' => 'r',
            's' => 's',
            't' => 't',
            'u' => 'u',
            'v' => 'v',
            'w' => 'w',
            'x' => 'x',
            'y' => 'y',
            'z' => 'z'
        );

        function options_selected($arreglo, $row, $first_select, $last_select)
        {
            $options = '';
            $options .= $first_select;
            foreach ($arreglo as $key => $value) {
                if ($row == $key) {
                    $options .= '<option value="' . $key . '" selected  >' . $value . '</option>';
                } else {
                    $options .= '<option value="' . $key . '" >' . $value . '</option>';
                }
            }
            $options .= $last_select;
            return $options;
        }


       

        
        $array_imgs_therapys = array(
            'rotacismo0' => 'rotacismo0',
            'rotacismo1' => 'rotacismo1',
            'seseo0' => 'seseo0',
            'seseo1' => 'seseo1',
            'jotacismo0' => 'jotacismo0',
            'jotacismo1' => 'jotacismo1',
            'lambdacismo0' => 'lambdacismo0',
            'lambdacismo1' => 'lambdacismo1',
            'muñación1' => 'muñación1',
            'muñación0' => 'muñación0',
            'mumación0' => 'mumación0',
            'mumación1' => 'mumación1',
            'yeismo0' => 'yeismo0',
            'yeismo1' => 'yeismo1',
            'el ritmo del habla0' => 'el ritmo del habla0',
            'el ritmo del habla1' => 'el ritmo del habla1',
            'musculos de la lengua0' => 'musculos de la lengua0',
            'musculos de la lengua1' => 'musculos de la lengua1',
            'labio0' => 'labio0',
            'labio1' => 'labio1',
            'mejillas1' => 'mejillas1',
            'mejillas0' => 'mejillas0',
        );
 
 
 
 
        function show_therapys($row)
        {
            $therapy_html = '';
            $array_row = explode(',', $row);
            $count = 0;

            for($i = 0; $i < count($array_row) ; $i++){
                $count++;
                $file = '';
                switch ($array_row[$i]) {
                    case 'el ritmo del habla0':
                    case 'el ritmo del habla1':
                        $file = 'fluency';
                        break;
                    case 'rotacismo0':
                    case 'rotacismo1':
                    case 'seseo0':
                    case 'seseo1':
                    case 'jotacismo0':
                    case 'jotacismo1':
                    case 'lambdacismo0';
                    case 'lambdacismo1':
                    case 'mumación0':
                    case 'mumación1':
                    case 'muñación0':
                    case 'muñación11':
                    case 'yeismo0':
                    case 'yeismo1':
                        $file = 'joint';
                        break;
                    case 'musculos de la lengua0':
                    case 'musculos de la lengua1':
                    case 'labio0':
                    case 'labio1':
                    case 'mejillas0':
                    case 'mejillas1':
                        $file = 'muscle-strengthening';
                        break;
                }
                $class = ($count == 1) ? 'data-state="active" data-state-one="active"' : 'data-state="active"';
                $therapy_html .= '
                    <div class="therapy flex-center-full" ' . $class . '>
                        <figure>
                            <img src="../../..//img/exercises/' . $file . '/' . $array_row[$i] . '.png" alt="' . $array_row[$i] . '"  draggable="false"> 
                        </figure>
                        <div class="delete-therapy">
                            <i class="bi bi-x-circle" data-name-t="' . $array_row[$i] . '"></i>
                        </div>
                    </div>';
            }

            for($i = $count; $i < 10; $i++){
                $therapy_html .= '
                        <div class="therapy flex-center-full" data-state="inactive">
                            <figure>
                                <img src="" alt=""  draggable="false">
                            </figure>
                            <div class="delete-therapy">
                                <i class="bi bi-x-circle"></i>
                            </div>
                        </div>';                 
            }


 
            return $therapy_html;
        }


        $html_therapys = show_therapys( $row_information_patient['ejercicios']);
        function options_selected_multiple($arreglo, $row, $first_select, $last_select)
        {
            $options = '';
            $array_row = explode(',', $row);
            $selected_keys = [];
            $options .= $first_select;
            foreach ($arreglo as $key => $value) {
                if (in_array($key, $selected_keys)) {
                    continue;
                }

                if (in_array($key, $array_row)) {
                    $selected_keys[] = $key;
                    $options .= '<option value="' . $key . '" selected>' . $value . '</option>';
                } else {
                    $options .= '<option value="' . $key . '">' . $value . '</option>';
                }
            }
            $options .= $last_select;
            return $options;
        }



        $fonemas_afectados = '';
        $fonemas_afectados = match ($row_information_patient['id_calificacion_dislalia']) {
            1 =>  options_selected(
                $qualification_dyslalia_s_m_a,
                $row_information_patient['fonemas'],
                '<select name="phonemes" id="phonemes" class="form-control">',
                '</select>'
            ),
            2 =>  options_selected_multiple(
                $qualification_dyslalia_s_m_a,
                $row_information_patient['fonemas'],
                ' <select-multiple name="phonemes" class="form-control" id="Fonemas" label="Fonemas" multiple >',
                '   </select-multiple>'
            ),
            3 => '
            <select name="phonemes" id="phonemes" class="form-control">
                <option value="Todos los fonemas" seleted>Todos los fonemas</option>
            </select>
            ',
            4 => options_selected_multiple(
                $qualification_dyslalia_s_m_a,
                $row_information_patient['fonemas'],
                ' <select-multiple name="phonemes" class="form-control" id="Fonemas" label="Fonemas" multiple >',
                '   </select-multiple>'
            ),
        };


        echo '
         <div class="col-6">
                        <b>Datos personales</b><br>
                        <label for="name">Nombre</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control" value="' . $row_information_patient['nombre'] . '" placeholder="Introduzca su nombre"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="lastname">Apellido</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Introduzca su apellido"  value="' . $row_information_patient['apellido'] . '"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="date">Fecha de nacimiento</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="date" name="date-birth" id="date" class="form-control" placeholder="Introduzca su correo electronico"  value="' . $row_information_patient['fecha_nacimiento'] . '"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                        <label for="gender">Genero </label><br>

                        <p class="d-flex gap-2 selection-gender">
                            ' . $patient_gender . '
                        </p>

                    </div>
                    <div class="col-6">
                        <b>Datos de la cuenta</b><br>
                        <label for="user">Usuario</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="user" id="user" class="form-control" placeholder="Introduzca su nombre de usuario"  value="' . $row_information_patient['usuario'] . '"
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
                    </div>
                <hr>
                <section class="about-dyslalia">
                    <span><b>Información sobre la dislalia</b></span><br>
                    <label for="dyslalia-type">Tipo </label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                        <select name="dyslalia-type" class="form-control">
                            <option value=""  disabled>Elige el tipo de dislalia</option>
                            ' . $options_type_dislalia . '
                        </select>
                    </div>
                    <label for="classification">Clasificacion</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                        <select name="classification" id="classification" class="form-control">
                            <option value="0" disabled selected>Elige una clasificacion</option>
                            ' . $options_qualification_dyslalia . '
                        </select>
                    </div>
                    <label for="">Fonemas afectados</label>
                    <div class="input-group mb-2 selection-phonemes d-flex">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                        <div class="add-select-phonemes" style="flex-grow: 2">
                            ' . $fonemas_afectados . '
                        </div>
                    </div>
                    <label for="gravity">Gravedad</label>
                    <div class="input-group mb-2 selection-phonemes mb-3 ">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                        <select name="gravity" id="gravity" class="form-control">
                            <option value="" selected disabled>Elige la gravedad de la dificultad</option>
                            ' . $options_gravity . '
                        </select>
                    </div>
                    <label for="observations">Observaciones</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                        <textarea name="observations" id="observations" class="form-control" >' . $row_information_patient['observacion'] . '
                        </textarea>
                    </div>
                </section>
                     <hr>
                    <section class="personalization-therapy-session">
                        <span><b>Datos de la personalizacion de la sesion</b></span>
                        <input type="hidden" class="input-therapys" value="sonidos-habla,' . $row_information_patient['ejercicios'] . '" name="input-therapys">
                        <div class="flex-center-full">
                           ' . $html_therapys . '

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="aim">Objetivo:</label>
                                <div class="input-group mb-2 selection-phonemes mb-3 ">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                                    <select name="aim" id="aim" class="form-control">
                                        <option value="" selected disabled>Elige la gravedad de la dificultad</option>
                                        <option value="muscle-strengthening">Fortalecimiento muscular</option>
                                        <option value="joint"> Articulación</option>
                                        <option value="fluency">Fluidez</option>
                                    </select>
                                </div>
                                <label for="exercises">Ejercicios para mejorar:</label>
                                <div class="input-group mb-2 selection-phonemes mb-3 ">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                                    <select name="exercises" id="exercises" class="form-control">
                                        <option value="" selected disabled>...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 flex-center-full gap-2">
                                <div class="card-exercise" data-exercise="one">
                                    <figure>
                                        <img src="" alt="">
                                    </figure>
                                    <span></span>
                                </div>
                                <div class="card-exercise" data-exercise="two">
                                    <figure>
                                        <img src="" alt="">
                                    </figure>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <label for="duration-each-exercise">Duración de cada ejercicio</label>
                        <div class="input-group mb-2 selection-phonemes mb-3 ">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-stopwatch"></i></i></span>
                            <select name="duration-each-exercise" id="duration-each-exercise" class="form-control">
                                <option value="" selected disabled>Elige la duración de cada ejercicio</option>
                                ' . $options_duration_each_exercise . '
                            </select>
                        </div>
                        <label for="session_duration">Duracion total</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-stopwatch"></i></span>
                            <input type="text" name="session_duration" id="session_duration" disabled class="form-control"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true" value="' . $row_information_patient['duracion_total'] . '">
                        </div>
                        <label for="note">Nota</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text"></i></span>
                            <textarea name="note" id="note" class="form-control">' . $row_information_patient['nota'] . '</textarea>
                        </div>
                        <label class="support-materials">Materiales de apoyo</label>
                        <select name="support-materials[]" class="form-control" id="support-materials" multiple>
                            ' . $options_materiales_apoyo . '
                        </select>
                    </section>
                    <section class="representative">
                        <span class="mt-3"><b>Datos del representante</b></span><br>
                        <label for="representative__name">Nombre</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="text" name="representative__name" id="representative__name" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true" value="' . $information_representative[0] . '">
                        </div>
                        <label for="representative__lastname">Apellido</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="text" name="representative__lastname" id="representative__lastname" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true" value="' . $information_representative[1] . '">
                        </div>
                        <label for="representative__email">Correo electronico</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="email" name="representative__email" id="representative__email" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true" value="' . $information_representative[2] . '">
                        </div>
                        <label for="representative-phone-number">Numero telefonico</label><br>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="text" name="representative-phone-number" id="representative-phone-number" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true"  value="' . $information_representative[3] . '">
                        </div>
                        <label for="representative__secret-code">Clave secreta</label><br>
                        <small>Esta opción permite al representante utilizar una contraseña especial al final de cada sesión para dejar comentarios sobre el desempeño de su niño/a, si es necesario.</small>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3-event"></i></span>
                            <input type="password" name="representative__secret-code" id="representative__secret-code" class="form-control" placeholder="Introduzca su correo electronico"
                                aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                        </div>
                    </section>
        ';
    } catch (PDOException $ex) {
        echo 'Sucedio un error en la base de datos ->' . $ex->getMessage();
    } finally {
        $pdo = null;
    }
}




?>

<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar paciente | Sonidos del habla</title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/body.css">
    <link rel="stylesheet" href="../../../css/components/footer.css">
    <link rel="stylesheet" href="../../../css/components/button.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../../css/admin/header.css">
    <link rel="stylesheet" href="../../../css/components/view-add-modify-patient.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">

</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-start-full ">
        <div class="main__content  z-1 ">
            <h1 class="text-center fw-bold">Modificar paciente</h1>
            <div class="flex-center-full text__grey">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum laborum mollitia culpa esse, temporibus soluta distinctio quidem quis cupiditate fugiat ea reiciendis. Necessitatibus, labore dolore in ut beatae sit deleniti.</p>
            </div>
            <form action="../../../php/admin/patient.php" method="post">
                <input type="hidden" name="state" value="add">
                <div class="row">
                    <?php
                    show_information_patient();
                    ?>


                    <hr>
                    <div class="flex-center-full gap-3">
                        <a href="../dashboard.php" class="text-decoration-none text-white button__grey button-a">Regresar</a>
                        <input type="submit" class="button__orange" value="Agregar">
                    </div>


                </div>
            </form>
        </div>
    </main>

    <div class="container-modal" data-modal="show_therapy_img" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title modal-title-blue fs-5 text-center" id="exampleModalLabel"><b>Mostrar imagen</b></h1>
                </div>
            </div>
            <div class="modal-body flex-center-full">
                <img src="" class="modal-body__therapy_img mt-3" alt="">
            </div>
            <hr>
            <div class="flex-center-full  mb-3">
                <button class="button__blue btn-close-therapy-img">Cerrar </button>
            </div>
        </div>
    </div>

    <?php include '../../include/footer.php'; ?>
    <script type="module" src="https://unpkg.com/@padawanstrainer/select-multiple"></script>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
    <script src="../../../js/admin/add-modify-patient.js" type="module"> </script>
</body>

</html>