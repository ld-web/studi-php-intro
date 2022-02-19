<?php
// array = tableau en PHP
$array = [1, 2, 3, 4, 1];
// var_dump($array);
// Insérer un élément au début du tableau
array_unshift($array, "Coucou");
// $array[0] = "Coucou";
// var_dump($array);

$array[10] = "Test";
// var_dump($array);

// echo $array[5];

// echo "<br />Hello ?";
$tableau = $array;
// var_dump($tableau);
// Opérateur spread : je propage les éléments se trouvant dans $array
// au sein de $monTableau
$monTableau = [...$array];
// var_dump($monTableau);

// Opérateur spread : comme le précédent mais je le fais à partir de la deuxième position
$array = ["Autre valeur", ...$array];
// var_dump($array);

$array[15] = $array[3];
unset($array[3]);
var_dump($array);

// boucles
// for (instruction d'initialisation; condition de maintien; instruction de pas)
for ($d = 1; $d < 11; $d++) {
  echo $d . " - ";
}

echo "<br />";

// foreach
foreach ($array as $element) {
  echo $element . " - ";
}

echo "<br />";

// while
$d = 1; // Instruction d'initialisation
while ($d < 11) { // Condition de maintien
  echo $d . " - ";
  $d++; // Instruction de pas
}

echo "<br />";

// do...while
// Différence avec while : on exécutera toujours la première itération
$d = 1; // Instruction d'initialisation
do {
  echo $d . " - ";
  $d++; // Instruction de pas
} while ($d < 11); // Condition de maintien

echo "<br />";

// for sur un tableau
// Peut être plus complexe à gérer si on a des clés personnalisées
for ($d = 0; $d < count($array); $d++) {
  if (array_key_exists($d, $array)) {
    // Exécution si condition est vraie (true)
    echo $array[$d] . " - ";
  } else {
    // Exécution si condition est fausse (false)
    echo "😘 - ";
  }
}
