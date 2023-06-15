<?php 

class NotesAPI {

    public static function createNote($user_id, $author, $title, $body, $date_posted) {
        $sql = "INSERT INTO NOTES (user_id, author, title, body, date_posted)
                    VALUES 
                    (
                        '$user_id',
                        '$author',
                        '$title',
                        '$body',
                        '$date_posted'
                    )";
        
        require("../../config.php");
        if (mysqli_query($conn, $sql)) {
            header("location: ../user/home.php");
        } else {
            header("location: ../error/error.php");
        }
    }

    public static function getNotesList() {
        $sql = "SELECT * FROM NOTES";
        $notes_ls = array();
        
        require("../../config.php");
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
            $notes_ls[] = $rows;
        }
            
        return $notes_ls; 
    }
    
    public static function getNotesListByUserID($user_id) {
        $sql = "SELECT * FROM NOTES WHERE user_id = '$user_id'";
        $notes_ls_byID = array();
        
        require("../../config.php");
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
            $notes_ls_byID[] = $rows;
        }
            
        return $notes_ls_byID; 
    }

    public static function getNoteByNoteID($note_id) {
        $sql = "SELECT * FROM NOTES WHERE note_id = '$note_id'";
        $notes_ls_byNoteID = array();

        require("../../config.php");
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
            $notes_ls_byNoteID[] = $rows;
        }
            
        return $notes_ls_byNoteID; 
    }

    public static function updateNote($note_id, $user_id, $title, $body, $date_posted) {
        $sql = "UPDATE NOTES SET 
                    title = '$title',
                    body = '$body',
                    date_posted = '$date_posted'
                WHERE note_id = '$note_id' AND user_id = '$user_id'";
        
        require("../../config.php");
        if (mysqli_query($conn, $sql)) {
            header("location: ../user/notes.php");
        } else {
            header("location: ../error/error.php");
        }
    }

    public static function deleteNote($note_id, $user_id) {
        $sql = "DELETE FROM NOTES WHERE note_id = '$note_id' AND user_id = '$user_id'";
        
        require("../../config.php");
        if (mysqli_query($conn, $sql)) {
            header("location: ../../views/user/notes.php");
        } else {
            header("location: ../error/error.php");
        }
    } 

}

?>