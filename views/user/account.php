<?php 
session_start();
require("../../config.php");
require("../../components/utils.php");
if (!isset($_SESSION["user"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/icon/icon.png" type="image/png">
    <title>Account | Inkdown</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="../../css/globals.css">

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c36559a51c.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <style>
        .container {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Bootstrap navbar -->
    <?php include ("../../components/injectables/navbar/user_navbar.php");?>

    <!-- Content goes here -->
    <div class="container">
        <div class="card" style="width: 600px;">
            <div class="card-header">
                <h3><?php echo Utils::getUserFullName_inSession() ?></h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Birthday: <?php echo Utils::getUserBirthday(); ?></li>
                    <li class="list-group-item">Username: <?php echo $_SESSION["user-username"]; ?></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>