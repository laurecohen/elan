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
         * Se déconnecter
         */
        public function logout(){
            Session::deconnect();
            Session::addMessage("success", "Vous êtes correctement déconnecté(e), à bientôt !");
            Router::redirectTo("home", "index");
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

            $names = [];
            $mails = [];

            foreach($users as $u){
                $name = $u->getUsername();
                $mail = $u->getEmail();

                $names[] = $name;
                $mails[] = $mail;
            }

            if($username && $email && $pass1 && $pass2){
                if(!in_array($username, $names)){
                    if(!in_array($email, $mails)){
                        if($pass1 == $pass2){
                            $user = $manUser->createUser($username, $email, $pass1);

                            return [
                                "view" => "security/login.php",
                                "data" => [
                                    "user" => $user,
                                ]
                            ];
                        } else Session::addMessage("error", "Les mots de passe ne correspondent pas.");
                    } else Session::addMessage("error", "L'email est déjà utilisé.");
                } else Session::addMessage("error", "Le pseudo est déjà utilisé.");
            } else Session::addMessage("error", "Tous les champs doivent être remplis.");

            return [
                "view" => "security/register.php",
            ];
        }

        /**
         * Connecter un utilisateur
         */
        public function connectUser(){
            $login = filter_input(INPUT_POST, 'login_field', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password_field', FILTER_SANITIZE_STRING);
            
            if($login && $password){
                $manUser = new UserManager();
                $authInfo = $manUser->getAuthInfo($login);
                // getUserInfo() : Fetch user data without password
                $user = $manUser->getUserInfo($authInfo['id']);

                if(password_verify($password, $authInfo['password'])){
                    Session::addUser($user);
                    Session::addMessage("success", "L'utilisateur ".$user->getUsername()." est bien connecté(e) !");
                    Router::redirectTo("forum", "allTopics");
                    
                } else Session::addMessage("error", "L'identifiant ou le mot de passe est erroné.");

                return [
                    "view" => "security/login.php",
                    "data" => [
                        "user" => $user,
                    ]
                ];
            }
        }        
    }