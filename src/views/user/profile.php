<link rel="stylesheet" href="/public/assets/css/profile.css">
<div class="profile-container">
    <h1>Mon Profil</h1>

    <?php if ($user): ?>
        <div class="profile-info">
            <p><strong>Nom:</strong> <?= htmlspecialchars($user['name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        </div>
        <div class="profile-actions">
            <a href="/projetb2/dashboard" class="btn-projects">Mes Projets</a>
            <?php if (isset($user['role']) && $user['role'] === 'admin'): ?>
                <a href="/projetb2/admin/skills" class="btn-admin">Administration</a>
            <?php endif; ?>
            <a href="/projetb2/logout" class="btn-logout">Se Déconnecter</a>
        </div>

    <?php else: ?>
        <p>Utilisateur introuvable.</p>
    <?php endif; ?>
</div>
