<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit-icons.min.js"></script>
    
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title><?= $titrePage ?></title>
</head>
<body>
    <!-- ------------------ NAV ------------------ -->
    <nav class="uk-navbar-container uk-background-secondary uk-light" uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li><a href="?ctrl=home&method=index"><span uk-icon='home'></span>&nbsp;Accueil</a></li>
            </ul>
        </div>
    </nav>

    <!-- ------------------ MAIN ------------------ -->
    <div id="wrapper" class="uk-container uk-container-expand">
        <div id="mainPage">
            <main>
                <h1>FORUM</h1><hr>
                <div id="page">
                    <?= $page ?>
                </div>
            </main>
        </div>
        <footer>
            <p>
                &copy;2020 - COPYRIGHT - <a href="?ctrl=home&method=rules">Règlement du forum</a> - <a href="?ctrl=home&method=mentions">Mentions légales</a>
            </p>
        </footer>

    </div>
</body>
</html>