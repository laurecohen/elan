<h2>LISTE DES SUJETS</h2>

<a class="uk-button uk-button-primary uk-margin-bottom" href="?ctrl=forum&method=addTopic">Ajouter un sujet</a>

<?php foreach ($data['topics'] as $topic) : ?>
<div class="uk-card uk-card-default uk-card-body">
    <a href="?ctrl=forum&method=show&id=<?= $topic->getId() ?>">
        <ul>
            <li>Titre du sujet : <?= $topic->getTitle() ?></li>
            <li>Ajouté le <?= $topic->getCreationDate() ?></li>
            <li>Par <?= $topic->getUser() ?></li>
            <?= $topic->getClosed() === '1' ? '<li>Verrouillé</li>' : '' ?>
            <?= $topic->getResolved() === '1' ? '<li>Résolu</li>' : '' ?>
            <li><?= $topic->getNbReponses() ?> réponses</li>
            <li>Post initial = <?= $topic->getInitialPost() ?></li>
            <li>Post initial2 = <?= $data['firstpost']->getId() ?></li>
            <li><a class="uk-text-danger" href="?ctrl=forum&method=deleteTopic&id=<?= $topic->getId() ?>">Supprimer</a></li>
        </ul>
    </a>
</div>
<?php endforeach; ?>