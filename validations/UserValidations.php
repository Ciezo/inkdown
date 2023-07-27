<?php 


class UserValidations {

    // Default constructor
    public function __construct() {}

    public static function check_first_name($input_first_name) {
        if (empty($input_first_name)) {
            $_err_first_name = "Please, enter your first name!";
            return $_err_first_name;
        }
    
        else if (!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))) || preg_match("/[-!$%^&*()_+|~=`{}\[\]:\";'<>?,.\/]/", $input_first_name)) {
            $_err_first_name = "Special characters such as periods, commas, hyphens are not allowed. Examples: [-!$%^&*()_+|~=`{}\[\]:";
            return $_err_first_name;
        }
    
        else if (!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $_err_first_name = "Please, enter a valid name full name!";
            return $_err_first_name;
        }

        else {
            return "";
        }
    }



    public static function check_last_name($input_last_name) {
        if (empty($input_last_name)) {
            $_err_last_name = "Please, enter your last name!";
            return $_err_last_name;
        }
        
        else if (!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))) || preg_match("/[-!$%^&*()_+|~=`{}\[\]:\";'<>?,.\/]/", $input_first_name)) {
            $_err_last_name = "Special characters such as periods, commas, hyphens are not allowed. Examples: [-!$%^&*()_+|~=`{}\[\]:";
            return $_err_last_name;
        }
        
        else if (!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $_err_last_name = "Please, enter a valid name full name!";
            return $_err_last_name;
        }
    
        else {
            return "";
        }
    }



    public static function check_user_birthday($input_birthday) {
        if (empty($input_birthday)) {
            $_err_birthday = "Please, enter your birthday!";
            return $_err_birthday;
        }
    
        else {
            return "";
        }
    
    }



    public static function check_username($input_username) {
        require("../config.php");
        
        if (empty($input_username)) {
            $_err_username = "Please, provide a username!";
            return $_err_username; 
        }
    
        else if (!preg_match("/^[a-zA-Z0-9_]+$/", $input_username)) {
            $_err_username = "Please, provide a valid username!";
            return $_err_username; 
        }
    
        else if (strlen($input_username) < 4 || strlen($input_username) > 16) {
            $_err_username = "Please, provide a username that has at least 4 up to more than 16 characters";
            return $_err_username; 
        }
        
        else {
            // Check to see if username is already taken
            if (isset($input_username)) {
                // Create a query to check if the contact number is taken!
                $query = "SELECT * FROM USERS"; 
                $results = mysqli_query($conn, $query); 
                
                // Fetch the results as rows
                while ($rows = mysqli_fetch_array($results)) {
                    // A cursor points to each row 
                    $cursor = $rows;         
                    // fetch all existing contact_num
                    $temp_username = $cursor['username'];   
                    if (strcmp($temp_username, $input_username) == 0) {
                        $_err_username = "This username is already taken!";
                        $isTaken_username = true;
                        return $_err_username; 
                    }
    
                    else {
                        $isTaken_username = false;
                        return $isTaken_username; 
                    }
                }
    
                if ($isTaken_username == false) {
                    return "";
                }
            }
        }
    }



    public static function check_user_password($input_password) {
        if (empty($input_password)) {
            $_err_password = "Please, provide a password!";
            return $_err_password;
        }
        
        else if (strlen($input_password) < 4 || strlen($input_password) > 16) {
            $_err_password = "Please, provide a password that has at least 4 up to more than 16 characters";
            return $_err_password;
        }
    
        else {
            return "";
        }
    }


    public static function login_check_username($input_username) {
        if (empty($input_username)) {
            $_err_username = "Please, provide a username!";
            return $_err_username;
        }

        else {
            return "";
        }
    }

    public static function login_check_password($input_password) {
        if (empty($input_password)) {
            $_err_password = "Please, provide a password!";
            return $_err_password;
        }

        else {
            return "";
        }
    }

}

?>