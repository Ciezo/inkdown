<?php 


class TrashNoteAPI {

    public static function createTrashNote($note_id, $user_id, $author, $title, $body, $date_posted) {
        $sql = "INSERT INTO TRASH (note_id, user_id, author, title, body, date_posted)
                    VALUES
                    (
                        '$note_id',
                        '$user_id',
                        '$author',
                        '$title',
                        '$body',
                        '$date_posted'
                    )";

        require("../../config.php");
        if (mysqli_query($conn, $sql)) {
            header("location: ../user/notes.php");
        } else {
            header("location: ../error/error.php");
        }
    }

    public static function getTrashNotesList() {}

    public static function getTrashNoteByUserID($user_id) {}

    public static function deleteTrashNote($trash_id) {}

}

?>