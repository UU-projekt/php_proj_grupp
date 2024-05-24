<?php 
include "./include/bootstrap.php";

if(!isset($_SESSION["user"]) /*|| $_SESSION["user"]["role"] != "admin" */) {
    redirect("/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skapa anslag</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/login.css">
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

    <div class="login-container">
        <div class="login stack">
            <?php include "./include/views/_info-box.php" ?>
            <h1>Skapa anslag</h1>
            <form onchange="validateLogin()" class="stack" method="POST" action="/api/create_notice.php">
                <div>
                    <div class="row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22 0h-20v6h1.999c0-1.174.397-3 2.001-3h4v16.874c0 1.174-.825 2.126-2 2.126h-1v2h9.999v-2h-.999c-1.174 0-2-.952-2-2.126v-16.874h4c1.649 0 2.02 1.826 2.02 3h1.98v-6z"/></svg>
                        <label>Titel:</label>
                    </div>
                    <div class="input">
                        <input type="text" minlength="5" maxlength="20" name="title" />
                    </div>
                </div>
                <div>
                    <div class="row">
                        <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m15 17.75c0-.414-.336-.75-.75-.75h-11.5c-.414 0-.75.336-.75.75s.336.75.75.75h11.5c.414 0 .75-.336.75-.75zm7-4c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-4c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-4c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75z" fill-rule="nonzero"/></svg>
                        <label>Text:</label>
                    </div>
                    <div class="input">
                        <input type="text" minlength="10" maxlength="500" name="text" />
                    </div>
                </div>

                <input id="login-btn" class="btn btn-fullwide btn-surface" type="submit" value="Lägg upp"/>
            </form>
        </div>
    </div>
    
</body>
</html>