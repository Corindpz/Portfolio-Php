<?php
require_once __DIR__ . '/../models/Project.php';

class ProjectController {
    public static function dashboard() {
        $project = new Project();
        $projects = $project->getProjectsByUser($_SESSION['user_id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectData = [
                'user_id' => $_SESSION['user_id'],
                'title' => $_POST['title'],
                'description' => $_POST['description']
            ];

            $skills = $_POST['skills'] ?? []; // Tableau d'IDs de compétences
            $projectId = $project->createProject($projectData);
            $project->attachSkills($projectId, $skills);

            // Recharge les projets après ajout
            $projects = $project->getProjectsByUser($_SESSION['user_id']);
        }

        require __DIR__ . '/../views/user/dashboard.php';
    }
}

?>