<?php

header('X-Gustavo: Oi');

//header('Content-Type: application/json');

$headers = getAllHeaders();

if ($headers['Accept'] == 'application/json') {
    echo json_encode($headers);
} else {
    var_dump($headers);
}