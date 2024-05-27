<div?php session_start(); ?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Skapa annons</title>
            <link rel="stylesheet" href="../style.css">
      </head>

      <body>
            <div class="header">
                  <a href="../index.php">
                        <div id="logotext">
                              <h2>LILLA <br>VARDAGSRUMMET</h2>
                        </div>
                  </a>

                  <ul id="header-menu">
                        <li class="menu-item">
                              <a href="../createad.php">Skapa annons</a>
                        </li>
                        <li class="menu-item">
                              <a href="../news.php">Nyheter</a>
                        </li>

                        <li class="menu-item">Kategorier
                              <ul id="categories-drop-down-menu">
                                    <li class="drop-down-item">
                                          <a href="showcategory.php?category_id=<?php echo '2'; ?>">Bord</a>
                                    </li>
                                    <li class="drop-down-item">
                                          <a
                                                href="showcategory.php?category_id=<?php echo '3'; ?>">Sängar</a>
                                    </li>
                                    <li class="drop-down-item">
                                          <a
                                                href="showcategory.php?category_id=<?php echo '4'; ?>">Förvaring</a>
                                    </li>
                                    <li class="drop-down-item">
                                          <a
                                                href="showcategory.php?category_id=<?php echo '1'; ?>">Sittmöbler</a>
                                    </li>
                                    <li class="drop-down-item">
                                          <a
                                                href="showcategory.php?category_id=<?php echo '5'; ?>">Utemöbler</a>
                                    </li>
                                    <li class="drop-down-item">
                                          <a
                                                href="showcategory.php?category_id=<?php echo '6'; ?>">Övrigt</a>
                                    </li>
                              </ul>
                        </li>

                        <li class="menu-item" id="loginbutton">
                              <a href="../login.php">Logga in</a>
                        </li>
                  </ul>
            </div>

            <div class="main">
                  <?php
                  $category_id = $_GET['category_id'];
                  $db = new SQLite3("../db/database.db");

                  $stmt = $db->prepare('SELECT * 
                                          FROM ad 
                                          JOIN category ON ad.category_id = category.category_id
                                          WHERE category.category_id = :category_id');

                  $stmt->bindValue(':category_id', $category_id, SQLITE3_INTEGER);

                  $result = $stmt->execute();

                  while ($row = $result->fetchArray()) {
                        echo '<div class="feed-box">' 
                        . '<div class="title-container">' 
                             . $row['title'] 
                        . '</div> ' 
                        . '<div class="img-and-description-container">'
                              . '<div class="img-container">image</div>'
                              . '<p class="description">' . $row['description'] . '</p>'
                        . '</div><br>
                        </div>';
                  }

                  ?>
            </div>

            <div class="footer">
            </div>

      </body>

      </html>