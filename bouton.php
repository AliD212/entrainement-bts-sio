<?php
session_start();
function delete_user()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_delete = trim($_POST['user']);
        $tableau_user = &$_SESSION['users'];
        foreach ($tableau_user as $key => &$user) {
            if ($user['name'] == $user_delete) {
                echo "L'utilisateur " . $user['name'] . " à était supprimer";
                unset($tableau_user[$key]);
                return 1;
            }
        }
    }
}
delete_user();

?>
<html>

<body>
    <p><a href="users.php">Voir la liste des utilisateurs</a></p>
</body>

</html>
