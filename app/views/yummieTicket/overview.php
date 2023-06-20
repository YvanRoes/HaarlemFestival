<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
        padding: 0px;
        margin: 0px;
        /* outline: 1px solid red; */
    }
</style>

<title>Yummie Reservation</title>
<script src="https://cdn.tailwindcss.com"></script>

<?php
    include __DIR__ . '/../header.php';
    require_once __DIR__ . '/../../controllers/tourController.php';
    generateHeader('ReservationOverview', 'dark');
?>

<body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen">  
    <div class="lg:w-[1280px] md:w-[100vw] sm:w-[100vw] mt-[100px] mb-[100px] grid" id="content-container">

        <div class="flex justify-center">
            <button id="checkoutButton" class="m-2 py-2 px-8 rounded-md text-[#F7F7FB] bg-slate-800 w-fit mt-10">Proceed to checkout</button>
        </div>
    </div>
</body>

<?php
    include __DIR__ . '/../footer.php';
?>