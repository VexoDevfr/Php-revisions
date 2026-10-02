<?php

require_once "../persistance/DialogueBD.php";
try {
    $undlg = new DialogueBD();
    $veterinaires = $undlg->getToutLesVeterinaires();
}   catch (Exception $e) {
    $erreur = $e->getMessage();
}
try {
    $undlg = new DialogueBD();
    $animaux = $undlg->getToutLesAnimaux();
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
    <title>Tableau des Veterinaires</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des veterinaires</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Nom</th><th>Spécialisation</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($veterinaires as $ligne) {
        $idVeterinaire = $ligne['id'];
        $nomVeterinaire = $ligne['nom_veterinaire'];
        $speVeterinaire= $ligne['specialisation'];
        echo "<tr><td>$nomVeterinaire</td><td>$speVeterinaire</td>";
        echo "<td><a href='detailVeterinaires.php?id=$idVeterinaire'>voir le détail</a></td></tr>";
    }
    ?>

</table>

</body>
</html>

