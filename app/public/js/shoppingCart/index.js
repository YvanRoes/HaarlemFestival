
generateUserItems();

async function getItems() {
    const response = await fetch('http://localhost/api/tickets');
    const data = await response.json();

    return data;
}

async function getUserItems(user_id) {
    data = getItems();
    userData = [];
    for (let i = 0; i <= data.length; i++) {
        if (data[i].user_id == user_id) {
            userData.push(data[i]);
        }
    }
    return userData;

}

async function generateUserItems() {
    tickets = await getUserItems();

    for (let i = 0; i < tickets.length; i++) {
        createItems(tickets[i]);
    }

}

function createItems(ticket) {
    const wrapper = document.getElementById('items-wrapper');

    const itemContainer = document.createElement('div');
    itemContainer.classList.add('item-container');

    const itemTitle = document.createElement('div');
    itemTitle.classList.add('item-title');
    itemTitle.innerHTML = ticket.id;

    const itemPrice = document.createElement('div');
    itemPrice.classList.add('item-price');
    itemPrice.innerHTML = ticket.price;

    const itemQuantity = document.createElement('div');
    itemQuantity.classList.add('item-quantity');
    itemQuantity.innerHTML = ticket.quantity;

    const itemTotal = document.createElement('div');
    itemTotal.classList.add('item-total');
    itemTotal.innerHTML = ticket.quantity * ticket.price;


    itemContainer.appendChild(itemTitle);
    itemContainer.appendChild(itemPrice);
    itemContainer.appendChild(itemQuantity);
    itemContainer.appendChild(itemTotal);

    wrapper.appendChild(itemContainer);


}
