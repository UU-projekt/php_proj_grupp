<?php
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


function redirect($url) {
    header('Location: ' . $url);
}


// Atrib: https://stackoverflow.com/questions/1091107/how-to-join-filesystem-path-strings-in-php
function join_paths() {
    $paths = array();

    foreach (func_get_args() as $arg) {
        if ($arg !== '') { $paths[] = $arg; }
    }

    return preg_replace('#/+#','/',join('/', $paths));
}

// Leta efter root-mappen som innehåller index.php
function findBasePath($dir = null) {
    if(!isset($dir)) {
        $dir = dirname(__DIR__);
    }

    $joined = join_paths($dir, "index.php");
    if(file_exists($joined)) return $dir;
    else return findBasePath(dirname("../" . $dir));
}

function resolveDir($file, $dirs = "/include/lib/") {
    $root = findBasePath();
    return $root . $dirs . $file;
};

include resolveDir("status.php");
include resolveDir("icons.php");
include resolveDir("db.php");
include resolveDir("currency.php");
include resolveDir("map.php");
include resolveDir("uploadImage.php");