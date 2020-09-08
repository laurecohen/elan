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

            if($username && $email && $pass1 && $pass2){
                if(!$manUser->findOneByCredentials($username, null)){
                    if(!$manUser->findOneByCredentials(null, $email)){
                        if($pass1 == $pass2){
                            $user = $manUser->createUser($username, $email, $pass1);
                            Session::addMessage("success", "Votre compte a été créé avec succès, vous pouvez vous connecter.");
                
                            return [
                                "view" => "security/login.php",
                                "data" => [
                                    "user" => $user,
                                ]
                            ];
                        } else Session::addMessage("error", "Les mots de passe ne correspondent pas.");
                    } else Session::addMessage("error", "L'email ".$email." est déjà utilisé.");
                } else Session::addMessage("error", "Le pseudo ".$username." est déjà utilisé.");
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
        
        /**
         * Show User Profile
         */
        public function showProfile(){
            if(!Session::hasUser()){
                Router::redirectTo("home", "index");
            }

            return [
                "view" => "forum/formUser.php",
            ];
        }

        /** 
         * Edit User Profile
         */
        public function editProfile(){
            if(!Session::hasUser()){
                Router::redirectTo("home", "index");
            }

            $id = Session::getUser()->getId();
            $username = filter_input(INPUT_POST, 'username_field', FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[a-zA-Z0-9]{4,32}/"]]);
            $email = filter_input(INPUT_POST, "email__field", FILTER_SANITIZE_EMAIL);
            $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_STRING);
            $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_STRING);
            
            $manUser = new UserManager();
            $user = Session::getUser();
            
            if($username && $email){
                if($username == $user->getUsername() || !$manUser->findOneByCredentials($username, null)){
                    if($email == $user->getEmail() || !$manUser->findOneByCredentials(null, $email)){
                        $user = $manUser->updateUser($id, $username, $email);
                        Session::addUser($user);

                        if($pass1 || $pass2){
                            if($pass1 && $pass2){
                                if(password_verify($pass1, $manUser->getAuthInfo(Session::getUser()->getUsername())['password'])){
                                    // TODO: update mdp in $manUser + hash
                                    Session::addMessage("success", "Votre profil a été enregistré !");
                                } else Session::addMessage("error", "Le mot de passe est invalide.");
                            }
                        } else Session::addMessage("success", "Votre profil a été enregistré !");
                    } else Session::addMessage("error", "L'email ".$email." est déjà utilisé.");
                } else Session::addMessage("error", "Le pseudo ".$username." est déjà utilisé.");
            } else Session::addMessage("error", "Tous les champs doivent être remplis.");

            Router::redirectTo("security", "showProfile");
        }
    }