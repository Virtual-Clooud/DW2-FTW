<div class="container pt-4 pb-5">
    <div class="mx-auto w-50 mt-5 p-3">
        <h2 class="border-bottom border-2 border-primary text-center">
            Entrar no Sistema 
        </h2>

        <form action="index.php?p=login&op=logar" method="post">
            <div class="mb-3">
                <label for="login" class="form-label"><i class="bi bi-person-badge"></i> Login </label>
                <input type="text" class="form-control" name="login" value="<?= $dados['login']->login; ?>"  id="login">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label"><i class="bi bi-file-lock"></i> Senha </label>
                <input type="password" class="form-control"  name="senha" value="<?= $dados['login']->senha; ?>" id="senha">
            </div>

            <div class="text-center mt-5 mb-3">
                <button class="btn btn-success px-5"><i class="bi bi-box-arrow-in-right"></i> Login</button>
            </div>
        
        </form>
    </div>
</div>
