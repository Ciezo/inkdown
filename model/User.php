<?php


class User {
    public $first_name;
    public $last_name;
    public $birthday;
    public $username;
    public $password;

    function __construct($first_name, $last_name, $birthday, $username, $password){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthday = $birthday;
        $this->username = $username;
        $this->password = $password;
    }

    function getFirstName(){
        return $this->first_name;
    }

    function getLastName(){
        return $this->last_name;
    }

    function getFullName(){
        return $this->first_name." ".$last_name;
    }

    function getBirthday(){
        return $this->birthday;
    }

    function getUsername(){
        return $this->username;
    }

    function getPassword(){
        return $this->password;
    }
}

?>