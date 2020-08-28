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

            $topics = $manTopic->findAll();

            return [
                "view" => "forum/listTopics.php", 
                "data" => [
                    "topics" => $topics,
                ],
                "titrePage" => "FORUM | Sujets"
            ];
        }

        /**
         * Afficher les posts d'un topic
         */
        public function show(){
            $idr = (isset($_GET['idr'])) ? $_GET['idr'] : null;
            $manTopic = new TopicManager();
            $manPost = new PostManager();

            $topic = $manTopic->findOneById($idr);
            $posts = $manPost->findByTopic($idr);
            
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
                "titrePage" => "FORUM | Nouveau Sujet"
            ];
        }

        /**
         * Insert Topic
         */
        public function insertTopic(){
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
            $user = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_NUMBER_INT);
            $texte = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);

            $manTopic = new TopicManager();
            $topic = $manTopic->createTopic($title, $user);
            
            $manPost = new PostManager();
            $post = $manPost->createPost($texte, $topic['user'], $topic['id']);
        
            // Retourner à la liste des sujets
            Router::redirectTo("forum", "allTopics");

            return [
                "data" => [
                    "topic" => $topic,
                    "post" => $post,
                ]
            ];
        }

        /**
         * Insert Post
         */
        public function insertPost(){
            //$idr = (isset($_GET['idr'])) ? $_GET['idr'] : null;
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            var_dump($id);
            $user = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_NUMBER_INT);
            $texte = filter_input(INPUT_POST, "response", FILTER_SANITIZE_STRING);
            
            $manPost = new PostManager();

            $idt = $manPost->findOneById($id)->getTopic()->getId();
            $manPost->createPost($texte, $user, $idt);

            Router::redirectTo("forum", "show", $idt);
        }

        /**
         * Delete Post
         */
        public function deleteMessage(){
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            
            $manPost = new PostManager();
            $idt = $manPost->findOneById($id)->getTopic()->getId();
            $manPost->deletePost($id);

            Router::redirectTo("forum", "show", $idt);
        }
    }