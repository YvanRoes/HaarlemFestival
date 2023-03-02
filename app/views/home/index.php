<style>
  @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

  * {
    font-family: 'Lato', sans-serif;
    /* outline: 1px solid red; */

  }
</style>
<title>Home</title>
<script src="https://cdn.tailwindcss.com"></script>

<body class="h-[100vh] overflow-x-hidden bg-[white]">

  <div class="pb-[2.5rem] w-[1280px]" id="content-container">
    <!-- Festival image background -->
    <div class=" w-screen h-[100vh] h-14">
      <img src="/img/festival-homepage.png" class="absolute w-full h-full object-cover z-0" alt="Image description">
      <?php
      include __DIR__ . '/../header.php';
      generateHeader('home', 'light');
      ?>

      <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center z-10">
        <p
          class="absolute left-40 pl-20 pb-30 font-extrabold tracking-wide text-violet-700 text-6xl text-center opacity-50 ">
          T H E F E S T
          I V A L</p>
        <div class="absolute left-20 pl-20 mt-20 text-center text-white">
          <p class="font-extrabold tracking-wide text-3xl mt-10 pl-10">T H E F E S T I V A L</p>
          <p class="text-xl pt-5  tracking-wide">Enjoy the cultural and historical parts of Haarlem with this festival!
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Festival events -->
  <div class=" top-0 left-0 bg-white z-0">

    <!-- stroll event -->
    <div class="flex item-center center">
      <div class="flex-none">
        <img src="/img/festival-stroll-haarlem.png" class=" w-[300px] h-[350px] ml-[100px]">
      </div>
      <div class="flex-initial">
        <img src="/img/Arrow-1.png" class="w-[150px] h-[150px] mt-[150px] ml-[30px] ">
        <img src="/img/Vector1.png" class="absolute w-[100px] h-[100px] mb-[20px] ">
      </div>
      <div class="flex-initial w-[500px] mt-[0px] ml-[30px] ">
        <img src="/img/Vector1.png" class="w-[100px] h-[100px] mt-[0px] ml-[300px] ">
        <h3 class="font-extrabold text-violet-700 mt-[20px]">Explore the city</h3>
        <h1 class="font-extrabold text-3xl mt-[20px]">A stroll through Haarlem</h1>
        <p class=" text-left text-sm mt-[20px]">The city of Haarlem is holding a tour to showcase fun and important
          historical sites.
          Join us on this tour between the dates of 26-29 of July this year. If you are interested in Haarlem's history
          this tour is for you!
        </p>
        <button class="bg-blue-500 text-white drop-shadow-sm font-bold py-2 px-8 mt-[20px]">Explore now!</button>
      </div>
      <div class="flex-none">
        <img src="/img/Vector2.png" class="absolute w-[100px] h-[100px] mt-[60px] ml-[150px]  ">
        <img src="/img/Vector5.png" class="absolute w-[100px] h-[100px] mt-[70px] ml-[100px] ">
        <img src="/img/Vector1.png" class="absolute w-[100px] h-[100px] mt-[200px] ml-[300px] ">
      </div>
    </div>

    <!-- yummie event -->
    <div class="flex item-center center mt-20">
      <div class="flex-none">
        <img src="/img/Vector2.png" class="absolute w-[100px] h-[100px] mt-[100px] ml-[150px]  ">
        <img src="/img/Vector1.png" class="absolute w-[100px] h-[100px] mt-[120px] ml-[100px] ">
      </div>
      <div class="flex-none ml-[350px] w-[500px] pt-20">
        <img src="/img/Vector5.png" class="w-[100px] h-[100px] mr-[100px] ml-[300px] ">
        <h3 class="font-extrabold text-violet-700 mt-[20px]">Food</h3>
        <h1 class="font-extrabold text-3xl mt-[20px]">Yummie!Food event</h1>
        <p class=" text-left text-sm mt-[20px] ">Enjoy the wide variety of culinaty delights that the city of
          haarlem has
          to offer. join us as we explore the city one bite at a time.
        </p>
        <button class="bg-blue-500 text-white drop-shadow-sm font-bold py-2 px-8 mt-[20px]">Explore now!</button>

      </div>
      <div class="flex-initial pt-20">
        <img src="/img/Arrow-2.png" class="w-[250px] h-[150px] mt-[100px] ml-[30px] ">
        <img src="/img/Vector2.png" class="absolute w-[100px] h-[100px] ml-[150px] ">
      </div>
      <div class="flex-initial w-[500px] mt-[0px] ml-[50px] ">
        <img src="/img/festival-yummie-event.png" class=" w-[300px] h-[350px] mb-100">
      </div>
    </div>

    <!-- dance event -->
    <div class="flex item-center center mt-[100px]">
      <div class="flex-none ml-[100px] w-[500px] pt-20">
        <img src="/img/Vector5.png" class="w-[100px] h-[100px] mr-[100px] ml-[300px] ">
        <h3 class="font-extrabold text-violet-700 mt-[20px]">Life of the party</h3>
        <h1 class="font-extrabold text-3xl mt-[20px]">Let's dance</h1>
        <p class=" text-left text-sm mt-[20px] ">The city of haarlem welcomes you to a dance party! from popular DJs to
          up and coming artists, we have it all at Haarlem Dance event. Welcome to the party everyone!
        </p>
        <button class="bg-blue-500 text-white drop-shadow-sm font-bold py-2 px-8 mt-[20px]">Explore now!</button>
      </div>
      <div class="flex-initial pt-20">
        <img src="/img/Arrow-3.png" class="w-[250px] h-[150px] mt-[100px] ml-[30px] ">
        <img src="/img/Vector1.png" class="absolute w-[100px] h-[100px] ml-[150px] ">
      </div>
      <div class="flex-initial w-[400px]  ml-[50px] ">
        <img src="/img/festival-dance-event.png" class=" w-[300px] h-[350px] mb-100">
      </div>
      <div class="flex-none">
        <img src="/img/Vector1.png" class="absolute w-[100px] h-[100px] ml-[50px] ">
        <img src="/img/Vector5.png" class="absolute w-[100px] h-[100px] mt-[70px] ">
      </div>
    </div>
  </div>


  <!-- Festival locations-->
  <div class="flex item-center center mt-[100px]">
    <div class="flex-none ">
      <img src="/img/Vector5.png" class="absolutew-[100px] h-[100px] mt-[50px] ml-[200px] ">
      <img src="/img/Vector1.png" class="absolute w-[100px] h-[100px] mt-[150px] ml-[70px]">
      <img src="/img/Vector2.png" class="absolute w-[100px] h-[100px] mt-[200px] ml-[100px] ">
    </div>
    <div class="flex-initial ml-[120px] ">
      <p class=" font-extrabold tracking-wide text-3xl ">Locations</p>
      <img src="/img/festival-map-locations.png" class="w-[700px] h-[500px] mt-10">
    </div>
    <div class="flex-none">
      <img src="/img/Vector2.png" class="absolute w-[100px] h-[100px] mt-[100px] ml-[100px] ">
      <img src="/img/Vector1.png" class="absolute w-[100px] h-[100px] mt-[180px] ml-[120px]">
    </div>
  </div>


  </div>


  <!-- Festival schedule -->
  <div class="flex justify-center mt-[100px] mb-[100px]">
    <div>
      <h1 class="absolute font-extrabold text-3xl ">Schedule</h1>
    </div>
    <div
      class="w-maxcontent h-[175px] bg-blue-100 drop-shadow-lg flex justify-center rounded-[15px] flex-row gap-16 mt-20 leading-5 p-6 lg:pl-[75px] lg:pr-[75px] md:pl-[20px] sm:flex-row">
      <ul class="list-none flex flex-col">
        <h2 class="font-extrabold mb-2">Events</h2>
        <li class="text-sm w-20 pt-6">Dance!</li>
        <li class="text-sm w-20 pt-2">Yummie!</li>
        <li class="text-sm w-40 pt-2">Stroll through Haarlem</li>
      </ul>
      <ul class="list-none flex flex-col w-20">
        <h2 class="font-extrabold mb-2">Thursday 26 Jul</h2>
        <li class="text-sm w-20 pt-2">10:00-16:00</li>
        <li class="text-sm w-20 pt-2">16:30-23:30</li>
        <li class="text-sm w-20 pt-2">n/a</li>
      </ul>
      <ul class="list-none flex flex-col w-20">
        <h2 class="font-extrabold mb-2">Friday 27 Jul</h2>
        <li class="text-sm w-20 pt-2">10:00-16:00</li>
        <li class="text-sm w-20 pt-2">16:30-23:30</li>
        <li class="text-sm w-20 pt-2">n/a</li>
      </ul>
      <ul class="list-none flex flex-col w-20">
        <h2 class="font-extrabold mb-2">Saturday 28 Jul</h2>
        <li class="text-sm w-20 pt-2">10:00-16:00</li>
        <li class="text-sm w-20 pt-2">16:30-23:30</li>
        <li class="text-sm w-20 pt-2">14:00-00:30</li>
      </ul>
      <ul class="list-none flex flex-col w-20">
        <h2 class="font-extrabold mb-2">Sunday 29 Jul</h2>
        <li class="text-sm w-20 pt-2">10:00-16:00</li>
        <li class="text-sm w-20 pt-2">16:30-23:30</li>
        <li class="text-sm w-20 pt-2">14:00-23:00</li>
      </ul>
      <ul class="list-none flex flex-col w-20">
        <h2 class="font-extrabold mb-2">Monday 30 Jul</h2>
        <li class="text-sm w-20 pt-2">n/a</li>
        <li class="text-sm w-20 pt-2">16:30-23:30</li>
        <li class="text-sm w-20 pt-2">n/a</li>
      </ul>
      <ul class="list-none flex flex-col w-20">
        <h2 class="font-extrabold mb-2">Tuesday 31 Jul</h2>
        <li class="text-sm w-20 pt-2">n/a</li>
        <li class="text-sm w-20 pt-2">16:30-23:30</li>
        <li class="text-sm w-20 pt-2">n/a</li>
      </ul>
    </div>
  </div>

  <?php
  include __DIR__ . '/../footer.php';
  ?>
</body>