<?php

require_once __DIR__ . "/../includes/navbarAdmin.php"

?>
<div class="p-4 sm:ml-64">
    <div class=" flex flex-col gap-8 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-3 gap-4 mb-4">

            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex gap-4 items-center">
                    <span class="material-symbols-outlined text-4xl text-orange-700">
                        history_edu
                    </span>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Number of writers : </p>
                </div>

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>

            </a>


            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex gap-4 items-center">
                    <span class="material-symbols-outlined text-4xl text-orange-700">
                            description
                        </span>
                    </span>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Number of Wikis : </p>
                </div>

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>

            </a>


            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex gap-4 items-center">
                    <span class="material-symbols-outlined text-4xl text-orange-700">
                        category
                    </span>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Number of categories : </p>
                </div>

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>

            </a>

        </div>
        <span class="text-2xl text-center underline decoration-dotted font-bold text-yellow-500">Pending Wikis</span>
        <table class="w-9/12 m-auto sm:rounded-md text-sm text-left rtl:text-right bg-neutral-200 dark:text-gray-400">
            <thead
                class="text-xs sm:rounded-md text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        writter
                    </th>
                    <th scope="col" class="px-6 py-3">
                        date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        category
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
                <?php foreach($wikis as $wiki) {?>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $wiki['id']?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $wiki['title']?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $wiki['firstName']." ".$wiki['lastName']?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $wiki['date']?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $wiki['category']?>
                    </td>
                    <td class="px-6 py-4 text-yellow-500 ">
                        <?= $wiki['status']?>
                    </td>
                    <td class=" flex gap-4 px-6 py-4 text-right">
                        <a href="seeMore?id=<?= $wiki['id']?>"
                            class="font-medium rounded-full text-sm px-4 py-2.5 hover:bg-green-700 bg-green-500 ">See</a>
                        <a href="publish?id=<?= $wiki['id']?>"
                            class="font-medium rounded-full text-sm px-2 py-2.5 hover:bg-orange-700 bg-orange-500 ">Publish</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>


    </div>
</div>