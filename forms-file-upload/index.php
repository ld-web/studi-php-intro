<?php
if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
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

  if (isset($_FILES['profile_pic']) && is_uploaded_file($_FILES['profile_pic']['tmp_name'])) {
    $uploadDir = 'profile_pics' . DIRECTORY_SEPARATOR;
    $fileInfo = pathinfo($_FILES['profile_pic']['name']);
    $filename = $fileInfo['filename'] . '_' . mt_rand() . '.' . $fileInfo['extension'];
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $uploadDir . $filename);
  }

  // TODO: Gestion d'erreurs (check false, exceptions) + validation (htmlentities...)
  $stmt = $pdo->prepare("INSERT INTO users (name, firstname, login, email, password, profile_pic) VALUES (:name, :firstname, :login, :email, :password, :profile_pic)");
  $stmt->execute([
    'name' => $_POST['name'] ?? "",
    'firstname' => $_POST['firstname'] ?? "",
    'login' => $_POST['login'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'profile_pic' => $filename
  ]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forms & File Upload</title>
</head>

<body>
  <form method="POST" enctype="multipart/form-data">
    <div>
      <label for="name">Nom :</label>
      <input type="text" name="name" id="name" />
    </div>
    <div>
      <label for="firstname">Prénom :</label>
      <input type="text" name="firstname" id="firstname" />
    </div>
    <div>
      <label for="login">Login :</label>
      <input type="text" name="login" id="login" required />
    </div>
    <div>
      <label for="email">Email :</label>
      <input type="email" name="email" id="email" required />
    </div>
    <div>
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" id="password" required />
    </div>
    <div>
      <label for="profile_pic">Photo de profil :</label>
      <input type="file" name="profile_pic" id="profile_pic" />
    </div>
    <div>
      <input type="submit" value="Enregistrer" />
    </div>
  </form>
</body>

</html>