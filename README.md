# PHP - Introduction

- [Bases](#bases)
  - [Fichiers](#fichiers)
  - [Tags d'ouverture et fermeture](#tags-douverture-et-fermeture)
  - [Bases à retenir](#bases-à-retenir)
- [Commentaires](#commentaires)
  - [Syntaxe](#syntaxe)
- [Constantes](#constantes)
- [Tableaux](#tableaux)
- [Comparaison et égalité, différence](#comparaison-et-égalité-différence)
- [L'inclusion de fichiers](#linclusion-de-fichiers)
- [Fonctions](#fonctions)
  - [Paramètres, valeur par défaut](#paramètres-valeurs-par-défaut)
  - [Valeur de retour](#valeur-de-retour)
- [Programmation orientée objet](#programmation-orientée-objet)
  - [Les classes](##les-classes)
  - [1. Définition d'une classe](#1-définition-dune-classe)
    - [Attributs & méthodes](#attributs--méthodes)
    - [Portées](#portées)
    - [Encapsulation](#encapsulation)
  - [2. Instanciation d'objets de classes](#2-instanciation-dobjets-de-classes)
  - [Constructeur](#constructeur)
  - [Constantes de classe](#constantes-de-classe)

## Bases

### Fichiers

Le fichier par défaut est `index.php`.

Dans notre exemple, avec WampServer, si on crée un nouveau dossier `studi-php-intro` à la racine du serveur web (dossier `www`), alors on pourra accéder à la page `index.php` automatiquement en allant consulter la page `http://localhost/studi-php-intro`.

Si on crée une autre page `test.php` dans le dossier `studi-php-intro`, alors on pourra y accéder en consultant la page `http://localhost/studi-php-intro/test.php`.

### Tags d'ouverture et fermeture

Pour écrire du code PHP, on doit utiliser la balise d'ouverture `<?php`

Si on écrit du PHP dans du HTML, on doit bien séparer les sections de code PHP en les refermant avec `?>`

Exemple :

```php
//...
<body>
  <h1><?php echo "Coucou"; ?></h1>
  <?php
  $numero = 1;
  echo "Numéro : $numero<br />";
  echo '$numero<br />';
  echo 'Numéro : ' . $numero . '<br />';
  ?>

  <br />
//...
```

### Bases à retenir

> - Les variables commencent par le caractère `$`
> - Les instructions se terminent par un `;`
> - On peut utiliser les guillemets doubles `"` ou simples `'` pour délimiter une chaîne de caractères
> - Quand on utilise des guillemets doubles, on peut directement insérer des variables dans la chaîne, sans les concaténer
> - L'opérateur de concaténation de chaîne en PHP est le point `.`

## Commentaires

En PHP, comme dans n'importe quel langage, il est possible de **commenter** son code.

### Syntaxe

Il y a deux syntaxes possibles :

- Commentaire sur une seule ligne : `// Mon commentaire`
- Commentaire sur plusieurs lignes :

```php
/*
Première ligne
Seconde ligne
*/
```

## Constantes

Une constante en PHP se définir par une valeur **non modifiable**. On peut la déclarer avec le mot-clé `const`.

> On peut aussi utiliser la méthode `define` de la SPL (Standard Php Library)

```php
const MA_CONSTANTE = 4;
```

- Une constante n'est pas préfixée par `$`, comme les variables
- On écrira le nom d'une constante en majuscules

## Tableaux

Un tableau est une suite de valeurs accolées sous forme de **collection**. C'est une structure de données très courante dans les langages de programmation.

```php
<?php
// Déclaration d'un tableau
$monTableau = [1, 2, 3];
```

Chaque élément d'un tableau est **indexé**. Dans l'exemple ci-dessus, les indexes (ou bien **clés**) du tableau sont numérotés automatiquement **à partir de 0**.

Si on veut accéder au premier élément, on écrira donc :

```php
<?php
// Utiliser les crochets pour accéder à l'élément d'un tableau
echo $monTableau[0];

// On peut remplacer 0 par une variable ou une expression
// Par exemple, si je souhaite accéder au dernier élément
$nbElements = count($monTableau);
$derniereValeur = $monTableau[$nbElements - 1];
```

On peut également personnaliser les clés du tableau. Cela constitue alors un **tableau associatif**, ou bien **tableau clé/valeur**.

```php
// Tableau associatif
// Clés / Valeurs
// On spécifie nous-mêmes les clés
$arrayIndexes = [2 => 1, "autre test" => 4];
```

Dans ce cas, on pourra accéder à un élément en indiquant sa clé, même personnalisée ou de type `string` :

```php
$value = $arrayIndexes["autre test"]; // $value contiendra la valeur 4
```

Plusieurs structures de contrôle permettent d'effectuer des actions sur les tableaux (affichage, manipulation).

Généralement, on va utiliser des **boucles** pour afficher chaque élément d'un tableau.

> Voir le fichier `array.php` :
>
> - `for`
> - `while`
> - `foreach`
> - `do...while`

## Comparaison et égalité, différence

Quand on veut vérifier qu'une valeur est égale à une autre en PHP, on va utiliser l'opérateur de comparaison `==`.

On peut également tester l'égalité de manière plus **stricte**, en comparant **à la fois la valeur et le type** des variables. Dans ce cas, on va utiliser `===`.

```php
$a = "3"; // type string
$b = 3; // type int

$a == $b; // Vrai => comparaison sur les valeurs
$a === $b; // Faux => comparaison sur les valeurs ET le type, les types sont différents
```

L'opérateur "différent de" en PHP est `!=`. De la même façon, on pourra comparer de manière stricte 2 variables en utilisant `!==`.

## L'inclusion de fichiers

En PHP, il est possible d'inclure un fichier dans un autre, à l'aide de plusieurs méthodes de la SPL.

Les deux plus couramment utilisées sont [`require`](https://www.php.net/manual/fr/function.require.php) et [`require_once`](https://www.php.net/manual/fr/function.require-once.php).

> ### Lorsqu'on inclut un fichier PHP B dans un autre fichier PHP A, alors on importe tous les symboles (constantes, variables, fonctions...) définis dans B dans le fichier A. Par ailleurs, B peut consommer n'importe quel symbole préalablement défini dans A

On va donc pouvoir séparer les différentes parties de notre script PHP en plusieurs fichiers, afin de découper plus proprement notre application, par exemple :

- Définition de données
- Réutilisation d'un élément d'interface
- Affichage d'un élément
- etc...

> Voir les fichiers `layout/header.php` et `layout/footer.php` qui sont inclus dans le fichier `list.php` par exemple

## Fonctions

Une fonction est une suite d'instructions nommée, qu'on peut appeler partout où on en a besoin.

```php
<?php
function maFonction(string $param1, string $param2 = 'defaultValue'): string
{
  // Instructions à exécuter
}
```

La ligne de définition d'une fonction contient le mot-clé `function`, le nom de la fonction, ses éventuels paramètres, et son type de retour. Il s'agit de la **signature** de la fonction.

### Paramètres, valeurs par défaut

Les paramètres d'une fonction définissent les valeurs qui seront passées en entrée par le code appelant la fonction.

Il est possible de définir des paramètres **facultatifs**, en spécifiant une valeur par défaut.

```php
<?php
// Définition de la fonction
function direBonjour(string $nom = "Sam"): void // signature de la fonction
{
  echo "BONJOUR $nom !!!";
}
```

Je peux ainsi appeler la fonction avec ou sans paramètre :

```php
direBonjour("Bob"); // avec un paramètre
direBonjour(); // sans paramètre : valeur par défaut = "Sam"
```

> Voir le fichier `functions.php`

### Valeur de retour

Une fonction peut **retourner une valeur** au code appelant, avec l'instruction `return`.

> L'instruction `return`, quand elle est utilisée, **provoque la sortie** de la fonction

```php
<?php
function getParagraphUppercase(string $text): string
{
  return "<p>" . strtoupper($text) . "</p>";
}
```

Dans ce cas, on peut récupérer la valeur retournée dans le code appelant :

```php
// on récupère et on met dans la variable $paragraph la valeur retournée depuis la fonction paragraphMajuscules
$paragraph = getParagraphUppercase("Hello world");
```

## Programmation orientée objet

La POO représente un changement de paradigme significatif. Nous allons parler dans cette partie des différentes notions à savoir pour pouvoir concevoir une architecture qui s'articule autour d'objets, capables de représenter des structures plus complexes que des variables simples (int, string, bool, etc...).

### Les classes

Pour représenter ces structures plus complexes, on peut commencer par définir des **classes** dans notre application.

Une classe représente un **nouveau type** utilisable dans notre application. C'est comme un squelette, une structure, ou un template, si vous voulez, qui représente une notion complexe présente dans notre application.

Par exemple, si nous voulons manipuler des produits dans notre application, au lieu de définir un tableau associatif avec clés et valeurs, nous pouvons **structurer** notre application de manière plus rigoureuse en définissant un nouveau type `Produit`.

Par la suite, nous pourrons instancier des objets de type `Produit`. Nous allons donc parler dans un premier temps de la définition d'une classe, puis de l'instanciation d'objets.

#### 1. Définition d'une classe

On utilise le mot-clé `class` pour définir un nouveau type :

```php
class Produit
{}
```

##### Attributs & méthodes

Dans la définition d'une classe, on va pouvoir ajouter des **attributs**. Ces attributs appartiennent donc à la classe.

On peut généralement appliquer le verbe **avoir** quand veut déterminer les différents attributs d'une classe. Par exemple : "Un produit a un nom et un prix" nous donne donc :

```php
class Produit
{
  public $nom;
  public $prix;
}
```

> Note : à partir de PHP 7.4, il est possible de typer les attributs d'une classe : `public string $nom` par exemple

L'autre intérêt de créer de nouveaux types structurés dans notre application est de lui donner certaines **capacités**.

Ces capacités se matérialisent sous forme de **méthodes** de classe.

Par exemple, nous pourrions dire que notre classe `Produit` possède la capacité de renvoyer le prix TTC du produit, à partir de son attribut `prix` et d'un taux passé en paramètre :

```php
class Produit
{
  public $nom;
  public $prix;

  public function prixTTC(float $taux): float
  {
    return $this->prix + $this->prix * $taux;
  }
}
```

> Dans une méthode, on peut accéder aux attributs de la même classe en utilisant le mot-clé `$this`

Chaque attribut ou méthode possède une **portée** : `public`, `protected` et `private`.

##### Portées

Les portées sont définies pour indiquer au code qui va instancier un objet d'un certain type ce à quoi il peut accéder ou non.

Dans la classe `Produit` que nous avons définie plus haut, les 2 attributs sont publiques.

Cela signifie qu'on pourra y accéder directement depuis une instance d'objet avec la syntaxe suivante :

```php
$monNomDeProduit = $monInstanceDeProduit->nom;
```

Si on rend un attribut `private` ou privé, alors on ne peut plus accéder à l'attribut directement depuis une instance.

> La portée `protected` sera expliquée plus tard, dans le cadre de l'héritage.

En réalité, nous allons définir ces attributs comme `private` afin de respecter le principe d'**encapsulation**.

##### Encapsulation

L'encapsulation consiste à placer les attributs d'une classe en `private`, puis de définir des méthodes d'**accession** et de **modification** de ces attributs, ou encore des **getters** et des **setters**.

L'intérêt principal de ce principe est de permettre à la classe de garder le contrôle sur ses attributs. On décide de la façon dont on va pouvoir renvoyer un attribut à tout code extérieur manipulant une instance de cette classe.

> Un autre intérêt peut être de passer un attribut en lecture seule par exemple, donc ne pas déclarer de méthode de modification pour cet attribut. Vu que l'attribut est privé, et qu'on ne dispose que d'une méthode publique d'accession à cet attribut, alors on ne peut que le récupérer, pas le modifier

Réécriture de la classe `Produit` pour respecter le principe d'encapsulation :

```php
class Produit
{
  private $nom;
  private $prix;

  // Getter / Accesseur, pour l'encapsulation de notre attribut $nom
  public function getNom(): ?string
  {
    // Ici on décide de renvoyer tout le temps le nom d'un produit en majuscules
    return strtoupper($this->nom);
  }

  // Setter / Modificateur, toujours pour l'encapsulation
  public function setNom(string $nom): void
  {
    $this->nom = $nom;
  }

  public function getPrix(): float
  {
    return $this->prix;
  }

  public function setPrix(float $prix)
  {
    $this->prix = $prix;
  }

  // Méthode utilitaire pour un produit, ne concerne pas l'encapsulation
  public function getPrixTtc(float $taux): float
  {
    return $this->prix + $this->prix * $taux;
  }
}
```

#### 2. Instanciation d'objets de classes

Une fois notre structure définie, à l'extérieur de la classe, nous avons la possibilité d'instancier et manipuler des produits. Pour ça, on peut tout simplement déclarer une variable et utiliser le mot-clé `new` avec le type souhaité :

```php
$produit = new Produit();
```

Une fois qu'on possède une instance de classe, on a accès à ses méthodes **publiques** :

```php
$produit->setNom("Téléviseur");
echo $produit->getNom(); // Affichera "Téléviseur"

$produit->setPrix(800);
echo $produit->getPrixTTC(0.2); // Affichera 960
```

#### Constructeur

Lors de l'instanciation d'une classe, on peut vouloir initialiser certaines valeurs par exemple. Pour cela, il est possible de définir un **constructeur** de classe, méthode qui s'exécutera automatiquement lors de l'instanciation de la classe :

```php
class Produit
{
  // ...

  public function __construct(string $nom = "Téléviseur")
  {
    $this->nom = $nom;
  }
}
```

Pour utiliser le constructeur, on peut alors instancier notre objet avec des paramètres, comme si on appelait une fonction :

```php
// Mon produit aura pour nom "Téléphone", mais si j'avais instancié mon produit sans passer d'argument il se serait automatiquement appelé "Téléviseur"
$produit = new Produit("Téléphone");
```

> En PHP, le constructeur d'une classe s'appelle une méthode **magique**, tout simplement car elle est automatiquement appelée dans un certain contexte (ici l'instanciation d'un objet de cette classe). Le nom d'une méthode magique est toujours précédé de 2 "underscores", caractère `_`

#### Constantes de classe

Il est possible de définir des constantes dans une classe. Cela peut être utile pour centraliser des données qu'on ne souhaite pas modifier au niveau de la classe elle-même, et ainsi pouvoir travailler avec dans ses différentes méthodes :

```php
<?php
class Email
{
  private string $email;

  //...

  public function getDomain(): string
  {
    $emailParts = explode('@', $this->email);
    return $emailParts[1];
  }
}

class SpamChecker
{
  private const SPAM_DOMAINS = ['youhou.com', 'mailinator.com', 'free.fr', 'hello.net'];

  public function isSpam(Email $email): bool
  {
    return array_search($email->getDomain(), self::SPAM_DOMAINS) !== false;
  }
}
```

> La manière d'accéder à une constante de classe diffère de l'accès à un attribut. Pour accéder à un attribut, on va utiliser une flèche `->` précédée du mot-clé `$this`. Pour accéder à une constante, on utilisera `self::MA_CONSTANTE` au sein de la classe, et `NomDeLaClasse::MA_CONSTANTE` en-dehors de la classe
