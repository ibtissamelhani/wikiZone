<?php

require_once __DIR__ . "/../includes/navbar.php"

?>

<section class="bg-neutral-100 h-screen pt-20 px-40">
    <div class="grid md:grid-cols-4  grid-cols-1">

    <?php foreach($wikis as $wiki) { ?>
            <div class="w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="read?id=<?= $wiki['id']?>">
                    <img class="rounded-t-lg" src="<?= $wiki['photo']?>" alt="" />
                </a>
                <div class="p-5">
                    <a href="read?id=<?= $wiki['id']?>">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?= $wiki['title']?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-400 "><?= $wiki['date']?></p>
                    <p class="mb-3 font-normal <?php if($wiki['status']==="Published") {echo "text-green-400";}else{ echo "text-gray-500";}  ?> text-end	"><?= $wiki['status']?></p>

                </div>

            </div>
            <?php }?>
    </div>
</section>


<?php

require_once __DIR__ . "/../includes/footer.php"

?>
</body>
</html>