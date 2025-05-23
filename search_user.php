<?php
session_start();
function search_user()
{
    $search_user = trim($_POST['search_email']);
    $tableau_user = &$_SESSION['users'];
    $a = 0;
    foreach ($tableau_user as &$user) {
        if ($user['email'] == $search_user) {
            echo "<li> L'utilisateur " . $user['name'] . " est associé à l'email" . $search_user . "</li>";
            $a = 1;
        }
    }
    if ($a != 1) {
        echo "Aucun utilisateur trouver";
    }
}


search_user();
?>

<p><a href="index.php">Ajouter un utilisateurs</p>
