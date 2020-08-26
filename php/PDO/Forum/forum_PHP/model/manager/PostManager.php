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
            $sql = "SELECT p.id, p.texte, p.creationdate, p.topic_id, p.user_id
                    FROM post p
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
            $sql = "SELECT p.id, p.texte, p.creationdate, p.topic_id, p.user_id
                    FROM post p
                    INNER JOIN topic t ON p.topic_id = t.id
                    WHERE t.id = :id";
            return self::getResults(
                self::select($sql, 
                    ["id" => $id], 
                    true
                ), 
                self::$classname
            );
        }

        public function getFirstByTopic($topic){
            $sql = "SELECT p.id
                    FROM post p
                    WHERE p.creationdate IN (
                            SELECT MIN(p2.creationdate) 
                            FROM post p2 
                            WHERE p2.topic_id = :topic
                    )";

            return self::getOneOrNullResult(
                self::select($sql, 
                    ["topic" => $topic], 
                    false
                ), 
                self::$classname
            );
        }
    }