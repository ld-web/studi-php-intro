<?php

require_once 'functions.php';

// Si la session n'existe pas encore (n'a pas encore été démarrée)
// Alors crée un nouveau PHPSESSID, identifiant de session
// Et va l'inscrire dans les cookies
// Si la session a été préalablement démarrée (sur une autre page par exemple)
// Alors session_start récupère l'id de session et rétablit le contexte
session_start();

$connected = isset($_SESSION['connected']) && $_SESSION['connected'] === true;

if (!$connected) {
  redirect('login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administration</title>
</head>

<body>
  <h1>Bienvenue !</h1>
  <p><a href="logout.php">Déconnexion</a></p>
</body>

</html>