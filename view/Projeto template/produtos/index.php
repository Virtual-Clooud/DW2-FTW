<div class="container pt-4 pb-5 bg-light">
    <h2 class="border-bottom border-2 border-primary">
         Produtos 
    </h2>

    <?php
     // Mensangem de retorno
     if($dados['msg'] != ''){
        echo msg($dados['msg']['texto'], $dados['msg']['color']); 
    } 

    ?>
    <div class="container-fluid p-3">
        <form class="d-flex" action="index.php?p=produtos&op=pesquisar" role="search" method="POST">
            <input class="form-control me-2" name="pesquisar" type="search" placeholder="Pesquisar" aria-label="Search">
            <button type="submit" class="btn btn-outline-success" type="submit">pesquisar</button>
        </form>
    </div>

    <table class="table">
        <!-- Cabeçalho da tabela -->
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">Preço de Custo</th>
                <th scope="col">Preço de Venda</th>
                <th scope="col">Categoria</th>
                <th scope="col">
                    <a class="btn btn-primary" href="index.php?p=produtos&op=novo">
                    Novo
                    </a>
                </th>
            </tr>
        </thead>
        <!-- Corpo da tabela -->
        <tbody class="table-group-divider">
            <?php 
            foreach($dados['produtos'] as $produtos ){?>
            <tr>
                <td><?= $produtos->produtos_id; ?></td>
                <td><?= $produtos->produtos_nome; ?></td>
                <td> R$ <?= moedaReal($produtos->produtos_preco_custo); ?></td>
                <td> R$ <?= moedaReal($produtos->produtos_preco_venda); ?></td>
                <td><?= $produtos->categorias_nome; ?></td>
                <td>
                    <a class="btn btn-secondary" href="index.php?p=produtos&op=editar&id=<?= $produtos->produtos_id; ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?p=produtos&op=excluir&id=<?= $produtos->produtos_id; ?>">Excluir</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</div>
