<?php

function connect() {
    $con = new PDO("sqlite:" . resolveDir("database.db", "/db/"));

    return $con;
}

function createUser($email, $username, $password) {
    $c = connect();
    $stmt = $c->prepare("INSERT INTO users (email, username, password) VALUES(:email, :username, :password)");
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":username", $username);
    $stmt->bindValue(":password", $password);
    $stmt->execute();
}

function getUser($email) {
    $c = connect();
    $stmt = $c->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteUser($email) {
    $c = connect();
    $stmt = $c->prepare("DELETE FROM users WHERE email = :email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();
}