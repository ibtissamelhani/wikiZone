<?php

require_once __DIR__ . "/../../includes/navbarAdmin.php"

?>
<div class="p-4 sm:ml-64">
    <div class=" flex flex-col gap-8 p-10 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1>Wikis</h1>
        <table class="w-full  sm:rounded-md text-sm text-left rtl:text-right bg-neutral-200 dark:text-gray-400">
            <thead
                class="text-xs sm:rounded-md text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        writer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($wikis as $wiki){ ?>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $wiki['title']?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $wiki['firstName']." ".$wiki['lastName']?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $wiki['date']?>
                    </td>
                    <td class="px-6 py-4 ">
                    <button type="button" class="text-white font-medium rounded-full text-sm px-2 py-2.5 over:bg-gray-700 <?php if($wiki['status']==="Published") {echo "bg-green-700";}else{ echo "bg-yellow-500";}  ?>"><?= $wiki['status']?></button>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="archiveWiki?id=<?= $wiki['id']?>"
                            class="text-white p-2 px-4 rounded bg-red-600 hover: bg-red-400">Archive</a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


</body>

</html>