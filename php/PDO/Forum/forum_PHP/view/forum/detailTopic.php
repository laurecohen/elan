<?php 
    $topic = $data['topic'];
?>
<h2>Sujet : <?= $topic->getTitle() ?></h2>

<ul>
    <li>Ajouté le <?= $topic->getCreationDate() ?> par <?= $topic->getUser() ?></li>
    <?= $topic->getClosed() == 1 ? '<li>Verrouillé</li>' : '' ?>
    <?= $topic->getResolved() == 1 ? '<li>Résolu</li>' : '' ?>
    <li><?= $topic->getNbReponses() ?> réponses</li>
    <?php foreach ($data['posts'] as $post) : ?>
        <li>
            <ul>
                <li>Id du post : <?= $post->getId() ?></li>
                <li>Ajouté le <?= $post->getCreationDate() ?> par <?= $post->getUser() ?></li>
                <li>Texte : <?= $post->getTexte() ?></li>
            </ul>
        </li>
    <?php if(App\Session::isAdmin() || App\Session::getUser()->getId() === $topic->getUser()->getId()) : ?>
        <li>
        <a class="uk-button uk-button-default" href="?ctrl=forum&method=formEditTopic&id=<?= $topic->getId() ?>">Éditer le topic</a>
            <a class="uk-button uk-button-danger" href="?ctrl=forum&method=deleteTopic&id=<?= $topic->getId() ?>">Supprimer le topic</a>
        </li>
    <?php endif; ?>
        <?php endforeach; ?>
</ul>

<?php if(App\Session::hasUser() && $topic->getClosed() == 0) : ?>
<div>
    <div class="uk-card uk-card-default uk-card-body">
        <form action="?ctrl=forum&method=insertPost&id=<?= $topic->getId() ?>" method="POST">
            <label for="description">Votre réponse</label>
            <textarea type="text" name="description" id="description" placeholder="Votre message" required></textarea>

            <input class="uk-button uk-button-primary uk-margin" type="submit" value="Poster ma réponse">
        </form>
    </div>
</div>
<?php endif; ?>