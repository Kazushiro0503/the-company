<?php
require_once "database.php"; 

/* Showing methods to store/save data related to "User" table*/ 
class User extends Database
{

    //1st step to connect "classes" and "mysql", if successful, go to "views" (../actions.register.php) && (classess.register.php)
    public function createUser($first_name, $last_name, $username, $password)
    {

        /*query/command データベース内オブジェクトを検索*/
        /*CREATE*/
        $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`, `photo`)VALUES('$first_name', '$last_name', '$username', '$password', 'default.jpg')"; 

        // backtick ` --> db definition 
        // single quote --> data/ values


        /*Execute with(for going to "views")*/
        if($this->conn->query($sql)) //the property contains methods to save 
        {
            /*redirect to Views / 自動的に転送to view's login(index) page. */
            header("location: ../views"); 
            //go to Login page
            //header("location: ../views/index.php");
            exit; 
            //exit is also the same with die;

        }
        else
        {
            die("Error creating user: " .$this->conn->error); 
        }

        //redirect to Views 
    }


    //2nd step to connect "classes" and "mysql", if successful, go to "views. Check (../actions.login.php)&&(classes.action.php)". 
    public function login($username, $password)
    {
        /*READ under CRUD*/ 
        $sql = "SELECT id, username, `password` FROM users WHERE username='$username'"; 
        //WHERE username ="john"

        if($result = $this->conn->query($sql))
        {
            // print_r($result); //result of the sql; it stands for "$user_details". 

            if($result->num_rows == 1)
            {
                /*"Username" is found. no other same name inside the table  */

                $user_details = $result->fetch_assoc(); 
                /*Fetch the result as an asssociative array. This is a tansformation so that everyone can read the data more understandably */

                // print_r($user_details); //result of the sql 

                if(password_verify($password, $user_details["password"]))
                {
                    //"When "password" is correct, Create" session variables. this is to store the correct info.  
                    session_start(); 
                    $_SESSION["user_id"] = $user_details["id"]; 
                    $_SESSION["username"] = $user_details["username"]; 

                    header("location:../views/dashboard.php"); 
                    exit; 
                }
                else
                {
                    /*"Password" is incorrect but username is right*/
                    die("Password is incorrect."); 
                }
            }
            else
            {
                /*"Username" does not found. */
                die("Username is not found."); 
            }
        }
        else
        {
        //     /*SELECT query failed. */
        die("Error: " . $this->conn->error);
        }
    }


    //3rd step to connect "classes" and "mysql", if successful, go to "views"   (../views.dashboard.php)&&()
    public function getAllUsers($user_id)
    // $user_id is the ID of logged in user only 
    {
        $sql = "SELECT id, first_name, last_name, username FROM users WHERE id != $user_id"; 
        
        if($result = $this->conn->query($sql))
        {
            /* expecting one or more rows  compared with line 112. it needs to loop (while statement)*/
            return $result; 
            // Return statement is for Line 7 in "../views/dashboard.php"
        }
        else 
        {
            die("Error retrieving all users: ". $this->conn->error); 
        }
    }


    //4th method for "(..views./edit-user.php)&&(..actions/edit-user.php)"
    public function getUser($user_id)
    {
        //$user_id is the ID of the user selected
        $sql = "SELECT id, first_name, last_name, username, photo FROM users WHERE id = $user_id"; 

        if($result = $this->conn->query($sql))
        {
           /* expecting one row only compared with 95. it doesnt have to loop(while statement) */ 
           return $result->fetch_assoc(); 
        }
        else
        {
            die("Error retrieving user: " . $this->conn->error); 
        }
    }

//5th method (actions.edit-user.php)&&(views.edit-user.php)
    public function updateUser($user_id, $first_name, $last_name, $username)
    {
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id"; 

        if($this->conn->query($sql))
        {
            header("location: ../views/dashboard.php"); 
            exit; 
        }
        else
        {
            die("Error saving your changes: " .$this->conn->error); 
        }
    }



//6th method (../views/delete-user.php)&&(../actions/delete-user.php)
    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE id = $user_id"; 

        if($this->conn->query($sql))
        {
            header("location: ../views/dashboard.php"); 
            exit; 
        }
        else
        {
            die("Error deleting user: ". $this->conn->error); 
        }
    }

// 7th method (../views.profile.php)&&(../action)
    public function updatePhoto($user_id, $image_name,$tmp_name)
    {
        $sql = "UPDATE users SET photo = '$image_name' WHERE id=$user_id"; 

        if($this->conn->query($sql))
        {
            $destination = "../images/$image_name"; 

            if(move_uploaded_file($tmp_name, $destination))
            {
                header("location:../views/profile.php?upload=success"); 
                exit; 
            }
            else
            {
                die("Error moving the photo."); 
            }
        }
        else
            die("Error uploading photo: ". $this->conn->error); 
    }
}