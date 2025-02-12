<link rel="stylesheet" type="text/css" href="/projetb2/public/assets/css/style.css">

<div class="container">
    <h1>Inscription </h1>
    <form method="post" action="/projetb2/register">
        <input type="text" name="name" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>

    <p class="register-link">
            Vous avez déjà un compte ? <a href="/projetb2/login">Se connecter</a>
    </p>

</div>
