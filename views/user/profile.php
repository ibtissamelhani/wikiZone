<?php
if (!$_SESSION['loggedIn']) {
    header("Location: home");
} elseif ($_SESSION['role_id'] !== 2) {
    header("Location: home");
    exit(); 
}
require_once __DIR__ . "/../includes/navbar.php"

?>

<section class="bg-neutral-100 min-h-screen pt-20 px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="col-span-3 bg-neutral-200 rounded-l flex flex-wrap gap-4 p-4 md:p-8">

            <?php foreach($wikis as $wiki) { ?>
                <div class="w-full md:w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full" src="<?= $wiki['photo']?>" alt="" />
                    </a>
                    <div class="p-4 md:p-5">
                        <a href="#">
                            <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <?= $wiki['title']?></h5>
                        </a>
                        <p class="mb-2 font-normal text-gray-400 "><?= $wiki['date']?></p>
                        <p class="mb-2 font-normal <?php if($wiki['status']==="Published") {echo "text-green-400";}else{ echo "text-gray-500";}  ?> text-end	"><?= $wiki['status']?></p>

                        <div class="flex gap-2">
                            <a href="editWiki?id=<?= $wiki['id']?>" class="text-white bg-blue-600 font-medium rounded-full text-sm px-2 py-2.5">edit</a> 
                            <a href="deleteWiki?id=<?= $wiki['id']?>&userId=<?=$_SESSION['userId']?>" class="text-white bg-red-600 font-medium rounded-full text-sm px-2 py-2.5">delete</a> 
                        </div>
                    </div>
                </div>
            <?php }?>

        </div>
        <div class="bg-neutral-300 rounded-r border-l p-4 md:p-8 flex flex-col gap-4 items-center justify-center">

            <img src="<?=$_SESSION['image']?>" alt="profile image" class="rounded-full w-20 h-20">
            <span><?=$_SESSION['f_name']." ".$_SESSION['l_name']?></span>
            <a href="addWiki">
                <button type="submit"
                    class="text-white bg-orange-700 hover:bg-orange-800 font-medium rounded-lg text-sm w-full md:w-auto px-4 md:px-5 py-2.5 text-center">Create
                    a wiki</button>
            </a>

        </div>
    </div>
</section>



<?php

require_once __DIR__ . "/../includes/footer.php"

?>
</body>
</html>