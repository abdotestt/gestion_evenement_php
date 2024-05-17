<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <script src="./js/custom.js"></script> -->
</head>
<body>
    <?php
        require "./models/middleware.php";
        require "navbar.php";
        require './models/Event.php';
        $eventModel = new Event();
        $events = $eventModel->get_all();          
        
    ?>

    <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
      <h2 class="text-2xl font-bold text-gray-900">Main Events</h2>

      <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
      <?php foreach ($events as $event): ?>  
        <div class="">
            <div class="h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
              <img class="h-80" src="./images/<?php echo $event['image']; ?>" alt="">
            </div>
            <div class="flex">
              <div class="ml-4 flex-initial w-64">
                <h3 class="mt-6 text-sm text-gray-500">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    <?php echo htmlspecialchars($event['titre']); ?>
                  </a>
                </h3>
              </div>
              
                <h3 class="mt-6 text-sm text-gray-900 font-bold"><?php echo $event['prix'] ?> DH</h3>
            </div>
            <p class="text-base font-semibold text-gray-900"><?php echo htmlspecialchars($event['description']); ?></p>
            

         
          <form action="event_details.php" method="POST">
                <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event['id']); ?>">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Subscribe
                </button>
            </form>
        </div>
      <?php endforeach ?>
        </div>
    </div>

</body>
</html>
