<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        padding: 0px;
        margin: 0px;
        /* outline: 1px solid red; */
    }
</style>

<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>

<body class="w-[100vw] h-[100vh] overflow-x-hidden bg-[#F7F7FB] flex justify-center">
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 690" xmlns="http://www.w3.org/2000/svg"
        class="transition duration-300 ease-in-out delay-150 absolute bottom-0">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#F78DA7"></stop>
                <stop offset="95%" stop-color="#8ED1FC"></stop>
            </linearGradient>
        </defs>
        <path
            d="M 0,700 C 0,700 0,175 0,175 C 99.75,212.17857142857144 199.5,249.35714285714286 318,239 C 436.5,228.64285714285714 573.7499999999999,170.74999999999997 689,164 C 804.2500000000001,157.25000000000003 897.5,201.64285714285717 1019,212 C 1140.5,222.35714285714283 1290.25,198.67857142857142 1440,175 C 1440,175 1440,700 1440,700 Z"
            stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.4"
            class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#F78DA7"></stop>
                <stop offset="95%" stop-color="#8ED1FC"></stop>
            </linearGradient>
        </defs>
        <path
            d="M 0,700 C 0,700 0,350 0,350 C 130.39285714285714,384.0357142857143 260.7857142857143,418.07142857142856 380,402 C 499.2142857142857,385.92857142857144 607.25,319.75 725,293 C 842.75,266.25 970.2142857142858,278.92857142857144 1091,295 C 1211.7857142857142,311.07142857142856 1325.892857142857,330.5357142857143 1440,350 C 1440,350 1440,700 1440,700 Z"
            stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53"
            class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#F78DA7"></stop>
                <stop offset="95%" stop-color="#8ED1FC"></stop>
            </linearGradient>
        </defs>
        <path
            d="M 0,700 C 0,700 0,525 0,525 C 103.57142857142858,545.4285714285714 207.14285714285717,565.8571428571429 309,574 C 410.85714285714283,582.1428571428571 510.9999999999999,578 655,569 C 799.0000000000001,560 986.8571428571429,546.1428571428571 1125,538 C 1263.142857142857,529.8571428571429 1351.5714285714284,527.4285714285714 1440,525 C 1440,525 1440,700 1440,700 Z"
            stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
            class="transition-all duration-300 ease-in-out delay-150 path-2"></path>
    </svg>
    <?php
    include __DIR__ . '/../header.php';
    generateHeader('login', 'dark');
    ?>
    <div class="pb-[2.5rem] lg:w-[1280px] md:w-[100vw] sm:w-[100vw] flex items-center justify-center" id="content-container">
        <div class="w-2/6 h-2/3 flex flex-col items-center  mt-[100px] backdrop-blur bg-white/50 rounded-md border-white/25 border-2 drop-shadow-xl">
            <form method="POST" action="" class="flex flex-col w-4/6">
                <input name="username" rows="1"
                    class="block w-full h-[40px] mt-[75px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 rounded-sm focus:ring-0 resize-none"
                    placeholder="username" required></input>
                <input name="email" rows="1"
                    class="block w-full h-[40px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 rounded-sm focus:ring-0 resize-none"
                    placeholder="email" required></input>
                <input name="passwd" type="password" rows="1"
                    class="block w-full h-[40px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 focus:ring-0 rounded-sm resize-none"
                    placeholder="password" required></input>
                <input name="confirmPassword" type="password" rows="1"
                    class="block w-full h-[40px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#F7F7FB] border-0 focus:ring-0 rounded-sm resize-none"
                    placeholder="confirm password" required></input>

                <!-- TO DO implement captcha -->
                <!-- TO DO verify inputs -->
                <!-- TO DO insert user in DB -->

                <button name="submitRegister" type="submit"
                    class="w-full h-[40px] text-[#29334E] flex items-center justify-center gap-[10px] border-2 border-[#29334E] cursor-pointer p-5 rounded-md">Register</button>
            </form>

            <form method="POST" action="" class="flex flex-col justify-center">
                <p class="text-[#29334E]/50 pt-2 text-[14px]">already have an account?</p>
                <button name="Login" type="submit" class="text-[#29334E] text-[14px] underline"><a href='/login'>
                        Log in here
                </button>
            </form>
        </div>
    </div>
</body>