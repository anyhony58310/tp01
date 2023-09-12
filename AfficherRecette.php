<?php
function rechercherRecetteParNom($recipes, $nom) {
    foreach ($recipes as $recipe) {
        if (isset($recipe['name']) && strtolower($recipe['name']) === strtolower($nom)) {
            return $recipe;
        }
    }
    return null; // Aucune recette trouvée
}

$recipes = [
    [
        'name' => 'Cassoulet',
        'description' => 'Je ne sais pas donc je mets n\'importe quoi',
        'email' => 'mickael.andrieu@exemple.com',
        'isEnabled' => true,
    ],
    [
        'name' => 'Couscous',
        'description' => '[...]',
        'email' => 'mickael.andrieu@exemple.com',
        'isEnabled' => true,
    ],
];

$nomRecherche = ''; // Initialisez la variable de recherche

// Vérifiez si le formulaire de recherche a été soumis
if (isset($_POST['nomRecherche'])) {
    $nomRecherche = $_POST['nomRecherche']; // Obtenez le nom recherché
    $recetteCherchee = rechercherRecetteParNom($recipes, $nomRecherche);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        strong {
            color: #007bff;
        }
    </style>
</head>
<body>
<div>
    <h1>Affichage des recettes</h1>
    <form method="post">
        <label for="nomRecherche">Rechercher une recette par nom : </label>
        <input type="text" id="nomRecherche" name="nomRecherche">
        <input type="submit" value="Rechercher">
    </form>
    <ul>
        <?php if (isset($recetteCherchee)): ?>
            <?php if ($recetteCherchee !== null): ?>
                <li>
                    <strong>Nom de la recette:</strong> <?php echo $recetteCherchee['name']; ?><br>
                    <strong>Description:</strong> <?php echo $recetteCherchee['description']; ?><br>
                    <strong>Email de l'auteur:</strong> <?php echo $recetteCherchee['email']; ?><br>
                    <strong>Est complète:</strong> <?php echo $recetteCherchee['isEnabled'] ? 'Oui' : 'Non'; ?>
                </li>
            <?php else: ?>
                <li>Aucune recette trouvée pour "<?php echo $nomRecherche; ?>"</li>
            <?php endif; ?>
        <?php else: ?>
            <?php foreach ($recipes as $recipe): ?>
                <li>
                    <strong>Nom de la recette:</strong> <?php echo $recipe['name']; ?><br>
                    <strong>Est complète:</strong> <?php echo $recipe['isEnabled'] ? 'Oui' : 'Non'; ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
</body>
</html>
