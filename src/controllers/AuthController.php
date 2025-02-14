<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public static function register() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            $user = new User();
            try {   
                $user->register($data);
                header('Location: /index.php');
                exit;
            } catch (Exception $e) {
                echo "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
            }
        } else {
            require __DIR__ . '/../views/auth/register.php';
        }
    }

    public static function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        session_unset();
        
        session_destroy();
        
        header('Location: /projetb2/login');
        exit;
    }

    public static function login() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            $user = new User();
            $loginSuccess = $user->login($data);

            if ($loginSuccess) {
                header('Location: /dashboard');
                exit;
            } else {
                echo "<p style='color:red;'>Email ou mot de passe incorrect.</p>";
            }
        } else {
            require __DIR__ . '/../views/auth/login.php';
        }
    }
}
?>
