const inputSearch = document.getElementById('searchInput');

async function loadUserData() {
  var objects = await getDataFromUserAPI();
  createUserList(objects);
  addUserSearch();
}
// USER FUNCTIONALITY --START

async function loadUserData(type) {
  //show / hide panes
  userPane = document.getElementById('UserPane');
  userPane.classList.remove('hidden');

  yummiePane = document.getElementById('yummiePane');
  if (!yummiePane.classList.contains('hidden')) {
    yummiePane.classList.add('hidden');
  }
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
  var objects = await getData('/users');
  createUserList(objects);
  addUserSearch(objects);
}

async function loadCustomers() {
  customers = await getUsersByRole(0);
  createUserList(customers);
  addUserSearch(customers);
}

async function loadTicketManagement() {
  //  tickets = await getDataFromTicketAPI();
  console.log('loading ticket management')
  contentWrapper = document.getElementById('UserPane');
  contentWrapper.innerHTML = '';
  createTicketsForm();
  events = getEvents();
}

async function createTicketList(tickets) {
  parentElement = document.getElementById('contentItemsWrapper');
  parentElement.innerHTML = 'Tickets';
  for (let i = 0; i < tickets.length; i++) {
    createTicketContainer(
      parentElement,
      tickets[i].id,
      tickets[i].status,
      tickets[i].email,
      tickets[i].password
    );
  }
};

async function createTicketDropdown(){
  parentElement = document.getElementById('ticketDropdown');
  parentElement.innerHTML = '';
  events = await getEvents();
  for (let i = 0; i < events.length; i++) {
    parent
  }
}
async function getEvents() {
  const response = await fetch('http://localhost/api/events2');
  return await response.json();
}

async function createTicketsForm() {
  parentElement = document.getElementById('UserPane');
  console.log('creating form')
    fetch('/js/userPanel/formGenerateTickets.html')
    .then((response) => {
      return response.text();
    })
    .then((html) => {
      parentElement.innerHTML = html;  
      console.log(html);
    });
  console.log('fetched log')
};

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
  let res = await getData('/users');
  let customers = [];
  for (let i = 0; i < res.length; i++) {
    if (role == 'all') {
      customers = res;
      break;
    }

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

  //role dropdown
  roleSelect = document.createElement('select');
  roleSelect.classList.add('items-center', 'justify-center', 'flex');
  roleSelect.innerHTML =
    '<option value="0">Customer</option><option value="1">Employee</option><option value="9">Admin</option>';
  roleSelect.value = role;
  roleSelect.setAttribute('id', 'rSelect' + id);
  roleSelect.disabled = true;

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
    removeUser(id);
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
    editUser(id);
  });

  buttonWrapper = document.createElement('div');
  buttonWrapper.classList.add('flex', 'flex-cols', 'col-start-3', 'justify-end');
  buttonWrapper.appendChild(buttonEdit);
  buttonWrapper.appendChild(buttonRemove);
  register = document.createElement('span');
  register.innerHTML = 'registration date:' + '\n' + registeredAt;
  register.classList.add('text-left');

  //append
  container.appendChild(idSpan);
  container.appendChild(unameSpan);
  container.appendChild(mailSpan);
  container.appendChild(roleSelect);
  container.appendChild(buttonEdit);
  container.appendChild(buttonRemove);
  container.appendChild(register);

  element.appendChild(container);
}

function editUser(id) {
  uSpan = document.getElementById('uSpan' + id);
  mSpan = document.getElementById('mSpan' + id);
  roleSelect = document.getElementById('rSelect' + id);
  b = document.getElementById('b' + id);

  if (b.innerHTML == 'EDIT') {
    setEditableType(uSpan);
    setEditableType(mSpan);
    roleSelect.disabled = false;
    b.innerHTML = 'Save';
    b.classList.add('bg-green-400', 'text-[#121212]');
    return;
  }
  roleSelect.disabled = true;
  b.innerHTML = 'EDIT';
  b.classList.remove('bg-green-400', 'text-[#121212]');
  setEditableType(uSpan);
  setEditableType(mSpan);

  data = {
    post_type: 'edit',
    id: id,
    username: uSpan.innerHTML,
    email: mSpan.innerHTML,
    role: roleSelect.value,
  };

  postData('http://localhost/api/users', data);

  userListType = document.getElementById('UserListType').innerHTML;
  delay(1000).then(() => loadUserData(userListType));
}

function removeUser(id) {
  data = {
    post_type: 'delete',
    id: id,
  };

  if (confirm('are you sure you want to delete this user?')) {
    postData('http://localhost/api/users', data);
    userListType = document.getElementById('UserListType').innerHTML;
    delay(1000).then(() => loadUserData(userListType));
  }
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

async function getCurrentPageUsers() {
  userListType = document.getElementById('UserListType').innerHTML;
  users = [];
  switch (userListType) {
    case 'customers':
      users = getUsersByRole(0);
      break;
    case 'employees':
      users = getUsersByRole(1);
      break;
    case 'admins':
      users = getUsersByRole(9);
      break;
    default:
      users = getUsersByRole('all');
      break;
  }

  return users;
}

function sortByID() {
  users = getCurrentPageUsers()
    .then((users) => {
      users.sort((a, b) => (a.id > b.id ? 1 : -1));
      createUserList(users, document.getElementById('UserListType').innerHTML);
      addUserSearch(users);
    })
    .catch((error) => {
      console.error('Error fetching users:', error);
    });
}

function sortByUsername() {
  users = getCurrentPageUsers()
    .then((users) => {
      users.sort((a, b) =>
        a.username.toLowerCase() > b.username.toLowerCase() ? 1 : -1
      );
      createUserList(users, document.getElementById('UserListType').innerHTML);
      addUserSearch(users);
    })
    .catch((error) => {
      console.error('Error fetching users:', error);
    });
}

function sortByEmail() {
  users = getCurrentPageUsers()
    .then((users) => {
      users.sort((a, b) =>
        a.email.toLowerCase() > b.email.toLowerCase() ? 1 : -1
      );
      createUserList(users, document.getElementById('UserListType').innerHTML);
      addUserSearch(users);
    })
    .catch((error) => {
      console.error('Error fetching users:', error);
    });
}

// USER FUNCTIONALITY --END

//DANCE FUNCTIONALITY --START

function loadEDMData(type) {
  edmPane = document.getElementById('edmPane');
  edmPane.classList.remove('hidden');

  userPane = document.getElementById('UserPane');
  if (!userPane.classList.contains('hidden')) {
    userPane.classList.add('hidden');
  }

  yummiePane = document.getElementById('yummiePane');
  if (!yummiePane.classList.contains('hidden')) {
    yummiePane.classList.add('hidden');
  }


  switch (type) {
    case 'venues':
      loadVenues();
      break;
    case 'artists':
      loadArtists();
      break;
    case 'sessions':
      loadSessions();
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

  sessionPane = document.getElementById('sessionSubPane');
  if (!sessionPane.classList.contains('hidden')) {
    sessionPane.classList.add('hidden');
  }
  objects = getData('/locations');
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

  //id
  idSpan = document.createElement('span');
  idSpan.innerHTML = id;
  idSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  idSpan.setAttribute('id', 'vIdSpan' + id);

  //name
  nameSpan = document.createElement('span');
  nameSpan.innerHTML = name;
  nameSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  nameSpan.setAttribute('id', 'vNameSpan' + id);

  //address
  addressSpan = document.createElement('span');
  addressSpan.innerHTML = address;
  addressSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  addressSpan.setAttribute('id', 'vAddressSpan' + id);

  //capacity
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
    removeVenue(id);
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
    editVenue(id);
  });

  //append
  container.appendChild(idSpan);
  container.appendChild(nameSpan);
  container.appendChild(addressSpan);
  container.appendChild(capSpan);
  container.appendChild(buttonEdit);
  container.appendChild(buttonRemove);

  element.appendChild(container);
}

function editVenue(id) {
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

  //send form
  let form = new FormData();
  form.append('post_type', 'edit');
  form.append('id', id);
  form.append('venue_name', vNameSpan.innerHTML);
  form.append('venue_address', vAddressSpan.innerHTML);
  form.append('venue_capacity', vCapSpan.innerHTML);

  postForm('http://localhost/api/danceLocations', form).then(
    delay(1000).then(() => loadVenues())
  );
}

function insertVenue() {
  vName = document.getElementById('venueName');
  vAddress = document.getElementById('venueAddress');
  vCap = document.getElementById('venueCap');
  picture = document.getElementById('venueFile');
  data = {
    post_type: 'insert',
    venue_name: vName.innerHTML,
    venue_address: vAddress.value,
    venue_capacity: vCap.value,
    picture: this.file,
  };

  let form = new FormData();
  form.append('post_type', 'insert');
  form.append('venue_name', vName.value);
  form.append('venue_address', vAddress.value);
  form.append('venue_capacity', vCap.value);
  form.append('picture', picture.files[0]);

  postForm('http://localhost/api/danceLocations', form).then(
    delay(1000).then(() => loadVenues())
  );
}

function removeVenue(id) {
  data = {
    post_type: 'delete',
    id: id,
  };

  if (confirm('are you sure you want to delete this venue?')) {
    postData('http://localhost/api/danceLocations', data);
    delay(1000).then(loadVenues());
  }
}

function loadArtists() {
  artistPane = document.getElementById('artistSubPane');
  artistPane.classList.remove('hidden');
  venuePane = document.getElementById('venueSubPane');

  if (!venuePane.classList.contains('hidden')) {
    venuePane.classList.add('hidden');
  }

  sessionPane = document.getElementById('sessionSubPane');
  if (!sessionPane.classList.contains('hidden')) {
    sessionPane.classList.add('hidden');
  }
  objects = getData('/artists');
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
        objects[i].description
      );
    }
  });
}

async function createArtistContainer(element, id, name, genres, description) {
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
  idSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  idSpan.setAttribute('id', 'aIdSpan' + id);

  //name
  nameSpan = document.createElement('span');
  nameSpan.innerHTML = name;
  nameSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  nameSpan.setAttribute('id', 'aNameSpan' + id);

  //genres
  genresSpan = document.createElement('span');
  genresSpan.innerHTML = genres;
  genresSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex',
    'col-span-2'
  );
  genresSpan.setAttribute('id', 'aGenresSpan' + id);

  //remove venue
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
    removeArtist(id);
  });

  //edit venue
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
    editArtist(id);
  });


  //description

  descriptionS = document.createElement('TEXTAREA');
  descriptionS.innerHTML = description;
  descriptionS.classList.add(
    'h-full',
    'col-span-4',
    'text-ellipsis',
    'items-center',
    'justify-center',
    'flex',
    'text-ellipsis'
  );
  descriptionS.setAttribute('id', 'aDesSpan' + id);
  descriptionS.setAttribute('disabled', 'true');


  //append
  container.appendChild(idSpan);
  container.appendChild(nameSpan);
  container.appendChild(genresSpan);
  container.appendChild(buttonEdit);
  container.appendChild(buttonRemove);
  container.appendChild(descriptionS);

  element.appendChild(container);
}

function insertArtist() {
  aName = document.getElementById('artistName');
  aGenres = document.getElementById('artistGenre');
  aDescription = document.getElementById('artistDescription');
  aSongs = document.getElementById('artistSongs');
  picture = document.getElementById('artistPicture');

  if (aName.value == '' || aGenres.value == '' || aDescription.value == '') {
    alert('not all fields have been filled in');
    return;
  }

  songs = getAllSongsFromList();
  let form = new FormData();
  form.append('post_type', 'insert');
  form.append('artist_name', aName.value);
  form.append('artist_genre', aGenres.value);
  form.append('artist_description', aDescription.value);
  form.append('artist_songs', songs);
  form.append('picture', picture.files[0]);
  console.log(songs);
  postForm('http://localhost/api/artists', form);
  delay(1000).then(loadArtists());
}

function getAllSongsFromList(){
  let list = document.getElementById('songList').children;
  let songs = '';
  for (let i = 0; i < list.length; i++){
    songs += list[i].innerText + ':';
  }
  return songs;
}

function updateSongList() {
  song = document.getElementById('songInput');
  if (song.value == '') {
    return;
  }
  list = document.getElementById('songList');

  if (list.children.length >= 3) {
    alert('cant have more than 3 songs');
    return;
  }
  songWrapper = document.createElement('span');
  songText = document.createElement('span');
  songText.innerHTML = song.value;
  songWrapper.appendChild(songText);
  list.appendChild(songWrapper);
}
document.getElementById('addSongToList').onclick = updateSongList;

function editArtist(id) {
  aNameSpan = document.getElementById('aNameSpan' + id);
  aGenresSpan = document.getElementById('aGenresSpan' + id);
  aDescription = document.getElementById('aDesSpan' + id);
  b = document.getElementById('artistButton' + id);
  }
// async function loadInputSearch() {
//   if (document.getElementById('searchInput')) {
//     document.getElementById('searchInput').remove();
//   }
//   parentElement = document.getElementById('ContentWrapper');
//   parentElement.insertBefore(inputSearch, parentElement.childNodes[0]);

  
// }

// THIS GOES SOMEWHERE DONT KNOW WHERE YET


// if (b.innerHTML == 'EDIT') {
//   setEditableType(aNameSpan);
//   setEditableType(aGenresSpan);
//   aDescription.removeAttribute('disabled');
//   b.innerHTML = 'Save';
//   b.classList.add('bg-green-400', 'text-[#121212]');
//   return;
// }
// b.innerHTML = 'EDIT';
// b.classList.remove('bg-green-400', 'text-[#121212]');
// setEditableType(aNameSpan);
// setEditableType(aGenresSpan);
// aDescription.setAttribute('disabled', 'true');

// let form = new FormData();
// form.append('post_type', 'edit');
// form.append('id', id);
// form.append('artist_name', aNameSpan.innerHTML);
// form.append('artist_description', aDescription.value);
// form.append('artist_genre', aGenresSpan.innerHTML);

// console.log(form);
// postForm('http://localhost/api/artists', form).then(
//   delay(1000).then(() => loadArtists())
// );





async function getData(url = ''){
  const response = await fetch(url);
  return response.json();
}

function removeArtist(id) {
  data = {
    post_type: 'delete',
    id: id,
  };

  if (confirm('are you sure you want to delete this artist?')) {
    postData('http://localhost/api/artists', data);
    delay(1000).then(loadArtists());
  }
}

async function loadSessions() {
  sessionPane = document.getElementById('sessionSubPane');
  sessionPane.classList.remove('hidden');

  artistPane = document.getElementById('artistSubPane');
  if (!artistPane.classList.contains('hidden')) {
    artistPane.classList.add('hidden');
  }

  venuePane = document.getElementById('venueSubPane');
  if (!venuePane.classList.contains('hidden')) {
    venuePane.classList.add('hidden');
  }

  //conf artistselect
  artistSelect = document.getElementById('sessionArtist');
  artistObjects = await getData('/artists');
  artistSelect.innerHTML = '';
  for (let i = 0; i < artistObjects.length; i++) {
    artistSelect.innerHTML +=
      '<option value="' +
      artistObjects[i].id +
      '">' +
      artistObjects[i].name +
      '</option>';
  }
  console.log(artistObjects);

  //conf venueSelect
  venueSelect = document.getElementById('sessionVenue');
  venueSelect.innerHTML = '';
  venueObjects = await getData('/danceLocations');
  for (let i = 0; i < venueObjects.length; i++) {
    venueSelect.innerHTML +=
      '<option value="' +
      venueObjects[i].id +
      '">' +
      venueObjects[i].name +
      '</option>';
  }

  sessionObjects = await getData('/danceSessions');
  createSessionList(sessionObjects);
}

async function createSessionContainer(
  parentElement,
  id,
  venue,
  artist_id,
  date,
  session_type,
  duration,
  ticketsAmount,
  price
) {
  wrapper = document.createElement('div');
  wrapper.classList.add(
    'bg-white',
    'p-2',
    'rounded-md',
    'grid',
    'lg:grid-cols-8',
    'md:grid-cols-1',
    'text-left',
    'relative',
    'gap-4',
    'text-center'
  );

  dateSpan = document.createElement('input');
  dateSpan.setAttribute('type', 'datetime-local');
  dateSpan.setAttribute('id', 'sessionDate' + id);
  dateSpan.setAttribute('disabled', 'true');
  dateSpan.classList.add('col-span-2');
  dateSpan.value = date;

  //role dropdown
  venueSelect = document.createElement('select');
  venueSelect.classList.add('items-center', 'justify-center', 'flex');
  venueSelect.setAttribute('id', 'sessionVenueSelect' + id);
  venueSelect.disabled = true;

  dataV = getData('/danceLocations');
  assignOptionsToSelect(venueSelect, dataV, venue);

  artistSelect = document.createElement('select');
  artistSelect.classList.add('items-center', 'justify-center', 'flex');
  artistSelect.value = artist_id;
  artistSelect.setAttribute('id', 'sessionArtistSelect' + id);
  artistSelect.disabled = true;
  dataV = getData('/artists');
  assignOptionsToSelect(artistSelect, dataV, artist_id);

  sessionSpan = document.createElement('span');
  sessionSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  sessionSpan.setAttribute('id', 'sessionType' + id);
  sessionSpan.innerHTML = session_type;

  durationSpan = document.createElement('span');
  durationSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  durationSpan.innerHTML = duration;
  durationSpan.setAttribute('id', 'sessionDuration' + id);
  ticketAmountSpan = document.createElement('span');
  ticketAmountSpan.classList.add(
    'h-full',
    'items-center',
    'justify-center',
    'flex'
  );
  ticketAmountSpan.innerHTML = ticketsAmount;
  ticketAmountSpan.setAttribute('id', 'sessionTicketA' + id);
  priceSpan = document.createElement('span');
  priceSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  priceSpan.innerHTML = price;
  priceSpan.setAttribute('id', 'sessionPrice' + id);

  //remove session
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
    removeSession(id);
  });

  //edit session
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
  buttonEdit.setAttribute('id', 'sessionButton' + id);
  buttonEdit.addEventListener('click', () => {
    editSession(id);
  });

  wrapper.appendChild(dateSpan);
  wrapper.appendChild(venueSelect);
  wrapper.appendChild(artistSelect);

  wrapper.appendChild(sessionSpan);
  wrapper.appendChild(durationSpan);
  wrapper.appendChild(ticketAmountSpan);
  wrapper.appendChild(priceSpan);
  wrapper.appendChild(buttonEdit);
  wrapper.appendChild(buttonRemove);

  parentElement.appendChild(wrapper);
}

async function createSessionList(objects) {
  parentElement = document.getElementById('contentSessionWrapper');
  title = document.getElementById('EDMTitle');
  title.innerHTML = 'Session';
  parentElement.innerHTML = '';

  for (let i = 0; i < objects.length; i++) {
    //list
    createSessionContainer(
      parentElement,
      objects[i].id,
      objects[i].venue,
      objects[i].artist_id,
      objects[i].date,
      objects[i].session,
      objects[i].duration,
      objects[i].ticketsAmount,
      objects[i].price
    );
  }
}

function insertSession() {
  sessionDate = document.getElementById('sessionDate');
  sessionVenue = document.getElementById('sessionVenue');
  sessionArtist = document.getElementById('sessionArtist');
  sessionTickets = document.getElementById('sessionTickets');
  sessionPrice = document.getElementById('sessionPrice');
  sessionType = document.getElementById('sessionType');
  sessionDuration = document.getElementById('sessionDuration');

  if (
    sessionPrice.value == '' ||
    sessionType.value == '' ||
    sessionDuration.value == '' ||
    sessionDate.value == ''
  ) {
    alert('one or multiple fields are empty');
    return;
  }
  date = new Date(sessionDate.value)
    .toISOString()
    .slice(0, 19)
    .replace('T', ' ');
  data = {
    post_type: 'insert',
    session_date: date,
    session_venue_id: parseInt(sessionVenue.value),
    session_artist_id: parseInt(sessionArtist.value),
    session_type: sessionType.value,
    session_ticket_amount: parseInt(sessionTickets.value),
    session_price: parseFloat(sessionPrice.value),
    session_duration: parseInt(sessionDuration.value),
  };

  console.log(data);

  postData('http://localhost/api/danceSessions', data);

  loadSessions();
}

function editSession(id) {
  sDate = document.getElementById('sessionDate' + id);
  sVenue = document.getElementById('sessionVenueSelect' + id);
  sArtist = document.getElementById('sessionArtistSelect' + id);
  sType = document.getElementById('sessionType' + id);
  sDuration = document.getElementById('sessionDuration' + id);
  sTicketA = document.getElementById('sessionTicketA' + id);
  sPrice = document.getElementById('sessionPrice' + id);
  b = document.getElementById('sessionButton' + id);

  if (b.innerHTML == 'EDIT') {
    setEditableType(sType);
    setEditableType(sDuration);
    setEditableType(sTicketA);
    setEditableType(sPrice);
    sVenue.disabled = false;
    sArtist.disabled = false;
    sDate.disabled = false;
    b.innerHTML = 'Save';
    b.classList.add('bg-green-400', 'text-[#121212]');
    return;
  }
  b.innerHTML = 'EDIT';
  b.classList.remove('bg-green-400', 'text-[#121212]');
  setEditableType(sType);
  setEditableType(sDuration);
  setEditableType(sTicketA);
  setEditableType(sPrice);
  sVenue.disabled = true;
  sArtist.disabled = true;
  sDate.disabled = true;

  date = new Date(sDate.value).toISOString().slice(0, 19).replace('T', ' ');

  data = {
    post_type: 'edit',
    id: id,
    session_venue_id: parseInt(sVenue.value),
    session_artist_id: parseInt(sArtist.value),
    session_date: date,
    session_price: parseFloat(sPrice.innerHTML),
    session_duration: parseInt(sDuration.innerHTML),
    session_ticket_amount: parseInt(sTicketA.innerHTML),
    session_type: sType.innerHTML,
  };

  console.log(data);

  postData('http://localhost/api/danceSessions', data);
}
function removeSession(id) {
  data = {
    post_type: 'delete',
    id: id,
  };

  if (confirm('are you sure you want to delete this artist?')) {
    postData('http://localhost/api/danceSessions', data);
    delay(1000).then(loadSessions());
  }
}

async function assignOptionsToSelect(element, data, selected) {
  objects = await data;
  for (let i = 0; i < objects.length; i++) {
    element.innerHTML +=
      '<option value="' + objects[i].id + '">' + objects[i].name + '</option>';
  }
  element.value = selected;
}

//DANCE FUNCTIONALITY --END //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//
//
//
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

function createRestaurantContainer(element, id, name, category, star, michelinStar, description, address, phoneNumber, capacity) {
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
  categorySpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  categorySpan.setAttribute('id', 'rCategorySpan' + id);

  starSpan = document.createElement('span');
  starSpan.innerHTML = star;
  starSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  starSpan.setAttribute('id', 'rStarSpan' + id);

  michelinStarSpan = document.createElement('span');
  michelinStarSpan.innerHTML = michelinStar;
  michelinStarSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  michelinStarSpan.setAttribute('id', 'rMichelinStarSpan' + id);

  descriptionSpan = document.createElement('textarea');
  descriptionSpan.innerHTML = description;
  descriptionSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex', 'col-span-4');
  descriptionSpan.setAttribute('id', 'rDescriptionSpan' + id);
  descriptionSpan.setAttribute('disabled', 'true');

  addressSpan = document.createElement('span');
  addressSpan.innerHTML = address;
  addressSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  addressSpan.setAttribute('id', 'rAddressSpan' + id);

  phoneNumberSpan = document.createElement('span');
  phoneNumberSpan.innerHTML = phoneNumber;
  phoneNumberSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  phoneNumberSpan.setAttribute('id', 'rPhoneNumberSpan' + id);

  capacitySpan = document.createElement('span');
  capacitySpan.innerHTML = capacity;
  capacitySpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
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
    'h-[50px]',
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
  data.append("post_type", "edit");
  data.append("id", id);
  data.append("restaurant_name", rNameSpan.innerHTML);
  data.append("restaurant_category", rCategorySpan.innerHTML);
  data.append("restaurant_star", rStarSpan.innerHTML);
  data.append("restaurant_michelinStar", rMichelinStarSpan.innerHTML == 'true' ? "1" : "0");
  data.append("restaurant_description", rDescriptionSpan.value);
  data.append("restaurant_address", rAddressSpan.innerHTML);
  data.append("restaurant_phoneNumber", rPhonenumberSpan.innerHTML);
  data.append("restaurant_capacity", rCapacitySpan.innerHTML);

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
  data.append("post_type", "insert");
  data.append("restaurant_name", rName.value);
  data.append("restaurant_category", rCategory.value);
  data.append("restaurant_michelinStar", rMichelinStar.value == 1 ? true : false);
  data.append("restaurant_description", rDescription.value);
  data.append("restaurant_address", rAddress.value);
  data.append("restaurant_phoneNumber", rPhonenumber.value);
  data.append("restaurant_star", rStars.value);
  data.append("restaurant_capacity", rCapacity.value);
  data.append("picture1", picture.files[0]);
  data.append("picture2", picture.files[1]);

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
      objects[i].session_endTime,
      objects[i].session_date
    );
  }

}

async function createRestaurantSessionContainer(element, id, restaurant_id, adult_price, kids_price, start_time, end_time, date) {
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
  adultPriceSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
  adultPriceSpan.setAttribute('id', 'sessionRestaurantAdultPrice' + id);

  kidsPriceSpan = document.createElement('span');
  kidsPriceSpan.innerHTML = kids_price;
  kidsPriceSpan.classList.add('h-full', 'items-center', 'justify-center', 'flex');
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

  dateSpan = document.createElement('input');
  dateSpan.setAttribute('type', 'date');
  dateSpan.setAttribute('id', 'sessionDate' + id);
  dateSpan.setAttribute('disabled', 'true');
  // dateSpan.classList.add('col-span-2');
  dateSpan.value = date;

  //remove session
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

  //edit session
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
  container.appendChild(dateSpan);
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
  date = document.getElementById('sessionRestaurantDate');
 
  formattedDate = new Date(date.value).toISOString().split('T')[0];
  const data = {
    "post_type": "insert",
    "restaurant_id": parseInt(restaurantSelect.value),
    "adult_Price": parseFloat(adultPrice.value),
    "kids_Price": parseFloat(kidsPrice.value),
    "session_startTime": startTime.value,
    "session_endTime": endTime.value,
    "session_date" : formattedDate
  };

  console.log(data);

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
  sDate = document.getElementById('sessionDate' + id);
  b = document.getElementById('restaurantSessionB' + id);

  if (b.innerHTML == 'EDIT') {
    setEditableType(sAdultPrice);
    setEditableType(sKidsPrice);
    sRestaurantName.disabled = false;
    sStartTime.disabled = false;
    sEndTime.disabled = false;
    sDate.disabled = false;
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
  sDate.disabled = true;

  formattedDate = new Date(sDate.value).toISOString().split('T')[0];
  const data = {
    "post_type": "edit",
    "id": id,
    "restaurant_id": parseInt(sRestaurantName.value),
    "adult_Price": parseFloat(sAdultPrice.innerHTML),
    "kids_Price": parseFloat(sKidsPrice.innerHTML),
    "session_startTime": sStartTime.value,
    "session_endTime": sEndTime.value,
    "session_date" : formattedDate
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



//YUMMIE FUNCTIONALTIES END//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//
//
//
//GLOBAL //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function delay(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

async function postForm(url = '', form) {
  const response = await fetch(url, {
    method: 'POST',
    mode: 'cors',
    cache: 'no-cache',
    credentials: 'same-origin',
    redirect: 'follow',
    referrerPolicy: 'no-referrer',
    body: form,
  });
  console.log(response);
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
  const response = await fetch('http://localhost/api' + url);
  return await response.json();
}

function loadCustomPageTabs(){
  getData('/pages').then((objects) => {
    objects.forEach((element) => {
      insertCustomPageTab(element.name, element.title);
    });
  });
}

function insertCustomPageTab(name, title) {
  dropDownMenu = document.getElementById('dropDownPagesOption');
  container = document.createElement('li');

  a = document.createElement('a');
  a.innerHTML = title;
  a.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-100', 'dark:hover:bg-gray-600', 'dark:hover:text-white');
  a.setAttribute('href', 'http://localhost/cms?page=' + name);

  container.appendChild(a);
  dropDownMenu.appendChild(container);
}

//GLOBAL END/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//loadUserData();
//loadEDMData('artists');
// loadYummieData('restaurants');
loadYummieData('restaurantSessions');
loadCustomPageTabs();
