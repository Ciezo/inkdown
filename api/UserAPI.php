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
        $sql = "SELECT * FROM USERS";
        $user_ls = array();

        require("../config.php");
        $results = mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_assoc($results)) {
            $user_ls[] = $rows;
        }
        
        return $user_ls; 
    }

    public static function updateUser($user_id, $first_name, $last_name, $birthday) {
        $sql = "UPDATE USERS SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    birthday = '$birthday'
                WHERE user_id = '$user_id'
                ";

        require("../config.php");
        if (mysqli_query($conn, $sql)) {
            Print '<script>alert("Contents updated!");</script>';
        } else {
            header("location: ../views/error/error.php");
        }
    }

    public static function deleteUser($user_id) {
        $sql = "DELETE FROM USERS WHERE user_id = '$user_id'";
        
        require("../config.php");
        if (mysqli_query($conn, $sql)) {

        } else {
            header("location: ../views/error/error.php");
        }
    }

}

?>