<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
        /* outline: 1px solid red; */

    }
</style>
<title>Home</title>
<script src="https://cdn.tailwindcss.com"></script>

<?php
include __DIR__ . '/../header.php';
generateHeader('home', 'dark');
?>

<body>
    <div class="w-full h-full flex justify-center items-center" id="wrapper">
        <div class="w-1/2 h-full flex justify-center items-center">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Please fill in your email to receive your tickets.
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text" placeholder="Email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-xs font-bold mb-2">
                        An e-mail will be sent to you shortly after processing the purchase. In case you have not
                        received any e-mail; please contact us at support@haarlem.nl
                    </label>
                </div>
            </form>
        </div>
        <div class="w-full h-full flex justify-center items-center" id="items-wrapper">
            <?php

            ?>
        </div>

    </div>

    <script src="/js/shoppingCart/index.js"></script>