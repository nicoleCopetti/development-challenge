<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <link href='assets/css/bootstrap.min.css' rel='stylesheet' />
    <link href='assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar/packages/list/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar/css/style.css' rel='stylesheet' />
    <link href="assets/fontawesome/css/all.css" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    @include('fullcalendar.modal_gerenciar')
    @csrf
    @method('PUT')
    <nav class="navbar navbar-custom">
      <h4 style="margin-top: 5px;">Calendário de <b>Auditorias</b></h4>
    </nav>
    <br>
    <div id='wrap'>
      <div id='external-events'>
        <p style="text-align:center; color: #444; font-size: 16px;">
          <strong>Legenda Eventos</strong>
        </p>
        <div class='fc-event' style="background-color: #00c0ef">&nbsp;<i class="far fa-calendar"></i>&nbsp;Agendado</div>
        <div class='fc-event' style="background-color: #00a65a">&nbsp;<i class="fas fa-calendar-check"></i>&nbsp;Confirmado</div>
        <div class='fc-event' style="background-color: #f0ad4e">&nbsp;<i class="far fa-calendar-times"></i>&nbsp;Cancelado</div>
      </div>
      <div id='calendar-container'>
        <div id='calendar' data-route-load-auditorias="load-auditorias" data-route-update-auditorias="update-auditorias"
          data-route-insert-auditorias="insert-auditorias"  data-route-delete-auditorias="delete-auditorias"
          data-route-get-auditores="get-auditores" data-route-delete-auditor="delete-auditor"
        ></div>
      </div>
      <div style='clear:both'></div>
    </div>
  </body>
  <script src='assets/fullcalendar/packages/core/main.js'></script>
  <script src='assets/fullcalendar/packages/interaction/main.js'></script>
  <script src='assets/fullcalendar/packages/daygrid/main.js'></script>
  <script src='assets/fullcalendar/packages/timegrid/main.js'></script>
  <script src='assets/fullcalendar/packages/list/main.js'></script>
  <script src='assets/fullcalendar/packages/core/locales-all.js'></script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script src='assets/fullcalendar/js/script.js'></script>
  <script src='assets/fullcalendar/js/calendar.js'></script>
</html>

