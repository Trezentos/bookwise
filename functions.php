<?php

function view($view, $data = []){

    foreach ($data as $key => $value) {
        $$key = $value;
    }

    return require "views/template/app.php";
}

function dd(...$var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

function abort($code){
    http_response_code($code);

    view($code);

    die();
}