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
            
            $manPost = new PostManager();
            
            
            foreach($topics as $topic){
                $posts = $manPost->findByTopic($topic->getId());
                $firstpost = $manPost->getFirstByTopic($topic->getId());
            }


            return [
                "view" => "forum/listTopics.php", 
                "data" => [
                    "topics" => $topics,
                    "posts" => $posts,
                    "firstpost" => $firstpost,
                ],
                "titrePage" => "FORUM | Sujets"
            ];
        }

        /**
         * Afficher les posts d'un topic
         */
        public function show($idt){
            $manTopic = new TopicManager();
            $manPost = new PostManager();

            $topic = $manTopic->findOneById($idt);
            $posts = $manPost->findByTopic($idt);
            
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
        public function insertPost($idt){
            $user = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_NUMBER_INT);
            $texte = filter_input(INPUT_POST, "response", FILTER_SANITIZE_STRING);
        
            $manPost = new PostManager();
            $manPost->createPost($texte, $user, $idt);

            Router::redirectTo("forum", "show", $idt);
        }

        /**
         * Delete Post
         */
        public function deleteTopic($idt){  
            $manPost = new PostManager();
            $manPost->dropPostsInTopic($idt);

            $manTopic = new TopicManager();
            $manTopic->dropTopic($idt);
            
            Router::redirectTo("forum", "allTopics");
        }
    }