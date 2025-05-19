<?php
session_start();



function html($data)
{

    return "<html>" . $data . "</html>";
}





function search_user()
{
    $search_user = trim($_POST['email']);
    $tableau_user = &$_SESSION['users'];
    foreach ($tableau_user as &$user) {
        if ($user['email'] == $search_user) {
            echo "L'utilisateur " . $search_user . " à été trouver";
            html("<br>");
            html("nom de l'utilisateur = $search_user");
        }
    }
}


var_dump(search_user());
