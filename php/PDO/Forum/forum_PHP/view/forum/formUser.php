<h2><?= ucfirst(App\Session::getUser()); ?></h2>

<form action="?ctrl=security&method=editProfile" method="POST">
    <label for="username_field">Login</label>
    <input class="uk-input uk-margin-bottom" type="text" name="username_field" id="username_field" value="<?= App\Session::getUser()->getUserName() ?>" required>
    
    <label for="email__field">Email</label>
    <input class="uk-input uk-margin-bottom" type="email" name="email_field" id="email_field" value="<?= App\Session::getUser()->getEmail() ?>" required>
    
    <fieldset class="uk-fieldset">
        <legend class="uk-legend">Modifiez votre mot de passe</legend>
        <div class="uk-margin">
            <input class="uk-input" type="password" name="pass1" placeholder="Mot de passe actuel">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="password" name="pass2" placeholder="Nouveau mot de passe">
        </div>
    </fieldset>
    <input class="uk-button uk-button-primary uk-margin-bottom" type="submit" value="Enregistrer les modifications">
</form>