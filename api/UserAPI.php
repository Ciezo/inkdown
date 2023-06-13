<?php 

class UserAPI {
    
    public static function createUser($first_name, $last_name, $birthday, $username, $password) {
        $sql = "INSERT INTO USERS (first_name, last_name, birthday, username, password)
                    VALUES 
                    (
                        '$first_name',
                        '$last_name',
                        '$birthday',
                        '$username',
                        '$password'
                    )";
        
        require("../config.php");
        if (mysqli_query($conn, $sql)) {
            header("location: ../views/login.php");
        } else {
            header("location: ../views/error/error.php");
        }
    }

    public static function getUsers() {

    }

    public static function updateUser() {

    }

    public static function deleteUser() {
        
    }

}

?>