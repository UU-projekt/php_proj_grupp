<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $db = new SQLite3("db/database.db");
      $categorysql = "SELECT * FROM category WHERE category_name = :category";
      $categorystatement = $db->prepare($categorysql);
      $categorystatement->bindParam(':category', $_POST['category'], SQLITE3_TEXT);
      $categoryresult = $categorystatement->execute();
      $categoryrow = $categoryresult->fetchArray(SQLITE3_ASSOC);

      $locationsql = "SELECT * FROM location WHERE city = :city";
      $locationstatement = $db->prepare($locationsql);
      $locationstatement->bindParam(':city', $_POST['city'], SQLITE3_TEXT);
      $locationresult = $locationstatement->execute();
      $locationrow = $locationresult->fetchArray(SQLITE3_ASSOC);

      if (!$locationrow) {
            $locationsql = "INSERT INTO location (city) VALUES (:city)";
            $locationstatement = $db->prepare($locationsql);
            $locationstatement->bindParam(':city', $_POST['city'], SQLITE3_TEXT);
            $locationresult = $locationstatement->execute();

            $locationsql = "SELECT * FROM location WHERE city = :city";
            $locationstatement = $db->prepare($locationsql);
            $locationstatement->bindParam(':city', $_POST['city'], SQLITE3_TEXT);
            $locationresult = $locationstatement->execute();
            $locationrow = $locationresult->fetchArray(SQLITE3_ASSOC);
      }

      /*
      $usersql = "SELECT username, user_id FROM user WHERE user_id = :user_id";
      $usertatement = $db->prepare($usersql);
      $userstatement->bindParam(':user_id', $_SESSION['user_id'], SQLITE3_TEXT);
      $userresult = $statement->execute();
      */

      $sql = "INSERT INTO ad (category_id, title, description, price, location_id, upload_date) 
      VALUES (:category_id, :title, :description, :price, :location_id, :upload_date)";
      $statement = $db->prepare($sql);

      $upload_date = date('Y-m-d H:i');

      $statement->bindParam(':category_id', $categoryrow['category_id'], SQLITE3_INTEGER);
      $statement->bindParam(':title', $_POST['title'], SQLITE3_TEXT);
      $statement->bindParam(':description', $_POST['description'], SQLITE3_TEXT);
      $statement->bindParam(':price', $_POST['price'], SQLITE3_TEXT);
      $statement->bindParam(':location_id', $locationrow['location_id'], SQLITE3_INTEGER);
      $statement->bindParam(':upload_date', $upload_date, SQLITE3_TEXT);

      if ($statement->execute()) {
            echo 'HEJ HEJ HEJH JHJHJHHJHJHJHJHJHJJH';
            $db->close();
      }
} else {
      echo "Failed to create new AD.<br>";
}

?>