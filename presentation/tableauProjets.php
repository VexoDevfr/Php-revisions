<?php

require_once "../persistance/DialogueBD.php";
try {
    $undlg = new DialogueBD();
    $projets = $undlg->getToutLesprojets();
}   catch (Exception $e) {
    $erreur = $e->getMessage();
}
try {
    $undlg = new DialogueBD();
    $employes = $undlg->getToutLesEmployes();
}   catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/design.css"/>
    <title>Tableau des Projets</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des projets</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Nom</th><th>Date de début</th><th>Date de fin</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($projets as $ligne) {
        $idProjet = $ligne['id'];
        $nomProjet = $ligne['nom_projet'];
        $dateDebutProjet= $ligne['date_debut'];
        $dateFinProjet= $ligne['date_fin'];
        echo "<tr><td>$nomProjet</td><td>$dateDebutProjet</td><td>$dateFinProjet</td>";
        echo "<td><a href='detailProjets.php?id=$idProjet'>voir le détail</a></td></tr>";
    }
    ?>

</table>

</body>
</html>

