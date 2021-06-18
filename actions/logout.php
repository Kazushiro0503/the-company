<?php
    // $_SESSION["user_id]; 
    // $_SESSION["username]; 

    session_start(); 
    session_unset(); /*remove all variables */ 
    //$_SESSION[]
    //$_SESSION[]
    
    session_destroy(); /* delete ALL data related to session*/

    header("location: ../views"); //go to index.php of views folder 
    exit; 
?>