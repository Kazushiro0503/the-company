<?php
session_start(); 
include("../classes/user.php"); 

$user = new User; 
$user_details = $user->getUser($_GET["user_id"]); 
/* $_GET["user_id"] is the ID from the URL, driven from line 115"../classes.user.php"*/ 

/*Its just necessary to Fname and Lname to delete for comfirmation from Line 6 */
$full_name = $user_details["first_name"] ." ".$user_details["last_name"]; 
//$full_name = "Micheala Pratt"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
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
    <main class="container" style="padding-top: 80px">
        <div class="card w-25 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center text-danger">DELETE USER</h2>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
                    <p class="font-weight-bold mb-0">Are you sure you want to delete "<?=$full_name?>"?</p>
                    <!-- driven from line 7 -->
                </div>
                <div class="row">
                    <div class="col">
                        <a href="dashboard.php" class="btn btn-secondary btn-block">Cancel</a>
                    </div>
                    <div class="col">
                        <a href="../actions/delete-user.php?user_id=<?=$user_details["id"]?>" class="btn btn-outline-danger btn-block">Delete</a>
                    </div>
                </div>
            </div>

        </div>
    
    </main>
    

    <script src="https://kit.fontawesome.com/cd84e9ebe2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>