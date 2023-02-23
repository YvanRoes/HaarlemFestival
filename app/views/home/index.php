<style>
  @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

  * {
    font-family: 'Lato', sans-serif;
  }
</style>

<?php
include __DIR__ . '/../header.php';
?>

<body class="">
  <!-- Festival image background -->
  <div class=" w-screen h-[300px] h-14 bg-gradient-to-r from-purple-500 to-pink-500 ">
    <div class="relative w-full max-w-lg ml-10 pt-10">
      <p class="absolute font-extrabold tracking-wide text-violet-700 text-4xl text-center opacity-50 ">T H E   F E S T I V A L</p>
      <div class=" text-slate-100">
        <p class="font-extrabold tracking-wide text-3xl pt-5 pl-10">THE FESTIVAL</p>
        <p class="text-xl pt-10">Enjoy the cultural and historical <br> parts of Haarlem with this festival!</p>
      </div>
    </div>
  </div>

  <!-- Festival events -->
  <div class="grid place-items-center min-h-screen">
    <!-- inside each div there must blobs in the background -->
    <div class="p-4 max-w-5xl grid gap-4">

      <div class="grid grid-cols-3 gap-4">
            <!-- stroll image -->
        <div class="h-16 bg-blue-500"></div>
        <!-- right arrow -->
        <div class="h-16 bg-blue-500"></div>
        <!-- stroll text -->
        <div class="h-16 bg-blue-50">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam commodi ipsum sunt quis quia temporibus ipsam harum sequi doloremque.</p>
        </div>
      </div>
      
      <div class="grid grid-cols-3 gap-4">
        <!-- yummie image -->
        <div class="h-16 bg-blue-500"></div>
        <!-- left arrow -->
        <div class="h-16 bg-blue-500"></div>
              <!-- yummie text -->
        <div class="h-16 bg-blue-50">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam commodi ipsum sunt quis quia temporibus ipsam harum sequi doloremque.</p>
        </div>
      </div>
      
      <div class="grid grid-cols-3 gap-4">
          <!-- edm image -->
        <div class="h-16 bg-blue-500"></div>
        <!-- left arrow -->
        <div class="h-16 bg-blue-500"></div>
        <!-- edm text -->
        <div class="h-16 bg-blue-50">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam commodi ipsum sunt quis quia temporibus ipsam harum sequi doloremque.</p>
        </div>
          
      </div>
      
      
      <!-- Festival locations-->
      <div class="h-16 bg-blue-500"></div>

      <!-- Festival schedule -->
      <div class="w-maxcontent h-[175px] bg-blue-200 flex justify-center rounded-[15px] flex-row gap-16 leading-5 p-6 lg:pl-[75px] lg:pr-[75px] md:pl-[20px] sm:flex-row">
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
  
  </div>


  

  
</body>

<?php
include __DIR__ . '/../footer.php';
?>


<!-- Hello Homepage -->