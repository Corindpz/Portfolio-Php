<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public static function register() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /projetb2/dashboard');
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
                header('Location: /projetb2/index.html');
                exit;
            } catch (Exception $e) {
                echo "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
            }
        } else {
            require __DIR__ . '/../views/auth/register.php';
        }
    }

    public static function login() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /projetb2/dashboard');
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
                header('Location: /projetb2/dashboard');
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
