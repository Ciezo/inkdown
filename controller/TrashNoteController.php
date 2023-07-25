<?php
require("../../model/TrashNote.php");
require("../../api/TrashNoteAPI.php");


class TrashNoteController {

    public static function saveTrash(Notes $note, $note_id, $user_id) {
        $trash = new TrashNote($note);
        TrashNoteAPI::createTrashNote(
            $note_id,
            $user_id, 
            $trash->getNoteAuthor(),
            $trash->getNoteTitle(),
            $trash->getNoteBody(),
            $trash->getDatePosted()
        );       
    }

    public static function fetchTrashList() {
        $trash_ls = TrashNoteAPI::getTrashNotesList(); 
        return $trash_ls;
    }

    public static function fetchTrashListByUserID($user_id) {
        $trash_ls = TrashNoteAPI::getTrashNoteByUserID($user_id);
        return $trash_ls; 
    }

    public static function fetchTrashListByNoteID($note_id) {
        $trash_ls = TrashNoteAPI::getTrashNoteByNoteID($note_id);
        return $trash_ls;
    }

    public static function removeTrash($trash_id, $user_id) {
        TrashNoteAPI::deleteTrashNote($trash_id, $user_id);
    }

}
?>