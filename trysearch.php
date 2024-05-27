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
                  <?php
                  $db = new SQLite3("db/database.db");
                  $searchinput = '%' . $_GET['searchinput'] . '%';

                  $sql = 'SELECT * FROM ad JOIN category ON category.category_id = ad.category_id 
                  WHERE (category_name LIKE "' 
                  . $searchinput 
                  . '" OR title + description LIKE "' . $searchinput  . '")';

                  $result = $db->query($sql);
                  echo 'Sökresultat på ' . strip_tags($_GET['searchinput']) . ':<br>';

                  while ($row = $result->fetchArray()) {
                        echo '<div class="productbox">';
                        echo 'Title: ' . $row['title'] . '<br>'
                              . 'Description: ' . $row['description'] . "<br>"
                              . 'Upload date: ' . $row['upload_date'];

                        echo '</div>';
                  }
                  $db->close();
                  ?>
            </div>

            <div class="footer">
            </div>

      </body>

      </html>