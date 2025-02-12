<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public static function profile($id) {
        $user = new User();
        return $user->getUserById($id);
    }
}
?>
