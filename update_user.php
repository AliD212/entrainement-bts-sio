<?php
function update_name_user($old_name, $new_name)
{

    $bd  = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
    $old_name = trim($_POST['old_name']);
    $new_name = trim($_POST['new_name']);
    if (!empty($old_name && $new_name)) {
        $sql_update = "update user set nom = '$new_name' where nom = '$old_name'";
        $user_update = $bd->query($sql_update);
        $user_update->execute();
        echo "Le nom de l'utilisateur à était modifié par", $new_name;
    }
}


if (!empty($_POST['old_name']) == TRUE && !empty($_POST['new_name']) == TRUE) {
    update_name_user($_POST['old_name'], $_POST['new_name']);
}


function update_email_user($old_email, $new_email)
{


    $bd  = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
    $old_email = trim($_POST['old_email']);
    $new_email = trim($_POST['new_email']);
    $sql_select_all = "SELECT * FROM user WHERE email = :email";
    $stmt = $bd->prepare($sql_select_all);
    $stmt->execute([':email' => $new_email]);
    $user = $stmt->fetch();

    if ($user) {
        echo "L'email $new_email est déjà utilisé";
    } else {
        $sql_update = "UPDATE user SET email = :new_email WHERE email = :old_email";
        $stmt_update = $bd->prepare($sql_update);
        $stmt_update->execute([':new_email' => $new_email, ':old_email' => $old_email]);
        echo "Le mail de l'utilisateur a été modifié en $new_email";
    }
}

update_email_user($_POST['old_email'], $_POST['new_email']);



?>
<html>

<body>
    <p><a href="users.php">Voir la liste des utilisateurs</a></p>
</body>

</html>
