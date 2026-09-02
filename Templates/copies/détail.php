<?php
$copie = $data['copie'] ?? null;
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
            <?= $copie->getId() ?>
        </p>

        <p>
            <strong>Date de dépôt :</strong>
            <?= $copie->getDateDepot() ?>
        </p>

        <p>
            <strong>Note brute :</strong>
            <?= $copie->getNoteBrute() ?>
        </p>

        <p>
            <strong>Note finale :</strong>
            <?= $copie->getNoteFinale() ?>
        </p>

        <p>
            <strong>Pénalité appliquée :</strong>
            <?= $copie->getPenaliteAppliquee() ?>
        </p>

        <p>
            <strong>Date limite :</strong>
            <?= $copie->getDateLimite() ?>
        </p>

    </div>

    <br>

    <a href="/copies">
        Retour à la liste
    </a>

</body>

</html>