<link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">

<div class="container">
    <h1>Connexion</h1>
    <form method="post" action="/projetb2/login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>

    <p class="register-link">
        Vous n'avez pas de compte ? <a href="/projetb2/register">S'inscrire ici</a>
    </p>

    <?php if (isset($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
</div>