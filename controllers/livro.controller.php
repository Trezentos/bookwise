<?php



$livro = $DB->query(
    query: "SELECT * FROM livros WHERE id = :id",
    class: Livro::class,
    params:[":id" => $_REQUEST["id"]]
)->fetch();

$avaliacoes = $DB->query(
    "select * from avaliacoes WHERE livro_id = :id",
    Avaliacao::class,
    [":id" => $_GET["id"]]
)->fetchAll();

view('livro', compact('livro', 'avaliacoes'));



