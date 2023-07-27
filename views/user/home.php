<?php 
session_start();
require("../../config.php");
require("../../components/utils.php");
require("../../controller/NotesController.php");
require("../../validations/NotesValidations.php");
if (!isset($_SESSION["user"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}


$note_title = $note_body = $author = $date_posted = "";
$_err_note_title = $_err_note_body = $_err_author = $_err_date_posted = "";

// Default variables 
$user_id = Utils::getUserID_inSession($_SESSION["user-username"]);
$author = Utils::getUserFullName_inSession();

if (isset($_POST["save-note"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    /** Validate note title */
    $input_note_title = trim($_POST["note-title"]);
    $validate_note_title = NotesValidations::check_note_title($input_note_title);
    if (isset($validate_note_title)) {
        $_err_note_title = $validate_note_title;
    }
    $note_title = $input_note_title;


    /** Validate note body */
    $input_note_body = trim($_POST["note-body"]);
    $validate_note_body = NotesValidations::check_note_body($input_note_body);
    if(isset($validate_note_body)) {
        $_err_note_body = $validate_note_body;
    }
    $note_body = $input_note_body;


    /** Validate all default variables */
    $validate_authorExists = NotesValidations::check_note_author($author);
    if (isset($validate_authorExists)) {
        // If there is an error occurred, where no author is assigned.
        // Assign the returning value to find the default author for the note
        $input_author = $validate_authorExists; 
    }
    // Otherwise, we just get the author from the default variable

    /** Validate date can be fetched locally */
    $input_date_posted = date("d/m/Y");
    $validate_date_posted = NotesValidations::check_note_date_posted($input_date_posted);
    if(isset($validate_date_posted)) {
        // If error occurs, simply assign the default returning date value upon checking
        $date_posted = $validate_date_posted;
    }
    $date_posted = $input_date_posted; 


    /** Check if no errors occurred */
    if (empty($_err_note_title) && empty($_err_note_body) && empty($_err_author) && empty($_err_date_posted)) {
        $notes_model = new Notes($author, $user_id, $note_title, $note_body);
        $controller = NotesController::saveNote($notes_model, $user_id);
    }
    
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/icon/icon.png" type="image/png">
    <title>Home | Inkdown</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="../../css/globals.css">

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c36559a51c.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <style>
        .container {
            padding-top: 50px;
        }
        .form-group {
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Bootstrap navbar -->
    <?php include ("../../components/injectables/navbar/user_navbar.php");?>

    <!-- Content goes here -->
    <div class="container">
        <div class="notes-editor">
        <div class="card" style="width: max;">
            <div class="card-header"><h2>Start writing...</h3></div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <form action="home.php" method="POST">
                    <div class="form-group">
                        <label>My Title</label>
                        <input type="text" name="note-title" placeholder="I want to write something about...." class="form-control <?php echo (!empty($_err_note_title)) ? 'is-invalid' : ''; ?>" value="<?php echo $note_title ; ?>">
                        <span class="invalid-feedback"><?php echo $_err_note_title ;?></span>
                    </div>
                    <div class="form-group">
                        <span>
                            <div class="btn btn-sm btn-outline-light" onclick="setBold()" title="Bold" data-toggle="tooltip"><i class="fa-solid fa-bold"></i></div>
                            <div class="btn btn-sm btn-outline-light" onclick="setItalic()" title="Italic" data-toggle="tooltip"><i class="fa-solid fa-italic"></i></div>
                            <div class="btn btn-sm btn-outline-light" onclick="setUL()" title="Insert bullets" data-toggle="tooltip"><i class="fa-solid fa-list"></i></div>
                            <div class="btn btn-sm btn-outline-light" onclick="setOL()" title="Insert numbering" data-toggle="tooltip"><i class="fa-solid fa-list-ol"></i></div>
                            <div class="btn btn-sm btn-outline-light" onclick="setBR()" title="Insert new line" data-toggle="tooltip"><i class="fa-solid fa-plus"></i></div>
                            <div class="btn btn-sm btn-outline-light" onclick="setAnchor()" title="Insert link" data-toggle="tooltip"><i class="fa-solid fa-link"></i></div>
                        </span>
                    </div>
                    <div class="form-group">
                        <textarea name="note-body" id="text-body" rows="12" placeholder="Begin writing about anything now...." class="form-control <?php echo (!empty($_err_note_body)) ? 'is-invalid' : ''; ?>"><?php echo $note_body; ?></textarea>
                        <span class="invalid-feedback"><?php echo $_err_note_body ;?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="save-note" class="btn btn-outline-success form-control" value="Save this note">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/setEditorSymbols.js"></script>
</body>
</html>