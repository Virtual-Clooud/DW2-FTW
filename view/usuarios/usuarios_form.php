<?php
include_once("config/funcoes_auxiliares.php")
?>
<div class="container pt-4 pb-5 bg-light">
    
    <h2 class="border-bottom border-2 border-primary">
        <?= ucfirst($dados['op']) ?> usuários 
    </h2>

    <form action="index.php?p=usuarios&op=<?= $dados['op']; ?>" method="post">
        <div class="mb-3">
            <label for="usuarios_nome" class="form-label"> Nome </label>
            <input type="text" class="form-control" name="usuarios_nome" value="<?= $dados['usuarios']->usuarios_nome; ?>"  id="usuarios_nome">
        </div>

        <div class="mb-3">
            <label for="usuarios_cpf" class="form-label"> CPF </label>
            <input type="text" class="form-control"  name="usuarios_cpf" value="<?= $dados['usuarios']->usuarios_cpf; ?>" id="usuarios_cpf">
        </div>

        <div class="mb-3">
            <label for="usuarios_email" class="form-label"> E-mail </label>
            <input type="text" class="form-control"  name="usuarios_email" value="<?= $dados['usuarios']->usuarios_email; ?>" id="usuarios_email">
        </div>

        <?php if($dados['op'] == 'cadastrar'){ ?>
            <div class="mb-3">
                <label for="usuarios_senha" class="form-label"> Senha </label>
                <input type="password" class="form-control"  name="usuarios_senha" id="usuarios_senha">
            </div>
        <?php } ?>


        <input type="hidden" name="usuarios_id" value="<?= $dados['usuarios']->usuarios_id; ?>" >

        <div class="mb-3">
            <input class="btn btn-success" type="submit" name="<?= $dados['op']; ?>" value="<?= ucfirst($dados['op']) ?>">
        </div>
    
    </form>

</div>
