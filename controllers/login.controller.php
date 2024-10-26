<?php
global $DB;
$mensagem = $_REQUEST['mensagem'] ?? '';

        // 1. Receber o formulário com email e senha
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';


        // 2. Fazer uma consulta no banco de dadaos com o email e senha
        $usuario = $DB->query(
            query: "SELECT * FROM usuarios WHERE email = :email AND senha = :senha",
            class: Usuario::class,
            params:  compact('email', 'senha')
        )->fetch();

    }

    // 3. Se existir, vamos adicionar na sessão que o usuário está autenticado
    if(isset($usuario)){

        $_SESSION['auth'] = $usuario;
        $_SESSION['mensagem'] = 'Seja muito bem viado '.$usuario->nome.' 👨🥰';

        header('location: /');
        exit();
    }



// 4. mudar a informação no nosso navbar pra mostrar o nome do usuário

view('login', compact('mensagem'));