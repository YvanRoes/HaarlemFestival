<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
        padding: 0px;
        margin: 0px;
        /* outline: 1px solid red; */
    }
</style>

<title>Home</title>
<script src="https://cdn.tailwindcss.com"></script>

<body class="overflow-x-hidden bg-[#F7F7FB] flex justify-center">
    <?php
    include __DIR__ . '/../header.php';
    generateHeader('yummie', 'dark');
    ?>
    <div class="pb-[2.5rem] lg:w-[1280px] md:w-[100vw] sm:w-[100vw]" id="content-container">
        <div id="introSection" class="grid-cols-2 flex items-center pt-[150px] pb-[50px]">
            <div id="introduction" class="">
                <h1 class="text-[42px] font-bold"><span class="text-[#42BFDD]">Yummie!</span> Food Event</h1>
                <p class="text-2xl">27 July - 31 July</p>
                <p class="text-base w-[700px] pt-[25px]">Welcome to the Haarlem Food Festival! Come and join us for an
                    amazing
                    culinary experience.
                    This event is a celebration of the culinary delights that the Netherlands has to offer,
                    showcasing different cuisines and the talented chefs who prepare it. <br><br>
                    We look forward to seeing you there!</p>
                <p class="text-sm text-[#656262] w-[300px] pt-[5px]">** €10,- deposit pp. and mandatory reservation.
                    Deposit
                    will be
                    deducted upon payment.**</p>
            </div>
            <img class="w-[400px] h-[400px] ml-[180px]" src="/img/circleFoodImage.png" alt="circleFoodImage">
        </div>
        <div id="restaurants" class="flex justify-center w-[100%] flex-col">
        </div>
    </div>
    <script src="/js/food/index.js"></script>
</body>