<?php
include_once("config/funcoes_auxiliares.php")
?>
<div class="container pt-4 pb-5 bg-light">
    
    <h2 class="border-bottom border-2 border-primary">
        <?= ucfirst($dados['op']) ?> produtos 
    </h2>

    <form action="index.php?p=produtos&op=<?= $dados['op']; ?>" method="post">
        <div class="mb-3">
            <label for="produtos_nome" class="form-label"> Produto </label>
            <input type="text" class="form-control" name="produtos_nome" value="<?= $dados['produtos']->produtos_nome; ?>"  id="produtos_nome">
        </div>

        <div class="mb-3">
            <label for="produtos_preco_custo" class="form-label"> Preço de custo R$ </label>
            <input type="text" class="form-control"  name="produtos_preco_custo" value="<?= moedaReal($dados['produtos']->produtos_preco_custo); ?>" id="produtos_preco_custo">
        </div>

        <div class="mb-3">
            <label for="produtos_preco_venda" class="form-label"> Preço de venda R$ </label>
            <input type="text" class="form-control"  name="produtos_preco_venda" value="<?= moedaReal($dados['produtos']->produtos_preco_venda); ?>" id="produtos_preco_venda">
        </div>

        <div class="mb-3">
            <label for="produtos_categorias_id" class="form-label"> Categoria</label>
            <select class="form-control"  name="produtos_categorias_id" id="produtos_categorias_id">
                <?php
                
                foreach($dados['categorias'] as $categorias){
                    $selected = "";
                    if($categorias->categorias_id == $dados['produtos']->produtos_categorias_id){
                        $selected = "selected";
                    }
                ?>
                        <option value="<?= $categorias->categorias_id; ?>" <?= $selected ?> ><?= $categorias->categorias_nome; ?></option>  
                <?php
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="produtos_descricao" class="form-label"> Descrição</label>
            <textarea class="form-control"  name="produtos_descricao" id="produtos_descricao"><?= $dados['produtos']->produtos_descricao; ?></textarea>
        </div>


        <input type="hidden" name="produtos_id" value="<?= $dados['produtos']->produtos_id; ?>" >

        <div class="mb-3">
            <input class="btn btn-success" type="submit" name="<?= $dados['op']; ?>" value="<?= ucfirst($dados['op']) ?>">
        </div>
    
    </form>

</div>
