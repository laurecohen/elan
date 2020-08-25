<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class PostManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Post";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT p.id, texte, p.creationdate, p.user_id, p.topic_id
                    FROM post p
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
                    FROM post 
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function findByTopic($id){
            $sql = "SELECT *
                    FROM post p
                    INNER JOIN topic t ON p.topic_id = t.id
                    WHERE t.id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

    }