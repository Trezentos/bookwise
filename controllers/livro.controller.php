<?php



$livro = Livro::get($_GET["id"]);


$avaliacoes = $DB->query(
    "select * from avaliacoes WHERE livro_id = :id",
    Avaliacao::class,
    [":id" => $_GET["id"]]
)->fetchAll();

view('livro', compact('livro', 'avaliacoes'));



