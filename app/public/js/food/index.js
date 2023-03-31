function generate1(id, restaurantName, stars, michelinStar, tags, imagePath) {
  Restaurants = document.getElementById('restaurants');

  //restaurant section
  section = document.createElement('div');
  section.classList.add('pb-[50px]');

  header = generateHeader(id, restaurantName, stars, michelinStar, tags, imagePath);

  grid = generateGrid1(id, restaurantName, imagePath);

  section.appendChild(header);
  section.appendChild(grid);

  Restaurants.appendChild(section);
}

function generate2(id, restaurantName, stars, michelinStar, tags, imagePath) {
  Restaurants = document.getElementById('restaurants');

  //restaurant section
  section = document.createElement('div');
  section.classList.add('pb-[50px]');

  header = generateHeader(id, restaurantName, stars, michelinStar, tags, imagePath);

  grid = generateGrid2(id, restaurantName, imagePath);

  section.appendChild(header);
  section.appendChild(grid);

  Restaurants.appendChild(section);
}

function generateHeader(id, restaurantName, stars, michelinStar, tags, imagePath) {
  imagePaths = imagePath.split(':');

  wrapper = document.createElement('div');

  header = document.createElement('div');
  header.classList.add('flex');
  title = document.createElement('h1');
  title.classList.add('text-3xl', 'font-bold', 'pl-[15px]');
  title.innerHTML = restaurantName;

  link = document.createElement('a');
  link.href = '/food/detailPage?id=' + id;


  if (michelinStar == 1) {
    starsImage = new Image();
    starsImage.src = '/img/michelinIcon.png';
    starsImage.alt = 'Restaurant Rating ';
    starsImage.classList.add('w-[24px]', 'h-[26px]', 'mt-[5px]', 'ml-[5px]');

    header.appendChild(title);
    header.appendChild(starsImage);
  }
  else{
    header.appendChild(title);
  }

  //sub header
  subHeader = document.createElement('div');
  subHeader.classList.add(
    'flex',
    'justify-items-start',
    'pl-[15px]',
    'pb-[10px]'
  );

  subHeaderImage = new Image();
  subHeaderImage.src = imagePaths[0];


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

  subHeader.appendChild(subHeaderImage);
  subHeader.appendChild(subParagraphStars);
  subHeader.appendChild(subParagraphTags);

  link.appendChild(header);
  link.appendChild(subHeader);
  wrapper.appendChild(link);

  return wrapper;
}

function generateGrid1(id, restaurantName, imagePath) {
  imagePaths = imagePath.split(':');
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

  img1.src = imagePaths[1];
  img2.src = imagePaths[2];
  img3.src = imagePaths[3];

  link1 = document.createElement('a');
  link2 = document.createElement('a');
  link3 = document.createElement('a');

  link1.href = '/food/detailPage?id=' + id;
  link2.href = '/food/detailPage?id=' + id;
  link3.href = '/food/detailPage?id=' + id;

  link1.appendChild(img1);
  link2.appendChild(img2);
  link3.appendChild(img3);

  img2n3Wrapper = document.createElement('div');
  img2n3Wrapper.classList.add('flex', 'flex-col', 'gap-[50px]');
  img2n3Wrapper.appendChild(link2);
  img2n3Wrapper.appendChild(link3);

  img1.classList.add('w-[500px]', 'h-[650px]');
  img2.classList.add('w-[500px]', 'h-[325px]');
  img3.classList.add('w-[500px]', 'h-[275px]');

  grid.appendChild(link1);
  grid.appendChild(img2n3Wrapper);

  return grid;
}

function generateGrid2(id, restaurantName, imagePath) {
  imagePaths = imagePath.split(':');
  restaurantName = restaurantName.replace(/\s/g, '');
  grid = document.createElement('div');

  //images
  img1 = new Image();
  img2 = new Image();
  img3 = new Image();

  img1.src = imagePaths[1];
  img2.src = imagePaths[2];
  img3.src = imagePaths[3];

  link1 = document.createElement('a');
  link2 = document.createElement('a');
  link3 = document.createElement('a');

  link1.href = '/food/detailPage?id=' + id;
  link2.href = '/food/detailPage?id=' + id;
  link3.href = '/food/detailPage?id=' + id;
  
  link1.appendChild(img1);
  link2.appendChild(img2);
  link3.appendChild(img3);

  img1n2Wrapper = document.createElement('div');
  img1n2Wrapper.classList.add('flex', 'flex-row', 'mb-[50px]');
  img1n2Wrapper.appendChild(link1);
  img1n2Wrapper.appendChild(link2);

  img1.classList.add('w-[500px]', 'h-[275px]', 'mr-[50px]');
  img2.classList.add('w-[500px]', 'h-[275px]');
  img3.classList.add('w-[1050px]', 'h-[325px]');

  grid.appendChild(img1n2Wrapper);
  grid.appendChild(link3);

  return grid;
}
// generate1('Ratatouille', 4.7, 'French, Seafood, European');
// generate2('Mr&mrs', 4.7, 'Dutch, Seafood, European');
// generate1('Specktakel', 4.5, 'European, International, Asian');
// generate2('Toujours', 4.4, 'Dutch, Seafood, European');
// generate1('ML', 4.1, 'Dutch, Seafood, European');
// generate2('Grand Cafe Brinkmann', 4.1, 'Dutch, Seafood, European');
// generate1('Fris', 4.1, 'Dutch, French, European');

async function generateContent() {
  restaurants = await getDataFromRestaurantAPI();
  createRestaurants(restaurants);
}

async function getDataFromRestaurantAPI() {
  const response = await fetch('http://localhost/api/restaurants');
  return await response.json();
}

function createRestaurants(objects) {
  parentElement = document.getElementById('restaurants');
  parentElement.innerHTML = '';
  for (let i = 0; i < objects.length; i++) {
    if (i % 2 == 0) {
      generate1(objects[i].id, objects[i].name, objects[i].star, objects[i].michelinStar, objects[i].category, objects[i].imagePath);
    } else {
      generate2(objects[i].id, objects[i].name, objects[i].star, objects[i].michelinStar, objects[i].category, objects[i].imagePath);
    }
  }
}

generateContent();
