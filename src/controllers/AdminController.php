<?php
require_once __DIR__ . '/../models/Skill.php';

class AdminController {
    public static function manageSkills() {
        $skill = new Skill();
        return $skill->getAllSkills();
    }
}
?>
