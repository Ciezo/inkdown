<?php 
    require("../config.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkdown | Home</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


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
        .splash-header {
            margin: 0 auto;
            background: no-repeat center;
            margin-left: 150px;
        }
        .splash-subtitle {
            margin: 0 auto;
            text-align: right;
            font-size: 25px;
            margin-top: -100px;
            margin-left: -250px;
        }
    </style>
</head>
<body id="onLoadPage">
    
    <!-- Bootstap navbar  -->
    <?php include ("../components/injectables/navbar/home_navbar.php");?>

    <div class="container mx-auto px-3">
        <div class="splash-welcome-content">
            <div class="splash-header">
                <img src="../assets/logo/splash_logo.png" alt="Splash logo">
                <div class="splash-subtitle">
                    Your friendly in-browser note editor application
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            setInterval(function(){
            $("#onLoadPage").load("home.php");
            }, 500); 
            console.log("Load");
        });
    </script>
</body>
</html>