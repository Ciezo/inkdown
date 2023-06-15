<?php 
require("../../controller/NotesController.php");

$note_id = trim($_GET["id"]);
$user_id = trim($_GET["uid"]);

NotesController::removeNote($note_id, $user_id);
?> 