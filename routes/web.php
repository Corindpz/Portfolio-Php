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

    case '/dashboard' :
        if (!isset($_SESSION['user_id'])) {
            header('Location: /projetb2/index.html');
            exit;
        }
        require __DIR__ . '/../src/views/user/dashboard.php';
        break;

    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}
?>
