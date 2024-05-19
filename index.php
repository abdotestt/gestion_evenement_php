<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
</head>
<body>
    <?php
        require "./models/middleware.php";
        require './models/database.php';
        require "navbar.php";
        require './models/Event.php';
        require './models/subscription.php';

        $eventModel = new Event();
        $events = $eventModel->get_all();          
        // Determine if the modal should be shown
        $showModal = false;
        if (isset($_POST['subscribe'])) {
          $_SESSION['current_event_id'] = $_POST['event_id'];
            $showModal = true;
        }

        function new_subscription(){
          $subscription = new Subscription();
          $subscription->new_subscription($_SESSION['user_id'],$_SESSION['current_event_id']);
        }

        if($_POST['confirm_subscription']){
          new_subscription();
        }
    ?>

    <div class="album py-5">
        <div class="container">
            <div class="col-md-12">
                <button class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Event</button>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($events as $event): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="./images/<?php echo $event['image']; ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="Placeholder"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>
                            <div class="card-body">
                                <p class="card-text"><?php echo htmlspecialchars($event['description']); ?>.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                                            <button type="submit" class="btn btn-success" name="subscribe">Subscribe</button>
                                        </form>
                                    </div>
                                    <small class="text-muted"><?php echo $event['prix'] ?> DH</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION['current_event_id']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  You are confirm Subscription in this Event ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel Subscription</button>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="confirm_subscription" value="1">
                        <button type="submit" class="btn btn-primary">Confirm Subscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to open the modal -->
    <script type="text/javascript">
        window.onload = function() {
            <?php if ($showModal): ?>
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
                myModal.show();
            <?php endif; ?>
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
