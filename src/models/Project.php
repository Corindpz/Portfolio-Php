<?php
require_once __DIR__ . '/../../config/database.php';

class Project {
    public function createProject($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO projects (user_id, title, description) VALUES (?, ?, ?)");
        $stmt->execute([$data['user_id'], $data['title'], $data['description']]);
        return $pdo->lastInsertId();
    }

    public function attachSkills($projectId, $skills) {
        global $pdo;
        foreach ($skills as $skillId) {
            $stmt = $pdo->prepare("INSERT INTO project_skills (project_id, skill_id) VALUES (?, ?)");
            $stmt->execute([$projectId, $skillId]);
        }
    }

    public function getProjectsByUser($userId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function getProjectSkills($projectId) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT s.* FROM skills s
            INNER JOIN project_skills ps ON ps.skill_id = s.id
            WHERE ps.project_id = ?
        ");
        $stmt->execute([$projectId]);
        return $stmt->fetchAll();
    }
}
?>