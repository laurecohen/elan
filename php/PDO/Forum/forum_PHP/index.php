<?php
    namespace App;
    
    use App\Router;

    require_once "app\Autoloader.php";
    Autoloader::register();

    /* ------------------ XDEBUG ------------------ */
    ini_set("xdebug.var_display_max_children", '-1');
    ini_set("xdebug.var_display_max_data", '-1');
    ini_set("xdebug.var_display_max_depth", '-1');

    /* ------------------ CONSTANTES ------------------ */
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT_DIR', '.'.DS); // "./"
    define('PUBLIC_PATH', ROOT_DIR.'public'.DS); // "./public/"
    define('CSS_PATH', PUBLIC_PATH.'css'.DS); // "./public/css/"
    define('IMG_PATH', PUBLIC_PATH.'img'.DS); // "./public/img/"
    define('JS_PATH', PUBLIC_PATH.'js'.DS); // "./public/js/"

    define('SERVICE_PATH', ROOT_DIR.'app'.DS); // "./app/"
    define('CTRL_PATH', ROOT_DIR.'controller'.DS); // "./controller/"
    define('VIEW_PATH', ROOT_DIR.'view'.DS); // "./view/"

    define('ADMIN_MAIL', "admin@forummvc.com"); //mail de l'administrateur

    require SERVICE_PATH."Router.php"; // require "./app/Router.php"

    session_start();

    /* ------------------ TEMPORISATION DE SORTIE ------------------ */
    \ob_start();
    
    $result = Router::handleRequest($_GET);
    
    if(is_array($result) && array_key_exists('view', $result)){
        // $result = ["view" => "forum/home.php", "data" => null, "titrePage" => "FORUM | Accueil"]
        $data = isset($result['data']) ? $result['data'] : null;
        include VIEW_PATH.$result['view']; // "forum/home.php"
        $titrePage = isset($result['titrePage']) ? $result['titrePage'] : null; // "FORUM | Accueil"
    }

    $page = ob_get_contents();
    \ob_end_clean();

    require VIEW_PATH."template.php"; // require "./view/template.php"