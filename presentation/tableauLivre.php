<?php

require_once "../persistance/DialogueBD.php";
try {
    $undlg = new DialogueBD();
    $livres = $undlg->getToutLesLivres();
}   catch (Exception $e) {
    $erreur = $e->getMessage();
}
try {
    $undlg = new DialogueBD();
    $emprunteurs = $undlg->getToutLesEmprunteurs();
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
    <title>Tableau des Livres</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des livres</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Titre</th><th>Auteur</th><th>Genre</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($livres as $ligne) {
        $idLivre = $ligne['id'];
        $titrelivre = $ligne['titre'];
        $auteur = $ligne['auteur'];
        $genre = $ligne['genre'];
        echo "<tr><td>$titrelivre</td><td>$auteur</td><td>$genre</td>";
        echo "<td><a href='detaillivre.php?id=$idLivre'>voir le détail</a></td></tr>";
    }
    ?>

</table>

</body>
</html>

