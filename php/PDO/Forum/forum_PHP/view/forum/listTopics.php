<h2>LISTE DES SUJETS</h2>

<a class="uk-button uk-button-primary uk-margin-bottom" href="?ctrl=forum&method=addTopic">Ajouter un sujet</a>

<?php foreach ($data['listTopics'] as $topicAndFirstPost) : 
    $topic = $topicAndFirstPost['topic'];
    $firstPost = $topicAndFirstPost['firstPost'];
    ?>
<div class="uk-card uk-card-default uk-card-body"> 
    <ul>
        <a href="?ctrl=forum&method=show&id=<?= $topic->getId() ?>"><li>Titre du sujet : <?= $topic->getTitle() ?></li></a>
        <li>Ajouté le <?= $topic->getCreationDate() ?></li>
        <li>Par <?= $topic->getUser() ?></li>
        <li class="uk-text-muted">Compteur de vues = <?= $topic->getNbVues() ?></li>
        <li>Premier post = <?= $firstPost->getTexte() ?></li>
        <li><?= $topic->getNbReponses() ?> réponses</li>
        <?= $topic->getClosed() === '1' ? '<li>Verrouillé</li>' : '' ?>
        <?= $topic->getResolved() === '1' ? '<li>Résolu</li>' : '' ?>
        <?php if(App\Session::isAdmin() || App\Session::getUser()->getId() === $topic->getUser()->getId()) : ?>
            <li>
                <a class="uk-button uk-button-default" href="?ctrl=forum&method=formEditTopic&id=<?= $topic->getId() ?>">Éditer le topic</a>
                <a class="uk-button uk-button-danger" href="?ctrl=forum&method=deleteTopic&id=<?= $topic->getId() ?>">Supprimer le topic</a>
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php endforeach; ?>