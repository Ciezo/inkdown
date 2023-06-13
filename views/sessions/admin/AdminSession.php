<?php 

class AdminSession {

    public static function setAdminSessionRole($param) {
        $_SESSION["admin"] = $param;
    }

    public static function saveAdminCredentials($username, $password) {
        $_SESSION["admin-username"] = $username;
        $_SESSION["admin-password"] = $password;
    }

    public static function setAdminCookies() {
        setcookie("admin_cookie_username", $_SESSION["admin-username"], time() + (86400 * 30));
        setcookie("admin_cookie_password", $_SESSION["admin-password"], time() + (86400 * 30));
    }

    public static function sessionAdminCheck() {
        // Check if the session variables are set
        if (isset($_SESSION["admin-username"]) && isset($_SESSION["admin-password"])) {
            // Compare the current session values to the saved credentials from cookies
            if($_COOKIE["admin_cookie_username"] == $_SESSION["admin-username"] && 
                $_COOKIE["admin_cookie_password"] == $_SESSION["admin-password"]) {
                    header("location: ../views/admin/home.php");
            }
        } else { 
            header("location: ../views/error/error.php");
        }
    }
}

?>