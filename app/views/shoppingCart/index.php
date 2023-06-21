<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    /* * {
        font-family: 'Lato', sans-serif;
        outline: 1px solid red;

    } */
</style>
<title>Home</title>
<script src="https://cdn.tailwindcss.com"></script>

<?php
require_once __DIR__ . '/../header.php';
generateHeader('home', 'dark');
?>

<body>
    <div class="w-full h-full flex items-center" id="wrapper">

        <div class="overflow-y">
            <table class="text-left w-[600px]">
                <thead class="bg-black flex text-white w-full">
                    <tr class="flex w-full mb-4 items-center justify-center">
                        <th class="p-4 w-1/4">Date</th>
                        <th class="p-4 w-1/4">Language, session, restaurant_id</th>
                        <th class="p-4 w-1/4">Price</th>
                        <th class="p-4 w-1/4"></th>
                    </tr>
                </thead>
                <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full h-[500px]">
                    <?php
                    foreach ($_SESSION['strollEvents'] as $event) {
                        echo '
                           <tr class="border text-indigo-900 border-gray-700 flex items-center w-full mb-4">
                           <td class="p-4 w-1/4">Stroll <br>' . $event->date . '<td>
                           <td class="p-4 w-1/4">' . $event->language . '<td>
                           <td class="p-4 w-1/4">€' . $event->price . '<td>
                           <td class="p-4 w-1/4">
                           <form method="post">
                                <input type="hidden" name="selectedTicket" value="' . $event->id . '">
                                    <a href="/shoppingCart">
                                    <button type="submit" value="send" >add ticket</button>
                                    </a>
                                </form>
                            <td>
                           </tr>';
                    }

                    foreach ($_SESSION['edmEvents'] as $event) {
                        echo '
                           <tr class="border text-indigo-900 border-gray-700 flex items-center w-full mb-4">
                           <td class="p-4 w-1/4">Dance<br>' . $event->get_date() . '<td>
                           <td class="p-4 w-1/4">'  . $event->get_session() . '<td>
                           <td class="p-4 w-1/4">€' . $event->get_price() . '<td>
                           <td class="p-4 w-1/4">
                           <form method="post">
                                <input type="hidden" name="selectedTicket" value="' . $event->get_id() . '">
                                    <a href="/shoppingCart">
                                    <button type="submit" value="send" >add ticket</button>
                                    </a>
                                </form>
                            <td>
                           </tr>';
                    }

                    foreach ($_SESSION['yummieEvents'] as $event) {
                        echo '
                           <tr class="border text-indigo-900 border-gray-700 flex items-center w-full mb-4">
                           <td class="p-4 w-1/4">Yummie<br>' . $event->get_session_startTime() . ' - ' . $event->get_session_endTime() . ' <td>
                           <td class="p-4 w-1/4">'  . $event->get_restaurant_id() . '<td>
                           <td class="p-4 w-1/4"> adult: €' . $event->get_adult_price() . '<br> kids: €' . $event->get_kids_price() . '<td>
                           <td class="p-4 w-1/4">
                           <form method="post">
                                <input type="hidden" name="selectedTicket" value="' . $event->get_id() . '">
                                    <a href="/shoppingCart">
                                    <button type="submit" value="send" >add ticket</button>
                                    </a>
                                </form>
                            <td>
                           </tr>';
                    }
                    ?>


                </tbody>
            </table>
        </div>

        <div class="w-1/2 h-10% flex flex-col justify-center items-center">
            <p class="ticket">
            <h1 class="text-4xl">Your shopping cart</h1>
            <div class="overflow-y">
                <table class="text-left w-[600px]">
                    <thead class="bg-black flex text-white w-full">
                        <tr class="flex w-full mb-4 items-center justify-center">
                            <th class="p-4 w-1/4">uuid</th>
                            <th class="p-4 w-1/4">event_id</th>
                            <th class="p-4 w-1/4">price</th>
                            <th class="p-4 w-1/4"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-grey-light flex flex-col items-center overflow-y-scroll w-full h-[500px] gap-[50px]" id="tickets">
                        <?php

                        if (isset($_SESSION['pendingTickets'])) {
                            foreach ($_SESSION['pendingTickets'] as $ticket) {

                                echo '
                                    <tr class="border text-indigo-900 border-gray-700 flex items-center w-full mb-4">
                                    <td class="p-4 w-1/4">' . $ticket->getId() . '<td>
                                    <td class="p-4 w-1/4">' . $ticket->getEvent_Id() . '<td>
                                    <td class="p-4 w-1/4">€' . $ticket->getPrice() . '<td>
                                    <td class="p-4 w-1/4">
                                    <form method="post">
                                            <input type="hidden" name="removePendingTicket" value="' . $ticket->getId() . '">
                                            <input type="hidden" id="userId" value="' . $_SESSION['USER_ID'] . '"></input>
                                                <a href="/shoppingCart">
                                                <button type="submit" value="send" >remove ticket</button></a>
                                    </form>
                                    <td>
                                    </tr>';
                                echo '<form method="POST">
                                    <input type="hidden" name="checkoutTickets"><button type="submit" value="send">';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </p>

            <div class="absolute-bottom w-full flex justify-center items-center">
                <a href="/shoppingCart" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2">Shopping
                    cart</a>
                <p><?php if (isset($_SESSION['pendingTickets'])) {
                        $total = 0;
                        foreach ($_SESSION['pendingTickets'] as $ticket) {
                            $total += $ticket->getPrice();
                        }
                    }
                    echo $total; ?></p>
            </div>

        </div>
</body>


<script>
    async function getShoppingCartItems(id) {
        const res = await fetch('http://localhost/api/cart?id=' + id);
        const data = await res.json();
        return data;
    }


    async function loadCart() {
        items = await getShoppingCartItems(getId());
        ticketWrapper = document.getElementById('tickets');
        ticketWrapper.innerHTML = "";
        for (let i = 0; i < items.length; i++) {
            switch (items[i].session_type) {
                case "yummie":
                    generateYummieCartObject(items[i], ticketWrapper);
                    break;
                case "edm":
                    generateEDMCartObject(items[i], ticketWrapper);
                    break;
                case "stroll":
                    generateStrollCartObject(items[i], ticketWrapper);
                    break;

                default:
                    break;
            }
        }
    }

    function getRestaurant(id) {
        restaurants = getRestaurantsFromAPI(id);

        for (let i = 0; i < restaurants.length; i++) {
            if (restaurants[i].id == id)
                return restaurants[i]
        }
        
    }

    async function getRestaurantsFromAPI(id) {
        const res = await fetch('http://localhost/api/restaurants')
        return await res.json();
    }

    async function removeTicket(target) {
        data = {
            post_type: "delete",
            id: target.currentTarget.myParam
        }
        fetch('http://localhost/api/tickets', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                },
                redirect: 'follow',
                referrerPolicy: 'no-referrer',
                body: JSON.stringify(data),
            })
        console.log(data);

    }

    function generateYummieCartObject(item, parent) {

        fullWrapper = document.createElement('div');
        fullWrapper.classList.add("bg-[#F7F7FB]", "p-4", "rounded-md", "w-full", "h-[150px]", "flex", "flex-row")

        wrapperLeft = document.createElement("div");
        wrapperLeft.classList.add("w-[70%]", "h-[150px]");
        console.log(item);
        title = document.createElement("h1");

        const restaurant = getRestaurant(item.session.restaurant_id);
        title.innerHTML = restaurant.name;
        title.classList.add("bold", "text-[20px]");
        secondTitle = document.createElement("h2");
        secondTitle.innerHTML = restaurant.address;


        timeTitle = document.createElement("span");
        timeTitle.innerHTML = "starting time: ";
        timeSpan = document.createElement("span");
        timeSpan.classList.add("text-[30px]", "p-4")
        timeSpan.innerHTML = item.session.session_startTime;


        wrapperLeft.appendChild(title);
        wrapperLeft.appendChild(secondTitle);
        wrapperLeft.appendChild(timeTitle);
        wrapperLeft.appendChild(timeSpan);


        wrapperRight = document.createElement("div");
        wrapperRight.classList.add("w-auto", "flex", "items-center", "justify-items-end")

        remove = document.createElement("button");
        remove.innerHTML = "remove";
        remove.addEventListener("click", removeTicket, false);
        remove.myParam = item.id;


        wrapperRight.appendChild(remove);
        fullWrapper.appendChild(wrapperLeft);
        fullWrapper.appendChild(wrapperRight);
        parent.appendChild(fullWrapper);
    }

    function generateEDMCartObject(item, parent) {

    }

    function generateStrollCartObject(item, parent) {
        title = document.createElement("h1");
        title.innerHTML = item.id;
        parent.appendChild(title);
    }

    function getId() {
        id = document.getElementById("userId").value;
        return id;
    }

    loadCart();
</script>