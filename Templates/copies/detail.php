<?php

$copie = $copie ?? null;

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de la copie</title>
    <link rel="stylesheet" href="/assets/css/detail.css">
</head>

<body>

    <h1>Détail de la copie</h1>

    <div>

        <p>
            <strong>ID :</strong>
            <?= htmlspecialchars($copie->getId()) ?>
        </p>

        <p>
            <strong>Date de dépôt :</strong>
            <?= htmlspecialchars($copie->getDateDepot()) ?>
        </p>

        <p>
            <strong>Note brute :</strong>
            <?= htmlspecialchars($copie->getNoteBrute()) ?>
        </p>

        <p>
            <strong>Note finale :</strong>
            <?= htmlspecialchars($copie->getNoteFinale()) ?>
        </p>

        <p>
            <strong>Pénalité appliquée :</strong>
            <?= htmlspecialchars($copie->getPenaliteAppliquee()) ?>
        </p>

        <p>
            <strong>Date limite :</strong>
            <?= htmlspecialchars($copie->getDateLimite()) ?>
        </p>

    </div>

    <br>

    <a href="/copies">
        Retour à la liste
    </a>

</body>

</html>