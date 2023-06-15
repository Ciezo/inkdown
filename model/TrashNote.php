<?php 
require("Notes.php");

class TrashNote {

    public Notes $note;

    // Default constructor
    public function __construct(Notes $note) {
        $this->note = $note;
    }

    function getNoteAuthor() {
        return $this->note->getNoteAuthor();
    }

    function getNoteUserID() {
        return $this->note->getNoteUserID();
    }

    function getNoteTitle() {
        return $this->note->getNoteTitle();
    }

    function getNoteBody() {
        return $this->note->getNoteBody();
    }

    function getDatePosted() {
        return $this->note->getDatePosted();
    }

}

?>