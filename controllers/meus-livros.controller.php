<?php

if(!auth()) {
    header("Location: /");
    exit;
}

$livros = $DB->query(
    query:"SELECT * FROM livros WHERE usuario_id = :id",
    class: Livro::class,
    params: ['id' => auth()->id])->fetchAll();


view('meus-livros', compact('livros'));
