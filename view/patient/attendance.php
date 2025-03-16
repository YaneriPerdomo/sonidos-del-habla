<?php
include '../../php/validation/authorized-user.php';

?>
<!doctype html>
<html lang="es" class="full-heigh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendario de asistencia | Sonidos del habla</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
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
    <link rel="stylesheet" href="../../css/admin/attendance.css">

</head>

<body>

    <?php include '../include/patient/header.php'; ?>
    <main class="flex-start-full ">
        <section class="main__content support-materials ">
            <div class="back mb-3">
                <a href="./home.php" class="text-decoration-none text__more-black">
                    <i class="bi bi-arrow-left-square"></i>
                    Regresar
                </a>
            </div> 
            <strong class="support-materials__title fs-4">Calendario de asistencia</strong>
            <hr> 
                 <div class="d-flex gap-3 flex-wrap w-100">
                    <div id='calendar' class="w-100"></div>
                </div>
         </section>
    </main>

    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>


        <script language="JavaScript">
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener el ID del paciente desde la URL
        const params = new URLSearchParams(window.location.search);
        const ID_PATIENT = params.get("id") || "";

        // Obtener el elemento del calendario
        const calendarEl = document.getElementById('calendar');

        // Inicializar FullCalendar
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
                // Cargar eventos cuando cambia el rango de fechas
                cargarEventos(fetchInfo);
            },
            eventDidMount: function(info) {
                // Mostrar un tooltip con la descripción del evento
                if (info.event.extendedProps.descripcion) {
                    new bootstrap.Tooltip(info.el, {
                        title: info.event.extendedProps.descripcion,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                }
            }
        });

        // Renderizar el calendario
        calendar.render();

        // Función para cargar eventos
        function cargarEventos(fetchInfo) {
            const fechaInicio = fetchInfo.start.toISOString().slice(0, 10);
            const fechaFin = fetchInfo.end.toISOString().slice(0, 10);

            // Realizar la solicitud fetch
            fetch("../../php/admin/attendance.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
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
                // Mapear los datos a eventos
                let eventos = data.map(element => ({
                    id: element.id_sesion,
                    title: 'Completada',
                    descripcion: element.descripcion || 'Sin descripción', // Usar descripción del elemento
                    start: element.fecha,
                    display: 'list-item'
                }));

                console.info(eventos); // Ver eventos en la consola

                // Eliminar eventos existentes y agregar los nuevos
                calendar.removeAllEvents();
                calendar.addEventSource(eventos);
            })
            .catch((error) => {
                console.error("Error:", error);
                calendar.removeAllEvents(); // Limpiar eventos en caso de error
            });
        }
    });
</script>
    </script>
    <?php include '../include/footer.php'; ?>
    <script type="module" src="https://unpkg.com/@padawanstrainer/select-multiple"></script>
    <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js "></script>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>