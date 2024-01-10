<?php

require_once __DIR__ . "/../../includes/navbarAdmin.php"

?>
<div class="p-4 sm:ml-64">
    <div class=" flex flex-col gap-8 p-10 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1>Wikis Archive</h1>
        <table class="w-9/12 m-auto sm:rounded-md text-sm text-left rtl:text-right bg-neutral-200 dark:text-gray-400">
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
                    <button type="button" class="text-white bg-gray-700 font-medium rounded-full text-sm px-2 py-2.5 over:bg-gray-700"><?= $wiki['status']?></button>
                    </td>
                    
                </tr>

                <?php } ?>
            </tbody>
        </table>


    </div>
</div>



</body>

</html>