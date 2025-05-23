<?php

session_start();
$users = $_SESSION['users'];
$bd = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
$max_id = "select max(id) from user";
$resultat_id = $bd->query($max_id);
$resultat_id = $resultat_id->fetchAll();
$resultat_id = $resultat_id[0];
?>

<body>

    <h1>Liste des utilisateurs</h1>
    <ul>
        <?php
        $select_user_nom = "select nom from user where id = '12'";
        $resultat_nom = $bd->query($select_user_nom);
        $resultat_nom = $resultat_nom->fetchAll();
        $resultat_nom = $resultat_nom[0];


        if ($resultat_nom == NULL) {
            echo "Aucun utilisateur trouver";
        }


        $cpt = 0;
        while ($cpt < $resultat_id[0]) {
            $cpt = $cpt + 1;


            $select_user_nom = "select nom from user where id = '$cpt'";
            $resultat_nom = $bd->query($select_user_nom);
            $resultat_nom = $resultat_nom->fetchAll();
            $resultat_nom = $resultat_nom[0];

            $select_user_email = "select email from user where id = '$cpt'";
            $resultat_email = $bd->query($select_user_email);
            $resultat_email = $resultat_email->fetchAll();
            $resultat_email = $resultat_email[0];

            echo "<li>", $resultat_nom['nom'], " - ", $resultat_email['email'], "</li>";
        } ?>

        <?php  ?>
    </ul>
    <?php  ?>

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
