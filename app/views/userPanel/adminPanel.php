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
    generateHeader('home', 'dark');
    ?>
    <div class="w-screen h-[800px] grid grid-cols-6 grid-rows-6 mt-[100px]">
        <div class="col-span-6 row-span-1 border-y-[1px] border-[#656262]" id="header">
            <div class="flex items-center justify-center h-[100%]" id="nav">
                <ul class="decoration-none flex items-center justify-center flex-row gap-[20px] text-[#656262]">
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Database</a></li>
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Content Management System</a></li>
                </ul>
            </div>
        </div>
        <div class="col-start-1 col-span-1 row-start-2 row-span-5 flex justify-center border-x-[1px] border[#656262]" id="subMenu">
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
                <div class="flex flex-col gap-4 pb-5" id="contentUsersWrapper">
                </div>
            </div>
            <div class="w-8/12 h-max p-16 mt-16 rounded-lg hidden" id="edmPane">
                <h1 id="EDMTitle" class="text-[64px]"></h1>
                <input id="searchInput" type="text" placeholder="Search" />
                <div action="" class="bg-white p-2 rounded-md grid grid-cols-5 relative gap-4 text-center mb-10">
                    <input type="" id="" placeholder="" required />
                    <input type="" id="" placeholder="" required />
                    <input id="" type="" placeholder="" required />
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick=""></button>
                </div>
                <div id="ListHeaders"></div>
                <div class="flex flex-col gap-4 pb-5" id="contentEDMWrapper">
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="./js/userPanel/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>