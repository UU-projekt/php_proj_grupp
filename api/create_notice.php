<?php
include "../include/bootstrap.php";

if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != "Admin" ) {
    echo "AAAAAAAAAAAAA 🤣🤣🤣🤣🤣🤣🤣";
    die();
}

if(!isset($_POST["title"]) || !isset($_POST["text"])) {
    setStatus("error", "Fel", "saknar titel eller text");
    die();
}

$title  = $_POST["title"];
$text   = $_POST["text"];

$tlen = strlen($title);
if($tlen > 20 || $tlen < 5) {
    setStatus("error", "validering", "titeln var för kort eller för långt idk");
    die();
}

$ttxt = strlen($text);
if($ttxt > 500 || $ttxt < 10) {
    setStatus("error", "validering", "titeln var för kort eller för långt idk");
    die();
}

try {
    createNotice($title, $text);
    redirect("../anslag.php");
} catch(Exception $e) {
    setStatus("error", "OOPSIE POOPSIE", $e->getMessage());
    redirect("../post_notice.php");
    die();
}