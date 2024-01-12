<?php

require_once __DIR__ . "/../includes/navbar.php"

?>

<section class="bg-neutral-100  py-24 px-50">


    <form class="max-w-lg mx-auto" method="post" action="add" enctype="multipart/form-data">
    <div class="relative z-0 w-full mb-5 group">
            <input type="hidden" name="userId" id="floating_email"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                 value="<?=$_SESSION['userId']?>" />
          
        </div> 
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="title" id="floating_email"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                 required />
            <label for="floating_email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">title</label>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">

                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">category</label>
                <select name="category" id="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a category</option>
                    <?php foreach($categories as $cat) {?>
                    <option value="<?= $cat->id?>" ><?= $cat->name?></option>
                   <?php }?>
                </select>

            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="options" class="block text-sm font-medium text-gray-700">Select Options</label>
                <select id="options" name="tags[]" multiple
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md" onchange="updateSelectedOptions()">
                    <?php foreach($tags as $tag) {?>
                    
                    <option value="<?= $tag->id?>" ><?= $tag->name?></option>
                   <?php }?>
                    
                </select>
                <div id="selectedOptions" class="pt-2 text-blue-500"></div>

                <script>
                function updateSelectedOptions() {
                    var selectedOptions = document.getElementById('options').selectedOptions;
                    var selectedOptionsTextArray = Array.from(selectedOptions).map(option => option.text);

                    document.getElementById('selectedOptions').innerText = 'Selected Options: ' +
                        selectedOptionsTextArray.join('# ');
                }
                </script>
            </div>
            <div class=" z-0 w-full mb-5 group">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    image</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" name="photo" type="file" accept="image/*">

            </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">

            <textarea name="content">
                    Wiki Content!
            </textarea>

        </div>




        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</section>

<script>
tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
        },
        {
            value: 'Email',
            title: 'Email'
        },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
        "See docs to implement AI Assistant")),
});
</script>
<?php

require_once __DIR__ . "/../includes/footer.php"

?>