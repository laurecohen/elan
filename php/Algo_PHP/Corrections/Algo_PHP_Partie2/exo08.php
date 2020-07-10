<?php include 'template/header.html'; ?>

<h1>EXERCICE 8</h1>
<a href="./">Retour</a>
<p>Soit l’URL suivante : http://my.mobirise.com/data/userpic/764.jpg<br>
Créer une fonction personnalisée permettant d’afficher l’image N fois à l’écran.</p>
<hr class="uk-divider-icon">

<?php

$url = "http://my.mobirise.com/data/userpic/764.jpg";
echo repeterImage($url, 4);
echo repeterImageLoop($url, 5);

// sans boucle
/**
 * repeterImage
 *
 * @param  mixed $url
 * @param  mixed $nb
 * @return void
 */
function repeterImage(string $url = "", int $nb = 0) {
    echo "<h4>Méthode sans boucle (str_repeat)</h4>";
    //str_repeat répète une chaîne et évite de devoir faire une boucle (qui fonctionnerait aussi évidemment)
    return str_repeat("<img src='$url' alt='chien'>", $nb)."<br>";
}

// avec boucle
/**
 * repeterImageLoop
 *
 * @param  mixed $url
 * @param  mixed $nb
 * @return void
 */
function repeterImageLoop(string $url = "", int $nb = 0) {
    echo "<h4>Méthode avec boucle</h4>";
    $res = "";
    for($i = 1; $i <= $nb; $i++){
        $res .= "<img src='$url' alt='chien'>";
    }
    return $res."<br>";
}

include 'template/footer.html';