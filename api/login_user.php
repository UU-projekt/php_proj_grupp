<?php
include "../include/bootstrap.php";

$url = "/index.php";

if(isset($_POST["afterAuth"])) {
    if(str_starts_with(trim($_POST["afterAuth"]), "http")) {
        setStatus("error", "afterAuth", "afterAuth försökte länka till extern sida. Stoppar inloggning av säkerhetsskäl");
        redirect("/login.php");
        die();
    }
    $url = $_POST["afterAuth"];
}

if(!isset($_POST["email"]) || !isset($_POST["password"])) {
    setStatus("error", "validering: fält", "obligatoriska fält saknas");
    redirect("/login.php");
    die();
}

$email = $_POST["email"];
$password = $_POST["password"];

if(strlen($password) < 5) {
    setStatus("error", "validering: lösenord", "ditt lösenord är för kort");
    redirect( "login.php" );
    die();
}

$user = getUser($email);

if(empty($user)) {
    setStatus("error", "inget konto", "hittade inget konto med detta email");
    redirect( "login.php" );
    die();
}

$hash = $user["password"];

if(password_verify($password, $hash)) {
    unset($user["password"]);
    $_SESSION["user"] = $user;
    redirect($url);
    die();
} else {
    setStatus("error", "fel lösenord", "lösenordet var inte korrekt");
    redirect( "login.php" );
    die();
}