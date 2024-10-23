<?php



$livro = $DB->query(
    query: "SELECT * FROM livros WHERE id = :id",
    class: Livro::class,
    params:[":id" => $_GET["id"]]
)->fetch();



view('livro', compact('livro'));



