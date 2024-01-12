<?php

require_once __DIR__ . "/../../includes/navbarAdmin.php"

?>
<div class="p-4 sm:ml-64">
    <div class=" flex flex-col gap-8 p-10 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <a href="dashboard" class="rounded-full bg-neutral-200	 text-slate-400 w-10 h-10 p-2 text-center"><span
                class="material-symbols-outlined">
                close
            </span>
        </a>
        <div class="border-b p-6 border-gray-500 ">
            <h1 class="text-center text-black text-4xl mb-4"><?= $wiki['title']?></h1>
            <div class="flex gap-4">
                <img src="<?=$_SESSION['image']?>" class="rounded-full w-14 h-14">
                <div class="flex flex-col gap-4">
                    <span><?= $wiki['firstName']." ".$wiki['lastName']?></span>
                    <p><?= $wiki['date']?></p>
                </div>
            </div>

        </div>
        <div class="flex flex-col gap-6 border-b p-6 border-gray-500">
            <img src="<?= $wiki['photo']?>" alt="" class="rounded">
            <p><?= $wiki['content']?></p>
        </div>
        <div class="flex gap-4">
            <a href="publish?id=<?= $wiki['id']?>" class="text-white p-2 px-4 rounded bg-green-600 hover: bg-green-400">Publish</a>
            <a href="archiveWiki?id=<?= $wiki['id']?>" class="text-white p-2 px-4 rounded bg-red-600 hover: bg-red-400">Archive</a>
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>