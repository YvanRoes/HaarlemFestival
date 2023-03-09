async function loadUserData() {
  var objects = await getDataFromUserAPI();
  createUserList(objects);
}

async function loadCustomers() {
  customers = await getUsersByRole(0);
  createUserList(customers);
}

async function loadEmployees(){
  employees = await getUsersByRole(1);
  createUserList(employees);
}

async function loadAdmins(){
  admins = await getUsersByRole(9);
  createUserList(admins);
}

async function getUsersByRole(role) {
  let res = await getDataFromUserAPI();
  console.log(res);
  let customers = [];

  for (let i = 0; i < res.length; i++) {
    if(res[i].role == role){
      customers.push(res[i]);
    }
  }
  return customers;
}

async function getDataFromUserAPI() {
  const response = await fetch("http://localhost/api/users");
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
    'lg:grid-cols-3',
    'md:grid-cols-1',
    'text-left'
  );
  idSpan = document.createElement('span');
  idSpan.innerHTML = id;
  idSpan.classList.add('col-span-1');
  idSpan.contentEditable = true;

  unameSpan = document.createElement('span');
  unameSpan.innerHTML = username;
  unameSpan.classList.add('col-span-1');

  mailSpan = document.createElement('span');
  mailSpan.innerHTML = email;
  mailSpan.classList.add('col-span-1');

  container.appendChild(idSpan);
  container.appendChild(unameSpan);
  container.appendChild(mailSpan);

  element.appendChild(container);
}

loadUserData();
