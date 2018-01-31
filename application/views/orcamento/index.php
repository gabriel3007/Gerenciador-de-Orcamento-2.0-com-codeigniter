<h2>Total: <strong class="info-total">0</strong></h2>
<label for="filtro-data">Filtrar pela data</label>
<input class="form-control" type="date" id="filtro-data">
<h4><a class="btn btn-primary" href="orcamento/downloadExcel">Gerar tabela excel</a></h4>
<ul class="list-group" id="lista-categorias">
<li class="list-group-item">Todos</li>
<?php foreach($categorias as $categoria):?>
    <li class="list-group-item"><?=$categoria->nome?></li>
<?php endforeach ?>
</ul>
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
<script src="application/assets/javascript/muda-cor-lancamentos.js"></script> 
<script src="application/assets/javascript/filtro-tabela.js"></script>