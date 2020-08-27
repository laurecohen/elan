<h2>CRÉER UN NOUVEAU SUJET</h2>

<form action="?ctrl=forum&method=insertTopic" method="POST">
    <label for="title">Titre du sujet*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="title" id="title" required>

<!--    <label for="username">Titre du sujet*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="username" id="username" required> -->

    <label for="user_id">User*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="user_id" id="user_id" required>

    <label for="description">Description*</label>
    <textarea class="uk-textarea uk-margin-bottom" type="text" name="description" id="description" placeholder="Votre message" required></textarea>

    <input class="uk-button uk-button-primary uk-margin" type="submit" value="Poster mon sujet">
</form>
