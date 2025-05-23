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
            } elseif ($user['email'] == $user_delete) {
                echo "L'utilisateur " . $user['name'] . " à était supprimer";
                unset($tableau_user[$key]);
                return 1;
            }
        }
    }
}


function update_user()
{

    $cpt = 0;
    $cpt2 = 0;
    $bd = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
    $select_max_id = "select max(id) from user";

    $resultat_id = $bd->query($select_max_id);
    $resultat_id = $resultat_id->fetchAll();
    $resultat_id = $resultat_id[0];




    while ($cpt < $resultat_id[0]) {
        $cpt = $cpt + 1;
        if ($cpt % 2 == 1 && $cpt != 1) {
            $cpt2 = $cpt2 + 1;
        }

        $search_user_id = "select id from user where id = '$cpt'";

        $search_user_id = $bd->query($search_user_id);
        $search_user_id = $search_user_id->fetchAll();
        if (empty($search_user_id)) {
        } else {

            $cpt3 = $cpt - $cpt2;
            echo "<li>", $cpt, "-", $cpt2, "</li>";
            if ($cpt - $cpt2 == 2) {
                $cpt2 = 1;
            }
            $update_user_id = "update user set id = '$cpt3'  where id = '$cpt'";
            $search_id = $bd->query($update_user_id);
            $update_user_id;
            $search_id->execute();
        }
    }
}

update_user();

function delete_user_sql()
{
    try {

        $user_delete = trim($_POST['user']);
        $bd = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
        $sql_delete = "delete from user where nom = '$user_delete'";
        $stmt = $bd->prepare($sql_delete);
        $bd->prepare($sql_delete);
        $stmt->execute();
        echo "L'utilisateur $user_delete à était supprimer";
    } catch (PDOException $e) {

        echo $e;
    }
}


delete_user_sql();

?>
<html>

<body>
    <p><a href="users.php">Voir la liste des utilisateurs</a></p>
</body>

</html>
