<?php 
session_start();
require("../../config.php");
require("../../components/utils.php");
require("../../controller/TrashNoteController.php");
if (!isset($_SESSION["user"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}

$trash_id = "";
if(isset($_POST["tid"]) && !empty($_POST["tid"])){
    $user_id = Utils::getUserID_inSession($_SESSION["user-username"]);
    $trash_id = trim($_POST["tid"]);
    TrashNoteController::removeTrash($trash_id, $user_id);
}

else {

    // Try fetching id, and...
    if(empty(trim($_GET["tid"]))){
        // And if the ID is empty 
        // Get URL parameter for extraction
        $trash_id =  trim($_GET["tid"]);
    }

}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/icon/icon.png" type="image/png">
    <title>Delete Trash? | Inkdown</title>

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
            width: 700px;
        }
    </style>
</head>
<body>
    <!-- Bootstrap navbar -->
    <?php include ("../../components/injectables/navbar/user_navbar.php");?>

    <!-- Content goes here -->
    <div class="container">
        <h3>Delete forever?</h3>
        <form action="trash-delete.php" method="POST">
            <div class="alert alert-danger">
                <input type="hidden" name="tid" value="<?php echo trim($_GET["tid"]); ?>">
                <p>Upon deletion. This record cannot be retrieved. Please, proceed with caution</p>
                <p>
                    <input type="submit" value="Yes" class="btn btn-danger">
                    <a class="btn btn-secondary ml-2" href="trash.php">Cancel</a>
                </p>
            </div>
        </form>
    </div>  
</body>
</html>