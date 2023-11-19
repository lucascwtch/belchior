let products = {
  data: [
    {
      "nomeProduto": "Camiseta Branca Comum",
      "nomeLoja": "Loja 1",
      "categoria": "Camisetas",
      "preço": "30",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 25
    },
    {
      "nomeProduto": "Saia Curta Bege",
      "nomeLoja": "Loja 2",
      "categoria": "Calças",
      "preço": "49",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 15
    },
    {
      "nomeProduto": "Smartwatch Esportivo",
      "nomeLoja": "Loja 3",
      "categoria": "Relógios",
      "preço": "99",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 40
    },
    {
      "nomeProduto": "Top Tricot Básico",
      "nomeLoja": "Loja 4",
      "categoria": "Bonés",
      "preço": "29",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 20
    },
    {
      "nomeProduto": "Jaqueta de Couro Preta",
      "nomeLoja": "Loja 5",
      "categoria": "Calças",
      "preço": "129",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 12
    },
    {
      "nomeProduto": "Calças Estilosas Rosa",
      "nomeLoja": "Loja 6",
      "categoria": "Bonés",
      "preço": "89",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 25
    },
    {
      "nomeProduto": "Básico",
      "nomeLoja": "Loja 7",
      "categoria": "Bonés",
      "preço": "29",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 30
    },
    {
      "nomeProduto": "Calças Confortáveis Cinza",
      "nomeLoja": "Loja 8",
      "categoria": "Calças",
      "preço": "49",
      "imagem": "https://via.placeholder.com/150",
      "estoque": 18
    }
  ],
};


document.addEventListener("DOMContentLoaded", () => {
  // Inicialmente, exibe todos os produtos
  displayAllProducts();
});

function createProductCard(product) {
  // Criação do Card
  let card = document.createElement("div");
  card.classList.add("card", product.categoria, "hide", "responsive-card");

  // Container de imagem
  let imgContainer = document.createElement("div");
  imgContainer.classList.add("image-container", "responsive-image-container");

  // Tag de imagem
  let image = document.createElement("img");
  image.setAttribute("src", product.imagem);
  imgContainer.appendChild(image);
  card.appendChild(imgContainer);

  // Container
  let container = document.createElement("div");
  container.classList.add("container", "responsive-container");

  // Nome do produto
  let name = document.createElement("h5");
  name.classList.add("product-name", "responsive-product-name");
  name.innerText = product.nomeProduto.toUpperCase();
  container.appendChild(name);

  // Nome da loja e Estoque
  let storeAndStock = document.createElement("p");
  storeAndStock.classList.add("store-and-stock", "responsive-store-and-stock");
  storeAndStock.innerHTML = `<span class="store-name">Loja: ${product.nomeLoja.toLowerCase()}</span> | Estoque: ${product.estoque} `;
  container.appendChild(storeAndStock);

  // Preço
  let price = document.createElement("h6");
  price.classList.add("responsive-price");
  price.innerText = "R$" + product.preço;
  container.appendChild(price);

  // Botões
  let buttonsContainer = document.createElement("div");
  buttonsContainer.classList.add("buttons-container", "responsive-buttons-container");

  let addToCartButton = document.createElement("button");
  addToCartButton.innerHTML = '<i class="fas fa-shopping-cart"></i>';
  addToCartButton.addEventListener("click", () => addToCart(product.nomeProduto));

  let addToFavoritesButton = document.createElement("button");
  addToFavoritesButton.innerHTML = '<i class="fas fa-star"></i>';
  addToFavoritesButton.addEventListener("click", () => addToFavorites(product.nomeProduto));

  buttonsContainer.appendChild(addToCartButton);
  buttonsContainer.appendChild(addToFavoritesButton);

  container.appendChild(buttonsContainer);

  card.appendChild(container);
  document.getElementById("products").appendChild(card);
}

function displayAllProducts() {
  products.data.forEach(createProductCard);
}

function updateColumns() {
  let elements = document.querySelectorAll(".card");
  let columns = 4; // Número padrão de colunas

  // Verifica o tamanho da tela e ajusta o número de colunas
  if (window.innerWidth <= 720) {
    columns = 2;
  }

  let gridTemplateColumns = `repeat(${columns}, 1fr)`;
  document.getElementById("products").style.gridTemplateColumns = gridTemplateColumns;

  elements.forEach((element) => {
    element.classList.remove("hide");
  });
}
//parameter passed from button (Parameter same as category)
function filterProduct(value) {
  //Button class code
  let buttons = document.querySelectorAll(".button-value");
  buttons.forEach((button) => {
    //check if value equals innerText
    if (value.toUpperCase() == button.innerText.toUpperCase()) {
      button.classList.add("actives");
    } else {
      button.classList.remove("actives");
    }
  });

  //select all cards
  let elements = document.querySelectorAll(".card");
  //loop through all cards
  elements.forEach((element) => {
    //display all cards on 'all' button click
    if (value == "todos") {
      element.classList.remove("hide");
    } else {
      //Check if element contains category class
      if (element.classList.contains(value)) {
        //display element based on category
        element.classList.remove("hide");
      } else {
        //hide other elements
        element.classList.add("hide");
      }
    }
  });
}

//Search button click
document.getElementById("search").addEventListener("click", () => {
  //initializations
  let searchInput = document.getElementById("search-input").value;
  let elements = document.querySelectorAll(".product-name");
  let cards = document.querySelectorAll(".card");

  //loop through all elements
  elements.forEach((element, index) => {
    //check if text includes the search value
    if (element.innerText.includes(searchInput.toUpperCase())) {
      //display matching card
      cards[index].classList.remove("hide");
    } else {
      //hide others
      cards[index].classList.add("hide");
    }
  });
});

//Initially display all products
window.onload = () => {
  filterProduct("todos");
};