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
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Statistics</a></li>
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Content Management System</a></li>
                </ul>
            </div>
        </div>
        <div class="col-start-1 col-span-1 row-start-2 row-span-5 flex justify-center border-[1px] border[#656262]" id="subMenu">
            <ul class="p-4 flex flex-col gap-[20px] h-fit" id="items">
                <ul class="text-sm text-[#656262]" id="UsersList">
                    <li class="font-bold"><button onclick="loadUserData()">Users</button></li>
                    <li>
                        <button onclick="loadCustomers()" class="block px-4 py-2 dark:hover:text-[#121212]">Customers</button>
                    </li>
                    <li>
                        <button onclick="loadEmployees()" class="block px-4 py-2 dark:hover:text-[#121212]">Emloyees</button>
                    </li>
                    <li>
                        <button onclick="loadAdmins()" class="block px-4 py-2 dark:hover:text-[#121212]">Admins</button>
                    </li>
                </ul>
                <ul class="text-sm text-[#656262] mt-4" id="TicketsList">
                    <li class="font-bold"><a href="">Tickets</a></li>
                    <li>
                        <a href="#" class="block px-4 py-2 dark:hover:text-[#121212]">Yummie!</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 dark:hover:text-[#121212]">Stroll</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 dark:hover:text-[#121212]">EDM</a>
                    </li>
                </ul>
                <ul class="text-sm text-[#656262] mt-4" id="EventsList">
                    <li class="font-bold"><a href="">Events</a></li>
                    <li>
                        <a href="#" class="block px-4 py-2 dark:hover:text-[#121212]">Yummie!</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 dark:hover:text-[#121212]">Stroll</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 dark:hover:text-[#121212]">EDM</a>
                    </li>
                </ul>
            </ul>

        </div>
        <div class="col-start-2 col-span-5 row-start-2 row-span-5 flex justify-center" id="Content">
            <div class="w-8/12 h-max p-16 mt-16 rounded-lg" id="ContentWrapper">
                <input id="searchInput" type="text" placeholder="Search" />
                <div class="flex flex-col gap-4" id="contentItemsWrapper">
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="./js/userPanel/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>