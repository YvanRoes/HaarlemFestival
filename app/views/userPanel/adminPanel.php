<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />

    <title>Admin Panel</title>
</head>

<body class="w-[100vw] h-[100vh] overflow-x-hidden bg-[#F7F7FB]">
    <?php
    include __DIR__ . '/../header.php';
    generateHeader('adminPanel', 'dark');
    ?>
    <div class="w-screen h-[800px] grid grid-cols-6 grid-rows-6 mt-[100px]">
        <div class="col-span-6 row-span-1 border-y-[1px] border-[#656262]" id="header">
            <div class="flex items-center justify-center h-[100%]" id="nav">
                <ul class="decoration-none flex items-center justify-center flex-row gap-[20px] text-[#656262]">
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Database</a></li>
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Statistics</a></li>
                    <button id="cms" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Content Management System
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <form method="post" id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <button><a href="/cms?page=home" id="editHomepage" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Homepage</a></button>
                            </li>
                            <li>
                                <a href="/cms?page=food" id="editYummieEvent" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yummie! Event</a>
                            </li>
                            <li>
                                <a href="/cms?page=tour" id="editStrollThroughHaarlem" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Stroll Through Haarlem</a>
                            </li>
                            <li>
                                <a href="/cms?page=dance" id="editDanceEvent" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dance Event</a>
                            </li>
                            <li>
                                <a href="/cms?page=edit" id="editNewPage" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Add New Page</a>
                            </li>
                        </ul>
                    </form>
                </ul>
            </div>
        </div>
        <div class="col-start-1 col-span-1 row-start-2 row-span-5 flex justify-center border-[1px] border[#656262]" id="subMenu">
            <ul class="p-4 flex flex-col gap-[20px] h-fit" id="items">
                <ul class="text-sm text-[#656262]" id="UsersList">
                    <li class="font-bold"><button onclick="loadUserData()">Users</button></li>
                    <li>
                        <button onclick="loadUserData(`customers`)" class="block px-4 py-2 dark:hover:text-[#121212]">Customers</button>
                    </li>
                    <li>
                        <button onclick="loadUserData(`employees`)" class="block px-4 py-2 dark:hover:text-[#121212]">Emloyees</button>
                    </li>
                    <li>
                        <button onclick="loadUserData(`admins`)" class="block px-4 py-2 dark:hover:text-[#121212]">Admins</button>
                    </li>
                </ul>
                <ul class="text-sm text-[#656262] mt-4" id="edmEvent">
                    <li class="font-bold"><span>EDM</span></li>
                    <li>
                        <button onclick="loadEDMData(`venues`)" class="block px-4 py-2 dark:hover:text-[#121212]">venues</button>
                    </li>
                    <li>
                        <button onclick="loadEDMData(`artists`)" class="block px-4 py-2 dark:hover:text-[#121212]">artists</button>
                    </li>
                </ul>
            </ul>

        </div>
        <div class="col-start-2 col-span-5 row-start-2 row-span-5 flex justify-center" id="Content">
            <div class="w-8/12 h-max p-16 mt-16 rounded-lg hidden" id="UserPane">
                <h1 id="contentTitle" class="text-[64px]">Users</h1>
                <input id="searchInput" type="text" placeholder="Search" />
                <div action="" class="bg-white p-2 rounded-md grid grid-cols-5 relative gap-4 text-center mb-10">

                    <input type="text" id="inputUserName" placeholder="name" required />
                    <input type="password" id="inputUserPassword" placeholder="password" required />
                    <input id="inputUserMail" type="text" placeholder="mail" required />
                    <select name="role" id="userRoles">
                        <option value="0">User</option>
                        <option value="1">Employee</option>
                        <option value="9">Admin</option>
                    </select>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="addNewUser()">Add user</button>
                 
                </div>
                <div class="grid gap-4 w-full grid-cols-6 text-center">
                    <button class="font-bold" onclick="sortByID()">ID</button>
                    <button class="font-bold" onclick="sortByUsername()">Username</button>
                    <button class="font-bold" onclick="sortByEmail()">Email</button>
                </div>
                <div class="flex flex-col gap-4 pb-5" id="contentUsersWrapper">
                
                </div>
            </div>
            <div class="w-8/12 h-max p-16 mt-16 rounded-lg hidden" id="edmPane">
                <h1 id="EDMTitle" class="text-[64px]"></h1>
                <div id="venueSubPane" class="hidden">
                    <div action="" class="bg-white p-2 rounded-md grid grid-cols-5 relative gap-4 text-center mb-10">
                        <input type="text" id="venueName" placeholder="venue name" required />
                        <input type="text" id="venueAddress" placeholder="address" required />
                        <input type="number" id="venueCap" placeholder="Capacity" required />
                        <input id="venueFile" type="file" title=" " class="col-span-2" />
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="insertVenue()">Add venue</button>
                    </div>
                    <div class="flex flex-col gap-4 pb-5" id="contentVenueWrapper">
                    </div>
                </div>
                <div id="artistSubPane" class="hidden">
                    <div action="" class="bg-white p-2 rounded-md grid grid-cols-5 relative gap-4 text-center mb-10">
                        <input type="text" id="artistName" placeholder="artist name" required />
                        <input type="text" id="artistGenre" placeholder="genres" required />
                        <input id="artistPicture" type="file" title=" " class="col-span-2" />
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="insertArtist()">Add artist</button>
                    </div>
                    <div class="flex flex-col gap-4 pb-5" id="contentArtistWrapper">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="./js/userPanel/admin.js"></script>
    <script src="./js/cms/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>