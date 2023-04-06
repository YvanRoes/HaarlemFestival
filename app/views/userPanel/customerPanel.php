<?php

$msg = '';
if (isset($_SESSION['editMsg'])) {
    $msg = $_SESSION['editMsg'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />

    <title>User Panel</title>
</head>

<body class="w-[100vw] h-[100vh] overflow-x-hidden bg-[#F7F7FB]">
    <?php
    include __DIR__ . '/../header.php';
    generateHeader('home', 'dark');
    ?>
    <div class="w-screen h-fit  mt-[100px] mb-[100px]">
        <div class="col-span-6 row-span-1 border-y-[1px] border-[#656262]" id="header">
            <div class="flex items-center justify-center h-[100%]" id="nav">
                <ul class="decoration-none flex items-center justify-center flex-row gap-[20px] text-[#656262] mt-[20px] mb-[20px]">
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212] ">User information</a></li>
                    <li class="transition ease-in-out hover:translate-y-[-5px] hover:text-[#121212]"><a href="">Personal Program</a></li>
                </ul>
            </div>
        </div>
    </div>

    <form method="POST" action="" class="flex flex-col items-center">
            <h1 class="flex items-center justify-center text-3xl">Personal Information</h1>
            <input name="username" value="<?echo $user->get_username()?>" rows="1"
                class="block h-[40px] w-[300px] mt-[50px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 rounded-sm focus:ring-0 resize-none outline outline-black outline-[1px]"
                placeholder="username" required></input>
            <input name="email" value="<?echo $user->get_email()?>" rows="1"
                class="block h-[40px] w-[300px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 rounded-sm focus:ring-0 resize-none outline outline-black outline-[1px]"
                placeholder="email" required></input>
            <button name="changePassword" type="submit" class=" hover:text-[#d3d3d3] text-[#29334E] text-xl underline"><a href='/resetPassword'>Change Password</button>    
            <h2 class="flex items-center justify-center text-[#FC5B84] mt-[15px] ">
                    <?php echo $msg; ?>
            </h2>  
            <button type="submit" class="w-[300px] h-[40px] mt-[20px] bg-[#42BFDD] text-white text-[20px] font-bold rounded-[10px] cursor-pointer">Edit Account</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>