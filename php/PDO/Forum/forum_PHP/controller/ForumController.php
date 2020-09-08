<?php
    namespace Controller;
    
    use App\Session;
    use App\Router;
    use Model\Manager\TopicManager;
    use Model\Manager\PostManager;
use Model\Manager\UserManager;

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
            $listTopics = [];
            
            foreach($topics as $topic){
                $listTopics[] = [
                    "topic" => $topic,
                    "firstPost" => $manPost->getFirstByTopic($topic->getId())
                ];
            }

            return [
                "view" => "forum/listTopics.php", 
                "data" => [
                    "listTopics" => $listTopics,
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
            $user = Session::getUser()->getId();

            $manTopic = new TopicManager();
            $topic = $manTopic->createTopic($title, $user);
            $this->insertPost($topic['id']);
 
            Router::redirectTo("forum", "allTopics");

            return [
                "data" => [
                    "topic" => $topic,
                ]
            ];
        }

        /**
         * Insert Post
         */
        public function insertPost($idt){
            $user = Session::getUser()->getId();
            $texte = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

            $manPost = new PostManager();
            $manPost->createPost($texte, $user, $idt);

            Router::redirectTo("forum", "show", $idt);
        }

        /**
         * Delete Post
         */
        public function deleteTopic($idt){  
            if(Session::isAdmin()){
                $manPost = new PostManager();
                $manPost->dropPostsInTopic($idt);
    
                $manTopic = new TopicManager();
                $manTopic->dropTopic($idt);
            }
            
            Router::redirectTo("forum", "allTopics");
        }
    }