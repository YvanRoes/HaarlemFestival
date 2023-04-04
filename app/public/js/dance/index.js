function generateDancePage() {
    wrapper = document.getElementById('content-wrapper');
    wrapper.classList.add('flex', 'justify-center', 'w-[100%]');

    container = document.createElement('div');
    container.classList.add(
        'pb-[2.5rem]',
        'mt-[100px]',
        'mb-[150px]',
        'lg:w-[1280px]',
        'md:w-[100vw]',
        'sm:w-[100vw]'
    );
    
    generateArtistSection(container);
    generatePlanningSection(container);
    generateLocationSection(container);
    wrapper.appendChild(container);
}

//generate the artist section of the page

function generateArtistSection(container) {
    sectionTitleContainer = document.createElement('div');
    sectionTitleContainer.classList.add('flex', 'justify-center', 'mt-[100px]');
    sectionTitle = document.createElement('h1');
    sectionTitle.classList.add('text-[64px]', 'text-[#F7F7FB]', 'font-[\'Lato\']');
    sectionTitle.innerHTML = 'The Artists';

    artistGrid = document.createElement('div');
    artistGrid.classList.add('grid', 'grid-cols-3', 'grid-rows-2');

    generateArtists(artistGrid);

    sectionTitleContainer.appendChild(sectionTitle);

    container.appendChild(sectionTitleContainer);
    container.appendChild(artistGrid);
}

//generate the artist cards
function generateArtist(artist, mt, artistGrid) {
    artistContainer = document.createElement('div');
    artistContainer.classList.add('flex', 'flex-col', 'justify-center', 'items-center', 'mt-[' + mt + 'px]');

    image = new Image();
    image.src = artist.imagePath;
    image.classList.add('w-[300px]');

    artistName = document.createElement('h2');
    artistName.classList.add('text-[24px]', 'text-[#F7F7FB]', 'font-[\'Lato\']', 'font-bold', 'mb-[20px]');
    artistName.innerHTML = artist.name;

    link = document.createElement('a');
    link.href = '/dance/detailPage?id=' + artist.id;

    link.appendChild(image);
     
    artistContainer.appendChild(artistName);
    artistContainer.appendChild(link);
    artistGrid.appendChild(artistContainer);
}

//get the data from the api and generate the artist cards
async function generateArtists(artistGrid) {
    artists = await getDataFromArtistAPI();

    for (let i = 1; i <= artists.length; i++) {
        if (i <= artists.length / 2) {
            margin = i * 100;
        }
        else {
            margin = (i * 100) - ((artists.length/2) * 120);
        }
        generateArtist(artists[i-1], margin, artistGrid);
    }
}

//get the data from the api
async function getDataFromArtistAPI() {
    const response = await fetch('http://localhost/api/artists');
    return await response.json();
}

//generate the planning section of the page
function generatePlanningSection(container) {
    sectionTitleContainer = document.createElement('div');
    sectionTitleContainer.classList.add('flex', 'justify-center', 'mt-[100px]');
    sectionTitle = document.createElement('h1');
    sectionTitle.classList.add('text-[64px]', 'text-[#F7F7FB]', 'font-[\'Lato\']');
    sectionTitle.innerHTML = 'The Planning';

    planningGrid = document.createElement('div');
    planningGrid.classList.add(
        'grid',
        'grid-cols-6',
        'mt-[50px]',
        'text-[24px]',
        'text-[#F7F7FB]',
        'font-[\'Lato\']'
    );

    generatePlanningItem(1, 'Date', planningGrid);
    generatePlanningItem(1, 'Location', planningGrid);
    generatePlanningItem(2, 'Artist', planningGrid);
    generatePlanningItem(1, 'Tickets', planningGrid);
    generatePlanningItem(1, 'Price', planningGrid);


    generatePlanningItems(planningGrid);


    planningParagraph = document.createElement('p');
    planningParagraph.classList.add('text-[#656262]', 'mt-[10px]');
    planningParagraph.innerHTML = '* The capacity of the Club sessions is very limited. Availability for All-Access pas holders can not be garanteed due to safety regulations. Tickets available represents total capacity. (90% is sold as single tickets. 10% of total capacity is left for Walk ins/All-Acces passholders.)';
   
    buttonContainer = document.createElement('div');
    buttonContainer.classList.add('flex', 'justify-center');
    button = document.createElement('button');
    button.classList.add(
        'mt-[100px]',
        'w-[200px]',
        'h-[50px]',
        'text-white',
        'outline',
        'outline-3',
        'white'
    );
    button.innerHTML = 'Buy Tickets';

    sectionTitleContainer.appendChild(sectionTitle);
    container.appendChild(sectionTitleContainer);

    container.appendChild(planningGrid);
    container.appendChild(planningParagraph);

    buttonContainer.appendChild(button);
    container.appendChild(buttonContainer);
}

function generatePlanningItem(span, content, planningGrid) {
    planningItem = document.createElement('h2');
    planningItem.classList.add('col-span-'+span,'outline', 'outline-1', 'outline-white', 'p-[10px]');

    planningItem.innerHTML = content;

    planningGrid.appendChild(planningItem);
}

async function generatePlanningItems(planningGrid) {
    sessions = await getDataFromSessionAPI();
    artists = await getDataFromArtistAPI();
    locations = await getDataFromLocationAPI();

    for (let i = 0; i <= sessions.length; i++) {
        const formatter = new Intl.DateTimeFormat('en-US', { weekday: 'short', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' });
        const formattedDateTime = formatter.format(new Date(sessions[i].date));

        locationID = sessions[i].venue;
        artistID = sessions[i].artist_id;

        console.log(locationID);

        generatePlanningItem(1, formattedDateTime, planningGrid);
        generatePlanningItem(1, locations[locationID].name, planningGrid);
        generatePlanningItem(2, sessions[i].artist_id, planningGrid);
        generatePlanningItem(1, sessions[i].ticketsAmount, planningGrid);
        generatePlanningItem(1, "€" + sessions[i].price, planningGrid);
    }
}

//get the data from the api
async function getDataFromSessionAPI() {
    const response = await fetch('http://localhost/api/danceSessions');
    return await response.json();
}

function generateLocationSection(container) {
    sectionTitleContainer = document.createElement('div');
    sectionTitleContainer.classList.add('flex', 'justify-center', 'mt-[100px]', 'mb-[50px]');
    sectionTitle = document.createElement('h1');
    sectionTitle.classList.add('text-[64px]', 'text-[#F7F7FB]', 'font-[\'Lato\']');
    sectionTitle.innerHTML = 'Locations';

    locationGrid = document.createElement('div');
    locationGrid.classList.add('grid', 'grid-cols-2', 'gap-x-[20px]', 'gap-y-[20px]');

    generateLocations(locationGrid);

    sectionTitleContainer.appendChild(sectionTitle);

    container.appendChild(sectionTitleContainer);
    container.appendChild(locationGrid);
}

function generateLocation(locationGrid, location) {
    locationContainer = document.createElement('div');
    locationContainer.classList.add('grid', 'grid-cols-2', 'grid-rows-2', 'outline', 'outline-1', 'outline-white');

    locationName = document.createElement('h2');
    locationName.classList.add('text-[24px]', 'text-[#F7F7FB]', 'font-[\'Lato\']', 'mt-[20px]', 'ml-[10px]');
    locationName.innerHTML = location.name;

    image = new Image();
    image.src = location.imagePath;
    image.classList.add('grid', 'justify-self-end', 'row-span-2', 'w-[253px]', 'h-[161px]');

    locationAddress = document.createElement('h2');
    locationAddress.classList.add('text-[20px]', 'text-[#F7F7FB]', 'font-[\'Lato\']', 'ml-[10px]');
    locationAddress.innerHTML = location.address;

    locationContainer.appendChild(locationName);
    locationContainer.appendChild(image);
    locationContainer.appendChild(locationAddress);

    locationGrid.appendChild(locationContainer);
}

async function generateLocations(locationGrid) {
    locations = await getDataFromLocationAPI();

    for (let i = 0; i < locations.length; i++) {
        generateLocation(locationGrid, locations[i]);
    }
}

//get the data from the api
async function getDataFromLocationAPI() {
    const response = await fetch('http://localhost/api/danceLocations');
    return await response.json();
}

generateDancePage();