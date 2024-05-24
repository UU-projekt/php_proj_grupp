<?php include "./include/bootstrap.php" ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hej hallå</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="style.css">
</head>


<body class="inter-500">

    <?php include "header.php"; ?>

    <form action="trysearch.php" method="get" class="search-hero">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path
                d="M23.832 19.641l-6.821-6.821c2.834-5.878-1.45-12.82-8.065-12.82-4.932 0-8.946 4.014-8.946 8.947 0 6.508 6.739 10.798 12.601 8.166l6.879 6.879c1.957.164 4.52-2.326 4.352-4.351zm-14.886-4.721c-3.293 0-5.973-2.68-5.973-5.973s2.68-5.973 5.973-5.973c3.294 0 5.974 2.68 5.974 5.973s-2.68 5.973-5.974 5.973z" />
        </svg>
        <input type="search" placeholder="Sök på en produkt eller stad..." name="searchinput" class="search-box" />
        </input>
    </form>

    <div class="categories">
        <p>Eller välj en kategori:</p>
        <div class="list">
            <a href="categories/showcategory.php?category_id=<?php echo '1'; ?>">Sittmöbler</a>
            <a href="categories/showcategory.php?category_id=<?php echo '2'; ?>">Bord</a>
            <a href="categories/showcategory.php?category_id=<?php echo '3'; ?>">Sängar</a>
            <a href="categories/showcategory.php?category_id=<?php echo '4'; ?>">Förvaring</a>
            <a href="categories/showcategory.php?category_id=<?php echo '5'; ?>">Utemöbler</a>
            <a href="categories/showcategory.php?category_id=<?php echo '6'; ?>">Övrigt</a>
        </div>
    </div>

    <div class="fynd">
        <p class="newsreader-400 top">
            Du hittar begagnade <i>stolar, <br> bord, fåtöljer</i> och <b>mycket mer!</b>
        </p>

        <div class="container">
            <h2>Dagens fynd!</h2>
            <div class="list">
            <div class="list">
                <div class="mini-annons">
                    <div class="info">
                        <a href="/annons">
                    <div class="info">
                        <a href="/annons">
                            <h4>Subheading</h4>
                            <p>
                                <b>Test 10sek as USD: </b> <span> <?= convertCurrency(69.420, "THB") ?> </span>
                            </p>
                        </a>

                    </div>
                    <div class="img"></div>
                </div>


                <div class="mini-annons">
                    <div class="info">
                        <a href="/annons">
                    <div class="info">
                        <a href="/annons">
                            <h4>Subheading</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>
                        </a>
                    </div>
                    <div class="img"></div>
                        </a>
                    </div>
                    <div class="img"></div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div id="footer-container">

        <img src="img/footer-photo.avif" id="footer-img">

        <div class="footer-item">
            <p><b>Länkar</b></p>
            <a href="#">Om oss</a>
            <a href="#">Kontakt</a>
            <a href="#">Nyheter</a>
            <a href="#">Press</a>
        </div>

        <div class="footer-item">
            <p><b>Kategorier</b></p>
            <a href="categories/showcategory.php?category_id=<?php echo '1'; ?>">Sittmöbler</a>
            <a href="categories/showcategory.php?category_id=<?php echo '2'; ?>">Bord</a>
            <a href="categories/showcategory.php?category_id=<?php echo '3'; ?>">Sängar</a>
            <a href="categories/showcategory.php?category_id=<?php echo '4'; ?>">Förvaring</a>
            <a href="categories/showcategory.php?category_id=<?php echo '5'; ?>">Utemöbler</a>
            <a href="categories/showcategory.php?category_id=<?php echo '6'; ?>">Övrigt</a>
        </div>

    </div>

    <div id="footer-below">
        <p>Välkommen till Lilla Vardagsrummet<br>
            © 2024 Lilla Vardagsrummet.</p>
    </div>
</body>


</html>