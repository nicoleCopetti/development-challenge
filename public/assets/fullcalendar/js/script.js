$('.date-mask').mask('00/00/0000');
$('.cpf-mask').mask('000.000.000-00');
  
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function routeAuditorias(route){
    return document.getElementById('calendar').dataset[route];
}

$(".excluirAuditoria").click(function(){
    let id = $("#modalGerenciar input[name='id']").val();

    let Auditoria = {
        id: id,
        _method: 'DELETE'
    };

    let route = routeAuditorias('routeDeleteAuditorias');
    sendAuditoria(route,Auditoria);
});

$(".salvarAuditoria").click(function(){
  let title = $("#modalGerenciar input[name='descricao']").val();
  let id = $("#modalGerenciar input[name='id']").val();
  let color = $("#modalGerenciar select[name='status']").val();
  let start = moment($("#modalGerenciar input[name='data_inicio']").val(),"DD/MM/YYYY").format("YYYY/MM/DD");
  let end = moment($("#modalGerenciar input[name='data_fim']").val(),"DD/MM/YYYY").format("YYYY/MM/DD");

  let nome = $("#modalGerenciar input[name='nome_auditor[]']").val();
  let id_auditor = $("#modalGerenciar input[name='id_auditor[]']").val();
  let cpf = $("#modalGerenciar input[name='cpf_auditor[]']").val();
  let cargo = $("#modalGerenciar input[name='cargo_auditor[]']").val();
  let id_auditoria = $("#modalGerenciar input[name='id']").val();

  let Auditoria = {
    title: title,
    start: start,
    end: end,
    color: color,
    nome: nome,
    cpf: cpf,
    cargo: cargo,
    id_auditoria: id_auditoria
  };

  let route;
  if(id == ''){
      route = routeAuditorias('routeInsertAuditorias');
  } else {
      route = routeAuditorias('routeUpdateAuditorias');
      Auditoria.id = id;
      Auditoria._method = 'PUT';
  }
  sendAuditoria(route,Auditoria);
});

function sendAuditoria(route,data_){
    $.ajax({
        url: route,
        data: data_,
        method: 'POST',
        dataType: 'json',
        success: function(json){
            if(json){
                location.reload();
            }
        },
        error:function(json){
            let responseJSON = json.responseJSON.errors;
            $("#message").html(loadErrors(responseJSON));
        }
    });
}

function loadErrors(response){
    let boxAlert = '<div class="alert alert-danger">';
    for (let fields in response){
        boxAlert += '<span>';
        boxAlert += response[fields];
        boxAlert += '</span><br/>';
    }
    boxAlert += '</div>';
    return boxAlert;
}

function clearMessages(element){
    $(element).text('');
}

function resetForm(form){
    $(form)[0].reset();
}

$(".AddRowNewAuditor").click(function(){
    var newRow = $("<tr>");    
    var cols = "";  
    cols += '<td><input type="text" class="form-control form-control-sm" name="nome_auditor[]" /><input type="hidden" class="form-control form-control-sm" name="id_auditor[]" /></td>';       
    cols += '<td><input type="text" class="form-control form-control-sm cpf-mask" name="cpf_auditor[]" /></td>';       
    cols += '<td><input type="text" class="form-control form-control-sm" name="cargo_auditor[]" /></td>';      
    cols += '<td>';
      cols += '<button onclick="remove(this)" class="btn btn-danger btn-sm" type="button">-</button>';         
    cols += '</td>';
    newRow.append(cols);        
    $("#auditor").append(newRow);   
    return false;     
  });  

  remove = function(linha) {       
    var tr = $(linha).closest('tr');          
    tr.remove();   
    return false;     
  }   
  

function buscarAuditor(id_audit){      
    $("#detailsAuditor").empty();
    $.get(routeAuditorias('routeGetAuditores') + '?id_audit=' + id_audit, function(resultados){
        $("#auditores").append('<div class="col-sm-12"><table id="detailsAuditor" width="100%" colspan="4">');    
        $.each(resultados, function(key, value){
            $("#detailsAuditor").append('<tr>');            
            $("#detailsAuditor").append('<td><input type="text" class="form-control form-control-sm"  value="'+ value.nome + '"/></td>');       
            $("#detailsAuditor").append('<input type="hidden" class="form-control form-control-sm" name="auditor_id[]" id="auditor_id" value="'+ value.id_auditor + '"/>');      
            $("#detailsAuditor").append('<td><input type="text" class="form-control form-control-sm " value="'+ value.cpf + '"/></td>');       
            $("#detailsAuditor").append('<td><input type="text" class="form-control form-control-sm" value="'+ value.cargo + '"/></td>');      
            $("#detailsAuditor").append('<td>');
            $("#detailsAuditor").append('<i type="button" class="fas fa-minus btn btn-danger btn-sm excluirAuditor"></i>');     
            $("#detailsAuditor").append('</td>');
            $("#detailsAuditor").append('</tr>');            
        });            
        $("#detailsAuditor").append('</table>'); 
        $("#auditor").append('</tr>'); 
    });
}

$(document).on('click', '.excluirAuditor', function(){
    let id_auditor = document.getElementById("auditor_id").value;

    let Auditor = {
        id_auditor: id_auditor,
        _method: 'DELETE'
    };

    let route = routeAuditorias('routeDeleteAuditor');
    sendAuditoria(route,Auditor);
});


  
 
 
  