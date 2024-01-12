<?php

require_once __DIR__ . "/../../includes/navbarAdmin.php"

?>
<div class="p-4 sm:ml-64">
    <div class=" flex flex-col gap-8 p-10 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1>users</h1>
        <table class="w-9/12 m-auto sm:rounded-md text-sm text-left rtl:text-right bg-neutral-200 dark:text-gray-400">
            <thead
                class="text-xs sm:rounded-md text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        full name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        profile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){ ?>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $user['firstName']." ".$user['lastName']?>
                    </th>
                    <td class="px-6 py-4">
                    <?= $user['email']?>
                    </td>
                    <td class="px-6 py-4">
                    <?= $user['role']?>
                    </td>
                    <td class="px-6 py-4">
                        <img src="<?= $user['profile']?>" alt="user profile" class="rounded-full w-8 h-8">
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="deleteUser?id=<?= $user['id']?>" class="text-white p-2 px-4 rounded bg-red-600 hover: bg-red-400">Delete</a>
                    </td>
                </tr>
            
                <?php } ?>
            </tbody>
        </table>


    </div>
</div>



</body>

</html>