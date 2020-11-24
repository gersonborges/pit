<form action="./?classe=Usuario&acao=novaSenha" method="post">

    <input type="hidden" class="form-control" id="uid"
           name="uid" value="<?= isset($_GET['uid'])?$_GET['uid']:''?>">

    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" placeholder="Digite a senha"
               name="senha"  autofocus>
    </div>
    <div class="form-group">
        <label for="confirma">Confirme a senha:</label>
        <input type="password" class="form-control" id="senha"
               placeholder="Digite a confirmação da senha"
               name="confirma">
    </div>

    <button type="submit" class="btn btn-primary">Criar nova senha</button>

</form>
