<?php

require_once "../persistance/DialogueBD.php";
try {
    $undlg = new DialogueBD();
    $scenes = $undlg->getToutesLesScenes();
}   catch (Exception $e) {
    $erreur = $e->getMessage();
}
try {
    $undlg = new DialogueBD();
    $artistes = $undlg->getTousLesArtistes();
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
    <title>Tableau des Scenes</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des Scenes</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Nom</th><th>Capacité</th><th>Scène</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($scenes as $ligne) {
        $idScene = $ligne['id'];
        $nomScene = $ligne['nom_scene'];
        $capacite = $ligne['capacite'];
        echo "<tr><td>$nomScene</td><td>$capacite</td>";
        echo "<td><a href='detailScene.php?id=$idScene'>voir le détail</a></td></tr>";
    }
    ?>

</table>

</body>
</html>

