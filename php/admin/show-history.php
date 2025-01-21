<?php
function show_historys()
{
    include './../../php/connectionBD.php';
    try {
      
        $id_professional = $_SESSION['id_professional'];
        $get_history_dashboard_query =  "SELECT id_actividad, mensaje, fecha_hora from
        actividades  INNER JOIN pacientes on actividades.id_paciente = pacientes.id_paciente
        
        WHERE id_profesional = :id ORDER BY fecha_hora DESC LIMIT 3 
        ";
        $get_history_dashboard_stmt = $pdo->prepare($get_history_dashboard_query);
        $get_history_dashboard_stmt->bindParam('id', $id_professional, PDO::PARAM_INT);
        $get_history_dashboard_stmt->execute();
        $row_history_dashboard = $get_history_dashboard_stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($get_history_dashboard_stmt->rowCount() > 0) {

            $count = 0;
            foreach ($row_history_dashboard as $value) {
                $count++;
                echo "<div class='activitie-patient__show flex-between-full '>
                            <div class='d-flex  flex-column'>
                                <p class='m-0'>" . $value["mensaje"] . "</p>
                                <small  style='color: #6f6f6f;'> " . $value["fecha_hora"] . " </small>
                            </div>
                            <button type='button' class='activities-patient__show-btn-delete flex-center-full dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown'
                                aria-expanded='false'>
                                <span class='visually-hidden'>Toggle Dropdown</span>
                            </button>
                            <ul class='dropdown-menu'>
                                <li>
                                    <a class='dropdown-item' href='./../../php/admin/delete-activities.php?id=". $value["id_actividad"] . "'>
                                        <i class='bi bi-trash'></i> 
                                            Borrar
                                    </a>
                                </li>
                            </ul>
            </div><hr>";
            }
            $get_total_history_query = "SELECT COUNT(mensaje) AS total_history FROM actividades INNER JOIN pacientes on 
            actividades.id_paciente = pacientes.id_paciente WHERE pacientes.id_profesional = :id ";
            $get_total_history_stmt = $pdo->prepare($get_total_history_query);
            $get_total_history_stmt->bindParam('id', $id_professional, PDO::PARAM_INT);
            $get_total_history_stmt->execute();
            $row_total_history = $get_total_history_stmt->fetch(PDO::FETCH_ASSOC);

            if($row_total_history["total_history"] > 3 ){
                echo "<small> <a href='./history.php' class='text-decoration-none text__grey'> Ver todas</a></small>";
            }
        } else {
            echo "<div> No se han encontrado historiales registrados </div>";
        }
    } catch (PDOException $ex) {
        echo $ex;
    }finally{
        $pdo = null;
    }
}

?>