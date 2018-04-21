<!-- Inicio Formulario Modal EditarTarefa -->
    <div class="modal fade" id="editarTarefaModal" tabindex="-1" role="dialog" aria-labelledby="editarTareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header badge-info">
                    <h5 class="modal-title " id="editarTareModalLabel" >Editar Tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" id="formEditarTarefa" name="formEditarTarefa">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" name="editTitulo" id="editTitulo" placeholder="Titulo da Tarefa">
                                <span class='msg-erro msg-editTitulo'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data">Data</label>
                                <input type="date" class="form-control" name="editData" id="editData">
                                <span class='msg-erro msg-editData'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descrição">Descrição</label>
                                <textarea class="form-control" name="editDescricao" id="editDescricao" rows="3" placeholder="Descreva a sua Tarefa..."></textarea>
                                <span class='msg-erro msg-editDescricao'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editPrioridade">Nivel de Prioridade</label>
                                <select name="editPrioridade" id="editPrioridade">
                                    <option disabled="true" value="" selected>Selecione...</option>
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baixa"> Baixa</option>
                                </select>
                                <span class='msg-erro msg-editPrioridade'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editStatus">Andamento da Tarefa</label>
                                <select name="editStatus" id="editStatus">
                                    <option disabled="true" value="" selected>Selecione...</option>
                                    <option value="concluida">Concluida</option>
                                    <option value="não concluida">não concluida</option>
                                </select>
                                <span class='msg-erro msg-editStatus'></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-info">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!--Fim Formulario Modal Editar Tarefa-->