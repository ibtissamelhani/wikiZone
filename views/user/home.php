<?php

require_once __DIR__ . "/../includes/navbar.php"

?>
<section class="min-w-screen min-h-screen  flex items-center justify-center px-5 py-5 bg-cover bg-center"
    style="background-image: url('/wikizone/public/imgs/1.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center	justify-center gap-8">
        <h1 class="text-7xl text-white">WikiZone</h1>
        <p class="text-3xl text-white">The home for great
            writers and readers</p>
        <?php if(!isset($_SESSION['loggedIn'])) : ?>
        <a href="signup" class="text-md">
            <button type="button"
                class=" text-white bg-transparent border-2 border-orange-700 hover:bg-orange-600 focus:ring-4 focus:outline-none  font-medium rounded-lg text-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Become
                a writter</button>
        </a>
        <?php else : ?>
        <a href="signup" class="text-md">
            <button type="button"
                class=" text-white bg-orange-700  hover:bg-orange-600 focus:ring-4 focus:outline-none  font-medium rounded-lg text-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add a new Wiki</button>
        </a>
        <?php endif; ?>
    </div>
</section>
<section class="grid grid-cols-3">
    <div class="flex flex-col gap-8 px-6 py-14  border border-r-slate-400">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-200	  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search..." required>
        </div>
        <div>
            <span class="text-lg font-semibold">Categories</span>
        </div>
        <div>
            <button type="button"
                class="text-white bg-gray-500 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Default</button>
            <button type="button"
                class="text-white bg-gray-500 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Dark</button>
            <button type="button"
                class="text-white bg-gray-500 border border-gray-300 focus:outline-none hover:bg-orange-700  focus:ring-4 focus:ring-gray-500 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Light</button>
            <button type="button"
                class="text-white bg-gray-500 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Green</button>
            <button type="button"
                class="text-white bg-gray-500 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Red</button>
            <button type="button"
                class="text-white bg-gray-500 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Yellow</button>
            <button type="button"
                class="text-white bg-gray-500 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Purple</button>
        </div>
    </div>
    <div class="col-span-2 px-6 py-14 flex flex-col gap-4">
        <a href="#"
            class="flex flex-col items-center bg-white  shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                    acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                src="/wikizone/public/imgs/bird.jbg" alt="">
        </a>
        <a href="#"
            class="flex flex-col items-center bg-white  shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                    acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                src="/wikizone/public/imgs/bird.jbg" alt="">
        </a>
    </div>
</section>

<?php

require_once __DIR__ . "/../includes/footer.php"

?>