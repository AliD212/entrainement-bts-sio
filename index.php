<?php


// 1. **Suppression d'un utilisateur :**
//    - Ajouter un bouton de suppression pour chaque utilisateur dans la liste.
//    - Quand ce bouton est cliqué, l'utilisateur est supprimé du tableau (session).
//    - Utiliser la fonction `unset()` pour retirer l'élément du tableau en session.
//    - Il faudra aussi ajouter un mécanisme pour vérifier quel utilisateur est supprimé (par exemple, via l'ID ou l'email).
//
// Exemple de modification :
//   - Ajouter un bouton "Supprimer" à chaque utilisateur dans `users.php`
//   - Créer une page `delete.php` ou un appel AJAX pour effectuer la suppression en arrière-plan.
//
//    // Code pour ajouter un bouton de suppression à chaque utilisateur
//    echo "<a href='delete.php?id=" . $user['email'] . "'>Supprimer</a>";
//
//    // Dans `delete.php`, tu récupères l'email de l'utilisateur à supprimer et tu fais un `unset()` pour le retirer du tableau en session.



// Initialisation du tableau d'utilisateurs

session_start();

/* 

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Ajouter l'utilisateur au tableau
    $_SESSION['users'][] = [
        'name' => $name,
        'email' => $email
    ];
}

*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $nom = $_POST['name'];
        $email = $_POST['email'];

        $bd = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
        $sql_insert = "INSERT INTO user (id, nom, email) VALUES (:id, :nom, :email)";
        $sql_select_max_id = "select max(id) from user";


        // récupération du résultat qui est le chiffre max de la colonne id de la table user

        $resultat = $bd->query($sql_select_max_id);
        $resultat = $resultat->fetch();

        // addition du chiffre max + 1

        $id =  $resultat['max(id)'] + 1;


        $stmt = $bd->prepare($sql_insert);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
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
