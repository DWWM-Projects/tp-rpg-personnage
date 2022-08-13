<?php

// configuration BDD

// PHP se connecte au SQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'tprpg');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


// PHP se connecte au SQL
try {
$db = new PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME, DB_USER, DB_PASSWORD, [
    // Paamayim Nekudotayim => Opérateur de résolution de portée ::
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // On veut un tableau associatif en résultat
]);
} catch (Exception $exception) {
    // var_dump($exception);
    echo '<h1>'.$exception->getMessage().'<h1>';
    echo '<a href="https://www.google.fr/search?q='.$exception->getMessage().'">Recherche Google</a>';
    die; // ou exit, pas de différences. On arrête le code PHP
}
?>