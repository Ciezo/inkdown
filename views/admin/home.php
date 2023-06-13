<?php 
session_start();
require("../../config.php");
if (!isset($_SESSION["admin"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}

echo $_SESSION["admin-username"];
echo $_SESSION["admin-password"];

?>

hello, admin!