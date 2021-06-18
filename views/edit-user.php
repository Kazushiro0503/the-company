<?php
session_start(); 
include "../classes/user.php"; 

$user = new User; 
$user_details = $user->getUser($_GET["user_id"]); 
/* $_GET["user_id"] is the ID from the URL, driven from line 115 user.php*/ 

// print_r($user_details); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">The Company</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link"><?php echo $_SESSION["username"];?></a>
                    </li>
                    <li class="nav-item">
                        <a href="../actions/logout.php" class="nav-link text-danger">Logout</a>
                    </li>                    
                </ul>
            </div>
            <!-- collapse  -->
        </div>
        <!-- container  -->
    </nav>
    <main class="container" style="padding-top:80px">
        <div class="card w-50 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center">EDIT USER</h2>            
            </div>
        </div>
        <div class="card-body">
            <form action="../actions/edit-user.php" method="post">
                <input type="hidden" name="user_id" value= "<?=$user_details["id"];?>">
               
                <!-- copy from "viregister.php -->
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control mb-2" value="<?=$user_details["first_name"];?>"required autofocus> 
                
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control mb-2" value="<?=$user_details["last_name"];?>"required>

                <label for="username" class="font-weight-bold">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-5 font-weight-bold" value="<?=$user_details["username"];?>" maxlength="15" required>  

                <div class="text-right">
                    <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>                
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                </div>
               
            </form>
        </div>
    
    </main>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>    
</body>
</html>