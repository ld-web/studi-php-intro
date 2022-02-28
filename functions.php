<?php
// conversion dollar euro
// fonction qui détermine si, pour un âge donné, la personne est majeure
function isAgeLegal(int $age): bool
{
  return $age >= 18;

  // return ($age >= 18) ? true : false;

  // if ($age >= 18) {
  //   return true; // return = je sors immédiatement de la fonction
  // }

  // return false;
}

$userAge = 15;

// $age = 15; // On pourrait nommer la variable $age car elle n'a pas la même portée
// if (isAgeLegal($userAge)) {
//   echo "L'utilisateur est majeur";
// } else {
//   echo "Vous êtes mineur";
// }

echo isAgeLegal($userAge) ? "Majeur" : "Mineur";


function getParagraph(string $text, ?string $filter = null): ?string
{
  if ($filter === "uppercase") {
    $text = strtoupper($text);
  }
  return "<p>" . $text . "</p>";
}

$paragraph = getParagraph("Coucou Studi");
$uppercaseParagraph = getParagraph("Recoucou bienvenue !", "uppercase");
