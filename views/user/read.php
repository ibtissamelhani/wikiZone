<?php

require_once __DIR__ . "/../includes/navbar.php"

?>



<section class="bg-neutral-100 py-20 px-52">
    <div class="">
        <span class="text-lg text-gray-500 "><?= $wiki['category']?></span>
        <h1 class="text-4xl text-center text-orange-700 font-extrabold mb-2"><?= $wiki['title']?></h1>
        <div class="border-t border-neutral-200 py-4"></div>
        <div class="flex items-center">
            <img src="<?= $wiki['profile']?>" alt="Writer Image" class="rounded-full w-10 h-10 mr-4">
            <div class="flex flex-col gap-4">
              <span class="text-lg font-bold"><?= $wiki['firstName']." ".$wiki['lastName']?></span>
            <span class="text-gray-500"><?= $wiki['date']?></span>  
            </div>
            
        </div>
    </div>
    <div class="py-10">
        <img src="<?= $wiki['photo']?>" alt="Content Image" class="w-full rounded-lg">
        <p class="pt-10"><?= $wiki['content']?></p>
    </div>
    <div class="border-t border-neutral-200  py-4" >
        <?php 
         $tagsArray = explode(',', $wiki['tags']);
         foreach ($tagsArray as $tag) { ?>
            <button type="button" class="py-2.5 px-5  text-sm font-semibold font-medium text-gray-900 bg-orange-700 rounded-full border border-gray-200">
                # <?= $tag ?></button>

             <?php } ?>

    </div>

</section>

<?php

require_once __DIR__ . "/../includes/footer.php"

?>