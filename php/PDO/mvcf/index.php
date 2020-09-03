<?php
    define("DS", DIRECTORY_SEPARATOR);
    define("ROOT_DIR", ".".DS);
    define("CTRL_DIR", ROOT_DIR."controller".DS);
    define("VIEW_DIR", ROOT_DIR."view".DS);
    
    require "app/Autoloader.php";

    App\Autoloader::register();
    //on démarre la session seulement ici pour que l'autoloader puisse interpréter les objets
    //pouvant se trouver en session (aka : charger leur classe)
    session_start();

    $response = App\Router::handleRequest($_GET);

    ob_start();
    include $response['view'];
    $page = ob_get_contents();
    ob_end_clean();

    include VIEW_DIR."layout.php";
    