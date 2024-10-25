<?php

global $DB;
require 'Validacao.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validacao = Validacao::validar([
        'nome'=> ['required'],
        'email'=> ['required', 'email', 'confirmed'],
        //'senha' => ['required', 'min8', 'max30', 'strong'],
    ], $_POST);

    if ($validacao->naoPassou()){
        $_SESSION['validacoes'] = $validacao->validacoes;
        header('Location: /login');
        exit;
    }




    if(sizeof($validacoes) > 0){
        $_SESSION['validacoes'] = $validacoes;

        view('login', compact('validacoes'));
        exit();
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