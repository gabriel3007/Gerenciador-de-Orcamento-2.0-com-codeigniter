<h2>Categorias</h2>
<a class="adicionar bottom-link glyphicon glyphicon-plus" href="<?=base_url('categorias/adicionar')?>"></a>
<a class="excel bottom-link glyphicon glyphicon-file" href="/categorias/downloadExcel"></a>
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