<h2>LISTE DES SUJETS</h2>


<?php foreach ($data['topics'] as $topic) : ?>
    <ul>
        <li>Titre du sujet : <?= $topic->getTitle() ?></li>
        <li>Ajouté le <?= $topic->getCreationDate() ?></li>
        <li>Par <?= $topic->getUser() ?></li>
        <?= $topic->getClosed() === '1' ? '<li>Verrouillé</li>' : '' ?>
        <?= $topic->getResolved() === '1' ? '<li>Résolu</li>' : '' ?>
    </ul>
<?php endforeach; ?>

<?php var_dump($data['posts']) ?>
