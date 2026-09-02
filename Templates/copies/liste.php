<?php
$copies = $data['copies'] ?? [];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des copies</title>
    <link rel="stylesheet" href="/assets/css/liste.css">
</head>

<body>

    <h1>Liste des copies</h1>

    <a href="/copies/create">
        Soumettre une nouvelle copie
    </a>

    <br><br>

    <?php if (empty($copies)): ?>

        <p>Aucune copie enregistrée.</p>

    <?php else: ?>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de dépôt</th>
                    <th>Note brute</th>
                    <th>Note finale</th>
                    <th>Pénalité</th>
                    <th>Date limite</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($copies as $copie): ?>

                    <tr>

                        <td><?= htmlspecialchars($copie->getId()) ?></td>
                        <td><?= htmlspecialchars($copie->getDateDepot()) ?></td>
                        <td><?= htmlspecialchars($copie->getNoteBrute()) ?></td>
                        <td><?= htmlspecialchars($copie->getNoteFinale()) ?></td>
                        <td><?= htmlspecialchars($copie->getPenaliteAppliquee()) ?></td>
                        <td><?= htmlspecialchars($copie->getDateLimite()) ?></td>
                        <td><a href="/copies/<?= $copie->getId() ?>"> Détail</a> </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

    <?php endif; ?>

</body>

</html>