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
    }
