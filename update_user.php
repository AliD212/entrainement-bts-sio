<?php
session_start();
function update_name_user($old_name, $new_name)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $old_name = trim($_POST['old_name']);
        $new_name = trim($_POST['new_name']);
        $tableau_user = &$_SESSION['users'];
        foreach ($tableau_user as $key => &$user) {
            if ($user['name'] == $old_name) {
                echo "L'utilisateur " . $user['name'] . " à était modifier";
                $user['name'] = $new_name;
                return 1;
            }
        }
    }
}

var_dump(!empty($_POST['old_name']));

if (!empty($_POST['old_name']) == TRUE && !empty($_POST['new_name']) == TRUE) {
    update_name_user($_POST['old_name'], $_POST['new_name']);
}


function update_email_user($old_email, $new_email)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $old_email = trim($_POST['old_email']);
        $new_email = trim($_POST['new_email']);
        $tableau_user = &$_SESSION['users'];
        foreach ($tableau_user as $key => &$user) {
            if ($user['email'] == $old_email) {
                echo "L'email de l'utilisateur " . $user['name'] . " à était modifier";
                $user['email'] = $new_email;
                return 1;
            }
        }
    }
}

update_email_user($_POST['old_email'], $_POST['new_email']);



?>
<html>

<body>
    <p><a href="users.php">Voir la liste des utilisateurs</a></p>
</body>

</html>
