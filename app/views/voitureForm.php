<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Voiture</title>
</head>
<body>
    <h1>Ajouter une Voiture</h1>
    <form method="POST">
        <label for="marque">Marque:</label>
        <input type="text" name="marque" id="marque" required><br>

        <label for="modele">Modèle:</label>
        <input type="text" name="modele" id="modele" required><br>

        <label for="prix">Prix:</label>
        <input type="number" name="prix" id="prix" required><br>

        <label for="prix">Année:</label>
        <input type="number" name="annee" id="annee" required><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
