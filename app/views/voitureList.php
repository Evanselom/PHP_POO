<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Voitures</title>
</head>
<body>
    <h1>Liste des Voitures</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voitures as $voiture): ?>
                <tr>
                    <td><?php echo $voiture->getId(); ?></td>
                    <td><?php echo $voiture->getMarque(); ?></td>
                    <td><?php echo $voiture->getModele(); ?></td>
                    <td><?php echo $voiture->getPrix(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/create">Ajouter une nouvelle voiture</a>
</body>
</html>