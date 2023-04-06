<body class="w-[100vw] h-[100vh] overflow-x-hidden bg-[#F7F7FB] flex justify-center">
  <?php
  include __DIR__ . '/../header.php';
  generateHeader('login', 'dark');
  ?>

  <div class="" id="content-container">
    <div class="w-full h-fit flex flex-col items-center justify-center mt-[200px] backdrop-blur bg-white/50 rounded-md border-white/25 border-2 drop-shadow-xl">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4" onclick="create_token()">
        Create New Token
      </button>
      <div class="flex flex-col gap-10 p-4" id="tokenList">

      </div>
    </div>
  </div>


  <script>
    async function get_all_tokens() {
      const response = await fetch('http://localhost/api/api_tokens');
      objects = response.json();
      console.log(objects);

      display_tokens(objects);
    }


    async function display_tokens(objects) {
      parentElement = document.getElementById('tokenList');
      parentElement.innerHTML = '';
      tokens = await objects;
      for (let i = 0; i < tokens.length; i++) {
        create_token_container(parentElement, tokens[i].id, tokens[i].uuid);
      }
    }

    function create_token_container(parentElement, id, uuid) {
      wrapper = document.createElement('div');
      wrapper.classList.add('grid', 'grid-cols-4', 'bg-white', 'p-2', 'rounded-md');

      idSpan = document.createElement('span');
      idSpan.classList.add('h-full',
        'items-center',
        'justify-center',
        'flex');
      idSpan.innerHTML = id;

      uuidSpan = document.createElement('span');
      uuidSpan.innerHTML = uuid;
      uuidSpan.classList.add('h-full',
        'items-center',
        'justify-center',
        'flex');

      //remove session
      buttonRemove = document.createElement('button');
      buttonRemove.innerHTML = 'Remove';
      buttonRemove.classList.add(
        'm-2',
        'py-2',
        'px-4',
        'rounded-md',
        'text-[#F7F7FB]',
        'bg-red-500',
        'w-fit',
        'col-start-4'
      );
      buttonRemove.addEventListener('click', () => {
        remove_token(id);
      });


      wrapper.appendChild(idSpan);
      wrapper.appendChild(uuidSpan);
      wrapper.appendChild(buttonRemove);
      parentElement.appendChild(wrapper);
    }

    async function remove_token(id) {

      data = {
        post_type: 'delete',
        id: id
      }
      const response = await fetch('http://localhost/api/api_tokens', {
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
      }).then(get_all_tokens())
    }

    function create_token() {
      data = {
        post_type: 'create'
      }
      fetch('http://localhost/api/api_tokens', {
        method: 'post',
        body: JSON.stringify(data)
      }).then(get_all_tokens());
    }
    get_all_tokens();
  </script>
</body>