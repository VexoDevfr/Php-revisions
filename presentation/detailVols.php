<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $idVol = $_GET['id'];
    $undlg = new DialogueBD();
    $vol = $undlg->getUnVol($idVol);
    $passagers=$undlg->getPassagersVol($idVol);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Détails Passagers</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>

<h1><?php echo $vol->numero_vol; ?></h1>
<h2>Liste des Passagers</h2>
<table>
    <tr><th>Nom</th><th>Prénom</th><th>Numéro du passport</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($passagers as $ligne) {
        $nomPassager = $ligne['nom'];
        $prenomPassager = $ligne['prenom'];
        $numPassport = $ligne['numero_passport'];
        echo "<tr><td>$nomPassager</td><td>$prenomPassager</td><td>$numPassport</td></tr>";
    }
    ?>
</table>

</body>
</html>

