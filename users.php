<?php

session_start();
$users = $_SESSION['users'];
$user_delete = $_POST['user'];

function search_user(&$tableau_user)
{
    $user_delete = $_POST['user'];
    foreach ($tableau_user as $key => &$user) {

        if ($user['name'] == $user_delete) {
            echo "L'utilisateur " . $user['name'] . " à était supprimer";
            unset($tableau_user[$key]);
            $tableau_user = $tableau_user;
            return 1;
        }
    }
}
search_user($users);

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

    <form action="users.php" method="POST" name="supprimer">
        <input type="text" name="user">
        <button type="submit">Supprimer</button>
    </form>

</body>
