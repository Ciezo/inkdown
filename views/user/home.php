<?php 
session_start();
require("../../config.php");
if (!isset($_SESSION["user"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}

echo $_SESSION["user-username"];
echo $_SESSION["user-password"];

?>

hello, user!