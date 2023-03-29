<?php

$msg = '';
if (isset($_SESSION['registerMsg'])) {
    $msg = $_SESSION['registerMsg'];
}

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        padding: 0px;
        margin: 0px;
        /* outline: 1px solid red; */
    }
</style>

<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>

<body class="w-[100vw] h-[100vh] overflow-hidden bg-[#F7F7FB] flex justify-center">
    <?php
    include __DIR__ . '/../header.php';
    generateHeader('login', 'dark');
    ?>
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 590" xmlns="http://www.w3.org/2000/svg"
        class="transition duration-300 ease-in-out delay-150 absolute h-[100vh] w-[100vw] lg:bottom-[-30vh] lg:bottom-[-30vh] sm:bottom-[-50vh] mb:">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#F78DA7"></stop>
                <stop offset="95%" stop-color="#8ED1FC"></stop>
            </linearGradient>
        </defs>
        <path
            d="M 0,600 C 0,600 0,150 0,150 C 99.25,149.67857142857144 198.5,149.35714285714286 306,142 C 413.5,134.64285714285714 529.2499999999999,120.25 671,127 C 812.7500000000001,133.75 980.5,161.64285714285717 1113,169 C 1245.5,176.35714285714283 1342.75,163.17857142857142 1440,150 C 1440,150 1440,600 1440,600 Z"
            stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.4"
            class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#F78DA7"></stop>
                <stop offset="95%" stop-color="#8ED1FC"></stop>
            </linearGradient>
        </defs>
        <path
            d="M 0,600 C 0,600 0,300 0,300 C 102.75,319.3571428571429 205.5,338.7142857142857 344,330 C 482.5,321.2857142857143 656.7499999999999,284.49999999999994 782,272 C 907.2500000000001,259.50000000000006 983.5,271.28571428571433 1085,280 C 1186.5,288.71428571428567 1313.25,294.35714285714283 1440,300 C 1440,300 1440,600 1440,600 Z"
            stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53"
            class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#F78DA7"></stop>
                <stop offset="95%" stop-color="#8ED1FC"></stop>
            </linearGradient>
        </defs>
        <path
            d="M 0,600 C 0,600 0,450 0,450 C 122.21428571428572,468 244.42857142857144,486 357,480 C 469.57142857142856,474 572.5000000000001,444.00000000000006 685,431 C 797.4999999999999,417.99999999999994 919.5714285714287,422 1047,428 C 1174.4285714285713,434 1307.2142857142858,442 1440,450 C 1440,450 1440,600 1440,600 Z"
            stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
            class="transition-all duration-300 ease-in-out delay-150 path-2"></path>
    </svg>

    <div class="pb-[2.5rem] lg:w-[1280px] md:w-[100vw] sm:w-[100vw] flex items-center justify-center"
        id="content-container">
        <div
            class="w-2/6 h-4.5/5 flex flex-col items-center  mt-[100px] backdrop-blur bg-white/50 rounded-md border-white/25 border-2 drop-shadow-xl">
            <form method="POST" action="" class="flex flex-col w-4/6">
                <input name="username" rows="1"
                    class="block w-full h-[40px] mt-[50px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 rounded-sm focus:ring-0 resize-none"
                    placeholder="username" required></input>
                <input name="email" rows="1"
                    class="block w-full h-[40px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 rounded-sm focus:ring-0 resize-none"
                    placeholder="email" required></input>
                <input name="password" type="password" rows="1"
                    class="block w-full h-[40px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 focus:ring-0 rounded-sm resize-none"
                    placeholder="password" required></input>
                <input name="confirmPassword" type="password" rows="1"
                    class="block w-full h-[40px] m-auto mb-[20px] my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 focus:ring-0 rounded-sm resize-none"
                    placeholder="confirm password" required>
                </input>

                <div class="g-recaptcha" data-sitekey="6Le8CB4lAAAAAJ-9nPHM5G4iJ-M-wE5tzEBBvQxg" style="transform:scale(0.93);-webkit-transform:scale(0.93);transform-origin:0 0;-webkit-transform-origin:0 0;">></div>

                <span class="text-[#FC5B84] flex justify-center mb-[15px]">
                    <?php echo $msg; ?>
                </span>         

                <button name="submitRegister" type="submit" class="w-full h-[40px] text-[#29334E] flex items-center justify-center gap-[10px] border-2 border-[#29334E] cursor-pointer p-5 rounded-md">Register</button>
            </form>

            <form method="POST" action="" class="flex flex-col justify-center">
                <p class="text-[#29334E]/50 pt-2 text-[14px]">already have an account?</p>
                <button name="Login" type="submit" class="text-[#29334E] text-[14px] underline mb-[50px]"><a href='/login'>Log in here</button>
            </form>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>