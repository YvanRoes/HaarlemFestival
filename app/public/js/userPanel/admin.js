async function loadUserData() {
  var objects = await getDataFromUserAPI();
  createUserList(objects);
  addUserSearch();
}

async function loadCustomers() {
  customers = await getUsersByRole(0);
  createUserList(customers);
}

async function loadEmployees() {
  employees = await getUsersByRole(1);
  createUserList(employees);
}

async function loadAdmins() {
  admins = await getUsersByRole(9);
  createUserList(admins);
}

async function getUsersByRole(role) {
  let res = await getDataFromUserAPI();
  console.log(res);
  let customers = [];

  for (let i = 0; i < res.length; i++) {
    if (res[i].role == role) {
      customers.push(res[i]);
    }
  }
  return customers;
}

async function getDataFromUserAPI() {
  const response = await fetch('http://localhost/api/users');
  return await response.json();
}

function createUserList(objects) {
  parentElement = document.getElementById('contentItemsWrapper');
  parentElement.innerHTML = '';
  for (let i = 0; i < objects.length; i++) {
    createUserContainer(
      parentElement,
      objects[i].id,
      objects[i].username,
      objects[i].email,
      objects[i].password
    );
  }
}

function createUserContainer(element, id, username, email) {
  container = document.createElement('span');
  container.classList.add(
    'bg-white',
    'p-2',
    'rounded-md',
    'grid',
    'lg:grid-cols-[50px_minmax(400px,_1fr)_minmax(200px,_1fr)]',
    'md:grid-cols-1',
    'text-left',
    'relative',
  );
  //id
  idSpan = document.createElement('span');
  idSpan.innerHTML = id;
  // idSpan.classList.add('col-span-1');

  //username
  unameSpan = document.createElement('span');
  unameSpan.innerHTML = username;
  unameSpan.classList.add('col-span-1');

  //email
  mailSpan = document.createElement('span');
  mailSpan.innerHTML = email;
  mailSpan.classList.add('col-span-1');

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
    postData('http://localhost/api/users', data);
    loadUserData();
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
    'col-start-3',
    'float-right'
  );
  buttonEdit.addEventListener('click', () => {
    // if (unameSpan.contentEditable == 'false') {
    //   unameSpan.contentEditable = 'true';
    //   unameSpan.focus();
    // }
  });

  buttonWrapper = document.createElement('div');
  buttonWrapper.classList.add('flex', 'flex-cols', 'col-start-3', 'justify-end');
   buttonWrapper.appendChild(buttonEdit);
  buttonWrapper.appendChild(buttonRemove);

  container.appendChild(idSpan);
  container.appendChild(unameSpan);
  container.appendChild(mailSpan);
  container.appendChild(buttonWrapper);

  element.appendChild(container);
}

async function addUserSearch() {
  const searchInput = document.getElementById('searchInput');

  objects = getDataFromUserAPI();
  searchInput.addEventListener('keyup', (event) => {
    const { value } = event.target;
    searchUsers(objects, value);
  });
}

loadUserData();

async function searchUsers(objects, value) {
  var objects = await getDataFromUserAPI();
  var newArr = [];
  for (element of objects) {
    if (element.username.includes(value)) newArr.push(element);
    else if (element.id.toString().includes(value)) newArr.push(element);
    else if (element.email.includes(value)) newArr.push(element);
  }
  createUserList(newArr);
}

async function postData(url = '', data = {}) {
  // Default options are marked with *
  const response = await fetch(url, {
    method: 'POST', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *cors, same-origin
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin', // include, *same-origin, omit
    headers: {
      'Content-Type': 'application/json',
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: 'follow', // manual, *follow, error
    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: JSON.stringify(data), // body data type must match "Content-Type" header
  });
}
