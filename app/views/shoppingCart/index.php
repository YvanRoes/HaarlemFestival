<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
        outline: 1px solid red;
    }
</style>
<title>Home</title>
<script src="https://cdn.tailwindcss.com"></script>

<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/./../../models/ticket.php';
generateHeader('home', 'dark');
//once this project is over i'm going to read the entirety of higurashi and no one is going to stop me. you can't stop me.
?>

<body>
    <div class="w-full h-full flex justify-center items-center" id="wrapper">
        <div class="relative overflow-x-auto overflow-y-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <?php
                        foreach ($_SESSION['yummieTickets'] as $yummieTicket) {
                                  echo'
                                 <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> '.$yummieTicket->event_id.'</th>';
                                 echo '                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                 <form method="post">
                                 <input type="hidden" name="selectedTicket" value="'. $yummieTicket->uuid .'">
                                 <a href="/shoppingCart">
                                 <button type="submit" value="send" >add ticket</button>
                                   </a>
                                  </form>
                               </th>';
                        }
                        ?>

                        </th>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="w-1/2 h-10% flex flex-col justify-center items-center">
            <p class="ticket">
            <h1 class="text-4xl">Your shopping cart</h1>
            </p>
            <p class="ticket">
            <form method="post">
                <?php
               echo ' <input type="hidden" name="selectedTicket" value="1">';
                ?>
                                <a href="/shoppingCart">
                                    <button type="submit" value="Send">click me</button>
                                </a>
                        </form>
            </p>

            <div class="absolute-bottom w-full flex justify-center items-center">
                <a href="/shoppingCart"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2">Payment</a>
            </div>

        </div>
        <script src="./js/shoppingCart/shoppingCart.js"></script>
</body>