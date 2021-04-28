<?php
include 'controler/CRUD/database.php';
$db_obj = new models();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $passoword = $_POST["passoword"];
    echo $email;
    die();
    $credentials = array("email"=>'$email',"password"=>'$password');
   
    $db_obj.authenticate_login('users',$credentials);
   
  } 
  else{
            echo "working";
        }
?>