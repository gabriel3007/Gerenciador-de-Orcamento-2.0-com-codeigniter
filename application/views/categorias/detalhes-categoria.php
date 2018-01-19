<h2><?=$categoria->nome?></h2>
<h2><?=$categoria->saldo?></h2>
<h3>Gastos nessa categoria</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Valor</td>
            <td>Operação</td>
            <td>Descrição</td>
            <td>Data</td>
        </tr>
    </thead>
<?php foreach ($lancamentos as $lancamento): ?>
    <tr>
        <td><?=$lancamento->valor?></td>
        <td><?=$lancamento->operacao?></td>
        <td><?=$lancamento->descricao?></td>
        <td><?=dataParaPtBr($lancamento->data)?></td>
    </tr>
<?php endforeach ?>
</table>