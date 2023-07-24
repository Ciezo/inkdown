<?php 


class Notes {
    public $author; 
    public $user_id;
    public $title;
    public $body;
    public $date_posted;

    function __construct($author, $user_id, $title, $body) {
        $this->author = $author;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->body = $body;
        $this->date_posted = date("d/m/Y");
    }

    function getNoteAuthor() {
        return $this->author;
    }

    function getNoteUserID() {
        return $this->user_id;
    }

    function getNoteTitle() {
        return $this->title;
    }

    function getNoteBody() {
        return $this->body;
    }

    function getDatePosted() {
        return $this->date_posted;
    }

}

?>