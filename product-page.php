<div?php session_start(); ?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Skapa annons</title>
            <link rel="stylesheet" href="style.css">
      </head>

      <body>
            <?php include "header.php"; ?>

            <div class="main">
                  <div id="product-view-box">
                        <?php

                        $product_id = $_GET['product_id'];

                        $db = new SQLite3("db/database.db");

                        $stmt = $db->prepare('SELECT * FROM ad 
                                          WHERE ad_id = :product_id');

                        $stmt->bindValue(':product_id', $product_id, SQLITE3_INTEGER);

                        try {
                              $result = $stmt->execute();
                              $row = $result->fetchArray();

                              $product_id = $row['ad_id'];
                              $product_img = $row['img_url'];

                              echo '
                              <div id="product_container">
                                    <div class="img-container">
                                          <img src="' . $product_img . '">
                                    </div>
                                    <div id="right-content">
                                          <h1> ' . $row['title'] . '</h1>
                                          <h3 id = "price-text">  Pris: ' . $row['price'] . '</h3>
<select name="currency" id="currency-dropdown">
  <option value="SEK">SEK</option>
  <option value="USD">USD</option>
  <option value="EUR">EUR</option>
  <option value="GBP">GBP</option>
</select>
                                          <p class="description">' . $row["description"] . '</p>
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