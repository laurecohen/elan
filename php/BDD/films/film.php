<?php
    include "./connexion.php";
    include "./rating.php";  

    if(isset($_GET["id"]) && !empty($_GET["id"])){    
        $pdo = connect();

        $stmt = $pdo->prepare(
           "SELECT f.*, CONCAT(prenom_realisateur, ' ', nom_realisateur) AS noms_real, 
           GROUP_CONCAT(DISTINCT CONCAT(gf.id_genre) ORDER BY nom_genre SEPARATOR '#') AS ids_genres,
           GROUP_CONCAT(DISTINCT CONCAT(nom_genre) ORDER BY nom_genre SEPARATOR '#') AS noms_genres,
           GROUP_CONCAT(DISTINCT CONCAT(c.id_acteur) ORDER BY nom_acteur SEPARATOR '#') AS ids_acteurs,
           GROUP_CONCAT(DISTINCT CONCAT(prenom_acteur, ' ', nom_acteur) ORDER BY nom_acteur SEPARATOR '#') AS noms_acteurs,
           GROUP_CONCAT(DISTINCT CONCAT(nom_role) ORDER BY nom_role SEPARATOR '#') AS roles
           FROM film f
           INNER JOIN genre_film gf ON f.id_film = gf.id_film
           INNER JOIN genre g ON gf.id_genre = g.id_genre
           INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
           INNER JOIN casting c ON f.id_film = c.id_film
           INNER JOIN role ro ON c.id_role = ro.id_role
           INNER JOIN acteur a ON c.id_acteur = a.id_acteur
           WHERE f.id_film = :id
           GROUP BY c.id_film"
        );
        
        $stmt->execute(['id' => $_GET['id']]);
        $film = $stmt->fetch(PDO::FETCH_ASSOC);

        
        $arr_acteurs = array_combine(explode('#', $film['ids_acteurs']), explode('#', $film['noms_acteurs']));
        $arr_genres = array_combine(explode('#', $film['ids_genres']), explode('#', $film['noms_genres']));
    } else {
        header("Location:index.php");
        die();
    }

    include "./template/header.html";
?>

<title><?= $film['titre'] ?> – Film <?= date_format(date_create($film['annee_sortie']), 'Y')?></title>
</head><!-- Fin header -->

<body>
    <div class="uk-container uk-container-xlarge uk-padding">

        <!-- <a href="index.php" class="navbar"><span uk-icon="chevron-left" class="checked"></span>Revenir à la liste des films</a> -->
        <h1><?= $film['titre'] ?> (<?= date_format(date_create($film['annee_sortie']), 'Y')?>)</h1>

        <p><strong>Note : </strong><?= displayRating($film['note']) ?></p>

        <img data-src="<?= $film['affiche'] ? $film['affiche'] : 'https://getuikit.com/v2/docs/images/placeholder_300x455.svg' ?>" src="<?= $film['affiche'] ?>" alt="" aria-label="Affiche du film <?= $film['titre'] ?>" class="uk-height-medium uk-border-rounded" uk-img>
        <ul class="uk-list uk-list-collapse">
            <li><strong>De : </strong> <?= $film['noms_real'] ?></li>

            <li><strong>Avec : </strong>
                <?php foreach ($arr_acteurs as $key => $acteur) : ?>
                    <span><a href="acteur.php?id=<?= $key ?>"><?= $acteur ?></a><?= (next($arr_acteurs)) ? ', ' : '' ?></span>
                <?php endforeach; ?>
            </li>
            
            <li><strong>Genres : </strong>
                <?php foreach ($arr_genres as $id => $genre) : ?>
                    <span><a href="films.php?genre=<?= $id ?>"><?= $genre ?></a><?= (next($arr_genres)) ? ', ' : '' ?></span>
                <?php endforeach; ?>
            </li>
        </ul>

        <p><?= $film['synopsis'] ?></p>
    </div>

<?php
    include "./template/footer.html";

    $stmt->closeCursor();