<?php

session_start();


include "../connectionBD.php";


try {
    $search = $_POST['search'];
    $show_all = $_POST['show_all'];
    $id_professional = $_SESSION["id_professional"];

    $get_data_search_query = $show_all == 'true' ? //Si se cumple
        "SELECT id_actividad, mensaje, fecha_hora FROM actividades INNER JOIN pacientes ON 
            actividades.id_paciente = pacientes.id_paciente WHERE mensaje LIKE :search 
            AND pacientes.id_profesional = :id_professional ORDER BY fecha_hora DESC LIMIT 10"
        : //si no se cumple
        "SELECT id_actividad, mensaje, fecha_hora FROM actividades INNER JOIN pacientes ON 
            actividades.id_paciente = pacientes.id_paciente WHERE mensaje LIKE :search 
            AND pacientes.id_profesional = :id_professional ORDER BY fecha_hora DESC";
    $get_data_search_stmt = $pdo->prepare($get_data_search_query);

    $search_term = '%' . $search . '%';

    $get_data_search_stmt->bindParam('search', $search_term, PDO::PARAM_STR);
    $get_data_search_stmt->bindParam('id_professional', $id_professional, PDO::PARAM_INT);

    // Ejecuta la consulta preparada.
    $get_data_search_stmt->execute();

    // Si se encontraron resultados...
    if ($get_data_search_stmt->rowCount() > 0) {


        // Obtiene todos los resultados de la consulta en un array asociativo.
        $row_data_search = $get_data_search_stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($row_data_search as $value) {
            echo "
                    <div class='d-flex gap-1'>
                        <div style='flex-grow: 1;'>
                            <p class='m-0'>".$value["mensaje"]."</p>
                            <small style='color: #6f6f6f;'>".$value["fecha_hora"]."</small>
                        </div>
                        <div>
                            <a href='./../../php/admin/delete-activitie.php?id=".$value["id_actividad"]."' class='btn-delete-activitie'>
                                <i class='bi bi-x-lg'></i>
                            </a>
                        </div>
                    </div>
                <hr>";
        }
    } else {
        echo "<div style='  text-align: center;'>No se encontraron registros</div>";
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
} finally {
    $pdo = null;
}
