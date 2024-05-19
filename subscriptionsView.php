<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
        echo $_SESSION['user_id'];
         function get_user_events($user_id) {
            $sql = '
                SELECT e.* 
                FROM events e
                JOIN subscription s ON e.event_id = s.event_id
                JOIN users u ON s.user_id = u.user_id
                WHERE u.user_id = :user_id
            ';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(':user_id' => $user_id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    ?>
</body>
</html>