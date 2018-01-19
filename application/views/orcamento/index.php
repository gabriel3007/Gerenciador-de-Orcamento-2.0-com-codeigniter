<h2>Lançamentos feitos</h2>
<h3>Valor total do orçamento: <?=$orcamento->valorTotal?></h3>
<h4><a class="btn btn-primary" href="orcamento/downloadExcel">Gerar tabela excel</a></h4>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Valor</td>
            <td>Operação</td>
            <td>Caregoria</td>
            <td>Descrição</td>
            <td>Data</td>
        </tr>
    </thead>
<?php foreach($orcamento->lancamentos as $lancamento):?>
    <tr>
        <td><?=$lancamento->valor?></td>
        <td><?=$lancamento->operacao?></td>
        <td><?=$lancamento->categoria->nome?></td>
        <td><?=$lancamento->descricao?></td>
        <td><?=dataParaPtBr($lancamento->data)?></td>
    </tr>
<?php endforeach ?>
</table>