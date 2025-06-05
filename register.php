<?php
require "ClassBD.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bd = new bd("localhost", "bd", "root", "");

    bd::insert_user($bd, $_POST['name'], $_POST['email'], $_POST['password']);

    $message = "Vos données ont été enregistrées avec succès.";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Page d'enregistrement</title>
</head>

<body>
    <h1>Page d'enregistrement</h1>
    <?php if (isset($message)): ?>
        <p><strong><?php echo htmlspecialchars($message); ?></strong></p>
    <?php endif; ?>
    <form method="POST" action="register.php">
        <label for="name">Nom :</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email :</label>
        <input type="email" name="email" required>
        <br>
        <label for="email">Password :</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Creer</button>
    </form>

</body>

</html>