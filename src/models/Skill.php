<?php
require_once __DIR__ . '/../../config/database.php';

class Skill {
    public function getAllSkills() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM skills");
        return $stmt->fetchAll();
    }

    public function addSkill($skillName) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO skills (name) VALUES (:name)");
        $stmt->execute(['name' => $skillName]);
    }

    public function deleteSkill($skillId) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM skills WHERE id = :id");
        $stmt->execute(['id' => $skillId]);
    }
}
?>