<?php 
require("../../controller/NotesController.php");
require("../../controller/TrashNoteController.php");

$note_id = trim($_GET["id"]);
$user_id = trim($_GET["uid"]);

// Archive our note content to the Trash table 
$dmp_note = NotesController::fetchNoteByNoteID($note_id);
$author = $note_uid = $title = $body = ""; 
foreach ($dmp_note as $note) {
    $author = $note["author"];
    $note_uid = $note["user_id"];
    $title = $note["title"];
    $body = $note["body"];
}
$tmp_note = new Notes($author, $note_uid, $title, $body);
TrashNoteController::saveTrash($tmp_note, $note_id, $user_id);

// Remove it from the Notes table 
NotesController::removeNote($note_id, $user_id);
?> 