<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
        padding: 0px;
        margin: 0px;
        /* outline: 1px solid red; */
    }
</style>

<title>Yummie Reservation</title>
<script src="https://cdn.tailwindcss.com"></script>

<?php
    include __DIR__ . '/../header.php';
    require_once __DIR__ . '/../../controllers/tourController.php';
    generateHeader('Tour', 'dark');
?>

<body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen">  
    <div class="lg:w-[1280px] md:w-[100vw] sm:w-[100vw] mt-[100px] mb-[100px] grid" id="content-container">
        <h1 class="text-[36px] font-bold mt-[50px]">Yummie Reservation</h1>
        <div class="grid grid-cols-2">    
            <div class="w-[50vw] mt-10 mb-10">
                <h2 class="text-[24px] font-bold mt-[50px]">Select a restaurant</h2>
                <select id="restaurants" required>
                    <option value="" selected disabled>Select a restaurant</option>
                </select>
            </div>
      
            <div id="dateContainer" class="w-[50vw] mt-10 mb-10" hidden>
                <h2 class="text-[24px] font-bold mt-[50px]">Select a date</h2>
                <select id="dates" required>
                    <option value="" selected disabled>Select a date</option>
                </select>
            </div>
        </div>

        <div id="sessionContainer" class="w-[50vw] mt-10 mb-10" hidden>
            <h2 class="text-[24px] font-bold mt-[50px]">Select a session</h2>
            <select id="sessionSelect" required>
                <option value="" selected>Select a session</option>
            </select>
        </div>
        <div>

        </div>
    </div>
</body>

<?php
    include __DIR__ . '/../footer.php';
?>

<script>
    const restaurants = document.getElementById('restaurants');
    const dateContainer = document.getElementById('dateContainer');
    const sessionContainer = document.getElementById('sessionContainer');
    

    restaurants.addEventListener('change', function() {
    const selectedRestaurant = restaurants.value;
        
        if (selectedRestaurant) {
            dateContainer.removeAttribute('hidden');
            clearSelect(sessionSelect);
            clearSelect(dates);
            loadDates();
            loadSessions();
        } else {
            dateContainer.setAttribute('hidden', 'true');
        }
    });

    dates.addEventListener('change', function() {
    const selectedDate = dates.value;
        if (selectedDate) {
            sessionContainer.removeAttribute('hidden');
            clearSelect(sessionSelect);
            loadSessions();
        } else {
            sessionContainer.setAttribute('hidden', 'true');
        }
    });


    fetch('http://localhost/api/restaurants')
        .then(response => response.json())
        .then(data => {
            data.forEach(restaurant => {
                const option = document.createElement('option');
                option.value = restaurant.id;
                option.innerText = restaurant.name;
                restaurants.appendChild(option);
            });
    });

    function loadDates() {
        fetch('http://localhost/api/restaurantSessions')
        .then((response) => response.json())
        .then((data) => {
            sessions = [];
            data.forEach((session) => {
                if (session.restaurant_id != restaurants.value) {
                    return;
                }

                if (sessions.includes(session.session_date)) {
                    return;
                }

                sessions.push(session.session_date);
                const option = document.createElement('option');
                option.innerHTML = session.session_date;
                dates.appendChild(option);
            });
        });
    }

    function loadSessions() {
        fetch('http://localhost/api/restaurantSessions')
        .then((response) => response.json())
        .then((data) => {
            data.forEach((session) => {
                if (session.restaurant_id != restaurants.value) {
                    return;
                }

                if (session.session_date != dates.value) {
                    return;
                }

                const option = document.createElement('option');
                option.value = session.session_startTime;
                option.innerHTML = session.session_startTime.substring(0, 5) + ' - ' + session.session_endTime.substring(0, 5);
                sessionSelect.appendChild(option);
            });
        });
    }

    function clearSelect(selectElement) {
    while (selectElement.firstChild) {
        selectElement.removeChild(selectElement.firstChild);
    }
}
</script>

<style>
    select {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 18px;
    }
</style>