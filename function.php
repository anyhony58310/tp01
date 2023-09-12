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
        'auteur' => 'Mickael',
        'description' => 'Je ne sais pas donc je mets n\'importe quoi',
        'email' => 'mickael.andrieu@exemple.com',
        'isEnabled' => true,
    ],
    [
        'name' => 'Couscous',
        'auteur' => 'Michel',
        'description' => '[...]',
        'email' => 'michel.jesaispas@exemple.com',
        'isEnabled' => true,
    ],
    [
        'name' => 'Frites',
        'auteur' => 'Adrien',
        'description' => 'Je ne sais pas donc je mets n\'importe quoi',
        'email' => 'adrien.lepoint58@gmail.com',
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