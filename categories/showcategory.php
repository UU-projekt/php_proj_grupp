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
      echo $row['title'] . ': ' . $row['description'] . '<br>';
}

?>