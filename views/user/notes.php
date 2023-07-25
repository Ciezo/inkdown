<?php 
session_start();
require("../../config.php");
require("../../components/utils.php");
require("../../controller/NotesController.php");
if (!isset($_SESSION["user"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}

/** Get the user ID 
 * Fetch all notes by user in session
*/
$user_id = Utils::getUserID_inSession($_SESSION["user-username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icon/icon.png" type="image/png">
    <title>Notes | Inkdown</title>

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
        .note-tile {
            /* margin: 0 auto;  */
            text-align: left
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
        <div class="notes-ls card px-4 mx-3 mb-4">
            <h3>My Notes</h3>
            <!-- 
                @note
                Each note will be rendered inside an anchor that redirects
                to a composable content on a separate page
             -->
            <?php 
                $notes_ls = NotesController::fetchNoteByUserID(strval($user_id));
                if(!empty($notes_ls)) {
                    foreach ($notes_ls as $notes) {
                        echo '<a class="note-tile card btn btn-outline-dark px-1 mx-2 mb-3" href="notes-edit.php?id='.$notes["note_id"].'">';
                        echo    '<span><b>'.$notes["title"].'</b></span>';
                        echo    '<p>'.$notes["body"].'</p>';
                        echo    '<div class="card-footer">';
                        echo        '<span>'.$notes["date_posted"].'</span>';
                        echo    '</div>';
                        echo '</a>';
                    } 
                } else {
                    include("../../components/composable/emptyNotes.php");
                }
            ?>
        </div>        
    </div>
</body>
</html>