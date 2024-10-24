<?php

function view($view, $data = []){

    foreach ($data as $key => $value) {
        $$key = $value;
    }

    return require "views/template/app.php";
}

function dd(...$var){
    dump($var);
    die();
}

function dump(...$var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function abort($code){
    http_response_code($code);

    view($code);

    die();
}