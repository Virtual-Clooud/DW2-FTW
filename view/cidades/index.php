<div class="container pt-4 pb-5 bg-light">
    <h2 class="border-bottom border-2 border-primary">
         Cidades 
    </h2>

    <?php
     // Mensangem de retorno
     if($dados['msg'] != ''){
        echo msg($dados['msg']['texto'], $dados['msg']['color']); 
    } 

    ?>
    <div class="container-fluid p-3">
        <form class="d-flex" action="index.php?p=cidades&op=pesquisar" role="search" method="POST">
            <input class="form-control me-2" name="pesquisar" type="search" placeholder="Pesquisar" aria-label="Search">
            <button type="submit" class="btn btn-outline-success" type="submit">pesquisar</button>
        </form>
    </div>

    <table class="table">
        <!-- Cabeçalho da tabela -->
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">
                    <a class="btn btn-primary" href="index.php?p=cidades&op=novo">
                    Novo
                    </a>
                </th>
            </tr>
        </thead>
        <!-- Corpo da tabela -->
        <tbody class="table-group-divider">
            <?php 
            foreach($dados['cidades'] as $cidades ){?>
            <tr>
                <td><?= $cidades->cidades_id; ?></td>
                <td><?= $cidades->cidades_nome; ?></td>
                <td><?= $cidades->cidades_uf; ?></td>
                <td>
                    <a class="btn btn-secondary" href="index.php?p=cidades&op=editar&id=<?= $cidades->cidades_id; ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?p=cidades&op=excluir&id=<?= $cidades->cidades_id; ?>">Excluir</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</div>
