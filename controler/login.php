<?php
require_once "../controler/CRUD/database.php";
$db_obj = new models();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $email = test_input($_POST["email"]);
    $passoword =test_input($_POST["passoword"]);

    if (empty($email)){
      header("Location:../index.php?error=email is required");
    }
    else if(empty($passoword)){
      header("Location:../index.php?error=password is required");
    }else{
      
      $credentials = array("email"=>$email, "password"=>$passoword);
      $db_obj->authenticate_login("users",$credentials); 
    }
   
  } 
  else{
    echo "working";
  }
?>