<?php
    namespace Controller;

    use App\ControllerInterface;
    use Model\Repository\BoissonRepository;
    use App\Session;
    use App\Router;
    
    class DrinkController implements ControllerInterface{

        private $view_path = VIEW_DIR."drink".DS;

        public function index(){

            $repo = new BoissonRepository();

            $boissons = $repo->getAll();

            return [
                "view" => $this->view_path."drinks.php",
                "data" => $boissons
            ];
        }

        public function favorite($id){
            $repo = new BoissonRepository();

            if($boisson = $repo->getOneById($id)){
                Session::addFavorite($boisson);
            }
            else Session::addMessage("error", "Cette boisson n'existe pas !");
            
            Router::redirectTo("drink");
        }
    }