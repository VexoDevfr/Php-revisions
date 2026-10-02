<?php

require_once "../persistance/DialogueBD.php";
try {
    $undlg = new DialogueBD();
    $vols = $undlg->getToutLesVols();
}   catch (Exception $e) {
    $erreur = $e->getMessage();
}
try {
    $undlg = new DialogueBD();
    $passagers = $undlg->getToutLesPassagers();
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
    <title>Tableau des vols</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des vols</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Numéro</th><th>Origine</th><th>Destination</th><th>Date de départ</th><th>Date d'arrivée</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($vols as $ligne) {
        $idVol = $ligne['id'];
        $numVol = $ligne['numero_vol'];
        $origineVol= $ligne['origine'];
        $destinationVol= $ligne['destination'];
        $dateDepartVol= $ligne['date_depart'];
        $dateArriveeVol= $ligne['date_arrivee'];
        echo "<tr><td>$numVol</td><td>$origineVol</td><td>$destinationVol</td><td>$dateDepartVol</td><td>$dateArriveeVol</td>";
        echo "<td><a href='detailVols.php?id=$idVol'>voir le détail</a></td></tr>";
    }
    ?>

</table>

</body>
</html>

