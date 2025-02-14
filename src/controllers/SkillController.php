<?php
require_once __DIR__ . '/../models/Skill.php';

class SkillController {

    public function getSkillsForForm() {
        $skillModel = new Skill();
        $skills = $skillModel->getAllSkills();
        return $skills;
    }
}
?>
