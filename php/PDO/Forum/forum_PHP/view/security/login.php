<h2>LOGIN</h2>

<form action="?ctrl=security&method=connectUser" method="POST">
    <label for="login">Nom utilisateur ou email</label>
    <input class="uk-input uk-margin-bottom" type="text" name="login" id="login" required>

    <label for="password">Mot de passe</label>
    <input class="uk-input uk-margin-bottom" type="password" name="password" id="password" required>

    <input class="uk-button uk-button-primary uk-margin" type="submit" value="Je me connecte">
</form>

<div>
    <p>Pas encore membre ? <a class="uk-button uk-button-primary" href="?ctrl=security&method=register">Je crée un compte</a></p>
</div>