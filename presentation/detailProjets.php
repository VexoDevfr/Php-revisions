<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $idProjet = $_GET['id'];
    $undlg = new DialogueBD();
    $Projet = $undlg->getUnProjet($idProjet);
    $Employes=$undlg->getEmployesProjet($idProjet);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Détails Employes</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>

<h1><?php echo $Projet->nom_projet; ?></h1>
<h2>Liste des Employes</h2>
<table >
    <tr><th>Nom</th><th>Prénom</th><th>Poste</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($Employes as $ligne) {
        $nomEmploye = $ligne['nom'];
        $prenomEmploye = $ligne['prenom'];
        $posteEmploye = $ligne['poste'];
        echo "<tr><td>$nomEmploye</td><td>$prenomEmploye</td><td>$posteEmploye</td></tr>";
    }
    ?>
</table>

</body>
</html>

