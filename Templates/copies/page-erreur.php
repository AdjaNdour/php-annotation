<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
    <link rel="stylesheet" href="/assets/css/erreur.css">
</head>

<body>

    <h1>Erreur</h1>

    <?php if (isset($message)): ?>
        <p> <?= $message ?></p>
    <?php else: ?>
        <p> Une erreur est survenue.</p>
    <?php endif; ?>
    <br>
    <a href="/copies">Retour à la liste</a>

</body>

</html>