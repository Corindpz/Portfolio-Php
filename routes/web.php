<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$request = str_replace('/projetb2', '', $_SERVER['REQUEST_URI']);
$request = strtok($request, '?');
$method = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case '/' :
    case '' :
    case '/login' :
        if (isset($_SESSION['user_id'])) {
            header('Location: /projetb2/dashboard');
            exit;
        }
        if ($method === 'POST') {
            require __DIR__ . '/../src/controllers/AuthController.php';
            AuthController::login();
        } else {
            require __DIR__ . '/../src/views/auth/login.php';
        }
        break;
    
    case '/logout':
        require __DIR__ . '/../src/controllers/AuthController.php';
        AuthController::logout();
        break;

    case '/register' :
        if (isset($_SESSION['user_id'])) {
            header('Location: /projetb2/dashboard');
            exit;
        }
        if ($method === 'POST') {
            require __DIR__ . '/../src/controllers/AuthController.php';
            AuthController::register();
        } else {
            require __DIR__ . '/../src/views/auth/register.php';
        }
        break;

    case '/dashboard':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /projetb2/login');
            exit;
        }

        require __DIR__ . '/../src/controllers/ProjectController.php';
        ProjectController::dashboard();
        break;
    
    case (preg_match('/^\/project\/(\d+)$/', $request, $matches) ? true : false):
        $projectId = (int) $matches[1];
        require __DIR__ . '/../src/controllers/ProjectController.php';
        ProjectController::showProject($projectId);
        break;
    

    case (preg_match('/^\/delete-project\/(\d+)$/', $request, $matches) ? true : false):
        $projectId = (int) $matches[1];
        require __DIR__ . '/../src/controllers/ProjectController.php';
        ProjectController::deleteProject($projectId);
        break;
    
    case '/admin/skills':
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /dashboard');
            exit;
        }
        require __DIR__ . '/../src/controllers/AdminController.php';
        AdminController::skillsManagement();
        break;

    case '/profile':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /projetb2/login');
            exit;
        }

        require __DIR__ . '/../src/controllers/UserController.php';
        UserController::profile($_SESSION['user_id']);
        break;

    default:
        header('Location: /dashboard');
        break;
}
?>
