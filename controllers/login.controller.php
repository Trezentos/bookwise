<?php
global $DB;

// 1. Receber o formulário com email e senha
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';


    $validacao = Validation::validate([
        'email' => ['required', 'email'],
        'senha' => ['required'],
    ], $_POST);

    if ($validacao->notPassed('login')) {
        header('Location: login');
        exit;
    }


    // 2. Fazer uma consulta no banco de dadaos com o email e senha
    $usuario = $DB->query(
        query: "SELECT * FROM usuarios WHERE email = :email",
        class: Usuario::class,
        params:  compact('email')
    )->fetch();

}

// 3. Se existir, vamos adicionar na sessão que o usuário está autenticado
if(isset($usuario)){

    if (!password_verify($_POST['senha'], $usuario->senha)){
        flash()->push('validacoes_login', ['Email ou senha incorreto']);
        header('Location: /login');
        exit;
    }

    $_SESSION['auth'] = $usuario;

    flash()->push('mensagem','Seja muito bem viado '.$usuario->nome.' 👨🥰');

    header('location: /');
    exit();
}



// 4. mudar a informação no nosso navbar pra mostrar o nome do usuário

view('login');