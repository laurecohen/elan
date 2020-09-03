<?php
    namespace Controller;
    
    use App\Session;
    use App\Router;
    use Model\Manager\UserManager;

    class SecurityController {

        /**
         * Créer un nouvel utilisateur
         */
        public function register(){
            return [
                "view" => "security/register.php", 
                "titrePage" => "FORUM | Register"
            ];
        }

        /**
         * Se connecter
         */
        public function login(){
            return [
                "view" => "security/login.php", 
                "titrePage" => "FORUM | Login"
            ];
        }

        /**
         * Ajouter un nouvel utilisateur
         */
        public function insertUser(){
            $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[a-zA-Z0-9]{4,32}/"]]);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_STRING);
            $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_STRING);
            
            $manUser = new UserManager();
            $users = $manUser->findAll();

            foreach($users as $u){
                $name = $u->getUsername();
            }

            if($username && ($username !== $name) && $email && $pass1){
                if($pass1 == $pass2){
                    $user = $manUser->createUser($username, $email, $pass1);

                    return [
                        "view" => "security/login.php",
                        "data" => [
                            "user" => $user,
                        ]
                    ];
                } else var_dump("Les mots de passe ne correspondent pas !");
            } else var_dump("Vous devez remplir TOUS les champs obligatoires !");
        }

        /**
         * Connecter un utilisateur
         */
        public function connectUser(){
            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            
            if($login && $password){
                $manUser = new UserManager();
                $userpass = $manUser->logUserIn($login);

                if(password_verify($password, $userpass['password'])){
                    //TODO = modif findOneById en Find FOr Session
                    $u = $manUser->findOneById($userpass['id']);
                    Session::addUser($u);
                    Session::addMessage("success", "L'utilisateur ".$u->getUsername()." est bien connecté(e) !");
                    Router::redirectTo("forum", "allTopics");
        
                } else {
                    Session::addMessage("error", "L'identifiant ou le mot de passe est erroné.");
                    Router::redirectTo("security", "login");
                }
            }
        }        
    }