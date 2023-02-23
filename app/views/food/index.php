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

<body class="h-[100vh] overflow-x-hidden bg-[#F7F7FB] flex justify-center">
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
        <div id="restaurants" class="flex-col">
            <div id="ratatouilleSection" class="pb-[50px]">
                <div class="flex">
                    <h1 class="text-3xl font-bold pl-[15px]">Ratatouille</h1>
                    <img class="w-[24px] h-[26px] mt-[5px] ml-[5px]" src="/img/michelinIcon.png" alt="michelinIcon">
                </div>
                <div class="flex justify-items-start pl-[15px] pb-[10px]">
                    <img class="w-[115px] h-[25px]" src="/img/4.7Rating.png" alt="4.7rating">
                    <p class="text-[20px] font-medium pl-[10px]">4.7/5</p>
                    <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">French, Seafood, European</p>
                </div>
                <div class="grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]">
                    <img class="w-[500px] h-[650px]" src="/img/ratatouilleImg1.png" alt="ratatouilleImage1">
                    <div class="flex flex-col gap-[50px]">
                        <img class="w-[500px] h-[325px]" src="/img/ratatouilleImg2.png" alt="ratatouilleImage2">
                        <img class="w-[500px] h-[275px]" src="/img/ratatouilleImg3.png" alt="ratatouilleImage3">
                    </div>
                </div>
            </div>
            <div id="mr&mrsSection" class="pb-[50px]">
                <h1 class="text-3xl font-bold pl-[15px]">Restaurant Mr & Mrs</h1>
                <div class="flex justify-items-start pl-[15px] pb-[10px]">
                    <img class="w-[115px] h-[25px]" src="/img/4.7Rating.png" alt="4.7rating">
                    <p class="text-[20px] font-medium pl-[10px]">4.7/5</p>
                    <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">Dutch, Seafood, European</p>
                </div>
                <div class="flex flex-row mb-[50px]">
                    <img class="w-[500px] h-[275px] mr-[50px]" src="/img/mr&mrsImg1.png" alt="mr&mrsImage1">
                    <img class="w-[500px] h-[275px]" src="/img/mr&mrsImg2.png" alt="mr&mrsImage2">
                </div>
                <img class="w-[1050px] h-[325px]" src="/img/mr&mrsImg3.png" alt="mr&mrsImage3">
            </div>
            <div id="specktakelSection" class="pb-[50px]">
                <h1 class="text-3xl font-bold pl-[15px]">Specktakel</h1>
                <div class="flex justify-items-start pl-[15px] pb-[10px]">
                    <img class="w-[115px] h-[25px]" src="/img/4.5Rating.png" alt="4.5rating">
                    <p class="text-[20px] font-medium pl-[10px]">4.5/5</p>
                    <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">European, International, Asian </p>
                </div>
                <div class="grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]">
                    <img class="w-[500px] h-[650px]" src="/img/specktakelImg3.png" alt="specktakelImage1">
                    <div class="flex flex-col gap-[50px]">
                        <img class="w-[500px] h-[325px]" src="/img/specktakelImg2.png" alt="specktakelImage2">
                        <img class="w-[500px] h-[275px]" src="/img/specktakelImg1.png" alt="specktakelImage3">
                    </div>
                </div>
            </div>
            <div id="toujoursSection" class="pb-[50px]">
                <h1 class="text-3xl font-bold pl-[15px]">Toujours</h1>
                <div class="flex justify-items-start pl-[15px] pb-[10px]">
                    <img class="w-[115px] h-[25px]" src="/img/4.4Rating.png" alt="4.4rating">
                    <p class="text-[20px] font-medium pl-[10px]">4.4/5</p>
                    <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">Dutch, Seafood, European</p>
                </div>
                <div class="flex flex-row mb-[50px]">
                    <img class="w-[500px] h-[275px] mr-[50px]" src="/img/toujoursImg1.png" alt="toujoursImage1">
                    <img class="w-[500px] h-[275px]" src="/img/toujoursImg2.png" alt="toujoursImage2">
                </div>
                <img class="w-[1050px] h-[325px]" src="/img/toujoursImg3.png" alt="toujoursImage3">
            </div>
            <div id="mlSection" class="pb-[50px]">
                <div class="flex">
                    <h1 class="text-3xl font-bold pl-[15px]">Restaurant ML</h1>
                    <img class="w-[24px] h-[26px] mt-[5px] ml-[5px]" src="/img/michelinIcon.png" alt="michelinIcon">
                </div>
                <div class="flex justify-items-start pl-[15px] pb-[10px]">
                    <img class="w-[115px] h-[25px]" src="/img/4.1Rating.png" alt="4.1rating">
                    <p class="text-[20px] font-medium pl-[10px]">4.1/5</p>
                    <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">Dutch, Seafood, European</p>
                </div>
                <div class="grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]">
                    <img class="w-[500px] h-[650px]" src="/img/mlImg1.png" alt="mlImage1">
                    <div class="flex flex-col gap-[50px]">
                        <img class="w-[500px] h-[325px]" src="/img/mlImg2.png" alt="mlImage2">
                        <img class="w-[500px] h-[275px]" src="/img/mlImg3.png" alt="mlImage3">
                    </div>
                </div>
            </div>
            <div id="grandCafeBrinkmannSection" class="pb-[50px]">
                <h1 class="text-3xl font-bold pl-[15px]">Grand Café Brinkmann</h1>
                <div class="flex justify-items-start pl-[15px] pb-[10px]">
                    <img class="w-[115px] h-[25px]" src="/img/4.1Rating.png" alt="4.1rating">
                    <p class="text-[20px] font-medium pl-[10px]">4.1/5</p>
                    <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">Modern, Dutch, European</p>
                </div>
                <div class="flex flex-row mb-[50px]">
                    <img class="w-[500px] h-[275px] mr-[50px]" src="/img/cafeImg1.png" alt="cafeImage1">
                    <img class="w-[500px] h-[275px]" src="/img/cafeImg2.png" alt="cafeImage2">
                </div>
                <img class="w-[1050px] h-[325px]" src="/img/cafeImg3.png" alt="cafeImage3">
            </div>
            <div id="frisSection" class="pb-[50px]">
                <div class="flex">
                    <h1 class="text-3xl font-bold pl-[15px]">Restaurant Fris</h1>
                    <img class="w-[24px] h-[26px] mt-[5px] ml-[5px]" src="/img/michelinIcon.png" alt="michelinIcon">
                </div>
                <div class="flex justify-items-start pl-[15px] pb-[10px]">
                    <img class="w-[115px] h-[25px]" src="/img/4.1Rating.png" alt="4.1rating">
                    <p class="text-[20px] font-medium pl-[10px]">4.1/5</p>
                    <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">Dutch, French, European</p>
                </div>
                <div class="grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]">
                    <img class="w-[500px] h-[650px]" src="/img/frisImg3.png" alt="frisImage1">
                    <div class="flex flex-col gap-[50px]">
                        <img class="w-[500px] h-[325px]" src="/img/frisImg2.png" alt="frisImage2">
                        <img class="w-[500px] h-[275px]" src="/img/frisImg1.png" alt="frisImage3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>