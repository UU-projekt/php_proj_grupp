<?php 
include "./include/bootstrap.php";
$notices = getNotices();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyheter</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body class="inter-500"> 
    <div class="header">
        <img src="logo.png" alt="logo-image" id="logo">
        <div id="header-menu">
            <a href="createad.php">Skapa annons</a>
            <a href="news.php">Nyheter</a>
            <a href="categories.php">Kategorier</a>
            <a href="login.php" id="loginbutton">Logga in</a>
        </div>
    </div>
    <div class="search-hero">          
        <p class="newsreader-900 anslagText">
            Anslag
        </p>
    </div>
    <div class="fynd">

        <div class="container">
            <div class="anslagList">  
                <div class="stack">
                <?php foreach($notices as $n): ?>
                    <div class="notice">
                        <h1><?= $n["title"] ?></h1>
                        <p> <?= $n["text"] ?> </p>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>  
        </div>
    </div>
    <?php
        include "footer.php";
    ?>
</body>
</html>