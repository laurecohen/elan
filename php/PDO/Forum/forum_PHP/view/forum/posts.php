<h2>LISTE DES SUJETS</h2>

<?php foreach ($data['posts'] as $post) : ?>
    <ul>
        <li>Id du post : <?= $post->getId() ?></li>
        <li>Texte : <?= $post->getTexte() ?></li>
    </ul>
<?php endforeach; ?>