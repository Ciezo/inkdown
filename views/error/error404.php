<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../assets/icon/icon.png" type="image/png">
    <title>Page error</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="../../css/globals.css">

    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Error 404</h2>
                    <div class="alert alert-danger">Resource not found! <a href="../home.php" class="alert-link">go back</a> and try again.</div>
                    <?php 
                        date_default_timezone_set('Asia/Manila');
                        $request_date = date("d/m/Y");
                    ?>
                    <span> Most recent request: <?php echo $request_date; ?>
                    </span>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>