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
        <form class="d-flex" action="index.php?p=usuarios&op=pesquisar" role="search" method="POST">
            <input class="form-control me-2" name="pesquisar" type="search" placeholder="Pesquisar" aria-label="Search">
            <button type="submit" class="btn btn-outline-success" type="submit">pesquisar</button>
        </form>
    </div>

    <table class="table">
        <!-- Cabeçalho da tabela -->
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">E-mail</th>
                <th scope="col">
                    <a class="btn btn-primary" href="index.php?p=usuarios&op=novo">
                    Novo
                    </a>
                </th>
            </tr>
        </thead>
        <!-- Corpo da tabela -->
        <tbody class="table-group-divider">
            <?php 
            foreach($dados['usuarios'] as $usuarios ){?>
            <tr>
                <td> <?= $usuarios->usuarios_id; ?></td>
                <td> <?= $usuarios->usuarios_nome; ?></td>
                <td> <?= $usuarios->usuarios_cpf; ?></td>
                <td> <?= $usuarios->usuarios_email; ?></td>
                <td>
                    <a class="btn btn-secondary" href="index.php?p=usuarios&op=editar&id=<?= $usuarios->usuarios_id; ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?p=usuarios&op=excluir&id=<?= $usuarios->usuarios_id; ?>">Excluir</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</div>
