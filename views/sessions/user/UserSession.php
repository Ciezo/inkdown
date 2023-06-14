<?php 

class UserSession {

    public static function setUserSessionRole($param) {
        $_SESSION["user"] = $param;
    }

    public static function saveUserCredentials($username, $password) {
        $_SESSION["user-username"] = $username;
        $_SESSION["user-password"] = $password;
    }

    public static function setUserCookies() {
        setcookie("user_cookie_username", $_SESSION["user-username"], time() + (86400 * 30));
        setcookie("user_cookie_password", $_SESSION["user-password"], time() + (86400 * 30));
    }

    public static function sessionUserCheck() {
        // Check if the session variables are set
        if (isset($_SESSION["user-username"]) && isset($_SESSION["user-password"])) {
            // Compare the current session values to the saved credentials from cookies
            if($_COOKIE["user_cookie_username"] == $_SESSION["user-username"] && 
                $_COOKIE["user_cookie_password"] == $_SESSION["user-password"]) {
                    header("location: ../views/user/home.php");
            }
        } else { 
            header("location: ../views/error/error.php");
        }
    }

    public static function destroyUserSessionAndCookies() {
        session_destroy();
        setcookie("user_cookie_username", "", time() - 3600);
        setcookie("user_cookie_password","", time() - 3600);
    }
}

?>