<?php 
require("../model/User.php");
require("../api/UserAPI.php");


class UserController {
    
    public static function saveUser(User $user) {
        UserAPI::createUser(
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBirthday(),
            $user->getUsername(),
            $user->getPassword()
        );
    }
}

?>