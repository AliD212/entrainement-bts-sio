<?php

require "ClassBD.php";
$bd = new bd("localhost", "bd", "root", "");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nom = $_POST['name'];
        $email = $_POST['email'];
        $sql_select_max_id = "select max(id) from user";
        $resultat = $bd->connexionbd($bd)->query($sql_select_max_id);

        $resultat = $resultat->fetch();

        // addition du chiffre max + 1

        $id =  $resultat['max(id)'] + 1;

        bd::insert_user($bd, $id, $nom, $email);
    } catch (PDOException $pe) {

        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
</head>

<body>

    <h1>Ajouter un utilisateur</h1>

    <form method="POST" action="index.php">
        <label for="name">Nom :</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email :</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>


    <p><a href="users.php">Voir la liste des utilisateurs</a></p>


    <h1>Trouver un utilisateur</h1>

    <form method="POST" action="search_user.php">
        <label for="name">Email :</label>
        <input type="text" name="search_email" required>
        <br>
        <button type="submit">Chercher</button>
    </form>

</body>

</html>