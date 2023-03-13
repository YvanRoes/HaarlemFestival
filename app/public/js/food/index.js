function generate1(restaurantName, stars, tags) {
  Restaurants = document.getElementById('restaurants');

  //restaurant section
  section = document.createElement('div');
  section.classList.add('pb-[50px]');

  header = generateHeader(restaurantName, stars, tags);

  grid = generateGrid1(restaurantName);

  section.appendChild(header);
  section.appendChild(grid);

  Restaurants.appendChild(section);
}

function generateHeader(restaurantName, stars, tags) {
  wrapper = document.createElement('div');

  header = document.createElement('div');
  header.classList.add('flex');
  title = document.createElement('h1');
  title.classList.add('text-3xl', 'font-bold', 'pl-[15px]');
  title.innerHTML = restaurantName;

  starsImage = new Image();
  starsImage.src = '/img/michelinIcon.png';
  starsImage.classList.add('w-[24px]', 'h-[26px]', 'mt-[5px]', 'ml-[5px]');

  //sub header
  subHeader = document.createElement('div');
  subHeader.classList.add(
    'flex',
    'justify-items-start',
    'pl-[15px]',
    'pb-[10px]'
  );

  subHeaderImage = new Image();
  subHeaderImage.src = '/img/4.7Rating.png';

  subParagraphStars = document.createElement('p');
  subParagraphStars.classList.add('text-[20px]', 'font-medium', 'pl-[10px]');
  subParagraphStars.innerHTML = stars;

  subParagraphTags = document.createElement('p');
  subParagraphTags.classList.add(
    'text-[20px]',
    'text-[#FC5B84]',
    'font-medium',
    'pl-[15px]'
  );
  subParagraphTags.innerHTML = tags;

  header.appendChild(title);
  header.appendChild(starsImage);

  subHeader.appendChild(subHeaderImage);
  subHeader.appendChild(subParagraphStars);
  subHeader.appendChild(subParagraphTags);

  wrapper.appendChild(header);
  wrapper.appendChild(subHeader);
  return wrapper;
}

function generate2(restaurantName, stars, tags) {
  Restaurants = document.getElementById('restaurants');

  //restaurant section
  section = document.createElement('div');
  section.classList.add('pb-[50px]');

  header = document.createElement('div');
  header.classList.add('flex');
  title = document.createElement('h1');
  title.classList.add('text-3xl', 'font-bold', 'pl-[15px]');
  title.innerHTML = restaurantName;

  starsImage = new Image();
  starsImage.src = '/img/michelinIcon.png';
  starsImage.classList.add('w-[24px]', 'h-[26px]', 'mt-[5px]', 'ml-[5px]');

  //sub header
  subHeader = document.createElement('div');
  subHeader.classList.add(
    'flex',
    'justify-items-start',
    'pl-[15px]',
    'pb-[10px]'
  );

  subHeaderImage = new Image();
  subHeaderImage.src = '/img/4.7Rating.png';

  subParagraphStars = document.createElement('p');
  subParagraphStars.classList.add('text-[20px]', 'font-medium', 'pl-[10px]');
  subParagraphStars.innerHTML = stars;

  subParagraphTags = document.createElement('p');
  subParagraphTags.classList.add(
    'text-[20px]',
    'text-[#FC5B84]',
    'font-medium',
    'pl-[15px]'
  );
  subParagraphTags.innerHTML = tags;

  grid = generateGrid2(restaurantName);

  header.appendChild(title);
  header.appendChild(starsImage);

  subHeader.appendChild(subHeaderImage);
  subHeader.appendChild(subParagraphStars);
  subHeader.appendChild(subParagraphTags);

  section.appendChild(header);
  section.appendChild(subHeader);
  section.appendChild(grid);

  Restaurants.appendChild(section);
}

function generateGrid1(restaurantName) {
  restaurantName = restaurantName.replace(/\s/g, '');
  grid = document.createElement('div');
  grid.classList.add(
    'grid-cols-[500px_minmax(500px,_1fr)_500px]',
    'grid',
    'justify-items-start',
    'gap-[50px]'
  );

  //images
  img1 = new Image();
  img2 = new Image();
  img3 = new Image();
  img1.src = 'img/' + restaurantName.toLowerCase() + 'Img1.png';
  img2.src = 'img/' + restaurantName.toLowerCase() + 'Img2.png';
  img3.src = 'img/' + restaurantName.toLowerCase() + 'Img3.png';

  img2n3Wrapper = document.createElement('div');
  img2n3Wrapper.classList.add('flex', 'flex-col', 'gap-[50px]');
  img2n3Wrapper.appendChild(img2);
  img2n3Wrapper.appendChild(img3);

  img1.classList.add('w-[500px]', 'h-[650px]');
  img2.classList.add('w-[500px]', 'h-[325px]');
  img3.classList.add('w-[500px]', 'h-[275px]');

  grid.appendChild(img1);
  grid.appendChild(img2n3Wrapper);

  return grid;
}

function generateGrid2(restaurantName) {
  restaurantName = restaurantName.replace(/\s/g, '');
  grid = document.createElement('div');

  //images
  img1 = new Image();
  img2 = new Image();
  img3 = new Image();
  img1.src = 'img/' + restaurantName.toLowerCase() + 'Img1.png';
  img2.src = 'img/' + restaurantName.toLowerCase() + 'Img2.png';
  img3.src = 'img/' + restaurantName.toLowerCase() + 'Img3.png';

  img1n2Wrapper = document.createElement('div');
  img1n2Wrapper.classList.add('flex', 'flex-row', 'mb-[50px]');
  img1n2Wrapper.appendChild(img1);
  img1n2Wrapper.appendChild(img2);

  img1.classList.add('w-[500px]', 'h-[275px]', 'mr-[50px]');
  img2.classList.add('w-[500px]', 'h-[275px]');
  img3.classList.add('w-[1050px]', 'h-[325px]');

  grid.appendChild(img1n2Wrapper);
  grid.appendChild(img3);

  return grid;
}
generate1('Ratatouille', 4.7, 'French, Seafood, European');
generate2('Mr&mrs', 4.7, 'Dutch, Seafood, European');
generate1('Specktakel', 4.5, 'European, International, Asian');
generate2('Toujours', 4.4, 'Dutch, Seafood, European');
generate1('ML', 4.1, 'Dutch, Seafood, European');
generate2('Grand Cafe Brinkmann', 4.1, 'Dutch, Seafood, European');
generate1('Fris', 4.1, 'Dutch, French, European');
