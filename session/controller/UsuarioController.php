public function cadastro()
{
    $usuario = new Usuario();
    $usuario->registra($_POST['email'], $_POST['senha'], $_POST['confirma']);

    header("Location: ./?modal=cadastro");
}

public function login()
{

    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $obj = new Usuario();
        $obj->autentica($_POST['email'], $_POST['senha']);

        if (isset($_SESSION['usuario'])) {
            header("Location: ./arearestrita");
        } else {
            header("Location: ./?modal=login");
        }
    } else {
        header("Location: ./?modal=login");
    }

}


public function senha()
{

    $obj = new Usuario();
    $obj->reseta($_POST['email']);

    header("Location: ./?modal=senha");

}
