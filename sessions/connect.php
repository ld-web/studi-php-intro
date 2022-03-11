<?php

require_once 'functions.php';
require_once 'ConnectionErrorCode.php';

if (!empty($_POST['login']) && !empty($_POST['password'])) {
  $dbConfig = parse_ini_file('../pdo/db.ini');

  try {
    // DSN = Data Source Name
    $pdo = new PDO(
      "mysql:host=127.0.0.1;dbname=studi-php-intro;charset=utf8mb4",
      $dbConfig['DB_USER'],
      $dbConfig['DB_PASSWORD']
    );
  } catch (PDOException $e) {
    echo "La connexion à la base de données a échoué";
    exit;
  }

  $stmt = $pdo->prepare("SELECT * FROM users WHERE `login`=:login");
  $execution = $stmt->execute([
    'login' => $_POST['login']
  ]);

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  session_start();

  if ($result === false) {
    $_SESSION['connection_error_code'] = ConnectionErrorCode::INVALID_CREDENTIALS;
    redirect('login.php');
  } else {
    if (password_verify($_POST['password'], $result['password'])) {
      $_SESSION['connected'] = true;
      redirect('admin.php');
    } else {
      $_SESSION['connection_error_code'] = ConnectionErrorCode::INVALID_CREDENTIALS;
      redirect('login.php');
    }
  }
}
