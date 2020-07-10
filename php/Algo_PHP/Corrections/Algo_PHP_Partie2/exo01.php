<?php include 'template/header.html' ?>

<h1>EXERCICE 1</h1>
<a href="./">Retour</a>
<p>Créer une fonction personnalisée <code>convertirMajRouge()</code> permettant de transformer une chaîne de caractère passée en argument en majuscules et en rouge.</p>
<hr class="uk-divider-icon">

<style>
    .red {
        color: red;
    }
</style>

<?php

$texte = "Mon texte en paramètre";
echo "Phrase à convertir « : $texte »";

echo convertirMajRouge($texte);
echo convertirMajRougeV3($texte);
echo convertirMajCouleur($texte, "#FDA156");
echo convertirMajCouleur($texte, "#FDD200");
echo convertirMajCouleur("Hello world !", "#ACC354");
echo convertirMajCouleur();

/**
 * convertirMajRouge
 *
 * @param  mixed $texte
 * @return void
 */
function convertirMajRouge(string $texte = "Aucun texte défini"){
    $color = "red";
    // mb_strtoupper gère les majuscules accentuées contrairement à strtoupper
    $maj = mb_strtoupper($texte);
    return "<p style='color:$color'>$maj</p>";
}

/**
 * convertirMajRougeV2
 *
 * @param  mixed $texte
 * @return void
 */
function convertirMajRougeV2(string $texte = "Aucun texte défini"){
	// sans passer par des variables intermédiaires
	return "<p style='color:red'>".mb_strtoupper($texte)."</p>";	
}

/**
 * convertirMajRougeV3
 *
 * @param  mixed $texte
 * @return void
 */
function convertirMajRougeV3(string $texte = "Aucun texte défini"){
    // en passant par une classe CSS
	return "<p class='red'>".mb_strtoupper($texte)."</p>";	
}

/**
 * convertirMajCouleur
 *
 * @param  mixed $texte
 * @param  mixed $color
 * @return void
 */
function convertirMajCouleur(string $texte = "Aucun texte défini", string $color = "black") {
    // variante où l'on indique la couleur en paramètre : couleur nommée ou code héxadécimal
    return "<p style='color:$color'>".mb_strtoupper($texte)."</p>";	
}

include 'template/footer.html';