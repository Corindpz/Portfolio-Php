<?php
require_once __DIR__ . '/../models/Project.php';

class ProjectController {
    public static function dashboard() {
        $project = new Project();
        $projects = $project->getProjectsByUser($_SESSION['user_id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $skills = $_POST['skills'] ?? [];
            $imagePath = null;

            // Gérer l'upload d'image
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

            // Créer le projet
            $projectData = [
                'user_id' => $_SESSION['user_id'],
                'title' => $title,
                'description' => $description,
                'image' => $imagePath
            ];

            $projectId = $project->createProject($projectData);

            // Associer les compétences
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
