<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
use App\Session;

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

        public function findOneByCredentials($username, $email){
            $sql = "SELECT id
                        FROM user 
                        WHERE username = :username
                        OR email = :email";

            return self::select($sql, 
                    [
                        'username' => $username,
                        'email' => $email
                    ], 
                    false
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
            
        public function getAuthInfo($user){
            $sql = "SELECT id, password FROM user WHERE email = :user OR username = :user";
            
            return self::select($sql, [
                "user" => $user,
            ], false);
        }

        public function getUserInfo($id){
            $sql = "SELECT id, username, email, role FROM user WHERE id = :id";
            
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function updateUser($id, $username, $email){
            $sql = "UPDATE user SET username = :username, email = :email WHERE id = :id";
            
            self::update($sql, [
                "id" => $id,
                "username" => $username,
                "email" => $email,
            ]);

            return $this->getUserInfo($id);
        }

        public function updatePassword($password){
            $id = Session::getUser()->getId();
            $sql = "UPDATE user SET password = :password WHERE id = :id";

            self::update($sql, [
                "id" => $id,
                "password" => password_hash($password, PASSWORD_ARGON2I),
            ]);

            return $this->getUserInfo($id);
        }
    }