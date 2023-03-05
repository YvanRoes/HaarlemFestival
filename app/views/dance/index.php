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
        <button class='w-max h-[40px] mt-[15px] text-[#F7F7FB] flex items-center gap-[10px] border-2 border-[#F7F7FB] px-4 py-5 transition ease-in-out cursor-pointer'>Buy Tickets</button>
      </div>
      <div class="flex items-center justify-center">
        <svg width="65%" height="75%" viewBox="0 0 647 646" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M355.414 0.278878C458.936 -3.85714 567.595 38.017 622.938 125.602C673.702 205.94 628.923 303.925 605.474 396.02C583.193 483.529 575.008 586.91 494.88 628.549C413.137 671.026 319.936 624.735 235.29 588.385C143.401 548.924 32.699 515.078 6.14034 418.665C-21.1532 319.584 47.555 224.852 113.416 145.959C176.899 69.9144 256.434 4.23344 355.414 0.278878Z" fill="#D9D9D9" />
        </svg>
      </div>
    </div>

  </div>
</body>