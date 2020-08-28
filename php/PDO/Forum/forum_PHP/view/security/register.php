<h2>REGISTER</h2>

<form action="?ctrl=security&method=insertUser" method="POST">
    <label for="username">Votre pseudo*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="username" id="username" required>

    <label for="email">Votre email*</label>
    <input class="uk-input uk-margin-bottom" type="email" name="email" id="email" required>

    <label for="pass1">Votre mot de passe*</label>
    <input class="uk-input uk-margin-bottom" type="password" name="pass1" id="pass1" required>

    <label for="pass2">Répétez votre mot de passe*</label>
    <input class="uk-input uk-margin-bottom" type="password" name="pass2" id="pass2" required>

    <input class="uk-button uk-button-primary uk-margin" type="submit" value="Je m'inscris">
</form>

<div>
    <p>Déjà membre ? <a class="uk-button uk-button-primary" href="?ctrl=security&method=login">Je me connecte</a></p>
</div>