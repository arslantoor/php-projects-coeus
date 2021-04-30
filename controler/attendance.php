<?php
require_once "../controler/CRUD/database.php";
session_start();
$db_obj = new models();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $check_in = test_input($_POST["checkin"]);
    $check_out = test_input($_POST["checkout"]);
    $user_id = $_SESSION['id'];
    
    $attendance = array("checkin"=>$check_in, "checkout"=>$check_out, "user"=>$user_id);
    
    if (empty($check_in) and empty($check_out)){

        echo "Your Attendance does not marked ";

    }else{

      $db_obj->mark_attendance($attendance);
      echo "Attendance Marked Successfully";

    }
  }
?>