<?php
require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../controllers/SkillController.php';

class ProjectController {

    
    public static function showProject($projectId) {
        $projectModel = new Project();
        $project = $projectModel->getProjectById($projectId);
    
        $skills = $projectModel->getProjectSkills($projectId);
    
        if (!$project) {
            header('Location: /projetb2/dashboard');
            exit;
        }

        require __DIR__ . '/../views/user/project.php';
    }

    public static function deleteProject($projectId) {
        $project = new Project();
        $projectData = $project->getProjectById($projectId);

        if ($projectData && $projectData['user_id'] === $_SESSION['user_id']) {
            if ($projectData['image']) {
                $imagePath = __DIR__ . '/../../public' . $projectData['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $project->deleteProjectSkills($projectId);

            $project->deleteProject($projectId);

            $_SESSION['success'] = "Le projet a été supprimé avec succès.";
        } else {
            $_SESSION['error'] = "Le projet n'existe pas ou vous n'êtes pas autorisé à le supprimer.";
        }

        header('Location: /projetb2/dashboard');
        exit;
    }
    
    public static function dashboard() {
        $project = new Project();
        $projects = $project->getProjectsByUser($_SESSION['user_id']);

        $skillController = new SkillController();
        $skills = $skillController->getSkillsForForm();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $skills = $_POST['skills'] ?? [];
            $imagePath = null;
        
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                $fileName = uniqid() . '-' . basename($_FILES['image']['name']);
                $uploadFilePath = $uploadDir . $fileName;
        
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
                    $imagePath = '/public/uploads/' . $fileName;
                } else {
                    $_SESSION['error'] = "Échec du téléchargement de l'image.";
                }
            }
        
            $projectData = [
                'user_id' => $_SESSION['user_id'],
                'title' => $title,
                'description' => $description,
                'image' => $imagePath
            ];
        
            $projectId = $project->createProject($projectData);
        
            if ($skills) {
                $project->attachSkills($projectId, $skills);
            }
        
            $_SESSION['success'] = "Projet créé avec succès !";
            header('Location: /projetb2/dashboard');
            exit;
        }
        

        require __DIR__ . '/../views/user/dashboard.php';
    }
}
