<h2 class="total">Total: <strong class="info-total">0</strong></h2>


<a class="adicionar bottom-link glyphicon glyphicon-plus" href="<?=base_url('/orcamento/novoLancamento')?>"></a>
<a class="excel bottom-link glyphicon glyphicon-file" href="orcamento/downloadExcel"></a>


<form id="lista-categorias">
    <div class="form-group">
        <label for="">Filtar por categoria</label>
        <select name="categoriaSelecionada" class="form-control">
            <option value="Todos">Todos</option>
            <?php foreach($categorias as $categoria):?>
            <option class="list-group-item" value="<?=$categoria->nome?>"><?=$categoria->nome?></option>
            <?php endforeach ?>
        </select>    
    </div>
</form>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Valor</td>
            <td>Caregoria</td>
            <td>Descrição</td>
            <td>Data</td>
        </tr>
    </thead>
<?php foreach($orcamento->lancamentos as $lancamento):?>
    <tr class="lancamento">
        <td class="info-valor"><?=$lancamento->valor?></td>
        <td class="info-categoria"><?=$lancamento->categoria->nome?></td>
        <td class="info-descricao"><?=$lancamento->descricao?></td>
        <td class="info-data"><?=dataParaPtBr($lancamento->data)?></td>
    </tr>
<?php endforeach ?>
</table>
<script src="application/assets/javascript/main.js"></script> 
<script src="application/assets/javascript/filtro-tabela.js"></script>