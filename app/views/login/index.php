<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
  
    * {
          padding: 0px;
          margin: 0px;
          /* outline: 1px solid red; */
      }
  </style>
  
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  
  <body class="h-[100vh] overflow-x-hidden bg-[#F7F7FB] flex justify-center">
    <?php
    include __DIR__ . '/../header.php';
    generateHeader('login', 'dark');
    ?>
    <div class="pb-[2.5rem] lg:w-[1280px] md:w-[100vw] sm:w-[100vw] flex items-center justify-center" id="content-container">
    <div class="flex flex-col items-center justify-center mt-[100px]">
      <form method="POST" action="" class="flex flex-col">
        <input name="mail" rows="1" class="block w-full h-[40px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#29334E] border-0 rounded-sm focus:ring-0 resize-none" placeholder="email" required></input>
        <input name="passwd" type="password" rows="1" class="block w-full h-[40px] m-auto my-4 py-2 px-2 text-sm text-gray-800 bg-[#29334E] border-0 focus:ring-0 rounded-sm resize-none" placeholder="password" required></input>
        <button name="submitLogin" type="submit" class="w-full h-[40px] text-[#29334E] flex items-center justify-center gap-[10px] border-2 border-[#29334E] cursor-pointer p-5 rounded-md">Log in</button>
      </form>
      <form method="POST" action="" class="flex flex-col justify-center">
        <p class="text-gray-600 pt-2 text-[14px]">dont have an account yet?</p>
        <button name="createNewUser" type="submit" class="text-gray-600 text-[14px] underline">create new Account</button>
      </form>
    </div>
    </div>
  </body>