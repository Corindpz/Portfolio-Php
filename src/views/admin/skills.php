<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration des compétences</title>
    <link rel="stylesheet" href="/public/assets/css/admin_skills.css">
</head>
<body>
    <div class="admin-container">
        <h1>Administration des compétences</h1>

        <section class="add-skill">
            <h2>Ajouter une compétence</h2>
            <form method="post" action="/admin/skills">
                <input type="text" name="skill_name" placeholder="Nom de la compétence" required>
                <button type="submit" name="action" value="add">Ajouter</button>
            </form>
        </section>

        <section class="list-skills">
            <h2>Liste des compétences</h2>
            <?php if (!empty($skills)): ?>
                <ul>
                    <?php foreach ($skills as $skill): ?>
                        <li>
                            <?= htmlspecialchars($skill['name']) ?>
                            <form method="post" action="/admin/skills" style="display:inline;">
                                <input type="hidden" name="skill_id" value="<?= $skill['id'] ?>">
                                <button type="submit" name="action" value="delete" onclick="return confirm('Supprimer cette compétence ?');">Supprimer</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucune compétence disponible.</p>
            <?php endif; ?>
        </section>
    </div>
</body>
</html>
