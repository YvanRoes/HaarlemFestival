function generateTourOverviewPage(){
    wrapper = document.getElementById('content-wrapper');
    wrapper.classList.add('mt-[100px]', 'grid', 'grid-cols-3');

    generateTourLocations(wrapper);
}

function generateTourLocation(location, wrapper){
    tourLocation = document.createElement('div');
    tourLocation.classList.add('col-span-2', 'mt-[50px]');

    titleContainer = document.createElement('div');
    titleContainer.classList.add('flex', 'col', 'gap-[10px]');

    image = new Image();
    image.src = "/img/locationPinIcon.png";
    image.classList.add('w-[40px]', 'h-[40px]');

    locationTitle = document.createElement('h2');
    locationTitle.classList.add('text-[24px]', 'font-[\'Lato\']', 'font-bold');
    locationTitle.innerHTML = location.name + ", " + location.address;

    titleContainer.appendChild(image);
    titleContainer.appendChild(locationTitle);

    locationParagraph = document.createElement('p');
    locationParagraph.classList.add('text-xl', 'font-[\'Lato\']', 'w-[700px]', 'mt-[20px]');
    locationParagraph.innerHTML = location.description;

    button = document.createElement('button');
    button.classList.add(
        'bg-[#42BFDD]',
        'text-white',
        'text-[20px]',
        'font-bold',
        'py-[10px]',
        'px-[20px]',
        'mt-[20px]',
        'rounded-[10px]'
    );
    button.innerHTML = 'Read More';
    button.onclick = function () { window.location.href = "/tour/detailPage?id=" + location.id };

    
    tourLocation.appendChild(titleContainer);
    tourLocation.appendChild(locationParagraph);    
    tourLocation.appendChild(button);

    image = new Image();
    imagePaths = location.imagePath.split(':');
    image.src = imagePaths[0];
    image.classList.add('w-[500px]', 'mb-[100px]', 'mt-[50px]');

    link = document.createElement('a');
    link.href = "/tour/detailPage?id=" + location.id;
    link.appendChild(image);

    wrapper.appendChild(tourLocation);
    wrapper.appendChild(link);
}

async function getDataFromArtistAPI() {
    const response = await fetch('http://localhost/api/tourLocations');
    return await response.json();
}

async function generateTourLocations(wrapper) {
    tourLocations = await getDataFromArtistAPI();
    for (let i = 0; i <= tourLocations.length; i++) {
        generateTourLocation(tourLocations[i], wrapper);
    }
}

generateTourOverviewPage();