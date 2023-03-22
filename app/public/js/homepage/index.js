generateEvents();

function createEvents(events) {

    wrapper = document.getElementById('events');

    generateLayout1(events[0].small_title, events[0].title, events[0].description, wrapper);
    generateLayout2(events[1].small_title, events[1].title, events[1].description, wrapper);
    generateLayout3(events[2].small_title, events[2].title, events[2].description, wrapper);

    // console.log('before loop')
    // console.log(events[0].small_title)
    // for (let i = 0; i <= events.length; i++) {
    //     if (i = 0 || i % 3 == 0) {
    //         console.log('before generate left')
    //         generateLeft(events[i].small_title, events[i].title, events[i].description, wrapper);
    //         console.log('test1');
    //     } else {
    //         console.log('before generate right')
    //         generateRight(events[i].small_title, events[i].title, events[i].description, wrapper);
    //         console.log('test2');
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

function generateLayout1(small_title, title, description, wrapper) {

    // event section
    console.log('before create element')
    eventSection = document.createElement('div');
    eventSection.classList.add('flex', 'item-center', 'justify-center', 'mt-[50px]', 'w-full', 'h-full');

    // image
    imageContainer = document.createElement('div');
    imageContainer.classList.add('flex-none');
    img = new Image();
    // img.src = 'img/' + event.toLowerCase() + 'Img1.png';
    img.src = '/img/tourEvent.png';
    img.classList.add('w-[300px]', 'h-[350px]', 'ml-[100px]');
    // arrow & blob
    vectorContainer = document.createElement('div');
    vectorContainer.classList.add('flex-initial', 'item-center', 'justify-center',);
    arrow1 = new Image();
    arrow1.src = '/img/Arrow-1.png';
    arrow1.classList.add('w-[150px]', 'h-[150px]', 'mt-[150px]', 'ml-[30px]');
    vector1 = new Image();
    vector1.src = '/img/Vector1.png';
    vector1.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mb-[20px]');
    // text
    textContainer = document.createElement('div');
    textContainer.classList.add('flex-initial', 'w-[500px]', 'ml-[30px]', 'item-center', 'justify-center',);
    textVector = new Image();
    textVector.src = '/img/Vector2.png';
    textVector.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[10px]', 'ml-[100px]');
    small_titleHeader = document.createElement('h3');
    small_titleHeader.classList.add('font-extrabold', 'text-violet-700', 'mt-[200px]');
    small_titleHeader.innerHTML = small_title;
    titleHeader = document.createElement('h1');
    titleHeader.classList.add('font-extrabold', 'text-4xl', 'mt-[20px]');
    titleHeader.innerHTML = title;
    descriptionP = document.createElement('p');
    descriptionP.classList.add('text-left', 'text-rg', 'mt-[20px]');
    descriptionP.innerHTML = description;
    //button
    button = document.createElement('button');
    button.classList.add('bg-blue-500', 'text-white', 'drop-shadow-sm', 'font-bold', 'py-2', 'px-8', 'mt-[20px]', 'item-center', 'justify-center',);
    button.innerHTML = 'Explore now';
    // more blobs
    blobsContainer = document.createElement('div');
    blobsContainer.classList.add('flex-none', 'item-center', 'justify-center',);
    blob1 = new Image();
    blob1.src = '/img/Vector1.png';
    blob1.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[60px]', 'ml-[170px]');
    blob2 = new Image();
    blob2.src = '/img/Vector2.png';
    blob2.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[80px]', 'ml-[100px]');
    blob3 = new Image();
    blob3.src = '/img/Vector5.png';
    blob3.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[250px]', 'ml-[300px]');

    imageContainer.appendChild(img);
    vectorContainer.appendChild(arrow1);
    vectorContainer.appendChild(vector1);
    textContainer.appendChild(textVector);
    textContainer.appendChild(small_titleHeader);
    textContainer.appendChild(titleHeader);
    textContainer.appendChild(descriptionP);
    textContainer.appendChild(button);
    blobsContainer.appendChild(blob1);
    blobsContainer.appendChild(blob2);
    blobsContainer.appendChild(blob3);

    eventSection.appendChild(imageContainer);
    eventSection.appendChild(vectorContainer);
    eventSection.appendChild(textContainer);
    eventSection.appendChild(blobsContainer);

    wrapper.appendChild(eventSection);
}

function generateLayout2(small_title, title, description, wrapper) {

    // event section
    eventSection = document.createElement('div');
    eventSection.classList.add('flex', 'item-center', 'justify-center', 'mt-[50px]', 'w-full', 'h-full', 'ml-[150px]');

    // blobs
    blobsContainer = document.createElement('div');
    blobsContainer.classList.add('flex-none', 'item-center', 'justify-center',);
    blob1 = new Image();
    blob1.src = '/img/Vector2.png';
    blob1.classList.add('absolute', 'w-[100px]', 'h-[100px]');
    blob2 = new Image();
    blob2.src = '/img/Vector1.png';
    blob2.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[80px]', 'ml-[30px]');
    blob3 = new Image();
    blob3.src = '/img/Vector5.png';
    blob3.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[100px]', 'ml-[400px]');

    // text
    textContainer = document.createElement('div');
    textContainer.classList.add('flex-initial', 'item-center', 'justify-center', 'w-[500px]', 'mt-[200px]', 'ml-[200px]');
    small_titleHeader = document.createElement('h3');
    small_titleHeader.classList.add('font-extrabold', 'text-violet-700', 'mt-[20px]');
    small_titleHeader.innerHTML = small_title;
    titleHeader = document.createElement('h1');
    titleHeader.classList.add('font-extrabold', 'text-4xl', 'mt-[20px]');
    titleHeader.innerHTML = title;
    descriptionP = document.createElement('p');
    descriptionP.classList.add('text-left', 'text-rg', 'mt-[20px]');
    descriptionP.innerHTML = description;
    //button
    button = document.createElement('button');
    button.classList.add('bg-blue-500', 'text-white', 'drop-shadow-sm', 'font-bold', 'py-2', 'px-8', 'mt-[20px]', 'item-center', 'justify-center',);
    button.innerHTML = 'Explore now';
    // arrow & blob
    vectorContainer = document.createElement('div');
    vectorContainer.classList.add('flex-initial', 'ml-[30px]', 'item-center', 'justify-center',);
    arrow1 = new Image();
    arrow1.src = '/img/Arrow-2.png';
    arrow1.classList.add('w-[180px]', 'h-[180px]', 'mt-[150px]', 'mr-[30px]');
    vector1 = new Image();
    vector1.src = '/img/Vector2.png';
    vector1.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[80px]');
    // image
    imageContainer = document.createElement('div');
    imageContainer.classList.add('flex-none', 'item-center', 'justify-center',);
    img = new Image();
    // img.src = 'img/' + event.toLowerCase() + 'Img1.png';
    img.src = '/img/foodEvent.png';
    img.classList.add('w-[300px]', 'h-[350px]', 'ml-[0px]');


    blobsContainer.appendChild(blob1);
    blobsContainer.appendChild(blob2);
    blobsContainer.appendChild(blob3);

    //textContainer.appendChild(textVector);
    textContainer.appendChild(small_titleHeader);
    textContainer.appendChild(titleHeader);
    textContainer.appendChild(descriptionP);
    textContainer.appendChild(button);
    vectorContainer.appendChild(arrow1);
    vectorContainer.appendChild(vector1);
    imageContainer.appendChild(img);

    eventSection.appendChild(blobsContainer);
    eventSection.appendChild(textContainer);
    eventSection.appendChild(vectorContainer);
    eventSection.appendChild(imageContainer);

    wrapper.appendChild(eventSection);
}

function generateLayout3(small_title, title, description, wrapper) {

    // event section
    eventSection = document.createElement('div');
    eventSection.classList.add('flex', 'item-center', 'justify-center', 'mt-[50px]', 'w-full', 'h-full', 'ml-[50px]');

    // blobs
    blobsContainer = document.createElement('div');
    blobsContainer.classList.add('flex-none', 'item-center', 'justify-center',);
    blob1 = new Image();
    blob1.src = '/img/Vector5.png';
    blob1.classList.add('absolute', 'w-[100px]', 'h-[100px]');
    blob2 = new Image();
    blob2.src = '/img/Vector3.png';
    blob2.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[80px]', 'ml-[30px]');
    blob3 = new Image();
    blob3.src = '/img/Vector4.png';
    blob3.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[100px]', 'ml-[400px]');

    // text
    textContainer = document.createElement('div');
    textContainer.classList.add('flex-initial', 'w-[500px]', 'mt-[200px]', 'ml-[200px]', 'item-center', 'justify-center',);
    small_titleHeader = document.createElement('h3');
    small_titleHeader.classList.add('font-extrabold', 'text-violet-700', 'mt-[20px]');
    small_titleHeader.innerHTML = small_title;
    titleHeader = document.createElement('h1');
    titleHeader.classList.add('font-extrabold', 'text-4xl', 'mt-[20px]');
    titleHeader.innerHTML = title;
    descriptionP = document.createElement('p');
    descriptionP.classList.add('text-left', 'text-rg', 'mt-[20px]');
    descriptionP.innerHTML = description;
    //button
    button = document.createElement('button');
    button.classList.add('bg-blue-500', 'text-white', 'drop-shadow-sm', 'font-bold', 'py-2', 'px-8', 'mt-[20px]', 'item-center', 'justify-center',);
    button.innerHTML = 'Explore now';
    // arrow & blob
    vectorContainer = document.createElement('div');
    vectorContainer.classList.add('flex-initial', 'ml-[30px]', 'item-center', 'justify-center',);
    arrow1 = new Image();
    arrow1.src = '/img/Arrow-3.png';
    arrow1.classList.add('w-[180px]', 'h-[180px]', 'mt-[150px]', 'mr-[30px]');
    // vector1 = new Image();
    // vector1.src = '/img/Vector1.png';
    // vector1.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[80px]');
    // image
    imageContainer = document.createElement('div');
    imageContainer.classList.add('flex-none', 'item-center', 'justify-center',);
    img = new Image();
    // img.src = 'img/' + event.toLowerCase() + 'Img1.png';
    img.src = '/img/danceEvent.png';
    img.classList.add('w-[300px]', 'h-[350px]', 'ml-[0px]');
    danceBlob1 = new Image();
    danceBlob1.src = '/img/Vector3.png';
    danceBlob1.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[80px]', 'ml-[30px]');
    danceBlob2 = new Image();
    danceBlob2.src = '/img/Vector4.png';
    danceBlob2.classList.add('absolute', 'w-[100px]', 'h-[100px]', 'mt-[100px]', 'ml-[400px]');


    blobsContainer.appendChild(blob1);
    blobsContainer.appendChild(blob2);
    blobsContainer.appendChild(blob3);

    //textContainer.appendChild(textVector);
    textContainer.appendChild(small_titleHeader);
    textContainer.appendChild(titleHeader);
    textContainer.appendChild(descriptionP);
    textContainer.appendChild(button);
    vectorContainer.appendChild(arrow1);
    // vectorContainer.appendChild(vector1);
    imageContainer.appendChild(img);
    imageContainer.appendChild(danceBlob1);
    imageContainer.appendChild(danceBlob2);


    eventSection.appendChild(blobsContainer);
    eventSection.appendChild(textContainer);
    eventSection.appendChild(vectorContainer);
    eventSection.appendChild(imageContainer);

    wrapper.appendChild(eventSection);


}


