<?php

function uploadImage($image) {
    $key = "8ca92f1d03695d950269da443cc292aa";
    $url = "https://api.imgbb.com/1/upload" . "?key=" . $key;



    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query([ "image" => base64_encode($image) ]),
        ],
    ];

    $context = stream_context_create($options);

    $res = file_get_contents($url, false, $context);

    if($res === false) {
        echo "ERROR";
        die();
    }

    $jayson = json_decode($res, true);
    
    return $jayson;
}