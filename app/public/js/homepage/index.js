generateEvents();

function createEvents(events) {
    wrapper = document.getElementById('events');

    generateLeft(events[0].title, events[0].description, wrapper);

    // for (let i = 0; i < events.length; i++) {
    //     if (i = 0 || i % 3 == 0) {
    //         generateLeft(events[i].title, events[i].description, wrapper);
    //     } else {
    //         generateRight(events[i].title, events[i].description, wrapper);
    //     }
    // }
}

async function getEvents() {
    const response = await fetch('http://localhost/api/events');
    const data = await response.json();

    return data;
}

async function generateEvents() {
    events = await getEvents();
    createEvents(events);
}

function generateLeft(title, description, wrapper) {

    // event section
    eventSection = document.createElement('div');
    eventSection.classList.add('flex', 'item-center', 'center');

    imageContainer = document.createElement('div');
    imageContainer.classList.add('flex-none');
    // image
    img = new Image();
    // img.src = 'img/' + event.toLowerCase() + 'Img1.png';
    img.src = '/img/tourEvent.png';
    img.classList.add('w-[300px]', 'h-[350px]', 'ml-[100px]');
    // title
    vectorContainer = document.createElement('div');
    vectorContainer.classList.add('flex-initial');

    arrow1 = new Image();
    arrow1.src = '/img/Arrow-1.png';
    arrow1.classList.add('w-[150px]', 'h-[150px]', 'mt-[150px]', 'ml-[30px]');
    vector1 = new Image();
    vector1.src = '/img/Vector1.png';
    vector1.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mb-[20px]');

    vectorContainer.appendChild(arrow1);
    vectorContainer.appendChild(vector1);

    imageContainer.appendChild(img);
    eventSection.appendChild(imageContainer);
    eventSection.appendChild(vectorContainer);

    // title = document.createElement('h1');
    // title.classList.add('text-4xl', 'font-bold', 'text-center', 'mb-4');
    // title.innerHTML = title;
    // // description
    // description = document.createElement('p');
    // description.classList.add('text-center', 'mb-4');
    // description.innerHTML = description;

    // imageContainer.appendChild(img);
    // eventSection.appendChild(imageContainer);
    // // section.appendChild(title);
    // // section.appendChild(description);
    wrapper.appendChild(eventSection);
}

function generateRight(event, title, description, wrapper) {

    events = document.getElementById('events');

    // event section
    section = document.createElement('div');
    section.classList.add('flex', 'flex-col', 'w-full', 'h-full');

    // title
    title = document.createElement('h1');
    title.classList.add('text-4xl', 'font-bold', 'text-center', 'mb-4');
    title.innerHTML = title;
    // description
    description = document.createElement('p');
    description.classList.add('text-center', 'mb-4');
    description.innerHTML = description;
    // image
    img = new Image();
    // img.src = 'img/' + event.toLowerCase() + 'Img1.png';
    img.src = 'tourEvent.png';

    section.appendChild(title);
    section.appendChild(description);
    section.appendChild(img);

    wrapper.appendChild(section);
}



