<?php
if ($_SERVER["REQUEST_METHOD"]) {

      $db = new SQLite3("db/database.db");
      $categorysql = "SELECT * FROM category WHERE category_name = :category";
      $categorystatement = $db->prepare($locationsql);
      $categorystatement->bindParam(':category', $_POST['category'], SQLITE3_TEXT);
      $categoryresult = $statement->execute();

      $locationsql = "SELECT * FROM location WHERE city = :city";
      $locationstatement = $db->prepare($sqlocationsqll);
      $locationstatement->bindParam(':city', $_POST['city'], SQLITE3_TEXT);
      $locationresult = $statement->execute();

      if (!$locationresult) {
            $locationsql = "INSERT INTO location (city) VALUES (:city)";
            $locationstatement = $db->prepare($locationsql);
            $locationstatement->bindParam(':city', $_POST['city'], SQLITE3_TEXT);
            $locationresult = $statement->execute();

            $locationsql = "SELECT * FROM location WHERE city = :city";
            $locationstatement = $db->prepare($locationsql);
            $locationstatement->bindParam(':city', $_POST['city'], SQLITE3_TEXT);
            $locationresult = $statement->execute();
      }

      $usersql = "SELECT username, user_id FROM user WHERE user_id = :user_id";
      $usertatement = $db->prepare($usersql);
      $userstatement->bindParam(':user_id', $_SESSION['user_id'], SQLITE3_TEXT);
      $userresult = $statement->execute();

      $sql = "INSERT INTO ad (category_id, title, description, price, location_id, upload_date, user_id) 
      VALUES (:category_id, :title, :description, :price, :location_id, :upload_date, :user_id)";
      $statement = $db->prepare($sql);

      $upload_date = date('Y-m-d H:i');

      $statement->bindParam(':category_id', $categoryresult['category_id'], SQLITE3_INTEGER);
      $statement->bindParam(':title', $_POST['title'], SQLITE3_TEXT);
      $statement->bindParam(':description', $_POST['description'], SQLITE3_TEXT);
      $statement->bindParam(':price', $_POST['price'], SQLITE3_INTEGER);
      $statement->bindParam(':location_id', $locationresult['location_id'], SQLITE3_INTEGER);
      $statement->bindParam(':upload_date', $upload_date, SQLITE3_TEXT);
      $statement->bindParam(':user_id', $_SESSION['user_id'], SQLITE3_INTEGER);

      if ($statement->execute()) {
            echo 'HEJ HEJ HEJH JHJHJHHJHJHJHJHJHJJH';
            $db->close();
      }
} else {
      echo "Failed to create new AD.<br>";
}

?>