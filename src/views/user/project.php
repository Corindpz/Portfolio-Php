<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet - <?= htmlspecialchars($project['title']) ?></title>
    <link rel="stylesheet" href="/public/assets/css/project.css">
</head>
<body>
    <div class="project-container">
        <div class="project-header">
            <h1><?= htmlspecialchars($project['title']) ?></h1>
            <a href="/projetb2/dashboard" class="btn-back">Retour à mes projets</a>
        </div>

        <div class="project-details">
            <div class="project-image">
                <?php if ($project['image']): ?>
                    <img src="<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>">
                <?php else: ?>
                    <p>Aucune image de couverture pour ce projet.</p>
                <?php endif; ?>
            </div>
            <div class="project-description">
                <h2>Description</h2>
                <p><?= nl2br(htmlspecialchars($project['description'])) ?></p>
            </div>
            <div class="project-skills">
                <h3>Compétences associées</h3>
                <ul>
                    <?php foreach ($skills as $skill): ?>
                        <li><?= htmlspecialchars($skill['name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
