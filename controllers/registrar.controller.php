<?php

global $DB;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validacao = Validation::validate([
        "nome" => ['required'],
        "email" => ['required', 'email', 'confirmed', 'unique:usuarios'],
        "senha" => ['required', 'min:8', 'max:30', 'strong'],
    ], $_POST);

    if ($validacao->notPassed('registrar')){
        header('Location: /login');
        exit;
    }

    $resultado = $DB->query(
        query:"insert into usuarios (nome, email, senha) values (:nome, :email, :senha)",
        params: [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => password_hash($_POST['senha'], PASSWORD_BCRYPT)
        ]
    );

    flash()->push('mensagem', 'Registrado com sucesso!');

    header('location: /login');

    exit();
}

header('Location: /login');
exit;

