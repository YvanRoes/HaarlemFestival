generateEvents();

function createEvents(events) {
    wrapper = document.getElementById('events');

    generateLeft(events[0].title, events[0].description, wrapper);

    // for (let i = 1; i < events.length; i++) {
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
    section = document.createElement('div');
    section.classList.add('flex', 'flex-col', 'w-full', 'h-full');
    // image
    img = new Image();
    img.src = 'img/' + event.toLowerCase() + 'Img1.png';
    // title
    title = document.createElement('h1');
    title.classList.add('text-4xl', 'font-bold', 'text-center', 'mb-4');
    title.innerHTML = title;
    // description
    description = document.createElement('p');
    description.classList.add('text-center', 'mb-4');
    description.innerHTML = description;

    section.appendChild(img);
    section.appendChild(title);
    section.appendChild(description);

    wrapper.appendChild(section);

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
    img.src = 'img/' + event.toLowerCase() + 'Img1.png';

    section.appendChild(title);
    section.appendChild(description);
    section.appendChild(img);

    wrapper.appendChild(section);
}



