<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/projetb2/public/assets/css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Liste des projets -->
        <div class="projects-section">
            <h2 class="dashboard-title">Mes Projets</h2>
                        <ul class="project-list">
                <?php if (!empty($projects)): ?>
                    <?php foreach ($projects as $project): ?>
                        <li class="project-card">
                            <?php if (!empty($project['image'])): ?>
                                <img src="/projetb2/public/<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="project-cover">


                            <?php endif; ?>
                            <h3><?= htmlspecialchars($project['title']) ?></h3>
                            <p><?= htmlspecialchars($project['description']) ?></p>
                            <ul class="skills-list">
                                <?php foreach ((new Project())->getProjectSkills($project['id']) as $skill): ?>
                                    <li><?= htmlspecialchars($skill['name']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun projet pour l'instant. Créez-en un à droite !</p>
                <?php endif; ?>
                </ul>

        </div>

        <!-- Formulaire de création de projet -->
        <div class="create-project-box">
            <h3>Créer un projet</h3>
            <form method="post" action="/projetb2/dashboard" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Titre du projet" required>
                <textarea name="description" placeholder="Description du projet"></textarea>

                <label for="skills" class="assoc">Compétences associées :</label>
                <select name="skills[]" multiple>
                    <?php foreach ($skills as $skill): ?>
                        <option value="<?= $skill['id'] ?>"><?= htmlspecialchars($skill['name']) ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="image">Image de couverture :</label>
                <input type="file" name="image" accept="image/*">

                <button type="submit" class="btn-create">Créer</button>
            </form>
        </div>
    </div>
</body>
</html>
