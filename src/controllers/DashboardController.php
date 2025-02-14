<?php
require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../controllers/SkillController.php';

class DashboardController {

    public function index() {
        $skillController = new SkillController();
        $skills = $skillController->getSkillsForForm();

        $projectModel = new Project();
        $projects = $projectModel->getAllProjects();

        require_once __DIR__ . '/../views/user/dashboard.php';
    }
}
?>
