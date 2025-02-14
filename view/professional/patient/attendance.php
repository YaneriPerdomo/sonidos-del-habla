<?php
include '../../../php/validation/authorized-user.php';
?>

<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar paciente | Sonidos del habla</title>
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
    <style>
        .disponible {
            background-color: rgb(162, 255, 194);
            color: black
        }

        .fc-event-title-container {
            background-color: rgb(26 139 87) !important;
        }

        .fc-daygrid-day-number , .fc-col-header-cell, .fc-day, [role="columnheader"], .fc-col-header-cell-cushion{
            text-decoration: navajowhite;
            border:none;
            color: var(--color-orange) !important;
         }

         .main__content{
            border-radius: 6px;
         }
    </style>
</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-start-full ">
        <div class="main__content  z-1 ">
            <div class="link-back">
                <a href="../dashboard.php" class="text-decoration-none text__more-black">
                    <i class="bi bi-arrow-left-square"></i>
                    Regresar
                </a>
            </div>
            <h1 class="text-center fw-bold">Asistencia del paciente</h1>
            <div>
                <div id='calendar'></div>
            </div>
        </div>
    </main>
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>



    <script language="JavaScript">
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            const ID_PATIENT = params.get("id") || "";
            const calendarEl = document.getElementById('calendar');
            let calendar;



            function cargarEventos(fetchInfo) {
                const fechaInicio = fetchInfo.start.toISOString().slice(0, 10);
                const fechaFin = fetchInfo.end.toISOString().slice(0, 10);

                fetch("../../../php/admin/attendance.php", {
                        method: "POST",
                        body: new URLSearchParams({
                            id_patient: ID_PATIENT,
                            start: fechaInicio,
                            end: fechaFin,
                        }),
                    })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok");
                        }
                        return response.json();
                    })
                    .then((data) => {
                        let eventos = data.map(element => ({
                            title: 'hola',
                            start: element.fecha,
                        }));
                        if (calendar) {
                            calendar.destroy(); // Destruye la instancia anterior
                        }
                        calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            locale: 'es',
                            events: eventos,
                            borderColor: 'none',
                         
                        });
                        calendar.render();
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        if (calendar) {
                            calendar.destroy();
                        }
                        calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            locale: 'es',
                            
                            events: [],
                        });
                        calendar.render();

                    });
            }

            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: cargarEventos,
                weekNumbers : true
            });

            calendar.render();
       
        });
        /*
                 $(document).ready(function() {
                     $('#calendar').fullCalendar({

                     });
                 });  */
    </script>

    <?php include '../../include/footer.php'; ?>
    <script type="module" src="https://unpkg.com/@padawanstrainer/select-multiple"></script>



    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
    <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js "></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
    <script src="../../../js/admin/add-modify-patient.js" type="module"> </script>
</body>

</html>