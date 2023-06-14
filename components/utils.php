<?php 


class Utils {

    public static function getUserFullName_inSession() {
        require("../../config.php");
        $current_author = $_SESSION["user-username"];
        $sql = "SELECT first_name, last_name FROM USERS WHERE username = '$current_author'";
        $results = mysqli_query($conn, $sql);
        $results = mysqli_fetch_assoc($results);
        $full_name = $results["first_name"]." ".$results["last_name"];
        
        return $full_name;
    }

    public static function getUserID_inSession($username) {
        require("../../config.php");
        $sql = "SELECT user_id FROM USERS WHERE username = '$username'";
        $results = mysqli_query($conn, $sql);
        $user_id = mysqli_fetch_assoc($results);

        return $user_id["user_id"];
    }

}

?>