<style>
  @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

  * {
    font-family: 'Lato', sans-serif;
    outline: 1px red solid;
  }
</style>

<title>Home</title>
<script src="https://cdn.tailwindcss.com"></script>

<body class="h-[100vh] overflow-x-hidden bg-[#121212] flex justify-center">
  <?php
  include __DIR__ . '/../header.php';
  generateHeader('dance', 'light');
  ?>
  <div class="pb-[2.5rem] lg:w-[1280px] md:w-[100vw] sm:w-[100vw]" id="content-container">

  </div>
</body>