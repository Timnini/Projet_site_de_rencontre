<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="acceuil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap">
    <title>Accueil</title>
</head>

<body>

<div class="banner">
<h1><a href="acceuil.php">SportMeet </a></h1>
    <p><em>Rencontrez l'âme sœur sur la piste de votre passion !</em></p>
    <div class="button-bandeau">
        <button onclick="window.location.href='connexion.html'">connexion</button>
    </div>
</div>

<div id="donnee">
    <?php
    // // Chemin du fichier contenant les données
    // $fichier = "donnees.txt";

    // // Vérifier si le fichier existe
    // if (file_exists($fichier)) {
    //     // Lire le contenu du fichier et l'afficher
    //     $contenu = file_get_contents($fichier);
    //     echo nl2br(htmlspecialchars($contenu)); // Convertir les sauts de ligne en <br> et échapper les caractères spéciaux
    // } else {
    //     echo "Aucune donnée n'a été enregistrée.";
    // }
    ?>
</div>

</body>
</html>
