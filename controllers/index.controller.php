<?php

$pesquisar = $_REQUEST['pesquisar'] ?? '';


$livros = $DB->query(
    query: "SELECT * FROM livros where titulo like :filtro",
    class: Livro::class,
    params: ['filtro' => "%$pesquisar%"]
)->fetchAll();

view('index', compact('livros'));

