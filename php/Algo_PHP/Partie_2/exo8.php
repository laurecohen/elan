<?php

/* Soit l’URL suivante: http://my.mobirise.com/data/userpic/764.jpg
Créer une fonction personnalisée permettant d’afficher l’image N fois à l’écran. 
Exemple : repeterImage($url,4); */

$src = "http://my.mobirise.com/data/userpic/764.jpg";

function repeterImage($source, $count){
    $images = "<img src='".$source."'>";
    return str_repeat($images, $count);
}

echo repeterImage($src, 3);