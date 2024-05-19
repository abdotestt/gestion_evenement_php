<?php
     class Subscription{
         protected $pdo;
         public function __construct(){
             $this->pdo = Database::getConnection();
 
         }
         public function new_subscription($user_id, $event_id) {
            $sql = 'INSERT INTO subscription (user_id, event_id, reservation_date) VALUES (:user_id, :event_id, :reservation_date)';
            $stmt = $this->pdo->prepare($sql);
            $date = date("Y-m-d");  // Changed date format to Y-m-d, which is the standard SQL date format
            $stmt->execute(array(
                ':user_id' => $user_id,
                ':event_id' => $event_id,
                ':reservation_date' => $date
            ));
            header('Location: subscriptionsView.php');  // Changed to lowercase 'header'
            exit();  // Changed to lowercase 'exit'
        }
        
     }
?>