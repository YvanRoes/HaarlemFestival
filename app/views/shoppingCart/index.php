<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
        /* outline: 1px solid red; */

    }
</style>
<title>Shopping cart</title>
<script src="https://cdn.tailwindcss.com"></script>

<?php
require_once __DIR__ . '/../header.php';
generateHeader('home', 'dark');
?>

<body>
    <div>
        <h1>Shopping cart</h1>
    </div>
    <div class="w-full h-full flex justify-center items-center" id="items-wrapper">

    </div>

    <script src="/js/shoppingCart/index.js"></script>

</body>