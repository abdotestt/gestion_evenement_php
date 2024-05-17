<?php
    require 'database.php';
    class Event{
        protected $pdo;
        public function __construct(){
            $this->pdo = Database::getConnection();

        }
        public function get_all(){
            $sql = "SELECT * FROM events";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        public function get_event_by_id($event_id){
            return "$event_id";
        }
        public function add_event($event_data){
            $sql = "INSERT INTO events (title, description, date) VALUES (:title, :description, :date)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($event_data);
        }
    
        public function update_event($event_id, $event_data){
            $sql = "UPDATE events SET title = :title, description = :description, date = :date WHERE id = :id";
            $event_data['id'] = $event_id;
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($event_data);
        }
    
        public function delete_event($event_id){
            $sql = "DELETE FROM events WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute(array(':id' => $event_id));
        }
    }
