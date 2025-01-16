<?php

require_once './../../dompdf/autoload.inc.php';
session_start();

include "../connectionBD.php";
$id_professional = $_SESSION['id_professional'];

$show_all_patients_query = 'SELECT u.usuario, CONCAT_WS(" ", p.nombre, p.apellido) AS "Nombre completo" ,
                         pd.id_tipo_dislalia, pd.id_calificacion_dislalia , 
                        p.fecha_nacimiento, pd.fonemas ,
                        tl.ejercicios FROM pacientes p INNER JOIN usuarios u ON u.id_usuario = p.id_usuario INNER JOIN terapias_lenguaje tl
                        ON p.id_paciente = tl.id_paciente INNER JOIN pacientes_diagnosticados pd ON p.id_paciente = pd.id_paciente 
                            WHERE p.id_profesional = :id_profesional';
$show_all_patients_stmt = $pdo->prepare($show_all_patients_query);
$show_all_patients_stmt->bindParam('id_profesional', $id_professional, PDO::PARAM_INT);
$show_all_patients_stmt->execute();
if ($show_all_patients_stmt->rowCount() == 0) {
    echo "<script> alert('No existen registros.')
         window.location.href = './../../view/professional/dashboard.php'
    </script>";
    $pdo = null;
    exit();
}

$row_show_all_patients = $show_all_patients_stmt->fetchAll(PDO::FETCH_ASSOC);

$id_type_dyslalia = '';
$id_calification_dyslalia = '';
$valuesChilds = '';

$exercises = '';
$joint = '';
$muscle_strengthening = '';
$fluency = '';
foreach ($row_show_all_patients as $value) {

    $id_type_dyslalia = match ($value["id_tipo_dislalia"]) {
        1 => 'Dislalia funcional',
        2 => 'Dislalia orgánica',
        3 => 'Dislalia evolutiva',
        4 => 'Dislalia audiógena'
    };

    $id_calification_dyslalia = match ($value["id_calificacion_dislalia"]) {
        1 => 'Simple',
        2 => 'Múltiple',
        3 => 'Hotentotismo',
        4 => 'Afín'
    };

    $fecha_nacimiento = $value["fecha_nacimiento"];
    $fecha_actual = date("Y-m-d");
    $timestamp_nacimiento = strtotime($fecha_nacimiento);
    $timestamp_actual = strtotime($fecha_actual);
    $diferencia_segundos = $timestamp_actual - $timestamp_nacimiento;
    $edad_en_anos = floor($diferencia_segundos / (60 * 60 * 24 * 365.25));


    if (preg_match("/rotacismo0|rotacismo1|seseo0|seseo1/", $value['ejercicios'])) {
        $joint = 'Ejercicios de pronunciación de fonemas. ';
    }

    if (preg_match("/musculos de la lengua0|musculos de la lengua1|el ritmo del habla0|el ritmo del habla1|labio0|labio1|mejilla0|mejilla1/", $value['ejercicios'])) {
        $muscle_strengthening = 'Fortalecimiento muscular. ';
    }
    if (preg_match("/el ritmo del habla0|el ritmo del habla1/", $value['ejercicios'])) {
        $fluency = 'Fluidez. ';
    }

    $valuesChilds .= "<tr class='show'>
                             <td>" . $value['Nombre completo'] . "</td>
                             <td>" . $edad_en_anos . "</td>
                             <td>" . $id_type_dyslalia . ': ' . $id_calification_dyslalia . "</td>
                             <td>" . $value['fonemas'] . "</td>
                             <td> " . $joint . '' . $muscle_strengthening . '' . $fluency . " </td>
                         </tr>";
}

// Contenido HTML
$html = '
    <head>
        <style>
            .table {
                width: 100%;
                border-collapse: collapse;
            }

            thead > tr > th {
                background: rgb(67, 150, 225)  ;
                color:white;
                text-align: left;
            }

            .table th, .table td {
                padding: 8px;
            }

            .dataTable tr:nth-child(2n+1) {
                background: rgba(0, 0, 0, 0.07);
            }

            .text-r{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <strong> Sonidos de habla </strong>
        <div class="text-r"> ' . date('d-m-Y') . '<div>
        <div style="width: 100%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre y apellido</th>
                        <th>Edad</th>
                        <th> Diagnóstico </th>
                        <th>Fonemas afectados</th>
                        <th>Tratamiento necesario</th>
                    </tr>
                </thead>
                <tbody class="dataTable">
                    ' . $valuesChilds . '
                </tbody>
            </table>
        </div>
    </body>
    ';



use Dompdf\Dompdf;

$dompdf = new Dompdf(); //Objeto domPdf

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// (Opcional) Configurar el tamaño del papel, orientación, etc.
$dompdf->setPaper('letter');

// Renderizar el PDF
$dompdf->render();

// Descargar el PDF
$name_pdf = date('d-m-Y') .' Pacientes.pdf';
$dompdf->stream($name_pdf, array("Attachment" => 1));
