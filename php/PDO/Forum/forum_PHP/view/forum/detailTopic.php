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
        </ul>
    <?php endforeach; ?>
</ul>