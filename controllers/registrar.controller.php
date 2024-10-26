<?php

global $DB;
require 'Validacao.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validacao = Validation::validate([
        "nome" => ['required'],
        "email" => ['required', 'email', 'confirmed'],
        "senha" => ['required', 'min:8', 'max:30', 'strong'],
    ], $_POST);

    if ($validacao->notPassed()){
        header('Location: /login');
        exit;
    }

    $resultado = $DB->query(
        query:"insert into usuarios (nome, email, senha) values (:nome, :email, :senha)",
        params: [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ]
    );

    header('location: /login?mensagem=Registrado com sucesso!');

}

view('login');