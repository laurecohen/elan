<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class UserManager extends AbstractManager
    {
        private static $classname = "Model\Entity\User";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT u.id, username, email, password, u.creationdate, role
                    FROM user u
                    ORDER BY creationdate DESC";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * 
                        FROM user 
                        WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function createUser($username, $email, $password){
            $sql = "INSERT INTO user(username, email, password) VALUES(:username, :email, :password);";
            
            return self::create($sql, [
                "username" => strtolower($username),
                "email" => $email,
                "password" => password_hash($password, PASSWORD_ARGON2I),
            ]);
        }

        public function logUserIn($user, $password){
            $sql = "SELECT username, email, password FROM user WHERE email = :user OR username = :user";
            
            return self::select($sql, [
                "user" => $user,
            ], false);
        }
    }