async function loadData() {
    parentElement = document.getElementById('contentItemsWrapper');
    parentElement.innerHTML = '';
  
    let objects;
    const response = await fetch(
      'http://localhost/api/users'
    );
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

function createUserContainer(element, id, username, email, passwd){

    container = document.createElement('span');
    container.classList.add('bg-white', 'p-2', 'shadow-md', 'rounded-md','grid', 'grid-cols-4', 'md:grid-cols-2', 'grid-rows-1', 'md:grid-rows-2');
    idSpan = document.createElement('span');
    idSpan.innerHTML = id;
    idSpan.classList.add('col-span-1')

    unameSpan = document.createElement('span');
    unameSpan.innerHTML = username;
    unameSpan.classList.add('col-span-1');

    mailSpan = document.createElement('span');
    mailSpan.innerHTML = email;
    mailSpan.classList.add('col-span-1');

    passwdSpan = document.createElement('span');
    passwdSpan.innerHTML = passwd;
    passwdSpan.classList.add('col-span-1');

    container.appendChild(idSpan);
    container.appendChild(unameSpan);
    container.appendChild(mailSpan);
    container.appendChild(passwdSpan);

    element.appendChild(container);
}

loadData();