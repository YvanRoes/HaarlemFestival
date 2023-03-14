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
        <image src="/img/danceImg1.png" class="w-[500px]">
      </div>
    </div>
    <div class="flex justify-center mt-[100px]">
      <h1 class="text-[64px] text-[#F7F7FB] font-['Lato']">The Artists</h1>
    </div>
    <div class="grid grid-cols-3 grid-rows-2">
      <div class="flex flex-col justify-center items-center">
        <image src="/img/artist1.png" class="w-[300px]">   
      </div>
      <div class="flex flex-col justify-center items-center mt-[100px]">
        <image src="/img/artist2.png" class="w-[300px]">
      </div>
      <div class="flex flex-col justify-center items-center mt-[200px]">
        <image src="/img/artist3.png" class="w-[300px]">
      </div>
      <div class="flex flex-col justify-center items-center">
        <image src="/img/artist4.png" class="w-[300px]">   
      </div>
      <div class="flex flex-col justify-center items-center mt-[100px]">
        <image src="/img/artist5.png" class="w-[300px]">
      </div>
      <div class="flex flex-col justify-center items-center mt-[200px]">
        <image src="/img/artist6.png" class="w-[300px]">
      </div>
    </div>
    <div class="flex justify-center mt-[100px]">
      <h1 class="text-[64px] text-[#F7F7FB] font-['Lato']">The Planning</h1>
    </div>
    <div class="grid grid-cols-6 mt-[50px] text-[24px] text-[#F7F7FB] font-['Lato'] ">
      <h2 class="outline outline-1 outline-white pl-[3px]">Date</h2>
      <h2 class="outline outline-1 outline-white pl-[3px]">Location</h2>
      <h2 class="col-span-2 outline outline-1 outline-white pl-[3px]">Artist</h2>
      <h2 class="outline outline-1 outline-white pl-[3px]">Tickets</h2>
      <h2 class="outline outline-1 outline-white pl-[3px]">Price</h2>
      <h2 class="outline outline-1 outline-white pl-[3px]">Fri, Jul. 27 20:00</h2>
      <h2 class="outline outline-1 outline-white pl-[3px]">LichtFabriek</h2>
      <h2 class="col-span-2 outline outline-1 outline-white pl-[3px]">Nicky Romero/ Afrojack</h2>
      <h2 class="outline outline-1 outline-white pl-[3px]">1500</h2>
      <h2 class="outline outline-1 outline-white pl-[3px]">€75.00</h2>
    </div>

    <p class="text-[#656262] mt-[10px]">* The capacity of the Club sessions is very limited. Availability for All-Access pas holders can not be garanteed due to safety regulations. Tickets available represents total capacity. (90% is sold as single tickets. 10% of total capacity is left for Walk ins/All-Acces passholders.)</p> 

    <div class="flex justify-center">
      <button class="mt-[100px] w-[200px] h-[50px] text-white outline outline-3 white">Buy Tickets</button>
    </div>
    <div class="flex justify-center mt-[100px] mb-[50px]">
          <h1 class="text-[64px] text-[#F7F7FB] font-['Lato']">Locations</h1>
    </div>
    <div class="grid grid-cols-2 grid-rows-3">
        <div class="grid grid-cols-2 grid-rows-2 outline outline-1 outline-white">
          <h2 class="text-[24px] text-[#F7F7FB] font-['Lato'] mt-[20px]">LichtFabriek</h2>
          <image class="row-span-2" src="/img/danceLocation1.png">
          <h2 class="text-[20px] text-[#F7F7FB] font-['Lato']">Minckelersweg 2, 2031 EM Haarlem</h2>     
        </div>
        <div class="grid grid-cols-2 grid-rows-2 ml-[10px] justify-items-end outline outline-1 outline-white">
          <h2 class="text-[24px] text-[#F7F7FB] font-['Lato'] mt-[20px]">LichtFabriek</h2>
          <image class="row-span-2 " src="/img/danceLocation2.png">
          <h2 class="text-[20px] text-[#F7F7FB] font-['Lato']">Minckelersweg 2, 2031 EM Haarlem</h2>     
        </div>
        <div class="grid grid-cols-2 grid-rows-2 outline outline-1 outline-white">
          <h2 class="text-[24px] text-[#F7F7FB] font-['Lato'] mt-[20px]">LichtFabriek</h2>
          <image class="row-span-2" src="/img/danceLocation3.png">
          <h2 class="text-[20px] text-[#F7F7FB] font-['Lato']">Minckelersweg 2, 2031 EM Haarlem</h2>     
        </div>
        <div class="grid grid-cols-2 grid-rows-2 ml-[10px] justify-items-end outline outline-1 outline-white">
          <h2 class="text-[24px] text-[#F7F7FB] font-['Lato'] mt-[20px]">LichtFabriek</h2>
          <image class="row-span-2" src="/img/danceLocation4.png">
          <h2 class="text-[20px] text-[#F7F7FB] font-['Lato']">Minckelersweg 2, 2031 EM Haarlem</h2>     
        </div>
    </div>
  </div>

</body>