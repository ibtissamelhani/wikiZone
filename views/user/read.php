<?php

require_once __DIR__ . "/../includes/navbar.php"

?>



<section class="bg-neutral-100 py-20 px-52">
    <div class="">
        <span class="text-lg text-gray-500 "><?= $wiki['category_name']?></span>
        <h1 class="text-4xl text-center text-orange-700 font-extrabold mb-2"><?= $wiki['title']?></h1>
        <div class="border-t border-neutral-200 py-4"></div>
        <div class="flex items-center">
            <img src="/wikizone/public/imgs/1.jpg" alt="Writer Image" class="rounded-full w-10 h-10 mr-4">
            <div class="flex flex-col gap-4">
              <span class="text-lg font-bold"><?= $wiki['firstName']." ".$wiki['lastName']?></span>
            <span class="text-gray-500"><?= $wiki['date']?></span>  
            </div>
            
        </div>
    </div>
    <div class="py-10">
        <img src="/wikizone/public/imgs/1.jpg" alt="Content Image" class="w-full rounded-lg">
        <p class="pt-10"><?= $wiki['content']?></p>
    </div>
    <div class="border-t border-neutral-200 bg-orange-700 py-4" >
        <?php 
         $tagsArray = explode(',', $wiki['tags']);
         foreach ($tagsArray as $tag) { ?>
            <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <?= $tag ?></button>

             
             <?php } ?>

    </div>

</section>

<?php

require_once __DIR__ . "/../includes/footer.php"

?>