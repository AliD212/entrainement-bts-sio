<?php
session_start();
$tableau_user = $_SESSION['users'];

function update_user($new_name)
{
    $tableau_user = &$_SESSION['users'];
    $update_name = $_POST['update_name'];
    $email = $_POST['name'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_name = trim($new_name);
        $old_name = trim($_POST['name']);
        foreach ($tableau_user as $key => &$user) {
            if ($user['name'] == $old_name) {
                echo "L'utilisateur " . $user['name'] . " à était modifier";
                $tableau_users = $tableau_user[$key];
                $tableau_users['name'] = $new_name;

                return 1;
            }
        }
    }
}
var_dump($_POST['update_name']);
update_user($_POST['update_name']);

//var_dump(update_user($_POST['name']));


?>
<html>

<body>
    <p><a href="users.php">Voir la liste des utilisateurs</a></p>
</body>

</html>