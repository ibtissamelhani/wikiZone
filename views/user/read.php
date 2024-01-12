<?php

require_once __DIR__ . "/../includes/navbar.php"

?>


<section class="bg-neutral-100 py-12 px-4 md:px-52 md:pt-40 ">
    <div>
        <span class="text-sm md:text-lg text-gray-500 "><?= $wiki['category']?></span>
        <h1 class="text-2xl md:text-4xl text-center text-orange-700 font-extrabold mb-2"><?= $wiki['title']?></h1>
        <div class="border-t border-neutral-200 py-2 md:py-4"></div>
        <div class="flex items-center">
            <img src="<?= $wiki['profile']?>" alt="Writer Image"
                class="rounded-full w-8 h-8 md:w-10 md:h-10 mr-2 md:mr-4">
            <div class="flex flex-col gap-2 md:gap-4">
                <span class="text-md md:text-lg font-bold"><?= $wiki['firstName']." ".$wiki['lastName']?></span>
                <span class="text-gray-500 text-sm md:text-md"><?= $wiki['date']?></span>
            </div>
        </div>
    </div>

    <div class="py-10">
        <img src="<?= $wiki['photo']?>" alt="Content Image" class="w-full rounded-lg">
        <p class="pt-10"><?= $wiki['content']?></p>
    </div>
    <div class="border-t border-neutral-200  py-4">
        <?php 
         $tagsArray = explode(',', $wiki['tags']);
         foreach ($tagsArray as $tag) { ?>
        <button type="button"
            class="py-2.5 px-5  text-sm font-semibold font-medium text-gray-900 bg-orange-700 rounded-full border border-gray-200">
            # <?= $tag ?></button>

        <?php } ?>

    </div>

</section>

<?php

require_once __DIR__ . "/../includes/footer.php"

?>
</body>

</html>