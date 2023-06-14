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

    public static function fetchUser() {
        $users_ls = UserAPI::getUsers();
        return $users_ls;
    }

    public static function patchUser(User $user, $user_id) {
        UserAPI::updateUser(
            $user_id,
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBirthday()
        );
    }

    public static function removeUser($user_id) {
        UserAPI::deleteUser($user_id);
    }
    
}

?>