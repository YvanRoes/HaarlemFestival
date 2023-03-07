async function loadData() {
  parentElement = document.getElementById('contentItemsWrapper');
  parentElement.innerHTML = '';

  let objects;
  const response = await fetch('http://localhost/api/users');
  objects = await response.json();
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

loadData();
