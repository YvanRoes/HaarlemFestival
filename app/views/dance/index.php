<style>
  @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

  * {
    padding: 0px;
    margin: 0px;
    /* outline: 1px solid red; */
  }
</style>

<title>Home</title>
<script src="https://cdn.tailwindcss.com"></script>

<body class="h-[100vh] overflow-x-hidden bg-[#121212] flex justify-center">
  <?php
  include __DIR__ . '/../header.php';
  generateHeader('dance', 'light');
  ?>
  <div class="pb-[2.5rem] mt-[100px] lg:w-[1280px] md:w-[100vw] sm:w-[100vw]" id="content-container">
    <div class="grid grid-cols-2 grid-rows-1 h-[600px]">
      <div class="flex flex-col justify-center text-[#F7F7FB] font-['Lato']">
        <h1 id="HeroHeader" class="text-[64px]">Let's Dance</h1>
        <p class="w-[80%] text-[20px]">
          Dance for us is not just an activity, it’s a way of life.
          Come dance the best Dutch produced music out there right here, right now!
        </p>
        <button
          class='w-max h-[40px] mt-[15px] text-[#F7F7FB] flex items-center gap-[10px] border-2 border-[#F7F7FB] px-4 py-5 transition ease-in-out cursor-pointer'>Buy
          Tickets</button>
      </div>
      <div class="flex items-center justify-center">
        <image src="/img/DanceImg1.png" class="w-[500px]">
      </div>
    </div>
    <div class="flex justify-center mt-[100px]">
      <h1 class="text-[64px] text-[#F7F7FB] font-['Lato']">The Artists</h1>
    </div>
    <div class="grid grid-cols-3 grid-rows-2 mt-[50px]">
      <div class="flex flex-col justify-center items-center">
        <image src="/img/Artist1.png" class="w-[300px]">   
      </div>
      <div class="flex flex-col justify-center items-center mt-[100px]">
        <image src="/img/Artist2.png" class="w-[300px]">
      </div>
      <div class="flex flex-col justify-center items-center mt-[200px]">
        <image src="/img/Artist3.png" class="w-[300px]">
      </div>
      <div class="flex flex-col justify-center items-center">
        <image src="/img/Artist4.png" class="w-[300px]">   
      </div>
      <div class="flex flex-col justify-center items-center mt-[100px]">
        <image src="/img/Artist5.png" class="w-[300px]">
      </div>
      <div class="flex flex-col justify-center items-center mt-[200px]">
        <image src="/img/Artist6.png" class="w-[300px]">
      </div>
    </div>
    <div class="flex justify-center mt-[100px]">
      <h1 class="text-[64px] text-[#F7F7FB] font-['Lato']">The Planning</h1>
    </div>
    <div class="grid grid-cols-6 gap-y-[10px] mt-[50px] text-[24px] text-[#F7F7FB] font-['Lato'] ">
      <h2 class="outline outline-1 outline-white">Date</h2>
      <h2 class="outline outline-1 outline-white">Location</h2>
      <h2 class="col-span-2">Artist</h2>
      <h2 class="outline outline-1 outline-white">Tickets</h2>
      <h2 class="outline outline-1 outline-white">Price</h2>
      <h2 class="outline outline-1 outline-white">Fri, Jul. 27 20:00</h2>
      <h2 class="outline outline-1 outline-white">LichtFabriek</h2>
      <h2 class="col-span-2">Nicky Romero/ Afrojack</h2>
      <h2 class="outline outline-1 outline-white">1500</h2>
      <h2 class="outline outline-1 outline-white">€75.00</h2>
    </div>
  </div>
</body>