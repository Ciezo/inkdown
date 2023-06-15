<?php 
require("../../model/Notes.php");
require("../../api/NotesAPI.php");


class NotesController {

    public static function saveNote(Notes $notes, $user_id) {
        NotesAPI::createNote(
            $user_id,
            $notes->getNoteAuthor(),
            $notes->getNoteTitle(),
            $notes->getNoteBody(),
            $notes->getDatePosted()
        );
    }

    public static function fetchNotesList() {
        $notes_ls = NotesAPI::getNotesList();
        return $notes_ls;
    }

    public static function fetchNoteByNoteID($note_id) {
        $notes_ls_byNoteID = NotesAPI::getNoteByNoteID($note_id);
        return $notes_ls_byNoteID;
    }

    public static function fetchNoteByUserID($user_id) {
        $notes_ls_byID = NotesAPI::getNotesListByUserID($user_id);
        return $notes_ls_byID;
    }

    public static function patchNote($note_id, $user_id, $title, $body, $date_posted) {
        NotesAPI::updateNote($note_id, $user_id, $title, $body, $date_posted);
    }

    public static function removeNote($note_id, $user_id) {
        NotesAPI::deleteNote($note_id, $user_id);
    }

}

?>