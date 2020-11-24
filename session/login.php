<form action="./?classe=Usuario&acao=login" method="post">
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

    <p>Ainda não é cadastrado?<a href="#" data-dismiss="modal" data-toggle="modal"
                                 data-target="#modal-cadastro">Cadastrar</a></p>

    <p>Esqueceu a sua senha? <a href="#" data-dismiss="modal" data-toggle="modal"
                                data-target="#modal-senha">Criar nova senha</a></p>

    <button type="submit" class="btn btn-primary">Entrar</button>

</form>
