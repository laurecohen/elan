<?php include 'template/header.html'; ?>

<h1>EXERCICE 11</h1>
<a href="./">Retour</a>
<p>Ecrire une fonction personnalisée qui affiche une date en français (en toutes lettres ex : mercredi 13 janvier N) à partir d’une chaîne de caractère représentant une date.</p>
<hr class="uk-divider-icon">

<?php

// date précise
echo formaterDateFr("2019-02-23");
// date courante
echo formaterDateFr("now");
echo formaterDateFr();

/**
 * formaterDateFr
 * Si la date n'est pas passée en paramètre, la fonction renvoie la date du jour par défaut
 *
 * @param  mixed $date
 * @return void
 */
function formaterDateFr(string $date = "now"){
    // setLocale modifie les informations de localisation. Ne pas oublier utf-8 pour gérer l'accentuation
    setLocale(LC_ALL, 'fr_FR.utf-8');
    // strftime formate une date / heure locale avec la configuration locale
    return strftime("%A %d %B %Y", strtotime($date))."<br>";
}

include 'template/footer.html';