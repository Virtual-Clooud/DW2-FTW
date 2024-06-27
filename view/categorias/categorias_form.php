<div class="container pt-4 pb-5 bg-light">
    
    <h2 class="border-bottom border-2 border-primary">
        <?= ucfirst($dados['op']) ?> categorias 
    </h2>

    <form action="index.php?p=categorias&op=<?= $dados['op']; ?>" method="post">
        <div class="mb-3">
            <label for="categorias_nome" class="form-label"> Categorias </label>
            <input type="text" class="form-control" name="categorias_nome" value="<?= $dados['categorias']->categorias_nome; ?>"  id="categorias_nome">
        </div>

        <input type="hidden" name="categorias_id" value="<?= $dados['categorias']->categorias_id; ?>" >

        <div class="mb-3">
            <input class="btn btn-success" type="submit" name="<?= $dados['op']; ?>" value="<?= ucfirst($dados['op']) ?>">
        </div>
    
    </form>

</div>
