<h2>CRÉER UN NOUVEAU SUJET</h2>

<form action="?ctrl=forum&method=createTopic" method="POST">
    <label for="titre_film">Titre du sujet*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="title" id="title" required>

    <label for="description">Description</label>
    <textarea class="uk-textarea uk-margin-bottom" type="text" name="description" id="description" placeholder="Votre message"></textarea>

    <input class="uk-button uk-button-primary uk-margin" type="submit" value="Poster mon sujet">
</form>
