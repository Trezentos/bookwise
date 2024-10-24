<?php

global $DB;
echo $_SERVER['REQUEST_METHOD'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resultado = $DB->query(
        query:"insert into usuarios (nome, email, senha) values (:nome, :email, :senha)",
        params: [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ]
    );

    dump($resultado);

    header('location: /login?mensagem=Registrado com sucesso!');

}

view('login');