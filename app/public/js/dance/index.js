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

    header = generateHeader();
    container.appendChild(header);
    generateArtistSection(container);
    wrapper.appendChild(container);
}

function generateHeader() {
    header = document.createElement('div');
    header.classList.add(
        'grid',
        'grid-cols-2',
        'grid-rows-1',
        'h-[600px]'
    );

    headerTextContainer = document.createElement('div');
    headerTextContainer.classList.add(
        'flex',
        'flex-col',
        'justify-center',
        'text-[#F7F7FB]',
        'font-[\'Lato\']'
    );

    headerTitle = document.createElement('h1');
    headerTitle.classList.add('text-[64px]');
    headerTitle.innerHTML = 'Let\'s Dance';

    headerParagraph = document.createElement('p');
    headerParagraph.classList.add('text-[20px]', 'w-[80%]');
    headerParagraph.innerHTML = 'Dance for us is not just an activity, it’s a way of life. Come dance the best Dutch produced music out there right here, right now!';

    headerButton = document.createElement('button');
    headerButton.classList.add(
        'w-max',
        'h-[40px]',
        'mt-[15px]',
        'text-[#F7F7FB]',
        'flex',
        'items-center',
        'gap-[10px]',
        'border-2',
        'border-[#F7F7FB]',
        'px-4',
        'py-5',
        'transition',
        'ease-in-out',
        'cursor-pointer'
    );
    headerButton.innerHTML = 'Tickets';

    headerImageContainer = document.createElement('div');
    headerImageContainer.classList.add('flex', 'items-center', 'justify-center');

    headerImage = new Image();
    headerImage.src = '/img/danceImg1.png';
    headerImage.classList.add('w-[500px]', 'h-[500px]');

    headerImageContainer.appendChild(headerImage);

    headerTextContainer.appendChild(headerTitle);
    headerTextContainer.appendChild(headerParagraph);
    headerTextContainer.appendChild(headerButton);

    header.appendChild(headerTextContainer);
    header.appendChild(headerImageContainer);

    return header;
}

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
};

function generateArtist(i, mt, artistGrid){
    artist = document.createElement('div');
    artist.classList.add('flex', 'flex-col', 'justify-center', 'items-center' , 'mt-['+ mt +'px]');

    image = new Image();
    image.src = '/img/artist'+ i +'.png';
    image.classList.add('w-[300px]');
    artist.appendChild(image);

    artistGrid.appendChild(artist);
}

async function generateArtists(artistGrid) {
    artists = await getDataFromArtistAPI();

    for (let i = 0; i < artists.length; i++) {
        generateArtist(++i, i*100, artistGrid);
    }
}

async function getDataFromArtistAPI() {
    const response = await fetch('http://localhost/api/artists');
    return await response.json();
}

generateDancePage();