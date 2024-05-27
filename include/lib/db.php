<?php

function connect() {
   // echo "DB: " . resolveDir("database.db", "/db/");
    //die();
    $con = new PDO("sqlite:" . resolveDir("database.db", "/db/"));

    return $con;
}

function createUser($email, $username, $password) {
    $c = connect();
    $stmt = $c->prepare("INSERT INTO user (email, username, password, role_id) VALUES(:email, :username, :password, 2)");
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":username", $username);
    $stmt->bindValue(":password", $password);
    $stmt->execute();
}

function getUser($email) {
    $c = connect();
    $stmt = $c->prepare("SELECT * FROM user JOIN role ON role.role_id = user.role_id WHERE email = :email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteUser($email) {
    $c = connect();
    $stmt = $c->prepare("DELETE FROM user WHERE email = :email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();
}

/*
CREATE TABLE "notices" (
	"id"	INTEGER,
	"title"	TEXT NOT NULL,
	"text"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
)
*/

function createNotice($title, $text) {
    $c = connect();

    $stmt = $c->prepare("INSERT INTO notices (title, text) VALUES (:title, :text)");
    $stmt->bindValue(":title", $title);
    $stmt->bindValue(":text", $text);
    $stmt->execute();
}

function getNotices() {
    $c = connect();
    $stmt = $c->prepare("SELECT * FROM notices ORDER BY id DESC");
    $stmt->execute();

    return $stmt->fetchAll();
}