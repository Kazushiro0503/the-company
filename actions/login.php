<?php
include "../classes/user.php"; 
/* Collect the data */ 
$username = $_POST["username"]; 
$password = $_POST["password"]; 



//Create an object 
$user = new User; //classes.users.php

//Call the method 
$user->login($username, $password); 
