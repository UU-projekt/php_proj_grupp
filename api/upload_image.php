<?php
include "../include/bootstrap.php";
if(!isset($_SESSION["user"])) {
    echo "inte inloggad!!!! >:(";
    die();
}

if(!isset($_FILES["image_file"])) {
    setStatus("error", "Fil saknas", "Du måste inkludera en fil");
    die();
}

$img = $_FILES["image_file"];
$img_temp = $img["tmp_name"];

if(filesize($img_temp) > 32_000_000) {
    setStatus("error", "Fil för stor", "grrrrrrrrrrrrrrrrrrrrr");
    die();
}

$res = uploadImage(file_get_contents($img_temp));

echo redirect( resolveDir("/uploadImage.php?url=" . $res["data"]["url"], "/") );