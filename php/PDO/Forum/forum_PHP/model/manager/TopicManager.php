<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class TopicManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Topic";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){
            $sql = "SELECT t.id, title, t.creationdate, closed, resolved, t.user_id, COUNT(p.id) AS nbPosts, COUNT(p.id) -  1 AS nbReponses, MIN(p.id) AS initialPost
                    FROM topic t
                    INNER JOIN post p ON t.id = p.topic_id
                    GROUP BY t.id
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
            $sql = "SELECT t.id, title, t.creationdate, closed, resolved, t.user_id,  COUNT(p.id) -  1 AS nbReponses, COUNT(p.id) AS nbPosts, COUNT(p.id) -  1 AS nbReponses, MIN(p.id) AS initialPost
                    FROM topic t
                    INNER JOIN post p ON t.id = p.topic_id
                    WHERE t.id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function createTopic($title, $user){
            $sql = "INSERT INTO topic(title, user_id) VALUES(:title, :user_id);";

            self::create($sql, [
                "title" => $title,
                "user_id" => $user
            ]);
            
            // On récupère l'id du sujet créé (autoincrement)
            $lastId = self::getLastInsertId();

            return [
                "title" => $title,
                "user" => $user,
                "id" => $lastId
            ];
        }
    }