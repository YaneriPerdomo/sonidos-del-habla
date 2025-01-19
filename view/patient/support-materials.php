<?php
include '../../php/validation/authorized-user.php';

function show_support_materials()
{
    include '../../php/connectionBD.php';

    try {

        $id_patient = $_SESSION['id_patient'];
        $get_support_materials_query = 'SELECT materiales_apoyo.id_material_apoyo, titulo, url_material , icono FROM  
        pacientes_materiales_apoyo INNER JOIN materiales_apoyo  ON pacientes_materiales_apoyo.id_material_apoyo = materiales_apoyo.id_material_apoyo
        WHERE id_paciente = :id_patient';
        $get_support_materials_stmt = $pdo->prepare($get_support_materials_query);
        $get_support_materials_stmt->bindParam('id_patient', $id_patient, PDO::PARAM_INT);
        $get_support_materials_stmt->execute();

        $HTML_materials = '';

        if ($get_support_materials_stmt->rowCount() > 0) {
            $row_support_materials = $get_support_materials_stmt->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($row_support_materials as $value) {
                $HTML_materials .= '<div class="card-sopport-materials">
                                    <a href="' . $value['url_material'] . '" 
                                       class="flex-center-full flex-column text-decoration-none color-white"
                                       '. ($value['id_material_apoyo'] == 9 ? 'download="Ejercicios de respiración"' : '') . '> 
                                        <i class="' . $value['icono'] . ' fs-2"></i>
                                        <span class="fw-bold">' . $value['titulo'] . '</span>
                                    </a>
                                </div>';
                           
            }
            echo $HTML_materials;
        } else {
            echo 'No se encontraron materiales de soporte, por favor comuniquese con su profesional o representante';
        }
    } catch (PDOException $ex) {
        echo 'Sucedio un error por parte de la base de datos: ' . $ex->getMessage();
    }
}
?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicia sesion | Sonidos de habla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/components/body.css">
    <link rel="stylesheet" href="../../css/components/footer.css">
    <link rel="stylesheet" href="../../css/components/button.css">
    <link rel="stylesheet" href="../../css/components/input.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/auxiliary.css">
    <link rel="stylesheet" href="../../css/components/modal-window.css">
    <link rel="stylesheet" href="../../css/admin/header.css">
    <link rel="stylesheet" href="../../css/user/support-materials.css">
    <link rel="stylesheet" href="../../css/user/main.css">

</head>

<body>

    <?php include '../include/patient/header.php'; ?>
    <main class="flex-start-full ">
        <section class="main__content support-materials ">
            <!--<div class="back">
                <i class="bi bi-arrow-left-square"></i>
                Regresar
            </div> -->
            <strong class="support-materials__title fs-4">Materiales de apoyo</strong>
            <hr>
            <div class="d-flex">
            <?php
                show_support_materials();
                ?>
            </div>
        </section>
    </main>

    <?php include '../include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>