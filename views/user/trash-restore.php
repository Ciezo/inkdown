<?php 
require("../../controller/NotesController.php");
require("../../controller/TrashNoteController.php");

$note_id = trim($_GET["id"]);
$user_id = trim($_GET["uid"]);
$trash_id = trim($_GET["tid"]);

$restore_note = TrashNoteController::fetchTrashListByNoteID($note_id);
$author = $note_uid = $title = $body = ""; 
foreach ($restore_note as $note) {
    $author = $note["author"];
    $note_uid = $note["user_id"];
    $title = $note["title"];
    $body = $note["body"];
}

$new_note = new Notes($author, $note_uid, $title, $body);
// "Restore" the note by inserting it again to the Notes table
NotesController::saveNote($new_note, $user_id);
// Remove the trash from the Trash table
TrashNoteController::removeTrash($trash_id, $user_id);
?>