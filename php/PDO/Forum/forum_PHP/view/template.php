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
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/jtt4ldp5prwz5oh4r80swyigzmwuewsv87ysvoju3few86zf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({
        selector:'textarea#description',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }   
    });</script>
    
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title><?= $titrePage ?></title>
</head>
<body>
    <!-- ------------------ NAV ------------------ -->
    <nav class="uk-navbar-container uk-background-secondar" uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li><a href="?ctrl=home&method=index"><span uk-icon='home'></span>&nbsp;Accueil</a></li>
                <li><a href="?ctrl=forum&method=allTopics"><span uk-icon='star'></span>&nbsp;Sujets</a></li>
                <!--<div class="uk-navbar-item">-->
                <?php
                    if(!App\Session::hasUser()){
                        ?>
                        <div class="uk-navbar-item">
                            <li><a class="uk-button uk-button-primary" href="?ctrl=security&method=login">Connexion</a></li>
                            <li><a class="uk-button uk-button-primary uk-margin-left" href="?ctrl=security&method=register">Inscription</a></li>
                        </div>
                        <?php
                    } else {
                        ?>
                        <li><a href="?ctrl=security&method=showProfile"><span uk-icon='user'></span>&nbsp;<?= ucfirst(App\Session::getUser()->getUsername()) ?></a></li>
                        <div class="uk-navbar-item">
                            <li><a class="uk-button uk-button-primary uk-margin-left" href="?ctrl=security&method=logout">Déconnexion</a></li>
                        </div>
                        <?php
                    }
                ?>
                <!--</div>-->
            </ul>
        </div>
    </nav>

    <!-- ------------------ MAIN ------------------ -->
    <div id="wrapper" class="uk-container uk-container-expand">
        <div id="mainPage">
            <main>
                <h1>FORUM</h1><hr>
                <div id="page">
                    <?php
                        if(App\Session::hasMessages())  {
                            foreach(App\Session::getMessage("success") as $msg){
                                echo $msg."<br>";
                            }
                            foreach(App\Session::getMessage("error") as $msg){
                                echo $msg."<br>";
                            }
                        }
                    ?>
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