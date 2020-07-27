<?php
include "./connexion.php";
include "./rating.php";
include "./template/header.html";

// Récupérer le contenu de la table film
$query = "SELECT DISTINCT f.id_film, titre, note, affiche, CONCAT(prenom_realisateur, ' ', nom_realisateur) AS np_realisateur, YEAR(annee_sortie) AS sortie, synopsis, GROUP_CONCAT(CONCAT(prenom_acteur, ' ', nom_acteur) SEPARATOR '#') AS acteurs, GROUP_CONCAT(nom_role SEPARATOR '#') AS roles, GROUP_CONCAT(nom_genre SEPARATOR '#') AS genres
FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur INNER JOIN casting c ON f.id_film = c.id_film 
INNER JOIN role ro ON c.id_role = ro.id_role
INNER JOIN acteur a ON c.id_acteur = a.id_acteur 
INNER JOIN style_film sf ON f.id_film = sf.id_film
INNER JOIN genre g ON sf.id_genre = g.id_genre
WHERE f.id_film = ? GROUP BY c.id_film";
$reponse = $bdd->prepare($query);

if(isset($_GET['id'])){
    $id_film = $_GET['id'];
    $reponse->execute(array($_GET['id']));
} else {
    echo "failed";
}

while ($film = $reponse->fetch()) {
    // Préparer les infos à afficher + remplacement si NULL
    $titre = $film['titre'];
    $affiche = $film['affiche'] ? '<img data-src="'.$film['affiche'].'" alt="" class="uk-height-medium uk-border-rounded" uk-img>' : 'Remplacement';
    $sortie = $film['sortie'] ? $film['sortie'] : 'Date de sortie inconnue';
    $real = $film['np_realisateur'];
    $note = displayRating($film['note']);
    $synopsis = $film['synopsis'] ? $film['synopsis'] : '';

    // Scinder une chaîne de caractères et stocker les segments dans un tableau
    // Créer un tableau à partir des deux autres tableaux
    $arr1 = explode('#', $film['acteurs']);
    $arr2 = explode('#', $film['roles']);
    $distribution = array_combine($arr1, $arr2);
    $genres = explode('#', $film['genres']);
    ?>
        <!-- Suite header -->
        <title><?= $titre ?> – film <?= $sortie ?></title>
    </head>
<body>
    <div class="uk-container uk-container-xlarge"></div>
        <div class="uk-padding">
            <nav class="uk-navbar-container" uk-navbar><span class="uk-navbar-left" uk-icon="chevron-left"></span><a href="index.php">Retour</a></nav>

            <h1><?= $titre ?></h1>
            <p><strong>Note :</strong> <?= $note ?></p>
            <?= $affiche ?>

            <ul class="uk-list uk-list-collapse">
                <li><?= $sortie ?></li>
                <li><strong>De :</strong> <?= $real ?></li>
                <li><strong>Avec :</strong>
                    <?php foreach ($distribution as $acteur => $role) { ?>
                        <span><a href=""><?= $acteur ?></a> (<?= $role ?>)<?= (next($distribution)) ? ', ' : '' ?></span>
                    <?php } // fin foreach ?>
                </li>
                <li><strong>Genre :</strong>
                    <?php foreach ($genres as $genre) { ?>
                        <span><a href=""><?= $genre ?></a><?= (next($genres)) ? ', ' : '' ?></span>
                    <?php } // fin foreach ?>
                </li>
            </ul>
            <?= $synopsis ?>
<?php } // fin while ?>
        </div>

<?php
include "./template/footer.html";
$reponse->closeCursor();