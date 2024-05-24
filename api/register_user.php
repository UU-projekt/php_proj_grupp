<?php
include "../include/bootstrap.php";

if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["username"])) {
    setStatus("error", "validering: fält", "obligatoriska fält saknas");
    redirect("../login.php");
    die();
}

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];


if(strlen($password) < 5) {
    setStatus("error", "validering: lösenord", "ditt lösenord är för kort");
    redirect( "/register.php" );
    die();
}

if(strlen($username) < 5) {
    setStatus("error", "validering: användarnamn", "ditt användarnamn är för kort");
    redirect( "/register.php" );
    die();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setStatus("error", "validering: email", "din email är felformaterad");
    redirect( "/register.php" );
    die();
}

try {
    createUser($email, $username, password_hash($password, null));
    redirect("/login.php?email=" . $email);
} catch(Exception $e) {
    setStatus("error", "fel", "epost-addressen är redan tagen <small>(" . $e->getMessage() . ")</small>");
    redirect( "/register.php" );
    die();
}