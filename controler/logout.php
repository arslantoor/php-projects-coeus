<?php
require_once "../controler/CRUD/database.php";
$db_obj = new models();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $session_id= $_GET['id'];
    $db_obj->logout($session_id);
}
?>