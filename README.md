# PHP - Introduction

- [Bases](#bases)
  - [Fichiers](#fichiers)
  - [Tags d'ouverture et fermeture](#tags-douverture-et-fermeture)
  - [Bases à retenir](#bases-à-retenir)
- [Commentaires](#commentaires)
  - [Syntaxe](#syntaxe)

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
