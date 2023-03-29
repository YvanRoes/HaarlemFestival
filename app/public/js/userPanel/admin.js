const inputSearch = document.getElementById('searchInput');

async function loadUserData() {
  var objects = await getDataFromUserAPI();
  createUserList(objects);
  addUserSearch();

}

async function loadCustomers() {
  customers = await getUsersByRole(0);
  createUserList(customers);
  loadInputSearch();
}

async function loadTicketManagement() {
  //  tickets = await getDataFromTicketAPI();
  console.log('loading ticket management')
  elements = document.getElementById('contentItemsWrapper');
  elements.innerHTML = '';
  contentWrapper = document.getElementById('ContentWrapper');
  console.log('remvoing search input')
  console.log(contentWrapper)
  contentWrapper.removeChild(document.getElementById('searchInput'));
  createTicketsForm();
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

async function createTicketsForm() {
  parentElement = document.getElementById('contentItemsWrapper');

  //
/* <form>
  <div class="relative z-0 w-full mb-6 group">
      <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
  </div>
  <div class="relative z-0 w-full mb-6 group">
      <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
  </div>
  <div class="relative z-0 w-full mb-6 group">
      <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
  </div>
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
    </div>
  </div>
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (123-456-7890)</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company (Ex. Google)</label>
    </div>
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form> */

  //create form
  console.log('creating form')
  form = document.createElement('form');
  form.setAttribute('id', 'ticketForm');
  //create input fields
  console.log('creating input fields')
  inputEvent = document.createElement('div');
  inputEvent.setAttribute('class', 'items-center justify-between hidden w-full text-sm md:flex md:w-auto md:order-1');
  inputEvent.setAttribute('id', 'megamenu');


  inputTitle = document.createElement('input');
  inputTitle.classList.add('p-2', 'm-2', 'rounded-md', 'border-2', 'border-gray-300', 'focus:outline-none', 'focus:border-slate-800');
  inputTitle.setAttribute('type', 'text');
  inputTitle.setAttribute('placeholder', 'Title');
  inputTitle.setAttribute('id', 'ticketTitle');
  form.appendChild(inputTitle);

  console.log(form)
  console.log(parentElement)
  console.log('appending form')
  parentElement.appendChild(form);

};

async function loadEmployees() {
  employees = await getUsersByRole(1);
  createUserList(employees);
  loadInputSearch();
}

async function loadAdmins() {
  admins = await getUsersByRole(9);
  createUserList(admins);
  loadInputSearch();
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
  searchInput.addEventListener('keyup', (event) => {
    const { value } = event.target;
    searchUsers(value);
  });
}

async function searchUsers(value) {
  objects = await getDataFromUserAPI();
  var newArr = [];
  for (element of objects) {
    if (element.username.includes(value)) newArr.push(element);
    if (element.id.toString().includes(value)) newArr.push(element);
    //if (element.email.includes(value)) newArr.push(element);
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

async function loadInputSearch() {
  if (document.getElementById('searchInput')) {
    document.getElementById('searchInput').remove();
  }
  parentElement = document.getElementById('ContentWrapper');
  parentElement.insertBefore(inputSearch, parentElement.childNodes[0]);
}