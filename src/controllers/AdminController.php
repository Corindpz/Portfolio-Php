<?php
require_once __DIR__ . '/../models/Skill.php';

class AdminController {

    public static function skillsManagement() {
        $skillModel = new Skill();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action']) && $_POST['action'] === 'add' && !empty($_POST['skill_name'])) {
                $skillModel->addSkill(trim($_POST['skill_name']));
            }

            if (isset($_POST['action']) && $_POST['action'] === 'delete' && !empty($_POST['skill_id'])) {
                $skillModel->deleteSkill((int) $_POST['skill_id']);
            }

            header('Location: /admin/skills');
            exit;
        }

        $skills = $skillModel->getAllSkills();

        require_once __DIR__ . '/../views/admin/skills.php';
    }
}
?>
