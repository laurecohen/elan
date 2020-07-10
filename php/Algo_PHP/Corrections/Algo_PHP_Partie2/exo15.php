<?php include 'template/header.html'; ?>

<h1>EXERCICE 15</h1>
<a href="./">Retour</a>
<p>En utilisant les ressources de la page <a href="http://php.net/manual/fr/book.filter.php" target="_blank">Filter PHP</a>, vérifier si une adresse e-mail a le bon format.</p>
<hr class="uk-divider-icon">

<?php

/**
 * filter_var($variable, $filter) : Filtre une variable avec un filtre spécifique
 *      Filtres de validation : FILTER_VALIDATE_EMAIL, FILTER_VALIDATE_FLOAT, FILTER_VALIDATE_IP, FILTER_VALIDATE_URL, ...
 *      Filtres de nettoyage : FILTER_SANITIZE_EMAIL, FILTER_SANITIZE_STRING, ...
 */

// Adresse email et IP à tester
$email = "elan@elan-formation.fr";
$ip = "192.168.1.255";

echo verifierMail($email);
echo verifierIp($ip);
echo verifierMailV2($email);

// Verifier qu'une adresse mail est valide
/**
 * verifierMail
 *
 * @param  mixed $email
 * @return void
 */
function verifierMail(string $email = "contact@exemple.com"){
    $resultat = "L'adresse mail <strong>$email</strong> n'est pas valide<br>";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $resultat = "L'adresse mail <strong>$email</strong> est valide<br>";
    }
    return $resultat;
}

// version optimisée
/**
 * verifierMailV2
 *
 * @param  mixed $email
 * @return void
 */
function verifierMailV2(string $email = "contact@exemple.com") {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? "L'adresse mail <strong>$email</strong> est valide" : "L'adresse mail <strong>$email</strong> est non valide";
}

// Vérifier qu'une adresse IP est valide
/**
 * verifierIp
 *
 * @param  mixed $ip
 * @return void
 */
function verifierIp(string $ip = "127.0.0.1"){
    $resultat = "L'adresse IP <strong>$ip</strong> n'est pas valide<br>";
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        $resultat = "L'adresse IP <strong>$ip</strong> est valide<br>";
    }
    return $resultat;
}

include 'template/footer.html';