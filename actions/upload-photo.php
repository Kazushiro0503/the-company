<?php

include "../classes/user.php"; 
session_start(); 

$user_id =$_SESSION["user_id"]; 
$image_name=$_FILES["photo"]["name"]; 

/*temporary folder*/ 
$tmp_name=$_FILES["photo"]["tmp_name"]; 


$user = new User; 
$user->updatePhoto($user_id, $image_name, $tmp_name); 