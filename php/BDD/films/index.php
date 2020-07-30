<?php
    include "./connexion.php";
    include "./rating.php"; 

    $pdo = connect();

    $stmt = $pdo->query(
        "SELECT f.*, note, CONCAT(prenom_realisateur, ' ', nom_realisateur) AS noms_real, GROUP_CONCAT(nom_genre SEPARATOR '#') AS genres
        FROM film f
        INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
        INNER JOIN genre_film gf ON f.id_film = gf.id_film
        INNER JOIN genre g ON gf.id_genre = g.id_genre
        GROUP BY f.id_film ORDER BY titre"
    );

    include "./template/header.html";
?>

<title>Accueil</title>
</head><!-- Fin header -->

<body>
    <div class="uk-container uk-container-xlarge uk-padding">
        <h1>Liste des films</h1>
        <table class="uk-table uk-table-middle uk-table-divider uk-table-hover uk-table-responsive">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Note</th>
                    <th>Réalisateur</th>
                    <th>Année</th>
                    <th>Durée</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>

                <?php while($film = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <?php $arr_genres = explode('#', $film['genres']); ?>
                    
                    <tr>
                        <td class="uk-table-link"><a href="film.php?id=<?= $film['id_film'] ?>"><?= $film['titre'] ?></a></td>
                        <td><?= displayRating($film['note']) ?></td>
                        <td><?= $film['noms_real'] ?></td>
                        <td><?= date_format(date_create($film['annee_sortie']), 'Y')?></td>
                        <td><?= date("H:i", mktime(0, $film['duree'])) ?></td>

                        <td>

                            <?php foreach($arr_genres as $genre) : ?>
                                <span><a href="genre.php"></a><?= $genre ?><?= (next($arr_genres)) ? ', ' : '' ?></span>         
                            <?php endforeach; ?>

                        </td>
                    </tr>

                <?php endwhile; ?>

            </tbody>
        </table>
    </div>

<?php
    include "./template/footer.html";

    $stmt->closeCursor();