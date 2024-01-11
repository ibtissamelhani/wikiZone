<?php

require_once __DIR__ . "/../includes/navbar.php"

?>

<section class="bg-neutral-100 h-screen pt-20 px-40">
    <div class="grid md:grid-cols-4  grid-cols-1">
        <div class="col-span-3 bg-neutral-200 rounded-l flex flex-wrap gap-4 p-8">
            
            <?php foreach($wikis as $wiki) { ?>
            <div class="w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="<?= $wiki['photo']?>" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?= $wiki['title']?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $wiki['date']?></p>

                </div>

            </div>
            <?php }?>
            
            
           

        </div>
        <div class="bg-neutral-300 rounded-r border-l p-8 flex flex-col gap-4 items-center justify-center">

            <img src="/wikizone/public/imgs/<?=$_SESSION['image']?>" alt="profile image" class="rounded-full w-20 h-20">
            <span><?=$_SESSION['f_name']." ".$_SESSION['l_name']?></span>
            <div>
                <button type="submit"
                    class="text-white bg-orange-700 hover:bg-orange-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create
                    a wiki</button>
            </div>
        </div>
    </div>
</section>


<?php

require_once __DIR__ . "/../includes/footer.php"

?>