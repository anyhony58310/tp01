<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon site de recettes</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
 
    <body>
 
    <!-- L'en-tête -->
    
    <header>
        <!-- Le menu -->
    
        <?php include('header.php'); ?>
       
    </header>
    
    <!-- Le corps -->
    
    <div id="corps">
        <h1>Mon site de recettes</h1>
                
            <p>
                Bienvenue sur mon site de recettes !
                <br>
                <?php include('function.php'); ?>
            </p>
        </div>
    
    
        <div>
    <h1>Affichage des recettes</h1>
    <form method="post">
        <label for="nomRecherche">Tape le nom de ta recette pour en savoir +! : </label>
        <input type="text" id="nomRecherche" name="nomRecherche">
        <input type="submit" value="Rechercher">
    </form>
    <ul>
        <?php if (isset($recetteCherchee)): ?>
            <?php if ($recetteCherchee !== null): ?>
                <li>
                    <strong>Nom de la recette:</strong> <?php echo $recetteCherchee['name']; ?><br>
                    <strong>Auteur:</strong> <?php echo $recetteCherchee['auteur']; ?><br>
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
<footer id="pied_de_page">
        <?php include('footer.php'); ?>
    </footer>
    
    </body>
</html>