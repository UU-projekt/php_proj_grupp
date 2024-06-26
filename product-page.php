<div?php session_start(); ?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Skapa annons</title>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="css/index.css">
            <script src="js/script.js"></script>
      </head>

      <body class="inter-500">
            <?php include "header.php"; ?>

            <div class="main">
                  <div id="product-view-box">
                        <?php

                        include "include/bootstrap.php";

                        $product_id = $_GET['product_id'];

                        $db = new SQLite3("db/database.db");

                        $stmt = $db->prepare('SELECT * FROM ad
                                          JOIN location ON location.location_id = ad.location_id
                                          JOIN user ON user.user_id = ad.user_id 
                                          WHERE ad_id = :product_id');

                        $stmt->bindValue(':product_id', $product_id, SQLITE3_INTEGER);

                        try {
                              $result = $stmt->execute();
                              $row = $result->fetchArray();

                              $product_id = $row['ad_id'];
                              $product_img = $row['img_url'];
                              $map = isset($row["city"]) ? generateDynamicMap($row["city"]) : "";

                              echo '
                              <div id="product_container">
                                    <div class="img-container">
                                          <img src="' . $product_img . '">
                                          ' . $map . '
                                           
                                    </div>
                                    <div id="right-content">
                                          <h1> ' . $row['title'] . '</h1>
                                          ';
                                          if (isset($_GET['currency']))
                                          {
                                                echo '<h3 id="price-text">  Pris: ' . '<small>' . convertCurrency($row['price'], $_GET['currency']) .'</small>' . '</h3>';
                                          }
                                          else {
                                                echo '<h3 id="price-text">  Pris: ' . '<small>' . convertCurrency($row['price'], "SEK") .'</small>' . '</h3>';
                                          }
                              echo '<select name="currency" id="currency-dropdown" onChange="UpdateCurrency()">
  <option value="SEK">SEK</option>
  <option value="USD">USD</option>
  <option value="EUR">EUR</option>
  <option value="GBP">GBP</option>
</select>
                                          <p class="description">' . $row["description"] . '</p> <br /><br />
                                          <a class="btn btn-surface" href="mailto:' . $row["email"] . '?subject=' . "Svar på din annons '" . $row["title"] . "' (Lilla Vardagsrummet)" .'"> Besvara annons </a>
                                    </div>
                              </div><br>';

                        } catch (Exception $e) {
                              echo 'Something went wrong.';
                        }

                        ?>
                  </div>
            </div>

            <div class="footer">
            </div>

      </body>

      </html>