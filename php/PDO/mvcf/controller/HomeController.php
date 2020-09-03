<?php
    namespace Controller;

    use App\ControllerInterface;

    class HomeController implements ControllerInterface{

        private $view_path = VIEW_DIR."home".DS;

        public function index(){

            return [
                "view" => $this->view_path."home.php",
            ];
            
        }
    }