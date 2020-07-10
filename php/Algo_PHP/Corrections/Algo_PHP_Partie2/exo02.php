<?php include 'template/header.html'; ?>

<h1>EXERCICE 2</h1>
<a href="./">Retour</a>
<p>Soit le tableau suivant : <code>$capitales = ["France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome"];</code><br>
Réaliser un algorithme permettant d’afficher le tableau HTML suivant (notez que le nom du pays s’affichera en majuscule et que le tableau est trié par ordre alphabétique du nom de pays) grâce à une fonction personnalisée.</p>
<hr class="uk-divider-icon">

<?php

$capitales = [
	"France" => "Paris",
	"Allemagne" => "Berlin",
	"USA" => "Washington",
	"Italie" => "Rome"
];

echo afficherTableHTML($capitales);
// echo afficherTableHTML();

/**
 * afficherTableHTML
 *
 * @param  mixed $capitales
 * @return void
 */
function afficherTableHTML(array $capitales = ["N/A" => "N/A"]) {
	// trier par pays (A à Z) : k = key - l'inverse est krsort()
    ksort($capitales);
	$resultat = 
		"<table class='uk-table uk-table-striped'>
    		<thead>
    			<tr>
    				<th>Pays</th>
    				<th>Capitale</th>
    			</tr>
			</thead>
			<tbody>";
		// boucle pour afficher les pays + capitales - mb_strtoupper gère les majusules accentuées
    	foreach($capitales as $pays => $capitale) {
			$resultat .= 
				"<tr>
					<td>".mb_strtoupper($pays)."</td>
					<td>$capitale</td>
				</tr>";
    	}
    $resultat .= "</tbody></table>";
    return $resultat;
}

include 'template/footer.html';