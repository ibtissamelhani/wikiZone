<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
  
    <div class="min-h-screen  bg-[#222] flex items-center justify-center px-5 py-5 bg-cover bg-center"
    style="background-image: url('/wikizone/public/imgs/1.jpg');">
    <div class="rounded-3xl shadow-xl w-full overflow-hidden max-w-screen-xl md:flex">
        <div class="md:flex flex-col items-center justify-center gap-4 md:w-1/2 bg-[#333] bg-opacity-80 py-10 px-10">
            <h1 class="font-bold text-4xl md:text-5xl text-orange-700 mb-4">Become a WikiZone Author!</h1>
            <p class="text-lg text-slate-300 mb-4">Are you passionate about sharing knowledge and exploring diverse topics? Join our community of writers at WikiZone and contribute your unique perspectives to a global audience.</p>
            <a href="home" class="text-orange-700 hover:text-orange-400 hover:transition-transform transform hover:-translate-x-1 flex gap-2">
                <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                <span >Back to Home</span>
            </a>
        </div>

        <div class="bg-white w-full md:w-1/2 py-10 px-5 md:px-10">
            <div class="text-center mb-10">
                <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                <p>Enter your information to register</p>
            </div>

            <form id="registrationForm" method="post" action="register">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-5">
                        <label for="first_name" class="text-xs font-semibold px-1">First name</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                            </div>
                            <input id="first_name" name="first_name" type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="John">
                        </div>
                        <p class="first_name_error" style="color: red; display: none;">Invalid first name</p>
                    </div>
                    <div class="mb-5">
                        <label for="last_name" class="text-xs font-semibold px-1">Last name</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                            </div>
                            <input id="last_name" name="last_name" type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Smith">
                        </div>
                        <p class="last_name_error" style="color: red; display: none;">Invalid last name</p>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="email" class="text-xs font-semibold px-1">Email</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                        </div>
                        <input id="email" name="email" type="email" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="johnsmith@example.com">
                    </div>
                    <p class="email_error" style="color: red; display: none;">Invalid email address</p>
                </div>

                <div class="mb-5">
                    <label for="password" class="text-xs font-semibold px-1">Password</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                        </div>
                        <input id="password" name="password" type="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                    </div>
                    <p class="password_error" style="color: red; display: none;">Invalid password</p>
                </div>

                <div class="mb-12">
                    <label for="repeat_password" class="text-xs font-semibold px-1">Repeat password</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                        </div>
                        <input id="repeat_password" name="repeat_pwd" type="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                    </div>
                    <p class="password_error" style="color: red; display: none;">Passwords do not match</p>
                </div>

                <div class="mb-5">
                    <button type="submit" class="block w-full max-w-xs mx-auto bg-orange-700 hover:bg-orange-600 focus:bg-gris-200 text-white rounded-lg px-3 py-3 font-semibold">REGISTER NOW</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="/wikizone/public/js/formValidation.js"></script>
</body>

</html>