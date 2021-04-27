<?php
include 'database.php';
$db_obj = new database();
$db_obj->insert('mybooks',array('new crud insertion','coesu','a123b','image-123.jpg'));
$db_obj->delete('mybooks',37);
$db_obj->update('mybooks',46,"new name");
$db_obj->select('mybooks');

?>