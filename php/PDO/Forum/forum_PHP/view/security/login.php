<h2>LOGIN</h2>

<form action="?ctrl=security&method=connectUser" method="POST">
    <label for="login_field">Nom utilisateur ou email</label>
    <input class="uk-input uk-margin-bottom" type="text" name="login_field" id="login_field" value="<?= htmlspecialchars($_POST['login_field'] ?? '', ENT_QUOTES) ?>" required>

    <label for="password_field">Mot de passe</label>
    <input class="uk-input uk-margin-bottom" type="password" name="password_field" id="password_field" required>

    <input class="uk-button uk-button-primary uk-margin" type="submit" value="Je me connecte">
</form>

<div>
    <p>Pas encore membre ? <a class="uk-button uk-button-primary" href="?ctrl=security&method=register">Je crée un compte</a></p>
</div>