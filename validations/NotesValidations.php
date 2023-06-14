<?php 


class NotesValidations {

    // Default constructor
    public function __construct() {}
    
    public static function check_note_author($input_author) {
        // If there is no author, get the full nme of the user
        if(empty($input_author)) {
            return Utils::getUserFullName_inSession();
        } 
        
        else {
            return "";
        }
    }

    public static function check_note_title($input_note_title) {
        if (empty($input_note_title)) {
            $_err_note_title = "Please, enter a note title!";
            return $_err_note_title;
        } 
        
        else if (!filter_var($input_note_title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))) || preg_match("/[-!$%^&*()_+|~=`{}\[\]:\";'<>?,.\/]/", $input_note_title)) {
            $_err_note_title = "Special characters such as periods, commas, hyphens are not allowed. Examples: [-!$%^&*()_+|~=`{}\[\]:";
            return $_err_note_title;
        }
    
        else if (!filter_var($input_note_title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $_err_note_title = "Please, enter a valid name title!";
            return $_err_note_title;
        }
        
        else {
            return "";
        }
    }

    public static function check_note_body($input_note_body) {
        if (empty($input_note_body)) {
            $_err_note_body = "Please, write your note here!";
            return $_err_note_body;
        }
        
        else {
            return "";
        }
    }

    public static function check_note_date_posted($input_date_posted) {
        // If we can't get date, try to return it again
        if(empty($input_date_posted)) {
            return date("d/m/Y"); 
        } 

        else {
            return "";
        }
    }
}

?>