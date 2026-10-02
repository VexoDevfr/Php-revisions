<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $idScene = $_GET['id'];
    $undlg = new DialogueBD();
    $scene = $undlg->getUneScene($idScene);
    $artistes=$undlg->getArtistesScene($idScene);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Détail Scene</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>

<h1><?php echo $scene->nom_scene; ?></h1>
<h2>Liste des produits</h2>
<table>
    <tr><th>Artiste</th><th>Genre Musical</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($artistes as $ligne) {
        $nomArtiste = $ligne['nom_artiste'];
        $genreMusical = $ligne['genre_musical'];
        echo "<tr><td>$nomArtiste</td><td>$genreMusical</td></tr>";
    }
    ?>
</table>

</body>
</html>

