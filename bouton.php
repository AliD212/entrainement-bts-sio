<?php
require "ClassBD.php";
$bd = new bd("localhost", "bd", "root", "");
bd::delete_user($bd, $_POST['user']);

?>
<html>

<body>
    <p><a href="users.php">Voir la liste des utilisateurs</a></p>
</body>

</html>