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
                  $db = new SQLite3("database.db");
                  $result = $db->query('SELECT * FROM ad');
                  echo 'Senaste annonser:<br>';

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