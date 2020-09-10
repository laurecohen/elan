<?php 
    $topic = $data["topic"];
    $firsPost = $data["firstPost"];
?>

<h2>ÉDITER LE SUJET</h2>

<form action="?ctrl=forum&method=editTopic&id=<?= $topic->getId() ?>" method="POST">
    <label for="title">Titre du sujet*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="title" id="title" value="<?= $topic->getTitle() ?>" required>

    <label for="description">Description*</label>
    <textarea class="uk-textarea uk-margin-bottom" type="text" name="description" id="description" required><?= $firsPost->getTexte() ?></textarea>

    <input class="uk-button uk-button-primary uk-margin" type="submit" value="Poster mon sujet">
</form>