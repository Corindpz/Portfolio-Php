<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/public/assets/css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="header-actions">
            <a href="/projetb2/profile" class="btn-profile">Mon Profil</a>
        </div>

        <div class="projects-section">
            <h2 class="dashboard-title">Mes Projets</h2>
            
            <ul class="project-list">
                <?php if (!empty($projects)): ?>
                    <?php foreach ($projects as $project): ?>
                        <li class="project-card">
                            <?php if (!empty($project['image'])): ?>
                                <img src="<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="project-cover">
                            <?php endif; ?>
                            <a href="/projetb2/project/<?= $project['id'] ?>" class="project-link">
                                <h3><?= htmlspecialchars($project['title']) ?></h3>
                            </a>
                            <p><?= htmlspecialchars($project['description']) ?></p>
                            <form action="/projetb2/delete-project/<?= $project['id'] ?>" method="POST" class="delete-project-form">
                                <button type="submit" class="btn-delete">Supprimer</button>
                            </form>
                            

                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun projet pour l'instant. Créez-en un !</p>
                <?php endif; ?>
            </ul>

        </div>

        <div class="create-project-box">
            <h3>Créer un projet</h3>
            <form method="post" action="/projetb2/dashboard" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Titre du projet" required>
                <textarea name="description" placeholder="Description du projet"></textarea>

                <div class="skills-checkboxes">
                    <?php if (!empty($skills)): ?>
                        <?php foreach ($skills as $skill): ?>
                            <label class="checkbox-label">
                                <input type="checkbox" name="skills[]" value="<?= $skill['id'] ?>" class="checkbox-input">
                                <span class="checkbox-custom"></span>
                                <p class="skill_name"><?= htmlspecialchars($skill['name']) ?></p>
                            </label>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucune compétence disponible</p>
                    <?php endif; ?>
                </div>




                <label for="image">Image de couverture :</label>
                <input type="file" name="image" accept="image/*">

                <button type="submit" class="btn-create">Créer</button>
            </form>
        </div>
    </div>
</body>
</html>
