<?php include "./include/bootstrap.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">

    <script src="js/validate.js" defer></script>
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
            <h1>Nytt konto</h1>
            <form onchange="validateRegister()" class="stack" method="POST" action="api/register_user.php">
                <div>
                    <label>Användarnamn:</label>
                    <div class="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-3.123 0-5.914-1.441-7.749-3.69.259-.588.783-.995 1.867-1.246 2.244-.518 4.459-.981 3.393-2.945-3.155-5.82-.899-9.119 2.489-9.119 3.322 0 5.634 3.177 2.489 9.119-1.035 1.952 1.1 2.416 3.393 2.945 1.082.25 1.61.655 1.871 1.241-1.836 2.253-4.628 3.695-7.753 3.695z"/></svg>
                        <input type="text" name="username" minlength="4" />
                    </div>
                </div>
                <div>
                    <label>Email:</label>
                    <div class="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm22 16l-6.526-6.618-3.445 3.483-3.418-3.525-6.611 6.66 5.051-8-5.051-6 10.029 7.446 9.971-7.446-4.998 6.01 4.998 7.99z"/></svg>
                        <input type="email" name="email" minlength="5" />
                    </div>
                </div>
                <div>
                    <label>Password:</label>
                    <div class="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.451 17.337l-2.451 2.663h-2v2h-2v2h-6v-1.293l7.06-7.06c-.214-.26-.413-.533-.599-.815l-6.461 6.461v-2.293l6.865-6.949c1.08 2.424 3.095 4.336 5.586 5.286zm11.549-9.337c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-3-3c0-1.104-.896-2-2-2s-2 .896-2 2 .896 2 2 2 2-.896 2-2z"/></svg>
                        <input type="password" name="password" minlength="5" />
                    </div>
                </div>

                <input id="login-btn" class="btn btn-fullwide btn-surface disabled" type="submit" value="skapa konto" disabled/>
            </form>
            <small>Har du redan ett konto? <a href="login.php">Logga in!</a></small>
        </div>
    </div>
    
</body>
</html>