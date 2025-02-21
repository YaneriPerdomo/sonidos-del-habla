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

        .fc-daygrid-day-number,
        .fc-col-header-cell,
        .fc-day,
        [role="columnheader"],
        .fc-col-header-cell-cushion {
            text-decoration: navajowhite;
            border: none;
            color: var(--color-blue) !important;
        }

        .main__content {
            border-radius: 6px;
        }

        .back__link {
            color: rgb(47, 47, 47);
        }

        .fc-daygrid-event-dot {
            border: calc(var(--fc-daygrid-event-dot-width)/2) solid rgb(41, 183, 91);
        }

        .fc-event-title {
            color: rgb(41, 183, 91)
        }
    </style>
</head>

<body>

    <?php include '../../include/professional/account/header.php'; ?>
    <main class="flex-start-full ">
        <div class="main__content  z-1 ">
            <div class="back">
                <a href="../dashboard.php" class="text-decoration-none text__more-black back__link">
                    <i class="bi bi-arrow-left-square back__icon"></i>
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

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },
                buttonText: {
                    today: 'Mes actual',  
                },
                datesSet: function(fetchInfo) {
                    // Llama a la función para cargar eventos cuando cambia el rango de fechas
                    cargarEventos(fetchInfo);
                }
            });

            calendar.render();

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
                            id: element.id_sesion,
                            title: 'Completada',
                            start: element.fecha,
                            display: 'list-item'
                        }));
                        console.info(eventos)

                        // Elimina los eventos existentes y agrega los nuevos
                        calendar.removeAllEvents();
                        calendar.addEventSource(eventos);
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        calendar.removeAllEvents(); // Limpia los eventos en caso de error
                    });
            }
        });
    </script>

    <?php include '../../include/footer.php'; ?>
    <script type="module" src="https://unpkg.com/@padawanstrainer/select-multiple"></script>



    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" type="module"></script>
    <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js "></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
    <script src="../../../js/admin/add-modify-patient.js" type="module"> </script>
</body>

</html>