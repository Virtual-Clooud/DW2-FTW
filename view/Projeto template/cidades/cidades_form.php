<div class="container pt-4 pb-5 bg-light">
    
    <h2 class="border-bottom border-2 border-primary">
        <?= ucfirst($dados['op']) ?> cidades 
    </h2>

    <form action="index.php?p=cidades&op=<?= $dados['op']; ?>" method="post">
        <div class="mb-3">
            <label for="cidades_nome" class="form-label"> Cidade </label>
            <input type="text" class="form-control" name="cidades_nome" value="<?= $dados['cidades']->cidades_nome; ?>"  id="cidades_nome">
        </div>

        <div class="mb-3">
            <label for="cidades_uf" class="form-label"> Estado </label>
            <input type="text" class="form-control"  name="cidades_uf" value="<?= $dados['cidades']->cidades_uf; ?>" id="cidades_uf">
        </div>

        <input type="hidden" name="cidades_id" value="<?= $dados['cidades']->cidades_id; ?>" >

        <div class="mb-3">
            <input class="btn btn-success" type="submit" name="<?= $dados['op']; ?>" value="<?= ucfirst($dados['op']) ?>">
        </div>
    
    </form>

</div>
