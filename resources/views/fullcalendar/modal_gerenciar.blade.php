<div class="modal" tabindex="-1" role="dialog" id="modalGerenciar" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Incluir Auditores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="message"></div>
        <form id="formAuditoria">
          <div class="row">
            <div class="col-sm-12">
              <label>Descrição</label>
              <input type="text" class="form-control form-control-sm" name="descricao" id="descricao" required>
              <input type="hidden" class="form-control form-control-sm" name="id" id="id">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4">
                <label>Status</label>
                <select class="form-control form-control-sm" name="status" id="status">
                  <option value="#00c0ef">Agendado</option>
                  <option value="#00a65a">Confirmado</option>
                  <option value="#f0ad4e">Cancelado</option>
                </select>
            </div>
            <div class="col-sm-4">
              <label>Data Inicial</label>
              <input type="text" class="form-control form-control-sm date-mask" name="data_inicio" id="data_inicio"  required />
            </div>
            <div class="col-sm-4">
              <label>Data Final</label>
              <input type="text" class="form-control form-control-sm date-mask" name="data_fim" id="data_fim"  required/>
            </div>
          </div>
          <div class="row" id="auditores">  
            <hr>    
            <div class="col-sm-12">
              <table width="100%" id="auditor">
                <tr>
                  <td>
                    <label>Nome Auditor</label>
                    <input type="text" class="form-control form-control-sm" name="nome_auditor[]" /><input type="hidden" class="form-control form-control-sm" name="id_auditor[]" />
                  </td>
                  <td>
                    <label>CPF Auditor</label>
                    <input type="text" class="form-control form-control-sm cpf-mask" name="cpf_auditor[]" />
                  </td>
                  <td>
                    <label>Cargo Auditor</label>
                    <input type="text" class="form-control form-control-sm" name="cargo_auditor[]" />
                  </td>
                  <td>
                    <i class="fas fa-plus btn btn-success btn-sm" style="margin-top: 30px;"></i>
                  </td>
                </tr>     
              </table>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <i type="button" class="far fa-trash-alt btn btn-danger excluirAuditoria"></i>
        <i type="button" class="fas fa-check btn btn-success salvarAuditoria"></i>
      </div>
    </div>
  </div>
</div>