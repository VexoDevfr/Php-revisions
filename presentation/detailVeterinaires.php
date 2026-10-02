<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $idVeterinaire = $_GET['id'];
    $undlg = new DialogueBD();
    $veterinaire = $undlg->getUnVeterinaire($idVeterinaire);
    $animaux=$undlg->getAnimauxVeterinaire($idVeterinaire);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Détail Vétérinaire</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>

<h1><?php echo $veterinaire->nom_veterinaire; ?></h1>
<h2>Liste des animaux</h2>
<table>
    <tr><th>Nom</th><th>Espèce</th><th>Propriétaires</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($animaux as $ligne) {
        $nomAnimal = $ligne['nom_animal'];
        $espece = $ligne['espece'];
        $proprietaire = $ligne['proprietaire'];
        echo "<tr><td>$nomAnimal</td><td>$espece</td><td>$proprietaire</td></tr>";
    }
    ?>
</table>

</body>
</html>

