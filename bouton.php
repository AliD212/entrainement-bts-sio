<?php
session_start();
$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
$_SERVER["REQUEST_METHOD"] == "POST";
$user = $_POST['utilisateur'];
/* 
if ($users[$user] == $user) {
    unset($userSession);
};
*/

var_dump($users);
