<?php
session_start();

// Récupérer les utilisateurs
$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>

<body>

    <h1>Liste des utilisateurs</h1>

    <?php if (empty($users)): ?>
        <p>Aucun utilisateur ajouté.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><?php echo $user['name']; ?> - <?php echo $user['email']; ?></li>

            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p><a href="index.php">Retour à l'ajout d'un utilisateur</a></p>

    <form action="bouton.php" method="POST" name="supprimer">
        <input type="text" name="utilisateur"></label>
        <button type="submit">Supprimer</button>
    </form>

</body>

</html>