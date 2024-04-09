<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];

    $fichier = "donnees.txt";
    $handle = fopen($fichier, "a");

    if ($handle) {
        fwrite($handle, $pseudo . "\n");
        fwrite($handle, $password . "\n");
        fwrite($handle, $Sexe ."\n");
        fwrite($handle, $metier ."\n");
        fwrite($handle, $metier ."\n");
        fwrite($handle, $city ."\n");
        fwrite($handle, $famille ."\n");
        fwrite($handle, $amour ."\n");
        fwrite($handle, $Couleurcheveux ."\n");
        fwrite($handle, $poids ."\n");
        fwrite($handle, $taille ."\n");
        fwrite($handle, $Cheveux . "\n");
        fwrite($handle, $hobby . "\n");
        fwrite($handle, $fumeur ."\n");
        fwrite($handle, $nonfumeur ."\n");
        fclose($handle);
        echo "Les données ont été enregistrées avec succès. <a href='acceuil.php'>Retour à la page d'accueil</a>";
    } else {
        echo "Erreur lors de l'ouverture du fichier.";
    }
}
?>

