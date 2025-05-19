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

    <form action="bouton.php" method="POST" name="delete">
        <input type="text" name="user">
        <button type="submit">Supprimer</button>
    </form>


    <form action="update_user.php" method="POST" name="update">
        <label>nom</label>
        <input type="text" name="old_name">
        <br>
        <label>nouveau nom</label>
        <input type="text" name="new_name">
        <br>
        <label>email</label>
        <input type="text" name="old_email">
        <br>
        <label>nouvelle email</label>
        <input type="text" name="new_email">
        <button type="submit">modifier</button>
    </form>

</body>
