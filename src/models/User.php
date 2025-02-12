<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    public function register($data) {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Cet email est déjà utilisé.");
        }

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt->execute([$data['name'], $data['email'], $password]);
    }

    public function login($data) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        $user = $stmt->fetch();

        if ($user && password_verify($data['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function getUserById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>
