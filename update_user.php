<?php
require "ClassBD.php";
$bd = new bd("localhost", "bd", "root", "");
bd::update_user_name_email($bd);



?>
<html>

<body>
    <p><a href="users.php">Voir la liste des utilisateurs</a></p>
</body>

</html>