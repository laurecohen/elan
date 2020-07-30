<?php
    include "./connexion.php";

    if(isset($_GET["id"]) && !empty($_GET["id"])){    
        $pdo = connect();

        $stmt = $pdo->prepare(
           "SELECT f.*, a.*
           FROM film f
           INNER JOIN casting c ON f.id_film = c.id_film
           INNER JOIN role ro ON c.id_role = ro.id_role
           INNER JOIN acteur a ON c.id_acteur = a.id_acteur
           WHERE c.id_acteur = :id"
        );
        
        $stmt->execute(['id' => $_GET['id']]);
        $acteur = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } else {
        header("Location:index.php");
        die();
    }

    include "./template/header.html";
?>

<title><?= $acteur['prenom_acteur'].' '.$acteur['nom_acteur'] ?> - <?= $acteur['sexe'] === 'masculin' ? 'Acteur' : 'Actrice' ?></title>
</head><!-- Fin header -->

<body>
    <div class="uk-container uk-container-xlarge uk-padding">
        <h1><?= $acteur['prenom_acteur'].' '.$acteur['nom_acteur'] ?></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat labore deserunt laborum veniam nisi reprehenderit iste, dicta veritatis quis, facere est accusantium unde explicabo, inventore sint similique saepe soluta quidem!</p>
    </div>  
    
<?php
    include "./template/footer.html";

    $stmt->closeCursor();