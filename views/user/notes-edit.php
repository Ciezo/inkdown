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

/** Get the user ID
 * and some default variables 
*/
$user_id = Utils::getUserID_inSession($_SESSION["user-username"]);
$author = Utils::getUserFullName_inSession();
$note_id =  trim($_GET["id"]);


$note_title = $note_body = "";
$_err_note_title = $_err_note_body = "";


/** Extracting the id paramater value from URL */
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $note_id = $_POST["id"];
}

else {
    $note_id =  trim($_GET["id"]);

    /** Fetch the note data by note_id */
    $notes_ls = NotesController::fetchNoteByNoteID($note_id);
    foreach ($notes_ls as $note) {
        $note_title = $note["title"];
        $note_body = $note["body"];
    }
}

if (isset($_POST["update-note"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    /** Validate new note title */
    $input_note_title = trim($_POST["note-title"]);
    $validate_note_title = NotesValidations::check_note_title($input_note_title);
    if (isset($validate_note_title)) {
        $_err_note_title = $validate_note_title;
    }
    $note_title = $input_note_title;

    /** Validate new note body */
    $input_note_body = trim($_POST["note-body"]);
    $validate_note_body = NotesValidations::check_note_body($input_note_body);
    if(isset($validate_note_body)) {
        $_err_note_body = $validate_note_body;
    }
    $note_body = $input_note_body;


    if (empty($_err_note_title) && empty($_err_note_body)) {
        $updated_notes_model = new Notes($author, $user_id, $note_title, $note_body); 
        $controller = NotesController::patchNote(
            $note_id, 
            $user_id, 
            $updated_notes_model->getNoteTitle(),
            $updated_notes_model->getNoteBody(),
            $updated_notes_model->getDatePosted()
        );
    }

}

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
        .notes-editor {
            padding: 5px;
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
        <div class="notes-editor card px-3 mb-2">
            <!-- Editor area -->
            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                <div class="card mb-2">
                    <div class="card-header">
                        <h3>
                            <input type="text" name="note-title" class="form-control <?php echo (!empty($_err_note_title)) ? 'is-invalid' : ''; ?>" value="<?php echo $note_title ; ?>">
                            <span class="invalid-feedback"><?php echo $_err_note_title ;?></span>
                        </h3>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="form-group">
                            <textarea name="note-body" rows="15" class="form-control <?php echo (!empty($_err_note_body)) ? 'is-invalid' : ''; ?>"><?php echo $note_body; ?></textarea>
                            <span class="invalid-feedback"><?php echo $_err_note_body ;?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!-- Submit -->
                    <input type="submit" name="update-note" class="btn btn-success" value="Save Changes">
                    
                    <a href="notes.php" class="btn btn-outline-secondary">Cancel</a>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#trashPrompt">
                        <i class="fa-solid fa-trash"></i> Move to trash</a>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal pop-up to ask user for moving note to trash -->
    <div class="modal fade" id="trashPrompt" tabindex="-1" role="dialog" aria-labelledby="trashPromptLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="trashPromptLabel">Move this note to trash?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            You are about to remove this note from your saved contents. <br>
            Please, check your trash archive for retrieval.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <?php echo '<a class="btn btn-danger" href="../../components/composable/deleteNote.php?id='.$note_id.'&uid='.$user_id.'"><i class="fa-solid fa-trash"></i> Yes</a>'; ?>
        </div>
        </div>
    </div>
    </div>
</body>