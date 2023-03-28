async function loadUserData(type) {
  title = document.getElementById('contentTitle');
  title.innerHTML = 'Users';

  headers = document.getElementById('ListHeaders');
  headers.classList.add(
    'px-10',
    'rounded-md',
    'grid',
    'lg:grid-cols-6',
    'md:grid-cols-1',
    'text-left',
    'relative',
    'gap-4',
    'text-center'
  );

  headers.innerHTML =
    '<span>id</span><span>name</span><span>email</span><span>role</span>';
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
  var objects = await getDataFromUserAPI();
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

function createUserList(objects, type) {
  UserListType = document.createElement('span');
  UserListType.innerHTML = type;
  UserListType.setAttribute('id', 'UserListType');
  UserListType.classList.add('hidden');
  document.body.appendChild(UserListType);
  parentElement = document.getElementById('contentItemsWrapper');
  parentElement.innerHTML = '';
  for (let i = 0; i < objects.length; i++) {
    createUserContainer(
      parentElement,
      objects[i].id,
      objects[i].username,
      objects[i].email,
      objects[i].role
    );
  }
}

function createUserContainer(element, id, username, email, role) {
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
    'flex',
    'border-r-2',
    'border-slate-800'
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
    'flex',
    'border-r-2',
    'border-slate-800'
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
    'flex',
    'border-r-2',
    'border-slate-800'
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
    'flex',
    'border-r-2',
    'border-slate-800'
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
      loadUserData();
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

  // buttonWrapper = document.createElement('div');
  // buttonWrapper.classList.add('flex', 'flex-cols', 'justify-end');
  // buttonWrapper.appendChild(buttonEdit);
  // buttonWrapper.appendChild(buttonRemove);

  container.appendChild(idSpan);
  container.appendChild(unameSpan);
  container.appendChild(mailSpan);
  container.appendChild(roleSpan);
  container.appendChild(buttonEdit);
  container.appendChild(buttonRemove);

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
  //objects = await getDataFromUserAPI();
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

function limit(string = '', limit = 0) {
  return string.substring(0, limit);
}

loadUserData();

updateUser(
  user.id,
  document.getElementById('userName' + user.id).innerHTML,
  document.getElementById('userEmail${user.id}').innerHTML
);
