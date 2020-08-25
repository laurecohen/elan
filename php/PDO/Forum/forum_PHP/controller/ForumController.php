<?php
    namespace Controller;
    
    use App\Session;
    use App\Router;
    use Model\Manager\TopicManager;
    use Model\Manager\PostManager;

    class ForumController {

        public function index(){
            Router::redirectTo("home","index");
        }

        /**
         * Afficher tous les topics
         */
        public function allTopics(){

            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $manTopic = new TopicManager();
            $manPost = new PostManager();
            $topics = $manTopic->findAll();
            $posts = $manPost->findByTopic($id);
          
            return [
                "view" => "forum/listTopics.php", 
                "data" => [
                    "topics" => $topics,
                    "posts" => $posts,
                ],
                "titrePage" => "FORUM | Sujets"
            ];
        }

        /**
         * Afficher les posts d'un topic
         */
        public function show(){

            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $manTopic = new TopicManager();
            $manPost = new PostManager();

            $topic = $manTopic->findOneById($id);
            $posts = $manPost->findByTopic($id);
            
            return [
                "view" => "forum/posts.php",
                "data" => [
                    "topic" => $topic,
                    "posts" => $posts,
                ],
                "titrePage" => "FORUM | ".$topic
            ];
        }
    }