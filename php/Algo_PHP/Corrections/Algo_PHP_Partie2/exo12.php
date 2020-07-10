<?php include 'template/header.html'; ?>

<h1>EXERCICE 12</h1>
<a href="./">Retour</a>
<p>La fonction <code>var_dump($variable)</code> permet d’afficher les informations d’une variable. <br>
Soit le tableau suivant : <br>
<code>$tableauValeurs = [true,"texte",10,25.369,["valeur1","valeur2"]];</code><br>
A l’aide d’une boucle, afficher les informations des variables contenues dans le tableau.</p>
<hr class="uk-divider-icon">

<?php

$tableauValeurs = [true, "texte", 10, 25.369, ["valeur1","valeur2"]];

foreach($tableauValeurs as $valeur){
	var_dump($valeur) . "<br/>";
}

include 'template/footer.html';