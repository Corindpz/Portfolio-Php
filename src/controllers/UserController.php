<?php
require_once __DIR__ . '/../models/User.php';

class UserController {

    public static function profile($userId) {
        $userModel = new User();
        $user = $userModel->getUserById($userId);
        
        require_once __DIR__ . '/../views/user/profile.php';
    }
}
?>
