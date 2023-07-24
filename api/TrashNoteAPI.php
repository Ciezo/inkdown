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
            header("location: ../../views/user/notes.php");
        } else {
            header("location: ../../views/error/error.php");
        }
    }

    public static function getTrashNotesList() {
        $sql = "SELECT * FROM TRASH";
        $trash_ls = array();

        require("../../config.php");
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
            $trash_ls[] = $rows;
        }

        if (empty($trash_ls)) {
            return;
        }

        return $trash_ls;
    }

    public static function getTrashNoteByUserID($user_id) {
        $sql = "SELECT * FROM TRASH where user_id = '$user_id'";
        $trash_ls_byID = array();

        require("../../config.php");
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
            $trash_ls_byID[] = $rows;
        }

        if (empty($trash_ls_byID)) {
            return;
        }

        return $trash_ls_byID;
    }

    public static function deleteTrashNote($trash_id, $user_id) {
        $sql = "DELETE FROM TRASH WHERE note_id = '$trash_id' AND user_id = '$user_id'";

        require("../../config.php");
        if (mysqli_query($conn, $sql)) {
            header("location: ../../views/user/trash.php");
        } else {
            header("location: ../error/error.php");
        }
    }

}

?>