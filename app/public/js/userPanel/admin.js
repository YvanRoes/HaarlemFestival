// USER FUNCTIONALITY --START

async function loadUserData(type) {
  //show / hide panes
  userPane = document.getElementById('UserPane');
  userPane.classList.remove('hidden');

  edmPane = document.getElementById('edmPane');
  if (!edmPane.classList.contains('hidden')) {
    edmPane.classList.add('hidden');
  }
  switch (type) {
    case 'customers':
      loadCustomers();
      break;
    case 'employees':
      loadEmployees();
      break;
    case 'admins':
      loadAdmins();
      break;
    default:
      loadAll();
      break;
  }
}

async function loadAll() {
  var objects = await getData('http://localhost/api/users');
  createUserList(objects);
  addUserSearch(objects);
}

async function loadCustomers() {
  customers = await getUsersByRole(0);
  createUserList(customers, 'customers');
  addUserSearch(customers);
}

async function loadEmployees() {
  employees = await getUsersByRole(1);
  createUserList(employees, 'employees');
  addUserSearch(employees);
}

async function loadAdmins() {
  admins = await getUsersByRole(9);
  createUserList(admins, 'admins');
  addUserSearch(admins);
}

async function getUsersByRole(role) {
  let res = await getData('http://localhost/api/users');
  console.log(res);
  let customers = [];

  for (let i = 0; i < res.length; i++) {
    if (res[i].role == role) {
      customers.push(res[i]);
    }
  }
  return customers;
}

function createUserList(objects, type) {
  if (!document.body.contains(document.getElementById('UserListType'))) {
    UserListType = document.createElement('span');
    UserListType.setAttribute('id', 'UserListType');
    UserListType.classList.add('hidden');
    document.body.appendChild(UserListType);
  }
  UserListType.innerHTML = type;
  parentElement = document.getElementById('contentUsersWrapper');
  parentElement.innerHTML = '';
  for (let i = 0; i < objects.length; i++) {
    createUserContainer(
      parentElement,
      objects[i].id,
      objects[i].username,
      objects[i].email,
      objects[i].role,
      objects[i].registered_at
    );
  }
}

function createUserContainer(element, id, username, email, role, registeredAt) {
  container = document.createElement('span');
  container.classList.add(
    'bg-white',
    'p-2',
    'rounded-md',
    'grid',
    'lg:grid-cols-6',
    'md:grid-cols-1',
    'text-left',
    'relative',
    'gap-4',
    'text-center'
  );
  //id
  idSpan = document.createElement('span');
  idSpan.innerHTML = id;
  idSpan.classList.add(
    'p-2',
    'col-span-1',
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );

  //username
  unameSpan = document.createElement('span');
  unameSpan.innerHTML = username;
  unameSpan.classList.add(
    'col-span-1',
    'p-2',
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  unameSpan.contentEditable = 'false';
  unameSpan.setAttribute('id', 'uSpan' + id);

  //email
  mailSpan = document.createElement('span');
  mailSpan.innerHTML = email;
  mailSpan.classList.add(
    'p-1',
    'w-fit',
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  mailSpan.contentEditable = 'false';
  mailSpan.setAttribute('id', 'mSpan' + id);

  //role
  roleSpan = document.createElement('span');
  switch (role) {
    case 0:
      roleSpan.innerHTML = 'User';
      break;
    case 1:
      roleSpan.innerHTML = 'Employee';
      break;
    case 9:
      roleSpan.innerHTML = 'Administrator';
      break;
    default:
      roleSpan.innerHTML = 'unknown';
      break;
  }
  roleSpan.classList.add(
    'p-2',
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  role.contentEditable = 'false';
  roleSpan.setAttribute('íd', 'rSpan' + id);

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
    data = {
      post_type: 'delete',
      id: id,
    };

    if (confirm('are you sure you want to delete this user?')) {
      postData('http://localhost/api/users', data);
      userListType = document.getElementById('UserListType').innerHTML;
      delay(1000).then(() => loadUserData(userListType));
    }
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
  buttonEdit.setAttribute('id', 'b' + id);
  buttonEdit.addEventListener('click', () => {
    uSpan = document.getElementById('uSpan' + id);
    mSpan = document.getElementById('mSpan' + id);
    b = document.getElementById('b' + id);

    if (b.innerHTML == 'EDIT') {
      setEditableType(uSpan);
      setEditableType(mSpan);
      b.innerHTML = 'Save';
      b.classList.add('bg-green-400', 'text-[#121212]');
      return;
    }
    b.innerHTML = 'EDIT';
    b.classList.remove('bg-green-400', 'text-[#121212]');
    setEditableType(uSpan);
    setEditableType(mSpan);

    data = {
      post_type: 'edit',
      id: id,
      username: uSpan.innerHTML,
      email: mSpan.innerHTML,
    };

    console.log(data);
    postData('http://localhost/api/users', data);

    userListType = document.getElementById('UserListType').innerHTML;
    loadUserData(userListType);
  });

  register = document.createElement('span');
  register.innerHTML = 'registration date:' + '\n' + registeredAt;
  register.classList.add('text-left');

  container.appendChild(idSpan);
  container.appendChild(unameSpan);
  container.appendChild(mailSpan);
  container.appendChild(roleSpan);
  container.appendChild(buttonEdit);
  container.appendChild(buttonRemove);
  container.appendChild(register);

  element.appendChild(container);
}

function setEditableType(element) {
  if (element.isContentEditable) {
    element.contentEditable = 'false';
    element.classList.remove(
      'outline',
      'outline-2',
      'outline-[#121212]',
      'rounded-md'
    );
  } else {
    element.contentEditable = 'true';
    element.classList.add(
      'outline',
      'outline-2',
      'outline-[#121212]',
      'rounded-md'
    );
  }
}

async function addUserSearch(objects) {
  const searchInput = document.getElementById('searchInput');
  searchInput.addEventListener('keyup', (event) => {
    const { value } = event.target;
    searchUsers(value, objects);
  });
}

async function searchUsers(value, objects) {
  var newArr = [];
  for (element of objects) {
    if (
      element.username.includes(value) ||
      element.id.toString().includes(value) ||
      element.email.includes(value)
    )
      newArr.push(element);
  }
  createUserList(newArr);
}

function limit(string = '', limit = 0) {
  return string.substring(0, limit);
}

function addNewUser() {
  uName = document.getElementById('inputUserName');
  uPasswd = document.getElementById('inputUserPassword');
  uEmail = document.getElementById('inputUserMail');
  role = document.getElementById('userRoles').value;

  data = {
    post_type: 'insert',
    username: uName.value,
    email: uEmail.value,
    password: uPasswd.value,
    role: this.role,
  };

  uName.value = '';
  uPasswd.value = '';
  uEmail.value = '';
  console.log(data);

  postData('http://localhost/api/users', data);
  userListType = document.getElementById('UserListType').innerHTML;
  delay(1000).then(() => loadUserData(userListType));
}

// loadUserData();
// USER FUNCTIONALITY --END

//EDM FUNCTIONALITY --START

function loadEDMData(type) {
  edmPane = document.getElementById('edmPane');
  edmPane.classList.remove('hidden');
  userPane = document.getElementById('UserPane');
  if (!userPane.classList.contains('hidden')) {
    userPane.classList.add('hidden');
  }

  switch (type) {
    case 'venues':
      loadVenues();
      break;
    case 'artists':
      loadArtists();
    default:
      break;
  }
}

function loadVenues() {
  venuePane = document.getElementById('venueSubPane');
  venuePane.classList.remove('hidden');

  artistPane = document.getElementById('artistSubPane');
  if (!artistPane.classList.contains('hidden')) {
    artistPane.classList.add('hidden');
  }
  objects = getData('http://localhost/api/locations');
  createVenueList(objects);
}

function createVenueList(objects) {
  parentElement = document.getElementById('contentVenueWrapper');
  title = document.getElementById('EDMTitle');
  title.innerHTML = 'Venues';
  parentElement.innerHTML = '';

  objects.then((objects) => {
    for (let i = 0; i < objects.length; i++) {
      createVenueContainer(
        parentElement,
        objects[i].id,
        objects[i].name,
        objects[i].address,
        objects[i].capacity
      );
    }
  });
}

function createVenueContainer(element, id, name, address, capacity) {
  container = document.createElement('span');
  container.classList.add(
    'bg-white',
    'p-2',
    'rounded-md',
    'grid',
    'lg:grid-cols-6',
    'md:grid-cols-1',
    'text-left',
    'relative',
    'gap-4',
    'text-center'
  );

  idSpan = document.createElement('span');
  idSpan.innerHTML = id;
  idSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  idSpan.setAttribute('id', 'vIdSpan' + id);

  nameSpan = document.createElement('span');
  nameSpan.innerHTML = name;
  nameSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  nameSpan.setAttribute('id', 'vNameSpan' + id);

  addressSpan = document.createElement('span');
  addressSpan.innerHTML = address;
  addressSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  addressSpan.setAttribute('id', 'vAddressSpan' + id);

  capSpan = document.createElement('span');
  capSpan.innerHTML = capacity;
  capSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  capSpan.setAttribute('id', 'vCapSpan' + id);

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
    data = {
      post_type: 'delete',
      id: id,
    };

    if (confirm('are you sure you want to delete this venue?')) {
      postData('http://localhost/api/locations', data);
      delay(1000).then(loadVenues());
    }
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
  buttonEdit.setAttribute('id', 'venueB' + id);
  buttonEdit.addEventListener('click', () => {
    vNameSpan = document.getElementById('vNameSpan' + id);
    vAddressSpan = document.getElementById('vAddressSpan' + id);
    vCapSpan = document.getElementById('vCapSpan' + id);
    b = document.getElementById('venueB' + id);

    if (b.innerHTML == 'EDIT') {
      setEditableType(vNameSpan);
      setEditableType(vAddressSpan);
      setEditableType(vCapSpan);
      b.innerHTML = 'Save';
      b.classList.add('bg-green-400', 'text-[#121212]');
      return;
    }
    b.innerHTML = 'EDIT';
    b.classList.remove('bg-green-400', 'text-[#121212]');
    setEditableType(vNameSpan);
    setEditableType(vAddressSpan);
    setEditableType(vCapSpan);

    //check for NaN
    if (isNaN(vCapSpan.innerHTML)) {
      alert('capacity is not a number');
      return;
    }

    //send data
    data = {
      post_type: 'edit',
      id: id,
      venue_name: vNameSpan.innerHTML,
      venue_address: vAddressSpan.innerHTML,
      venue_capacity: vCapSpan.innerHTML,
    };

    console.log(data);
    postData('http://localhost/api/locations', data);
    delay(1000).then(loadVenues());
  });

  container.appendChild(idSpan);
  container.appendChild(nameSpan);
  container.appendChild(addressSpan);
  container.appendChild(capSpan);
  container.appendChild(buttonEdit);
  container.appendChild(buttonRemove);

  element.appendChild(container);
}

function insertVenue() {
  vName = document.getElementById('venueName');
  vAddress = document.getElementById('venueAddress');
  vCap = document.getElementById('venueCap');

  data = {
    post_type: 'insert',
    venue_name: vName.value,
    venue_address: vAddress.value,
    venue_capacity: vCap.value,
    file: this.file,
  };

  postData('http://localhost/api/locations', data);
  delay(1000).then(loadVenues());
}

function loadArtists() {
  artistPane = document.getElementById('artistSubPane');
  artistPane.classList.remove('hidden');
  venuePane = document.getElementById('venueSubPane');
  if (!venuePane.classList.contains('hidden')) {
    venuePane.classList.add('hidden');
  }

  objects = getData('http://localhost/api/artists');
  createArtistList(objects);
}

function createArtistList(objects) {
  parentElement = document.getElementById('contentArtistWrapper');
  title = document.getElementById('EDMTitle');
  title.innerHTML = 'Artists';
  parentElement.innerHTML = '';

  objects.then((objects) => {
    for (let i = 0; i < objects.length; i++) {
      createArtistContainer(
        parentElement,
        objects[i].id,
        objects[i].name,
        objects[i].genre,
      );
    }
  });
}

function createArtistContainer(element, id, name, genres) {
  container = document.createElement('span');
  container.classList.add(
    'bg-white',
    'p-2',
    'rounded-md',
    'grid',
    'lg:grid-cols-6',
    'md:grid-cols-1',
    'text-left',
    'relative',
    'gap-4',
    'text-center'
  );

  idSpan = document.createElement('span');
  idSpan.innerHTML = id;
  idSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  idSpan.setAttribute('id', 'aIdSpan' + id);

  nameSpan = document.createElement('span');
  nameSpan.innerHTML = name;
  nameSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  nameSpan.setAttribute('id', 'aNameSpan' + id);

  genresSpan = document.createElement('span');
  genresSpan.innerHTML = genres;
  genresSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex', 'col-span-2');
  genresSpan.setAttribute('id', 'aGenresSpan' + id);

  //remove
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
    data = {
      post_type: 'delete',
      id: id,
    };

    if (confirm('are you sure you want to delete this artist?')) {
      postData('http://localhost/api/artists', data);
      delay(1000).then(loadArtists());
    }
  });

  //edit
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
  buttonEdit.setAttribute('id', 'artistButton' + id);
  buttonEdit.addEventListener('click', () => {
    aNameSpan = document.getElementById('aNameSpan' + id);
    aGenresSpan = document.getElementById('aGenresSpan' + id);
    b = document.getElementById('artistButton' + id);

    if (b.innerHTML == 'EDIT') {
      setEditableType(aNameSpan);
      setEditableType(aGenresSpan);
      b.innerHTML = 'Save';
      b.classList.add('bg-green-400', 'text-[#121212]');
      return;
    }
    b.innerHTML = 'EDIT';
    b.classList.remove('bg-green-400', 'text-[#121212]');
    setEditableType(aNameSpan);
    setEditableType(aGenresSpan);

    //send data
    data = {
      post_type: 'edit',
      id: id,
      artist_name: aNameSpan.innerHTML,
      artist_genres: aGenresSpan.innerHTML,
    };

    console.log(data);
    postData('http://localhost/api/artists', data);
    delay(1000).then(loadArtists());
  });

  container.appendChild(idSpan);
  container.appendChild(nameSpan);
  container.appendChild(genresSpan);
  container.appendChild(buttonEdit);
  container.appendChild(buttonRemove);

  element.appendChild(container);
}

function insertArtist() {
  aName = document.getElementById('artistName');
  aGenres = document.getElementById('artistGenre');
  picture = document.getElementById('artistPicture').value;

  data = {
    post_type: 'insert',
    artist_name: aName.value,
    artist_genres: aGenres.value,
    picture: picture,
  };
  console.log(data);
  postData('http://localhost/api/artists', data);
  delay(1000).then(loadArtists());
}

//EDM FUNCTIONALITY --END

//GLOBAL

function delay(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

async function postData(url = '', data = {}) {
  const response = await fetch(url, {
    method: 'POST',
    mode: 'cors',
    cache: 'no-cache',
    credentials: 'same-origin',
    headers: {
      'Content-Type': 'application/json',
    },
    redirect: 'follow',
    referrerPolicy: 'no-referrer',
    body: JSON.stringify(data),
  });
  console.log(response);
}

async function getData(url = '') {
  const response = await fetch(url);
  return response.json();
}
loadEDMData('artists');
