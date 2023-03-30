<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
        padding: 0px;
        margin: 0px;
        /* outline: 1px solid red; */
    }
</style>

<title>Haarlem Tour</title>
<script src="https://cdn.tailwindcss.com"></script>

<?php
    include __DIR__ . '/../header.php';
    require_once __DIR__ . '/../../controllers/tourController.php';
    generateHeader('login', 'dark');
?>

<body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen">  
    <div class="lg:w-[1280px] md:w-[100vw] sm:w-[100vw] mt-[100px] mb-[100px] grid" id="content-container">
        <button type="submit" class="w-[100px] h-[40px] mt-[20px] bg-[#42BFDD] text-white text-[20px] font-bold rounded-[10px] cursor-pointer" onclick="back()">Back</button>
        <div class="grid grid-cols-2 mt-[50px]">
            <div class="flex flex-row">
                <h1 class="text-3xl font-bold">Ratatouille</h1>
                <img class="w-[24px] h-[26px] mt-[5px] ml-[5px]" src="/img/michelinIcon.png">
            </div>
            <button type="submit" class="w-[200px] h-[40px]  bg-[#42BFDD] text-white text-[20px] font-bold rounded-[10px] cursor-pointer justify-self-end" onclick="reserve()">Make reservation</button>
        </div>
        <div class="flex justify-items-start pb-[10px]">
            <img class="w-[115px] h-[25px]" src="/img/4.7Rating.png">
            <p class="text-[20px] font-medium pl-[10px]">4.7/5</p>
            <p class="text-[20px] text-[#FC5B84] font-medium pl-[10px]">French, Seafood, European</p>
        </div>
        <p class="text-xl w-[900px] mt-[50px]">Ratatouille is Haarlem’s only Michelin starred restaurant. Located in the city centre, and owned by a talented chef Jozua Jaring, the restaurant specialises in creating delicious French dishes using fresh, local ingredients. The menu features a wide variety of classic and modern takes on French favourites Offering indoor and outdoor seating, Ratatouille appeals to a broad range of tastes and is sure to please a wide variety of diners. </p>
        <img class="w-[1280px] h-[400px] mt-[50px]" src="/img/detailRatatouilleImg1.png">
        <div class="grid grid-cols-3 grid-rows-2 gap-[50px] mt-[50px]">
            <img class="h-[300px]" src="/img/detailRatatouilleImg2.png">
            <img class="row-span-2 h-[650px]" src="/img/detailRatatouilleImg4.png">
            <img class="row-span-2 h-[650px]" src="/img/detailRatatouilleImg5.png">
            <img class="h-[300px]" src="/img/detailRatatouilleImg3.png">
        </div>
        <button type="submit" class="w-[200px] h-[40px]  bg-[#42BFDD] text-white text-[20px] font-bold rounded-[10px] cursor-pointer justify-self-end mt-[50px]" onclick="reserve()">Make reservation</button>
        <p class="text-l w-[200px] text-gray-700 mt-[10px] justify-self-end">** €10,- deposit pp. and mandatory reservation. Deposit will be deducted upon payment.**</p>

        <div class="bg-[#42BFDD] rounded-[10px] w-[700px] h-[200px] mt-[50px]" id="schedule">
                    <h2 class="ml-[20px] pt-[20px] text-[24px] text-white">Schedule</h2>              
                    <div class="grid grid-cols-4 mt-[20px]  bg-[#FFFFFF] pl-[100px]">
                        <div class="col-span-1">
                            <p>26th July - 29th July 2023</p>
                        </div>
                        <div class="col-span-1">
                            <p class="ml-[20px]">First Timeslot</p>
                            <p class="ml-[20px]">Second Timeslot</p>
                            <p class="ml-[20px]">Third Tiomeslot</p>
                        </div>
                        <div class="col-span-1">
                            <p class="ml-[20px]">10:00</p>
                            <p class="ml-[20px]">13:00</p>
                            <p class="ml-[20px]">16:00</p>
                        </div>
                        <div class="col-span-1">
                            <p class="ml-[20px]">10:00</p>
                            <p class="ml-[20px]">13:00</p>
                            <p class="ml-[20px]">16:00</p>
                        </div>
                    </div>
                </div>
    </div>
</body>

<script>
    function back() {
        window.location.href = "/tour/tourOverview";
    }

    function reserve() {
        // window.location.href = "/tour/reservation";
    }
</script>

<?php
    include __DIR__ . '/../footer.php';
?>