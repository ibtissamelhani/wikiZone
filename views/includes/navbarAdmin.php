<?php 
// session_start(); 

// if(!$_SESSION['loggedIn']){
//     header("location: signin");
// }elseif($row['role_id'] !== 1){
//    echo "<script>alert(\"only admin can acces  \")</script>";
//    header("location: signin");
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="wikizone a web site to read and write wiki">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>wikizone</title>
</head>

<body>

    <style>
    * {

        font-family: 'Roboto Condensed', sans-serif;

    }
    </style>




    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm bg-orange-700 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="sidebar-multi-level-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 p-8 bg-neutral-200	"
        aria-label="Sidebar">
        <div class="flex flex-col gap-4 items-center justify-centre  mb-8">
            <img src="<?=$_SESSION['image']?>" alt="user profile" class="rounded-full w-20">
            <span class="text-xl font-medium">user name</span>
        </div>
        <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-200	 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="dashboard"
                        class="flex items-center p-2 text-orange-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-outlined">
                            finance
                        </span>
                        <span class="ms-3 ">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="users"
                        class="flex items-center p-2 text-orange-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-outlined">
                            group
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="wikis"
                        class="flex items-center p-2 text-orange-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-outlined">
                            feed
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Wikis</span>
                    </a>
                </li>
                <li>
                    <a href="categories"
                        class="flex items-center p-2 text-orange-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="tags"
                        class="flex items-center p-2 text-orange-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-outlined">
                            tag
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Tags</span>
                    </a>
                </li>
                <li>
                    <a href="archive"
                        class="flex items-center p-2 text-orange-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-outlined">
                            move_to_inbox
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Archive</span>
                    </a>
                </li>

                <li>
                    <a href="logout"
                        class="flex items-center p-2 text-orange-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-outlined">
                            logout
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>