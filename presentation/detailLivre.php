<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $idLivre = $_GET['id'];
    $undlg = new DialogueBD();
    $livre = $undlg->getUnLivre($idLivre);
    $emprunteurs=$undlg->getEmprunteursLivre($idLivre);

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

<h1><?php echo $livre->titre; ?></h1>
<h2>Liste des emprunteurs</h2>
<table>
    <tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Email</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($emprunteurs as $ligne) {
        $nomEmprunteur = $ligne['nom'];
        $prenomEmprunteur = $ligne['prenom'];
        $adresseEmprunteur = $ligne['adresse'];
        $emailEmprunteur = $ligne['email'];
        echo "<tr><td>$nomEmprunteur</td><td>$prenomEmprunteur</td><td>$adresseEmprunteur</td><td>$emailEmprunteur</td></tr>";
    }
    ?>
</table>

</body>
</html>

