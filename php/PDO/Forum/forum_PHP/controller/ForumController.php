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
            $manTopic = new TopicManager();
            $manPost = new PostManager();

            $topics = $manTopic->findAll();
            $posts = $manPost->findAll();

            foreach($topics as $topic){
                $desc[] = array($manPost->getFirstByTopic($topic->getId()));
            }

            return [
                "view" => "forum/listTopics.php", 
                "data" => [
                    "topics" => $topics,
                    "desc" => $desc,
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
                "view" => "forum/detailTopic.php",
                "data" => [
                    "topic" => $topic,
                    "posts" => $posts,
                ],
                "titrePage" => "FORUM | ".$topic
            ];
        }

        /**
         * Nouveau topic (Form)
         */
        public function addTopic(){
            return [
                "view" => "forum/formTopic.php",
                "data" => [],
                "titrePage" => "FORUM | Nouveau Sujet"
            ];
        }

        /**
         * Create Topic
         */
        public function createTopic(){
            $manTopic = new TopicManager();
            $topic = $manTopic->createTopic($_POST);

            return [
                "data" => [
                    "topic" => $topic
                ]
            ];

            // Retourner à la liste des sujets
            Router::redirectTo("forum","allTopics");
        }
    }