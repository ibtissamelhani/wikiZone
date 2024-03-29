<?php

require_once __DIR__ . "/../includes/navbar.php"

?>
<section class="min-w-screen min-h-screen  flex items-center justify-center px-5 py-5 bg-cover bg-center"
    style="background-image: url('/wikizone/public/imgs/1.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center	justify-center gap-8">
        <h1 class="text-7xl text-white">WikiZone</h1>
        <p class="sm:text-2xl md:text-3xl text-white">The home for great
            writers and readers</p>
        <?php if(!isset($_SESSION['loggedIn'])) : ?>
        <a href="signup" class="text-md">
            <button type="button"
                class=" text-white bg-transparent border-2 border-orange-700 hover:bg-orange-600 focus:ring-4 focus:outline-none  font-medium rounded-lg text-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Become
                a writter</button>
        </a>
        <?php else : ?>
        <a href="addWiki" class="text-md">
            <button type="button"
                class=" text-white bg-orange-700  hover:bg-orange-600 focus:ring-4 focus:outline-none  font-medium rounded-lg text-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                a new Wiki</button>
        </a>
        <?php endif; ?>
    </div>
</section>

<section class="grid md:grid-cols-3 grid-cols-1 gap-4">
    <div class="flex flex-col gap-8 px-6 py-14 border border-r-slate-400 md:col-span-1">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="live_search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search...">
        </div>
        <div>
            <span class="text-lg font-semibold">Categories</span>
        </div>
        <div class="flex sm:flex-row sm:justify-start flex-wrap gap-2">
            <?php foreach($categories as $cat) {?>
            <a href="wikiByCat?id=<?= $cat->id?>">
                <button type="button"
                    class="text-white bg-gray-500 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?= $cat->name?></button>

            </a>
            <?php }?>
        </div>
        <div>
            <span class="text-lg font-semibold">Popular Tags</span>
        </div>
        <div class="flex md:flex-col gap-4 justify-center sm:flex-row sm:justify-start flex-wrap">
            <?php foreach($tags as $tag) {?>
            <a href=""># <?= $tag->name?></a>
            <?php }?>
        </div>
    </div>
    <div class="wiki col-span-2 px-6 py-14 flex flex-col gap-4 md:col-span-2">
        <?php foreach($wikis as $wiki) {?>
        <a href="read?id=<?= $wiki['id']?>"
            class="flex flex-col items-center bg-neutral-100 border-b mx-auto md:flex-row md:max-w-4xl rounded-lg overflow-hidden ">
            <div class="flex flex-col justify-between p-4 w-full md:w-2/3">
                <h5 class="mb-4 text-3xl font-bold text-center text-gray-900 dark:text-white">
                    <?= $wiki['title'] ?>
                </h5>
                <p class="text-md p-4  text-gray-500"><?= $wiki['extracted_words']?> ...</p>
                <div class="flex items-center space-x-4">
                    <img src="/wikizone/public/imgs/1.jpg" class="rounded-full w-10 h-10" alt="Writer Profile Image">
                    <div>
                        <span
                            class="text-lg font-bold text-orange-700"><?= $wiki['firstName']." ".$wiki['lastName']?></span>
                        <p class="text-sm text-gray-500"><?= $wiki['date']?></p>
                    </div>
                </div>
            </div>
            <img class="object-cover w-full h-96 md:h-auto md:w-1/3" src="/wikizone/public/imgs/1.jpg" alt="Wiki Image">
        </a>
        <?php } ?>
    </div>
</section>


<script>

var wikis = document.getElementsByClassName("wiki")[0];
var liveSearchInput = document.getElementById("live_search");
var searchResult = document.getElementById("searchresult");

liveSearchInput.addEventListener("keyup", async function(){
    var response = await fetch("search?input=" + liveSearchInput.value);
    if(response.ok){
        const data = await response.json();
        console.log(data);

        
        if (data.length > 0) {
            wikis.innerHTML = '';
            data.forEach(wiki => {
                wikis.insertAdjacentHTML("beforeend", generateHTML(wiki));
            });
        } else {
            wikis.innerHTML = 'No results found.';
        }
        }
});

function generateHTML(wiki) {

    return `<a href="read?id=${wiki['id']}"
            class="flex flex-col items-center bg-neutral-100 border-b mx-auto md:flex-row md:max-w-4xl rounded-lg overflow-hidden ">
            <div class="flex flex-col justify-between p-4 w-full md:w-2/3">
                <h5 class="mb-4 text-3xl font-bold text-center text-gray-900 dark:text-white">
                    ${wiki['title']}
                </h5>
                <p class="text-md p-4  text-gray-500"> ${wiki['extracted_words']} ...</p>
                <div class="flex items-center space-x-4">
                    <img src="${wiki['profile']}" class="rounded-full w-10 h-10" alt="Writer Profile Image">
                    <div>
                        <span
                            class="text-lg font-bold text-orange-700">${wiki['firstName']} ${wiki['lastName']}</span>
                        <p class="text-sm text-gray-500">${wiki['date']}</p>
                    </div>
                </div>
            </div>
            <img class="object-cover w-full h-96 md:h-auto md:w-1/3" src="${wiki['photo']}" alt="Wiki Image">
        </a>`;
}





</script>

<?php

require_once __DIR__ . "/../includes/footer.php"

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>