<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://context.reverso.net/translation',
    // You can set any number of default request options.
    'timeout'  => 5.0,
]);

$headers = [
    "User-Agent" => "Mozilla/5.0",
    "Content-Type" => "application/json; charset=UTF-8"
];

$response = $client->post(
    "/bst-query-service",
    [
        'headers' => $headers,
        'body' => json_encode([
            "source_text" => "а что это у вас за пример?",
            "target_text" => "",
            "source_lang" => "rffu",
            "target_lang" => "en"
        ])
    ]
);

var_dump( (string) $response->getBody());