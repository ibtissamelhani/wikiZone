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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tiny.cloud/1/tizc1wnsdfx9km4jrzlf453ngej2ysq53hkvbqxgkluz6hht/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <title>wikizone</title>
</head>
<body>
    
<style>
    * {

      font-family: 'Roboto Condensed', sans-serif;
      

    }
</style>
  

<nav class="bg-white fixed bg-opacity-25 dark:bg-gray-900  w-full z-20 top-0 start-0  dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="/wikizone/public/imgs/logo.png" class="h-8" alt="wikizone Logo">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">WikiZone</span>
    </a>
    <div class="flex md:order-2 space-x-3 items-center gap-8 md:space-x-0 rtl:space-x-reverse">
        
        <a href="home" class="text-md font-semibold hover:text-orange-600 ">Home</a>
        <?php if(!isset($_SESSION['loggedIn'])) : ?>
        <a  href="signin" class="text-md  underline decoration-solid font-semibold hover:text-orange-600 ">Sign in</a>
        <a href="signup" class="text-md">
            <button type="button" class=" text-white bg-orange-700 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign up</button>
        </a>
        
        
        
        
        <!-- <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button> -->
    </div>
    <?php else : ?>
      <a href="profile?id=<?=$_SESSION['userId']?>" class="text-md underline decoration-solid font-semibold hover:text-orange-600 ">My wikis</a>
    <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="<?=$_SESSION['image']?>" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              
              <ul class="py-1" role="none">
                
                <li>
                  <a href="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
    </div>
    <?php endif; ?>
  </div>
</nav>

