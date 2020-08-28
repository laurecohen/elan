<?php 
    $topic = $data['topic'];
?>
<h2>Sujet : <?= $topic->getTitle() ?></h2>

<ul>
    <li>Ajouté le <?= $topic->getCreationDate() ?> par <?= $topic->getUser() ?></li>
    <?= $topic->getClosed() === '1' ? '<li>Verrouillé</li>' : '' ?>
    <?= $topic->getResolved() === '1' ? '<li>Résolu</li>' : '' ?>
    <li><?= $topic->getNbReponses() ?> réponses</li>

    <?php foreach ($data['posts'] as $post) : ?>
        <ul>
            <li>Id du post : <?= $post->getId() ?></li>
            <li>Ajouté le <?= $post->getCreationDate() ?> par <?= $post->getUser() ?></li>
            <li>Texte : <?= $post->getTexte() ?></li>
            <li><a class="uk-text-danger" href="?ctrl=forum&method=deleteMessage&id=<?= $post->getId() ?>">Supprimer</a></li>
        </ul>
    <?php endforeach; ?>
</ul>

<div>
    <div class="uk-card uk-card-default uk-card-body">
        <form action="?ctrl=forum&method=insertPost&id=<?= $topic->getId() ?>" method="POST">
            <label for="user_id">Votre nom (id)</label>
            <input class="uk-input uk-margin-bottom" type="text" name="user_id" id="user_id" required>

            <label for="response">Votre réponse</label>
            <textarea class="uk-textarea uk-margin-bottom" type="text" name="response" id="description" placeholder="Votre message" required></textarea>

            <input class="uk-button uk-button-primary uk-margin" type="submit" value="Poster ma réponse">
        </form>
    </div>
</div>
