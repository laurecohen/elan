<?php include 'template/header.html'; ?>

<h1>EXERCICE 4</h1>
<a href="./">Retour</a>
<p>A partir de l’exercice 2, ajouter une colonne supplémentaire dans le tableau HTML qui contiendra le lien hypertexte de la page Wikipédia de la capitale (le lien hypertexte devra s’ouvrir dans un nouvel onglet et le tableau sera trié par ordre alphabétique de la capitale).<br>
On admet que l’URL de la page Wikipédia de la capitale adopte la forme : <code>https://fr.wikipedia.org/wiki/[nom_ville]</code><br>
Le tableau passé en argument sera le suivant :<br>
<code>$capitales = ["France"=>"Paris","Allemagne"=>"Berlin",
"USA"=>"Washington","Italie"=>"Rome","Espagne"=>"Madrid"];</code></p>
<hr class="uk-divider-icon">

<?php

$capitales = [
    "France" => "Paris",
    "Allemagne" => "Berlin",
    "USA" => "Washington",
    "Italie" => "Rome"
];

echo afficherTableHTML($capitales);
// echo afficherTableHTML("test"); // génère une erreur car type array attendu en paramètre, string ici (voir signature méthode)

/**
 * afficherTableHTML
 *
 * @param  mixed $capitales
 * @return void
 */
function afficherTableHTML(array $capitales = ["N/A" => "N/A"]){
    // trier par ville (A à Z) - l'inverse est arsort()
    asort($capitales);
    $resultat = 
        "<table class='uk-table uk-table-striped'>
    		<thead>
    			<tr>
    				<th>Pays</th>
    				<th>Capitale</th>
    				<th>Lien wiki</th>
    			</tr>
			</thead>
            <tbody>";
        // boucle pour afficher les pays + capitales
        // on notera que la construction de l'URL wikipedia se fait directement dans la boucle
        foreach($capitales as $pays => $capitale){
            $resultat .= 
                "<tr>
                    <td>".mb_strtoupper($pays)."</td>
                    <td>$capitale</td>
                    <td><a href='https://fr.wikipedia.org/wiki/$capitale' target='_blank'>Lien</a></td>
                </tr>";
        }
    $resultat .= "</tbody></table>";
    return $resultat;
}

include 'template/footer.html';