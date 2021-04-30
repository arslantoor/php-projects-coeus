<?php

$to      = 'muhammadarslantoor@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: muhammadarslantoor@gmail.com' . "\r\n" .
    'Reply-To: muhammad.arslan.software@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


$mail=mail($to, $subject, $message, $headers);

if ($mail){
    echo "mail success";
}else{
    echo "mail failed";}
?>