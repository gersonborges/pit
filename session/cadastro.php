<form action="./?classe=Usuario&acao=cadastro" method="post">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Digite o email"
               name="email" autofocus>
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" placeholder="Digite a senha"
               name="senha">
    </div>
    <div class="form-group">
        <label for="confirma">Confirme a senha:</label>
        <input type="password" class="form-control" id="senha"
               placeholder="Digite a confirmação da senha"
               name="confirma">
    </div>

    <p>Já é cadastrado?<a href="#" data-dismiss="modal" data-toggle="modal"
                          data-target="#modal-login">Entrar</a></p>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>
