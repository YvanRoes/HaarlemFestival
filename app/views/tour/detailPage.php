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
        <h1 class="text-[36px] font-bold mt-[50px]"><? echo $location->get_name() ?></h1>
        <div class="grid grid-cols-2">
            <img class="w-[700px] h-[300px] mt-[50px]" src="/img/stBavoChurchImg1.png" alt="St. Bavo Church">
            <img class="w-[600px] h-[300px] mt-[50px] justify-self-end" src="/img/stBavoChurchImg2.png" alt="St. Bavo Church">
        </div>

        <h1 class="text-[36px] font-bold mt-[100px] justify-self-center">History of the church</h1>
        <p class="text-xl w-[700px] mt-[20px] justify-self-center"><? echo $location->get_description()?></p>

        <div class="grid grid-cols-2">
            <div>
                <h1 class="text-[36px] font-bold mt-[100px] mb-[20px]">Importance to Haarlem.</h1>
                <p class="text-xl w-[600px] mt-[20px]">Around the church there is a big market every week this is very important to Haarlem since a lot of people from the surrounding regions come to this market to sell.</p>
            </div>
            <div>
                <h1 class="text-[36px] w-[400px] font-bold mt-[100px] mb-[20px]">The location and where we are on our tour.</h1>
                <p class="text-xl w-[600px] mt-[20px]">This is the starting location of our tour. On the map below you can see the exact location. <br> Address: Grote Markt 22.</p>
            </div>
        </div>

        <img class="w-[800px] h-[300px] mt-[50px] justify-self-center mt-[50px]" src="/img/stBavoChurchImg3.png" alt="St. Bavo Church">
    </div>
</body>

<script>
    function back() {
        window.location.href = "/tour/tourOverview";
    }
</script>

<?php
    include __DIR__ . '/../footer.php';
?>