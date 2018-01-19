<h2>Categorias</h2>
<h3><a class="btn btn-primary" href="<?=base_url('categorias/adicionar')?>">Adicionar categoria</a></h3>
<h3><a class="btn btn-primary" href="/categorias/downloadExcel">Gerar Excel</a></h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categorias as $categoria): ?>
        <tr>
            <td><a href="/categorias/<?=$categoria->id?>"><?=$categoria->nome?></a></td>
            <td><?=$categoria->saldo?></td>
            <td><a href="<?=base_url('categorias/editar/').$categoria->id?>">Editar</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>