
// Данные товаров, полученные из базы данных

let products = []
let productContainer = document.getElementById("product-list");
let loading = document.getElementById("loading")


fetch('date.php')
    .then(response => response.json())
    .then(products => {
        loading.style.display = "none";
        // Использование данных в JavaScript
        products.forEach(product => {
            console.log(product.id);
            console.log('Название товара:', product.name);
            console.log('Цена:', product.price);

            let card = document.createElement("div");
            card.classList.add("product-card");

            let name = document.createElement("h3");
            name.textContent = product.name;
            card.appendChild(name);

            let price = document.createElement("p");
            price.textContent = "Цена: " + product.price + " руб.";
            card.appendChild(price);

             let shop = document.createElement("a");
             shop.href = "itemForm.php?id=" + product.id;

             shop.textContent = "ПЕРЕЙТИ К ТОВАРУ";
             card.appendChild(shop);


            productContainer.appendChild(card);

        });

    })
    .catch(error => console.error(error));


//меню для регистрации и входа
let divWithMenu = document.querySelector('#register');
let menu = document.querySelector('.menu');

    // Обработчик клика на блок div
divWithMenu.addEventListener('click', function() {
    // Переключение видимости меню
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    }   else {
        menu.style.display = 'block';
            }
    })
//вход
let modal = document.getElementById("modal");

function openModal() {
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
};