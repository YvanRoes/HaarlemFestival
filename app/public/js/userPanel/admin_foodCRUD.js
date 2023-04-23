//YUMMIE FUNCTIONALITY --START ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function loadYummieData(type) {
  yummiePane = document.getElementById('yummiePane');
  yummiePane.classList.remove('hidden');

  userPane = document.getElementById('UserPane');
  edmPane = document.getElementById('edmPane');
  if (!userPane.classList.contains('hidden')) {
    userPane.classList.add('hidden');
  }
  if (!edmPane.classList.contains('hidden')) {
    edmPane.classList.add('hidden');
  }

  switch (type) {
    case 'restaurants':
      loadRestaurants();
      break;
    case 'restaurantSessions':
      loadRestaurantSessions();
    default:
      break;
  }
}
function loadRestaurants() {
  restaurantPane = document.getElementById('restaurantSubPane');
  restaurantPane.classList.remove('hidden');

  sessionsPane = document.getElementById('restaurantSessionSubPane');
  if (!sessionsPane.classList.contains('hidden')) {
    sessionsPane.classList.add('hidden');
  }

  objects = getData('/restaurants');
  createRestaurantList(objects);
}
function createRestaurantList(objects) {
  parentElement = document.getElementById('contentRestaurantWrapper');
  title = document.getElementById('YummieTitle');
  title.innerHTML = 'Restaurants';
  parentElement.innerHTML = '';

  objects.then((objects) => {
    for (let i = 0; i < objects.length; i++) {
      createRestaurantContainer(
        parentElement,
        objects[i].id,
        objects[i].name,
        objects[i].category,
        objects[i].star,
        objects[i].michelinStar,
        objects[i].description,
        objects[i].address,
        objects[i].phone_number,
        objects[i].capacity
      );
    }
  });
}
function createRestaurantContainer(
  element,
  id,
  name,
  category,
  star,
  michelinStar,
  description,
  address,
  phoneNumber,
  capacity
) {
  container = document.createElement('span');
  container.classList.add(
    'bg-white',
    'p-2',
    'rounded-md',
    'grid',
    'lg:grid-cols-6',
    'lg:grid-rows-3',
    'md:grid-cols-1',
    'text-left',
    'relative',
    'gap-4',
    'text-center'
  );

  idSpan = document.createElement('span');
  idSpan.innerHTML = id;
  idSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  idSpan.setAttribute('id', 'rIdSpan' + id);

  nameSpan = document.createElement('span');
  nameSpan.innerHTML = name;
  nameSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  nameSpan.setAttribute('id', 'rNameSpan' + id);

  categorySpan = document.createElement('span');
  categorySpan.innerHTML = category;
  categorySpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  categorySpan.setAttribute('id', 'rCategorySpan' + id);

  starSpan = document.createElement('span');
  starSpan.innerHTML = star;
  starSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  starSpan.setAttribute('id', 'rStarSpan' + id);

  michelinStarSpan = document.createElement('span');
  michelinStarSpan.innerHTML = michelinStar;
  michelinStarSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  michelinStarSpan.setAttribute('id', 'rMichelinStarSpan' + id);

  descriptionSpan = document.createElement('textarea');
  descriptionSpan.innerHTML = description;
  descriptionSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex',
    'col-span-4'
  );
  descriptionSpan.setAttribute('id', 'rDescriptionSpan' + id);
  descriptionSpan.setAttribute('disabled', 'true');

  addressSpan = document.createElement('span');
  addressSpan.innerHTML = address;
  addressSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  addressSpan.setAttribute('id', 'rAddressSpan' + id);

  phoneNumberSpan = document.createElement('span');
  phoneNumberSpan.innerHTML = phoneNumber;
  phoneNumberSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  phoneNumberSpan.setAttribute('id', 'rPhoneNumberSpan' + id);

  capacitySpan = document.createElement('span');
  capacitySpan.innerHTML = capacity;
  capacitySpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  capacitySpan.setAttribute('id', 'rCapacitySpan' + id);

  buttonRemove = document.createElement('button');
  buttonRemove.innerHTML = 'REMOVE';
  buttonRemove.classList.add(
    'm-2',
    'py-2',
    'px-4',
    'rounded-md',
    'text-[#F7F7FB]',
    'bg-red-500',
    'w-fit',
    'h-fit',
    'h-[50px]'
  );
  buttonRemove.addEventListener('click', () => {
    removeRestaurant(id);
  });

  buttonEdit = document.createElement('button');
  buttonEdit.innerHTML = 'EDIT';
  buttonEdit.classList.add(
    'm-2',
    'py-2',
    'px-8',
    'rounded-md',
    'text-[#F7F7FB]',
    'bg-slate-800',
    'w-fit',
    'float-right',
    'justify-center',
    'h-[50px]'
  );

  buttonEdit.setAttribute('id', 'restaurantB' + id);
  buttonEdit.addEventListener('click', () => {
    rDescriptionSpan = document.getElementById('rDescriptionSpan' + id);
    rDescriptionSpan.removeAttribute('disabled');
    editRestaurant(id);
  });

  container.appendChild(idSpan);
  container.appendChild(nameSpan);
  container.appendChild(categorySpan);
  container.appendChild(starSpan);
  container.appendChild(michelinStarSpan);
  container.appendChild(addressSpan);
  container.appendChild(phoneNumberSpan);
  container.appendChild(capacitySpan);
  container.appendChild(descriptionSpan);
  container.appendChild(buttonRemove);
  container.appendChild(buttonEdit);
  element.appendChild(container);
}
function editRestaurant(id) {
  rNameSpan = document.getElementById('rNameSpan' + id);
  rCategorySpan = document.getElementById('rCategorySpan' + id);
  rStarSpan = document.getElementById('rStarSpan' + id);
  rMichelinStarSpan = document.getElementById('rMichelinStarSpan' + id);
  rDescriptionSpan = document.getElementById('rDescriptionSpan' + id);
  rAddressSpan = document.getElementById('rAddressSpan' + id);
  rPhonenumberSpan = document.getElementById('rPhoneNumberSpan' + id);
  rCapacitySpan = document.getElementById('rCapacitySpan' + id);

  b = document.getElementById('restaurantB' + id);

  if (b.innerHTML == 'EDIT') {
    setEditableType(rNameSpan);
    setEditableType(rCategorySpan);
    setEditableType(rStarSpan);
    setEditableType(rMichelinStarSpan);
    setEditableType(rDescriptionSpan);
    setEditableType(rAddressSpan);
    setEditableType(rPhonenumberSpan);
    setEditableType(rCapacitySpan);
    b.innerHTML = 'Save';
    b.classList.add('bg-green-400', 'text-[#121212]');
    return;
  }
  b.innerHTML = 'EDIT';
  b.classList.remove('bg-green-400', 'text-[#121212]');
  setEditableType(rNameSpan);
  setEditableType(rCategorySpan);
  setEditableType(rStarSpan);
  setEditableType(rMichelinStarSpan);
  setEditableType(rDescriptionSpan);
  setEditableType(rAddressSpan);
  setEditableType(rPhonenumberSpan);
  setEditableType(rCapacitySpan);

  //check for NaN
  // if (isNaN(rCapacitySpan.value)) {
  //   alert('capacity is not a number');
  //   return;
  // }
  // if (isNaN(rStarSpan.value) || rStarSpan.value > 5 || rStarSpan.value < 0) {
  //   alert('star is not a number');
  //   return;
  // }
  const data = new FormData();
  data.append('post_type', 'edit');
  data.append('id', id);
  data.append('restaurant_name', rNameSpan.innerHTML);
  data.append('restaurant_category', rCategorySpan.innerHTML);
  data.append('restaurant_star', rStarSpan.innerHTML);
  data.append(
    'restaurant_michelinStar',
    rMichelinStarSpan.innerHTML == 'true' ? '1' : '0'
  );
  data.append('restaurant_description', rDescriptionSpan.value);
  data.append('restaurant_address', rAddressSpan.innerHTML);
  data.append('restaurant_phoneNumber', rPhonenumberSpan.innerHTML);
  data.append('restaurant_capacity', rCapacitySpan.innerHTML);

  console.log(data);

  postForm('http://localhost/api/restaurants', data).then(
    delay(1000).then(() => loadRestaurants())
  );
}
function removeRestaurant(id) {
  data = {
    post_type: 'delete',
    id: id,
  };

  if (confirm('are you sure you want to delete this restaurant?')) {
    postData('http://localhost/api/restaurants', data);
    delay(1000).then(loadRestaurants());
  }
}
function insertRestaurant() {
  rName = document.getElementById('restaurantName');
  rCategory = document.getElementById('restaurantCategory');
  rStars = document.getElementById('restaurantStar');
  rMichelinStar = document.getElementById('restaurantMichelinStar');
  rDescription = document.getElementById('restaurantDescription');
  rAddress = document.getElementById('restaurantAddress');
  rPhonenumber = document.getElementById('restaurantPhoneNumber');
  rCapacity = document.getElementById('restaurantCapacity');
  picture = document.getElementById('restaurantFile');

  const data = new FormData();
  data.append('post_type', 'insert');
  data.append('restaurant_name', rName.value);
  data.append('restaurant_category', rCategory.value);
  data.append(
    'restaurant_michelinStar',
    rMichelinStar.value == 1 ? true : false
  );
  data.append('restaurant_description', rDescription.value);
  data.append('restaurant_address', rAddress.value);
  data.append('restaurant_phoneNumber', rPhonenumber.value);
  data.append('restaurant_star', rStars.value);
  data.append('restaurant_capacity', rCapacity.value);
  data.append('picture1', picture.files[0]);
  data.append('picture2', picture.files[1]);

  console.log(data);

  postForm('http://localhost/api/restaurants', data).then(
    delay(1000).then(() => loadRestaurants())
  );
}

async function loadRestaurantSessions() {
  sessionPane = document.getElementById('restaurantSessionSubPane');
  sessionPane.classList.remove('hidden');

  restaurantPane = document.getElementById('restaurantSubPane');
  if (!restaurantPane.classList.contains('hidden')) {
    restaurantPane.classList.add('hidden');
  }

  restaurantSelect = document.getElementById('sessionRestaurant');
  restaurantObjects = await getData('/restaurants');
  restaurantSelect.innerHTML = '';
  for (let i = 0; i < restaurantObjects.length; i++) {
    restaurantSelect.innerHTML +=
      '<option value="' +
      restaurantObjects[i].id +
      '">' +
      restaurantObjects[i].name +
      '</option>';
  }

  objects = await getData('/restaurantSessions');
  createRestaurantSessionList(objects);
}

async function createRestaurantSessionList(objects) {
  parentElement = document.getElementById('contentRestaurantSessionWrapper');
  title = document.getElementById('YummieTitle');
  title.innerHTML = 'Restaurant Session';
  parentElement.innerHTML = '';

  for (let i = 0; i < objects.length; i++) {
    createRestaurantSessionContainer(
      parentElement,
      objects[i].id,
      objects[i].restaurant_id,
      objects[i].adult_Price,
      objects[i].kids_Price,
      objects[i].session_startTime,
      objects[i].session_endTime
    );
  }
}

async function createRestaurantSessionContainer(
  element,
  id,
  restaurant_id,
  adult_price,
  kids_price,
  start_time,
  end_time
) {
  container = document.createElement('div');
  container.classList.add(
    'bg-white',
    'p-2',
    'rounded-md',
    'grid',
    'lg:grid-cols-5',
    'lg:grid-rows-2',
    'md:grid-cols-1',
    'text-left',
    'relative',
    'gap-4',
    'text-center'
  );

  restaurantSelect = document.createElement('select');
  restaurantSelect.classList.add('items-center', 'justify-center', 'flex');
  restaurantSelect.setAttribute('id', 'sessionRestaurantSelect' + id);
  restaurantSelect.disabled = true;

  dataV = getData('/restaurants');
  assignOptionsToSelect(restaurantSelect, dataV, restaurant_id);

  adultPriceSpan = document.createElement('span');
  adultPriceSpan.innerHTML = adult_price;
  adultPriceSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  adultPriceSpan.setAttribute('id', 'sessionRestaurantAdultPrice' + id);

  kidsPriceSpan = document.createElement('span');
  kidsPriceSpan.innerHTML = kids_price;
  kidsPriceSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  kidsPriceSpan.setAttribute('id', 'sessionRestaurantKidsPrice' + id);

  startTimeSpan = document.createElement('input');
  startTimeSpan.setAttribute('type', 'time');
  startTimeSpan.setAttribute('id', 'sessionStartTime' + id);
  startTimeSpan.setAttribute('disabled', 'true');
  // startTimeSpan.classList.add('col-span-2');
  startTimeSpan.value = start_time;

  endTimeSpan = document.createElement('input');
  endTimeSpan.setAttribute('type', 'time');
  endTimeSpan.setAttribute('id', 'sessionEndTime' + id);
  endTimeSpan.setAttribute('disabled', 'true');
  // endTimeSpan.classList.add('col-span-2');
  endTimeSpan.value = end_time;

  //remove user
  buttonRemove = document.createElement('button');
  buttonRemove.innerHTML = 'REMOVE';
  buttonRemove.classList.add(
    'm-2',
    'py-2',
    'px-4',
    'rounded-md',
    'text-[#F7F7FB]',
    'bg-red-500',
    'w-fit'
  );
  buttonRemove.addEventListener('click', () => {
    removeRestaurantSession(id);
  });

  //edit user
  buttonEdit = document.createElement('button');
  buttonEdit.innerHTML = 'EDIT';
  buttonEdit.classList.add(
    'm-2',
    'py-2',
    'px-8',
    'rounded-md',
    'text-[#F7F7FB]',
    'bg-slate-800',
    'w-fit',
    'float-right',
    'justify-center'
  );

  buttonEdit.setAttribute('id', 'restaurantSessionB' + id);
  buttonEdit.addEventListener('click', () => {
    editRestaurantSession(id);
  });

  container.appendChild(restaurantSelect);
  container.appendChild(adultPriceSpan);
  container.appendChild(kidsPriceSpan);
  container.appendChild(startTimeSpan);
  container.appendChild(endTimeSpan);
  container.appendChild(buttonRemove);
  container.appendChild(buttonEdit);

  element.appendChild(container);
}
function insertRestaurantSession() {
  restaurantSelect = document.getElementById('sessionRestaurant');
  adultPrice = document.getElementById('sessionRestaurantAdultPrice');
  kidsPrice = document.getElementById('sessionRestaurantKidsPrice');
  startTime = document.getElementById('sessionRestaurantStartTime');
  endTime = document.getElementById('sessionRestaurantEndTime');

  // if (
  //   restaurantSelect.value == '' ||
  //   adultPrice.value == '' ||
  //   kidsPrice.value == '' ||
  //   startTime.value == '' ||
  //   endTime.value == ''
  // ) {
  //   alert('one or multiple fields are empty');
  //   return;
  // }
  const data = {
    post_type: 'insert',
    restaurant_id: parseInt(restaurantSelect.value),
    adult_Price: parseFloat(adultPrice.value),
    kids_Price: parseFloat(kidsPrice.value),
    session_startTime: startTime.value,
    session_endTime: endTime.value,
  };

  postData('http://localhost/api/restaurantSessions', data).then(
    delay(1000).then(() => loadRestaurantSessions())
  );
}
function editRestaurantSession(id) {
  sRestaurantName = document.getElementById('sessionRestaurantSelect' + id);
  sAdultPrice = document.getElementById('sessionRestaurantAdultPrice' + id);
  sKidsPrice = document.getElementById('sessionRestaurantKidsPrice' + id);
  sStartTime = document.getElementById('sessionStartTime' + id);
  sEndTime = document.getElementById('sessionEndTime' + id);
  b = document.getElementById('restaurantSessionB' + id);

  if (b.innerHTML == 'EDIT') {
    setEditableType(sAdultPrice);
    setEditableType(sKidsPrice);
    sRestaurantName.disabled = false;
    sStartTime.disabled = false;
    sEndTime.disabled = false;
    b.innerHTML = 'Save';
    b.classList.add('bg-green-400', 'text-[#121212]');
    return;
  }
  b.innerHTML = 'EDIT';
  b.classList.remove('bg-green-400', 'text-[#121212]');
  setEditableType(sAdultPrice);
  setEditableType(sKidsPrice);
  sRestaurantName.disabled = true;
  sStartTime.disabled = true;
  sEndTime.disabled = true;

  const data = {
    post_type: 'edit',
    id: id,
    restaurant_id: parseInt(sRestaurantName.value),
    adult_Price: parseFloat(sAdultPrice.innerHTML),
    kids_Price: parseFloat(sKidsPrice.innerHTML),
    session_startTime: sStartTime.value,
    session_endTime: sEndTime.value,
  };

  console.log(data);

  postData('http://localhost/api/restaurantSessions', data).then(
    delay(1000).then(() => loadRestaurantSessions())
  );
}
function removeRestaurantSession(id) {
  data = {
    post_type: 'delete',
    id: id,
  };

  if (confirm('are you sure you want to delete this restaurant session?')) {
    postData('http://localhost/api/restaurantSessions', data);
    delay(1000).then(loadRestaurantSessions());
  }
}
