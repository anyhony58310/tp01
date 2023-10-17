<?php
const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'my_recipes';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = 'root';

// Fonction de validation de données
function validateData($data) {
    return !empty($data) ? htmlspecialchars(trim($data)) : null;
}

try {
    $db = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8',
        MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Votre requête SQL pour récupérer des recettes
    $sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = 1';

    // Préparation de la requête
    $recipesStatement = $db->prepare($sqlQuery);

    // Exécution de la requête
    $recipesStatement->execute();

    // Récupération des résultats dans un tableau
    $recipes = $recipesStatement->fetchAll();

    // Affichage des recettes
    foreach ($recipes as $recipe) {
        echo '<p>' . $recipe['author'] . '</p>';
    }

    // Formulaire d'ajout de recette
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titre = validateData($_POST["titre"]);
        $description = validateData($_POST["description"]);

        // Validation des données
        if ($titre === null || $description === null) {
            echo '<p style="color: red;">Les champs titre et description sont requis.</p>';
        } else {
            // Les données sont valides, vous pouvez procéder à l'insertion dans la base de données.
            try {
                // Requête SQL pour insérer la nouvelle recette
                $insertQuery = "INSERT INTO recipes (title, description, is_enabled) VALUES (:titre, :description, 1)";
                $insertStatement = $db->prepare($insertQuery);
                $insertStatement->bindParam(':titre', $titre);
                $insertStatement->bindParam(':description', $description);
                $insertStatement->execute();

                // Redirigez l'utilisateur vers une page de confirmation ou réaffichez la liste des recettes mise à jour.
                header('Location: votre_page_de_confirmation.php');
                exit();
            } catch (Exception $exception) {
                die('Erreur : ' . $exception->getMessage());
            }
        }
    }
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}
?>
<!-- Formulaire d'ajout de recette -->
<form action="" method="post">
    <label for="titre">Titre de la recette :</label>
    <input type="text" name="titre" id="titre" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description" rows="4" required></textarea>

    <input type="submit" value="Ajouter la recette">
</form>
