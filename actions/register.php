<?php
include "../classes/user.php"; 

/* Collect all form data from  "../views/register.php"*/ 
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
//"password_hash" is a partner of "password verifying(users.php line58)"

/*Create an object (instanciation) from../classes/users.php" */
$user = new User; 

// call the Method from "classes/users.php" to connect "actions" and "classes"
$user->createUser($first_name, $last_name, $username, $password); 