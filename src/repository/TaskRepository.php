<?php

require_once 'Repository.php';

    class TaskRepository extends Repository{
        public function getTasksToday($user_id) {
            
            $search = $this->database->connect()->prepare('SELECT * FROM `tasks` WHERE `user_id`=:id AND DATE(task_date) = CURDATE()');
            $search->execute([':id' => $user_id]);
            if($search->rowCount() > 0) {
                return $search->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return [];
            }
        }

        public function getTasksDate($user_id, $date) {
            
            $search = $this->database->connect()->prepare('SELECT * FROM `tasks` WHERE `user_id`=:id AND DATE(task_date) = :date');
            $search->execute([':id' => $user_id, ':date' => $date]);
            if($search->rowCount() > 0) {
                return $search->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return [];
            }
        }

        public function createTask($user_id, $task_name, $task_description, $task_date){
            $data = [
                'user_id' => $user_id,
                'task_name' => $task_name,
                'task_description' => $task_description,
                'task_date' => $task_date,
            ];
            $sql = "INSERT INTO tasks (user_id, task_name, task_description, task_date) VALUES (:user_id, :task_name, :task_description, :task_date)";
            $stmt= $this->database->connect()->prepare($sql);
            $stmt->execute($data);
        }

        public function changeTask($task_id, $checked){
            $done = 0;
            if ($checked == 1){
                $done = 1;
            }

            $sql = "UPDATE tasks SET done=? WHERE id=?";
            $stmt= $this->database->connect()->prepare($sql);
            $stmt->execute([$done, $task_id]);                 
        }        
    }
?>