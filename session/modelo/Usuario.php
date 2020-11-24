public function registra($email, $senha, $confirma)
{

    unset($_SESSION['usuario']);

    $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?");
    $sql->execute([$email]);
    $row = $sql->fetchObject();

    if ($row) {
        $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Email já cadastrado, tente outro</div>";
    } else {
        if (strlen($senha) < 6) {
            $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Senha inválida, deve ter pelo menos 6 caracteres</div>";
        } else if ($senha != $confirma) {
            $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro:</b> Senha e confirmação devem ser iguais</div>";
        } else {
            $sql = $this->con->prepare("INSERT INTO usuario (email, senha, nivel) VALUES(?, ?, 'visitante')");
            $sql->execute([$email, SHA1($senha)]);

            $erro = $sql->errorInfo()[2];

            $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?");
            $sql->execute([$email]);
            $row = $sql->fetchObject();

            if ($row) {
                $_SESSION['usuario'] = $row;
                header("Location:  ../");
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> Email não encontrado: [$email][$erro] </div>";
            }

        }
    }

}


public function autentica($email, $senha)
{

    unset($_SESSION['usuario']);

    $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?");
    $sql->execute([$email]);
    $row = $sql->fetchObject();

    if ($row) {
        if (SHA1($senha) == $row->senha) {
            $_SESSION['usuario'] = $row;
            return 1;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> Senha inválida</div>";
            return 0;
        }
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'><b>Acesso negado</b> Usuário não encontrado</div>";
        return 0;
    }

}

public function reseta($email)
{

    $to = "$email";
    $uid = SHA1($email);

    $subject = "Criar nova senha";

    $message = "
    <html>
    <head>
    <title>Criar nova senha</title>
    </head>
    <body>
    <p>Clique no link abaixo para criar uma nova senha</p>
    <p>http://plixsite.net/curso/php/acessorestrito?uid=$uid</p>
    </body>
    </html>
    ";

    // Sempre cofigure o content-type quando for enviar email HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <webmaster@plixsite.net>' . "\r\n";

    if ( mail($to, $subject, $message, $headers) ){
        $_SESSION['msg'] = "<div class='alert alert-success'>Um email com as instruções de como criar a nova senha foi enviado para: [$email]</div>";
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger'>Ocorreu um erro no envio do email, tente novamente.</div>";
    }

}

