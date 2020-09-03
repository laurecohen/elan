<?php
    $drinks = $response["data"];
?>

<h1>LISTE DES BOISSONS</h1>
<ul>
<?php

    foreach($drinks as $drink){
        ?>
        <li> 
            <?= $drink->getNom() ?>
            <a href="?ctrl=drink&action=servirBoisson&id=<?= $drink->getId() ?>">
               Voir
            </a>
            <a href="?ctrl=drink&action=favorite&id=<?= $drink->getId() ?>">Ajouter aux favoris</a>
        </li>
        <?php
    }
?>
</ul>