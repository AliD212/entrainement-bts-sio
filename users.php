<?php

session_start();
$users = $_SESSION['users'];
?>

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

    <form action="consignes.php" method="POST" name="supprimer">
        <input type="text" name="user">
        <button type="submit">Supprimer</button>
    </form>

</body>
