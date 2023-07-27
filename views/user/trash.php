<?php 
session_start();
require("../../config.php");
require("../../components/utils.php");
require("../../controller/TrashNoteController.php");
if (!isset($_SESSION["user"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}

/** Get the user ID 
 * Fetch all trash by user in session
*/
$user_id = Utils::getUserID_inSession($_SESSION["user-username"]);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/icon/icon.png" type="image/png">
    <title>Trash | Inkdown</title>

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
        .note-tile {
            /* margin: 0 auto;  */
            text-align: left;
        }
        .note-tile span {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <!-- Bootstrap navbar -->
    <?php include ("../../components/injectables/navbar/user_navbar.php");?>

    <!-- Content goes here -->
    <div class="container">
        <div class="trash-ls card px-4 mx-3 mb-4">
            <h3>My Trash</h3>
            <!-- 
                @note
                Each note will be rendered inside an anchor that redirects
                to a composable content on a separate page
             -->
            <?php 
                $trash_ls = TrashNoteController::fetchTrashListByUserID($user_id);
                if(!empty($trash_ls)) {
                    foreach ($trash_ls as $trash) {
                        echo '<div class="note-tile alert alert-danger card px-4 mb-3">';
                        echo    '<span><b>'.$trash["title"].'</b></span>';
                        echo    '<p>'.$trash["body"].'</p>';
                        echo    '<div class="card-footer">';
                        echo        '<span>'.$trash["date_posted"].'</span>';
                        echo    '</div>';
                        echo    '<div class="card-footer">';
                        echo        '<span>';
                        echo            '<a class="mx-1 btn btn-outline-danger btn-sm" href="trash-delete.php?tid='.$trash["trash_id"].'">Delete</a>';
                        echo            '<a class="mx-1 btn btn-outline-success btn-sm" href="trash-restore.php?id='.$trash["note_id"].
                                                                                                                    '&uid='.$user_id. 
                                                                                                                    '&tid='.$trash["trash_id"].'">Restore</a>';
                        echo        '</span>';
                        echo    '</div>';
                        echo '</div>';
                    } 
                } else {
                    include("../../components/composable/emptyTrash.php");
                }
            ?>
        </div>  
    </div>
</body>
</html>