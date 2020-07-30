<?php
    include "./connexion.php";  
    include "./rating.php";  
    $pdo = connect();


    if(!empty($_GET['genre'])){
        $stmt = $pdo->prepare("SELECT f.*, g.* FROM film f INNER JOIN genre_film gf ON f.id_film = gf.id_film INNER JOIN genre g ON gf.id_genre = g.id_genre WHERE gf.id_genre = :genre");
        $stmt->execute(['genre' => $_GET['genre']]);
    } 
    // ... etc.
    else {
        $stmt = $pdo->query(
            "SELECT f.*, GROUP_CONCAT(DISTINCT CONCAT(gf.id_genre) ORDER BY nom_genre SEPARATOR '#') AS ids_genres,
                GROUP_CONCAT(DISTINCT CONCAT(nom_genre) ORDER BY nom_genre SEPARATOR '#') AS noms_genres
            FROM film f 
            INNER JOIN genre_film gf ON f.id_film = gf.id_film 
            INNER JOIN genre g ON gf.id_genre = g.id_genre
            GROUP BY gf.id_film"
        );
    }
    
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC); 
          
    include "./template/header.html";
?>

<title>Genre</title>
</head><!-- Fin header -->

<body>
    <div class="uk-container uk-container-xlarge uk-padding">
        <h1>Tous les films : <?php if($_GET['genre']) echo 'genre…'; ?></h1>

        <?php if (COUNT($response) === 0) : ?>
            <p>Nous n'avons pas trouvé de film correspondant à votre requête.</p>
            <?php endif; ?>
            
            <!-- Afficher tous les films -->
            <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-text-center" uk-grid>
                

            <?php foreach ($response as $film) : ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-media-left">
                            <img data-src="<?= $film['affiche'] ? $film['affiche'] : 'https://getuikit.com/v2/docs/images/placeholder_300x455.svg' ?>" src="<?= $film['affiche'] ?>" alt="" aria-label="Affiche du film <?= $film['titre'] ?>" class="uk-height-medium uk-border-rounded" uk-img>
                        </div>
                        <div class="uk-card-body">
                            <p>
                                <span><?= $film['titre'] ?></span><br>
                                <span><?= displayRating($film['note']) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

<?php
    include "./template/footer.html";