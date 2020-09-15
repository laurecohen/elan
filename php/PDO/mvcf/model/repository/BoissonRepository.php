<?php
    namespace Model\Repository;

    use App\AbstractRepository; //FQCN Fully Qualified Class Name
    
    class BoissonRepository extends AbstractRepository{

        public function __construct(){
            parent::connect();
        }
       
        public function getAll(){
            
            return self::fetchResults(
                self::executeQuery("SELECT * FROM drinks"),
                'Model\Entity\Boisson'
            );
        }

        public function getOneById($id){

            return self::fetchResults(
                self::executeQuery(
                    "SELECT * FROM drinks WHERE id = :id", 
                    [':id' => $id],
                    false),
                'Model\Entity\Boisson'
            );
        }

    }