document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;   
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
        center: 'title',
        right: 'prev,next today'
      },
      locale:'pt-br',
      navLinks: true,
      eventLimit: false,
      selectable: true,
      timeZone: 'local',
      eventClick: function(element){
        clearMessages("#message");
        resetForm("#formAuditoria");

        $("#modalGerenciar").modal('show');
        $(".modal-content").removeClass('modalInsert');
        $(".modal-content").addClass('modalUpdate');
        $("#modalGerenciar #titleModal").text('Editar Auditoria');
        $("#modalGerenciar button.excluirAuditoria").css('display', 'block');
        $("#modalGerenciar #auditores").css('display', 'block');

        let title =element.event.title;
        $("#modalGerenciar input[name='descricao']").val(title);

        let id = element.event.id;
        $("#modalGerenciar input[name='id']").val(id);

        let id_audit = id;
        buscarAuditor(id_audit);

        let color = element.event.backgroundColor;
        $("#modalGerenciar select[name='status']").val(color);
        $("#modalGerenciar select[name='status'] option" ).attr('selected');

        let start = moment(element.event.start).format("DD/MM/YYYY");
        $("#modalGerenciar input[name='data_inicio']").val(start);

        let end = moment(element.event.end).format("DD/MM/YYYY");
        $("#modalGerenciar input[name='data_fim']").val(end);

        calendar.unselect();
    },

    select: function(element){
      clearMessages("#message");
      resetForm("#formAuditoria");

      $("#modalGerenciar").modal('show');
      $(".modal-content").removeClass('modalUpdate');
      $(".modal-content").addClass('modalInsert');
      $("#modalGerenciar #titleModal").text('Adicionar Auditoria');
      $("#modalGerenciar button.excluirAuditoria").css('display', 'none');
      $("#modalGerenciar #auditores").css('display', 'none');


      let start = moment(element.start).format("DD/MM/YYYY");
      $("#modalGerenciar input[name='data_inicio']").val(start);

      let end = moment(element.end).format("DD/MM/YYYY");
      $("#modalGerenciar input[name='data_fim']").val(end);

      calendar.unselect(); 

    },

    events: routeAuditorias('routeLoadAuditorias')

    });
    
    calendar.render();
  });