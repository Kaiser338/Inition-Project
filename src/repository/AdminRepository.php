<?php

require_once 'Repository.php';

    class AdminRepository extends Repository{
        public function getUsers() {
            
            $search = $this->database->connect()->prepare('SELECT * FROM `users`');
            $search->execute();
            if($search->rowCount() > 0) {
                return $search->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return [];
            }
        }

        public function isAdmin($user_id) {
            $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE id = :id;
            ');
            $stmt->bindParam(':id', $user_id);
            $stmt->execute();

            
            $group = $stmt->fetchAll()[0]['group'];

            if($group == 'admin'){
                return true;
            } 
            else{
                return false;
            }
            
        }  
    }
?>