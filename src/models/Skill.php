<?php
require_once __DIR__ . '/../../config/database.php';

class Skill {
    public function getAllSkills() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM skills");
        return $stmt->fetchAll();
    }
}
?>
