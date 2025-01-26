<?php

include '../validation/authorized-user.php';
include '../connectionBD.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $search = $_POST['search'];
        $id_professional = $_SESSION['id_professional'];
        $show_all = $_POST['show_all'];
        $get_information_patients_query = $show_all == 'true' ? 
                                                            "SELECT 
                                                                nombre AS 'Nombre', 
                                                                apellido AS 'Apellido',
                                                                COALESCE( SUBSTRING(DATE(NOW()), 1, 4) - SUBSTRING(DATE(fecha_nacimiento), 1, 4), 0) AS 'Edad', 
                                                                usuario AS 'Usuario', 
                                                                ejercicios AS 'Terapias' 
                                                            FROM 
                                                                `pacientes` 
                                                            INNER JOIN 
                                                                terapias_lenguaje ON pacientes.id_paciente = terapias_lenguaje.id_paciente
                                                            INNER JOIN 
                                                                usuarios on pacientes.id_usuario = usuarios.id_usuario
                                                            WHERE id_profesional =:id_professional AND usuario LIKE :variable_search LIMIT 3" 
                                                            :
                                                            "SELECT 
                                                            nombre AS 'Nombre', 
                                                            apellido AS 'Apellido',
                                                            COALESCE( SUBSTRING(DATE(NOW()), 1, 4) - SUBSTRING(DATE(fecha_nacimiento), 1, 4), 0) AS 'Edad', 
                                                            usuario AS 'Usuario', 
                                                            ejercicios AS 'Terapias' 
                                                            FROM 
                                                                `pacientes` 
                                                            INNER JOIN 
                                                                terapias_lenguaje ON pacientes.id_paciente = terapias_lenguaje.id_paciente
                                                            INNER JOIN 
                                                                usuarios on pacientes.id_usuario = usuarios.id_usuario
                                                            WHERE id_profesional =:id_professional AND usuario LIKE :variable_search ";

        $search_term = '%' . $search . '%';

        $get_information_patients_stmt = $pdo->prepare($get_information_patients_query);
        $get_information_patients_stmt->bindParam('id_professional', $id_professional, PDO::PARAM_INT);
        $get_information_patients_stmt->bindParam('variable_search', $search_term, PDO::PARAM_STR);
        $get_information_patients_stmt->execute();
        if ($get_information_patients_stmt->rowCount() > 0) {
            $row_information_patients = $get_information_patients_stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row_information_patients as $value) {
                $joint = '';
                $muscle_strengthening = '';
                $fluency = '';
                if (preg_match("/rotacismo0|rotacismo1|seseo0|seseo1/", $value['Terapias'])) {
                    $joint = 'Ejercicios de pronunciación de fonemas. ';
                }

                if (preg_match("/musculos de la lengua0|musculos de la lengua1|el ritmo del habla0|el ritmo del habla1|labio0|labio1|mejilla0|mejilla1/", $value['Terapias'])) {
                    $muscle_strengthening = 'Fortalecimiento muscular. ';
                }
                if (preg_match("/el ritmo del habla0|el ritmo del habla1/", $value['Terapias'])) {
                    $fluency = 'Fluidez. ';
                }

                echo "<section class='table table-search'>
            <table class='dataTable' style='text-align: left;'>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad </th>
                        <th>Terapias</th>
                    </tr>
                </thead>";

                echo "<td> " . $value["Usuario"] . "</td>";
                echo "<td> " . $value["Nombre"] . " </td>";
                echo "<td> " . $value["Apellido"] . " </td>";
                echo "<td> " . $value["Edad"] . "</td>";
                echo "<td> " . $joint . '' . $muscle_strengthening . '' . $fluency . "</td>";
                echo "</tr>";
                echo " </table> </section>";
            }
        } else {
            echo '<div class="text-center"><span>No hay registros encontrados</span> </div>';
        }
    } else {
        // Indica que el servidor web no acepta el método HTTP que se utilizó para solicitar un recurso
        http_response_code(405);
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
} finally {
    $pdo = null;
}
