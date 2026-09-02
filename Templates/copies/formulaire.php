<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre une copie</title>
    <link rel="stylesheet" href="/assets/css/formulaire.css">
</head>

<body>

    <h1>Soumettre une copie</h1>

    <form method="POST" action="/copies">

        <div>
            <label for="dateDepot">Date de dépôt :</label>
            <input
                type="datetime-local"
                id="dateDepot"
                name="dateDepot"
                required>
        </div>

        <br>

        <div>
            <label for="noteBrute">Note brute :</label>
            <input
                type="number"
                id="noteBrute"
                name="noteBrute"
                min="0"
                max="20"
                step="0.01"
                required>
        </div>

        <br>

        <div>
            <label for="dateLimite">Date limite :</label>
            <input
                type="datetime-local"
                id="dateLimite"
                name="dateLimite"
                required>
        </div>

        <br>

        <button type="submit">
            Soumettre
        </button>

    </form>

    <br>

    <a href="/copies">
        Voir la liste des copies
    </a>

</body>

</html>