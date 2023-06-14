<?php
session_start();
require("../../config.php");
require("../../controller/NotesController.php");
require("../../controller/UserController.php");


$notes =  NotesController::fetchNotesList();
if (!empty($notes)) {
    // Iterate over the notes array and display each note
    foreach ($notes as $note) {
        echo "Note ID: " . $note['note_id'] . "<br>";
        echo "User ID: " . $note['user_id'] . "<br>";
        echo "Title: " . $note['title'] . "<br>";
        echo "Content: " . $note['body'] . "<br>";
        echo "Author: " . $note['author'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No notes found.";
}
?> 

test, page.
