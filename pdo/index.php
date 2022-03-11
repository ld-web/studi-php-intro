<?php

try {
  // DSN = Data Source Name
  $pdo = new PDO(
    "mysql:host=127.0.0.1;dbname=studi-php-intro;charset=utf8mb4",
    "studi-php-intro",
    "EaDSAByJRez9n5A3"
  );
} catch (PDOException $e) {
  echo "La connexion à la base de données a échoué";
  exit;
}

var_dump($pdo);

$query = "SELECT * FROM users";
$stmt = $pdo->query($query);
$row = $stmt->fetch(PDO::FETCH_ASSOC); // row = ligne
var_dump($row);
