<?php
include "./connexion.php";
include "./rating.php";
include "./template/header.html";

// Récupérer le contenu de la table film
$query = "SELECT f.id_film, titre, note, CONCAT(prenom_realisateur, ' ', nom_realisateur) AS np_realisateur, YEAR(annee_sortie) AS sortie, TIME_FORMAT(SEC_TO_TIME(duree * 60), '%H:%i') AS duree_film, GROUP_CONCAT(nom_genre SEPARATOR ', ') AS genres FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur INNER JOIN style_film sf ON f.id_film = sf.id_film INNER JOIN genre g ON sf.id_genre = g.id_genre GROUP BY f.id_film ORDER BY titre";
$reponse = $bdd->query($query);
?>
        <!-- Suite header -->
        <title>Accueil</title>
    </head>
<body>
    <div class="uk-container uk-container-xlarge"></div>
        <div class="uk-padding">
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
                    <?php while ($film = $reponse->fetch()) {
                        // Préparer les infos à afficher
                        $id_film = $film['id_film'];
                        $titre = '<a href="film.php?id='.$id_film.'">'.$film['titre'].'</a>';               
                        $note = displayRating($film['note']); // Conversion de la note en étoiles
                        $real = $film['np_realisateur'];
                        $sortie = $film['sortie'] ? $film['sortie'] : '-';
                        $duree = $film['duree_film'] ? $film['duree_film'] : '-';
                        $genre = $film['genres'];
                    ?>
                        <tr>
                            <td class="uk-table-link"><?= $titre ?></td>
                            <td><?= $note ?></td>
                            <td><?= $real ?></td>
                            <td><?= $sortie ?></td>
                            <td><?= $duree ?></td>
                            <td><?= $genre ?></td>
                        </tr>
                    <?php } // fin while  ?>
                </tbody>
            </table>
        </div>

<?php
include "./template/footer.html";
$reponse->closeCursor();