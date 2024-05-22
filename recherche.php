<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recherche.css">
</head>
<body>
    <div>
        <form method="post" id="page">
            Recherche: <input type="text" name="recherche">
            <br>
            <br>
            <label>Lieu de résidence :</label>
    <select name="city" id="city">
    <option value="...">...</option>
        <option value="France">France</option>
        <option value="Autre">Autre</option>
    </select>
  
    <label> Genre : </label>
    <select name="genre" id="genre">
    <option value="...">...</option>
        <option value="homme"> Homme </option>
        <option value="femme"> Femme </option>
    </select>
   
    <label> Abonné : </label>
    <select name="abonne" id="abonne">
    <option value="...">...</option>
        <option value="1">Abonné</option>
        <option value="0">Non-Abonné</option>
    </select>

    <label> Fréquence de pratique sportive : </label>
    <select  name="sport">
    <option value="...">...</option>
        <option value="pratique occasionnelle">Pratique occasionnelle</option>
        <option value="souvent">Souvent</option>
        <option value="Tous les jours">Tous les jours</option>
        <option value="Acrro au sport">Accro au sport</option>
    </select>
    <br> <br>
    <button type="submit" id="search">Rechercher</button>
    
    <br><br>
        </form>
    </div>
    <?php
    $v = 0;
    if (isset($_POST["recherche"]) || isset($_POST["abonne"]) || isset($_POST["genre"]) ||  isset($_POST['sport'])) {
        if(isset($_POST["recherche"]) ){
        $recherche = $_POST["recherche"];}
    if(isset($_POST["abonne"])){
        $abonne = $_POST["abonne"];}
    if( isset($_POST["genre"])){
        $genre = $_POST["genre"];}
    if(isset($_POST['sport'])){
        $sport = $_POST['sport'];}
        
        $fichier = "donnees.txt";
        
        if (file_exists($fichier)) {
            $handle = fopen($fichier, "r");
            
            if ($handle) {
                while (($donnee = fgets($handle)) !== false) {
                    $tab = explode("_", $donnee);
                    
                    if (in_array($recherche, $tab) || in_array($abonne,$tab) || in_array($genre,$tab) || in_array($sport,$tab)) {
                            echo '<br>';
                            echo '<table border="3" class="clickableTable">';
                            echo '<tr>';
                            echo '<td><img src="' . $tab[12] . '" width="100" height="100"></td>';
                            echo '</tr>';
                            echo '<tr><td>id : ' . $tab[0] . '</td></tr>';
                            echo '<tr><td>Sport(s) pratiqué(s) : ' . $tab[10] . '</td></tr>';
                            echo '</table>';
                        echo "<br>";
                        $v = 1;
                    }
                }
                if($v==0){
                echo "Aucun profil ne correspond à votre recherche";}
                fclose($handle);
            } else {
                echo "Error opening the file.";
            }
        } else {
            echo "File does not exist.";
        }
    }
    ?>
    <script>
    // Ajouter un gestionnaire d'événements pour rediriger vers le profil lors du clic sur la table
    var tables = document.querySelectorAll('.clickableTable');
    tables.forEach(function(table) {
        table.addEventListener('click', function() {
            var id = this.querySelector('tr:nth-child(2) td').innerText.split(':')[1].trim();
            window.location.href = "profil2.php?id=" + id;
        });
    });
</script>
</body>
</html>
