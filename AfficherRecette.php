<?php
$recipes = [
    [
        'name' => 'Cassoulet',
        'description' => 'Je ne sais pas donc je met n improte quoi',
        'email' => 'mickael.andrieu@exemple.com',
        'isVegetarian' => true,
    ],
    [
        'name' => 'Couscous',
        'description' => '[...]',
        'email' => 'mickael.andrieu@exemple.com',
        'isVegetarian' => false,
    ],
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f5f5f5;
        }

        li:hover {
            background-color: #e0e0e0;
        }

        strong {
            color: #007bff;
        }

        body {
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		height: 100vh;
    		margin: 0;
		}
    </style>
</head>
<body>
<ul>
    <?php foreach ($recipes as $recipe): ?>
        <?php if ($recipe['isVegetarian']): ?>
            <li>
                <strong>Nom de la recette:</strong> <?php echo $recipe['name']; ?><br>
                <strong>Description:</strong> <?php echo $recipe['description']; ?><br>
                <strong>Email de l'auteur:</strong> <?php echo $recipe['email']; ?><br>
                <strong>Vegetarienne:</strong> Oui
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
</body>
</html>

