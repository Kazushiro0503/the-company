<?php
    include "../classes/user.php";
    session_start(); 
    //from ..classes/users.php in 2nd part (when password is correct.)

    $user = new User; 
    $user_list=$user->getAllUsers($_SESSION["user_id"]); 
    // 3rd method from line 87. (..classes/users.php)

    // print_r($user_list); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand"><h3>The Company</h3></a>
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

    <main class="container-fluid" style="padding-top:80px">
        <div class="row">
            <div class="col-6 mx-auto">
                <h2 class="text-secondary">User List</h2>
                <table class="table table-bordered-none">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                    <!-- PHP here -->
                    <?php
                        while($user_details = $user_list->fetch_assoc())
                        // it is because many users cannot store in one line. 
                        {

                    ?>
                        <tr>
                            <td><?=$user_details["id"] ?></td> 
                            <td><?=$user_details["first_name"] ?></td>
                            <td><?=$user_details["last_name"] ?></td>
                            <td><?=$user_details["username"] ?></td>
                            <td><a href="edit-user.php?user_id=<?= $user_details["id"]?>" class="btn btn-outline-warning mr-1"><i class="fas fa-pen"></i>
                            </a><a href="delete-user.php?user_id=<?=$user_details['id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <!-- <tr>
                            <td>3</td>
                            <td>David</td>
                            <td>Wilson</td>
                            <td>david</td>
                            <td><a href="edit-user.php" class="btn btn-outline-warning mr-1"><i class="fas fa-pen"></i></a><a href="delete-user.php" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>  -->
                        <!-- php here -->
                    <?php
                        }
                    ?>
                                   
                    </tbody>
                </table>                
            </div>
            <!-- col  -->
        </div>
        <!-- row -->
    </main>

        
  

    <script src="https://kit.fontawesome.com/cd84e9ebe2.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

