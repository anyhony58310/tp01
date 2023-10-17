<?php
const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'my_recipes';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = 'root';

try {
    $db = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8',
        MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Votre requête SQL pour récupérer des recettes
    $sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = 1'; // Assurez-vous d'ajuster cette requête en fonction de vos besoins.

    // Préparation de la requête
    $recipesStatement = $db->prepare($sqlQuery);

    // Exécution de la requête
    $recipesStatement->execute();

    // Récupération des résultats dans un tableau
    $recipes = $recipesStatement->fetchAll();

    // Vous pouvez maintenant utiliser le tableau $recipes pour afficher les données ou effectuer d'autres opérations.
    foreach ($recipes as $recipe) {
        echo '<p>' . $recipe['author'] . '</p>';
    }
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}
?>
