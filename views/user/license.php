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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inkdown | License</title>
    
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
        #license_active{
            color:white;
            font-weight:bold;
        }
    </style>
</head>
<body>

    <!-- Bootstap navbar  -->
    <?php include ("../../components/injectables/navbar/user_navbar.php");?>
    
    <main>
        <!-- Content goes here -->
        <div class="container-sm mx-auto pt-5">
            <div class="p-4 p-md-5 border rounded-3 mb-5">
                <h2 class="display-5">License</h2>
                <hr>
                <div class="text-center">
                    <p>
                        MIT License <br>
    
                        <b>Copyright (c) 2023 Cloyd Van</b>
    
                        <p>Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:</p>
    
                        <p>The above copyright notice and this permission notice shall be included in all
                        copies or substantial portions of the Software.</p>
    
                        <p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
                        SOFTWARE.</p>
                    </p>
                </div>

                <button onclick="history.back()" class="btn btn-outline-info btn-sm px-4 me-sm-3 fw-bold">Back</button>
            </div>
        </div>
    </main>
</body>
</html>