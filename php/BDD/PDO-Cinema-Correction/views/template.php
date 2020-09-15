<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <nav class="uk-navbar-container" uk-navbar>
        <ul class="uk-navbar-nav">
            <li><a href="index.php?action=listFilms">Liste des films</a></li>        
            <li><a href="index.php?action=listReal">Liste des réalisateurs</a></li>
            <li><a href="index.php?action=listGenres">Liste des genres</a></li>
            <li><a href="index.php?action=listActeurs">Liste des acteurs</a></li>
        </ul>
    </nav>
    <div class="uk-container uk-container-expand">
        <h1>Gestion films avec PDO</h1>
        <?= $contenu ?>
    </div>
</body>
</html>