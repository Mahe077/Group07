var localhost = "http://localhost/G7/Group07/";

// ******************************************************* loadItemOptions(product_items) *****************************************************************

function loadItemOptions(product_items) {
  let carts = document.querySelectorAll(".btn-cart");

  for (let i = 0; i < carts.length; i += 1) {
    carts[i].addEventListener("click", () => {
      setItems(product_items[i], i);
      //console.log("after setitems ");
      removeItem();
    });
    // console.log("after event listners ");
  }
  // console.log("in loadoprtion next call reove items");
}

// ******************************************************* onloadShowCartNumbers(products) ********************************************************************

function onloadShowCartNumbers(products) {
  // console.log(products);
  cart_numbers = 0;
  for (j in products) {
    cart_numbers += parseInt(products[j].InCart);
    // console.log(products[j].InCart);
    if (cart_numbers > 9) {
      document.querySelector(".fa-shopping-cart-span").textContent = "+9";
    } else {
      document.querySelector(".fa-shopping-cart-span").textContent =
        cart_numbers;
    }
  }
  localStorage.setItem("cartNumbers", cart_numbers);
  return;
}

// ******************************************************* cartNumbers(product_item, i) ******************************************************************

function cartNumbers(product_item, i) {
  let productNumbers = localStorage.getItem("cartNumbers");
  productNumbers = parseInt(productNumbers);

  if (productNumbers) {
    localStorage.setItem("cartNumbers", productNumbers + 1);
    if (productNumbers > 8) {
      document.querySelector(".fa-shopping-cart-span").textContent = "+9";
    } else {
      document.querySelector(".fa-shopping-cart-span").textContent =
        productNumbers + 1;
    }

  } else {
    localStorage.setItem("cartNumbers", 1);
    document.querySelector(".fa-shopping-cart-span").textContent = 1;
  }
  return;
}

// ******************************************************* onloadCart() **********************************************************************************

function onloadCart() {
  // console.log("oloadsdsfsdf");
  // load cart from the database
  var xhr = new XMLHttpRequest();
  xhr.open("POST", localhost+"Checkout/Load");
  xhr.onload = function () {
    // console.log(this.response,"HERE");
    if (JSON.parse(this.response) != null) {
      // console.log(this.response);
      var cart = JSON.parse(this.response);
      for (let l = 0; l < cart[0].length; l++) {
        for (let k = 0; k < cart[1].length; k++) {
          if (cart[1][k][0] == cart[0][l].id) {
            onloadsetItems(cart[0][l], cart[1][k][1]);
          }
        }
      }
      let cartItems = localStorage.getItem("productInCart");
      cartItems = JSON.parse(cartItems);
      onloadShowCartNumbers(cartItems);
      onloadtotalCost(cartItems);
    }
  };
  xhr.send();
  return;
}

// ******************************************************* onloadtotalCost() ******************************************************************************

function onloadtotalCost(products) {
  let Cost = 0;
  for (j in products) {
    Cost += parseFloat((products[j].price * products[j].InCart).toFixed(2));
    //console.log(products[j].price, products[j].InCart, Cost);
  }
  localStorage.setItem("totalCost", Cost);
  return;
}

// ******************************************************* onloadsetItems(product_item, qty) *************************************************************

function onloadsetItems(product_item, qty) {
  let cart_container = document.querySelector(".cart-body");
  let cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);

  if (cartItems != null) {
    // console.log("cart not null")
    if (cartItems[product_item.id] == undefined) {
      cartItems = {
        ...cartItems,
        [product_item.id]: product_item,
      };
      product_item.InCart = qty;
      // console.log("onloaditem undefied",product_item.id)
      cart_container.innerHTML += `
			<div class="cart-item">
      <div class="id">
      <input type="hidden" id="cart_item_id" value="${
        cartItems[product_item.id].id
      }">
    </div>
        <span class="fas fa-times" id="remove-btn"></span>
        <img src="${localhost}${product_item.image_path}" alt="">
        <div class="content">
            <h3>${product_item.name}</h3>
            <div class="price">Rs ${product_item.price}/-</div>
        </div>
      </div>	`;
    } else {
      // console.log("onloaditem defined")
      cart_container.innerHTML += `
			<div class="cart-item">
      <div class="id">
      <input type="hidden" id="cart_item_id" value="${
        cartItems[product_item.id].id
      }">
    </div>
        <span class="fas fa-times" id="remove-btn"></span>
        <img src="${localhost}${product_item.image_path}" alt="">
        <div class="content">
            <h3>${product_item.name}</h3>
            <div class="price">Rs ${product_item.price}/-</div>
        </div>
      </div>	`;
    }
  } else {
    product_item.InCart = qty;
    cartItems = {
      [product_item.id]: product_item,
    };
    cart_container.innerHTML += `
			<div class="cart-item">
      <div class="id">
      <input type="hidden" id="cart_item_id" value="${
        cartItems[product_item.id].id
      }">
    </div>
        <span class="fas fa-times" id="remove-btn"></span>
        <img src="${localhost}${product_item.image_path}" alt="">
        <div class="content">
          <h3>${product_item.name}</h3>
          <div class="price">Rs ${product_item.price}/-</div>
        </div>
      </div>	`;
    // console.log("onloadcart null",product_item.InCart)
  }
  localStorage.setItem("productInCart", JSON.stringify(cartItems));

  return;
}

// ******************************************************* setItems(product_item, i) *********************************************************************

function setItems(product_item, i) {
  let cart_container = document.querySelector(".cart-body");
  let cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);

  if (cartItems != null) {
    if (cartItems[product_item.id] == undefined) {
      cartItems = {
        ...cartItems,
        [product_item.id]: product_item,
      };
      product_item.InCart = 1;
      // product_item.id = i;
      cart_container.innerHTML += `
			<div class="cart-item">
      <div class="id">
      <input type="hidden" id="cart_item_id" value="${
        cartItems[product_item.id].id
      }">
      </div>
        <span class="fas fa-times" id="remove-btn"></span>
        <img src="${localhost}${product_item.image_path}" alt="">
        <div class="content">
            <h3>${product_item.name}</h3>
            <div class="price">Rs ${product_item.price}/-</div>
        </div>
      </div>	`;
      cartNumbers(cartItems[product_item.id], i);
      totalCost(cartItems[product_item.id]);
      
      // update the cartitem table when cart is not empty
      // item is not in the table status = 0
      AddUpdate(product_item.id,1,0);

    } else {
      if (
        cartItems[product_item.id].amount > cartItems[product_item.id].InCart
      ) {
        cartItems[product_item.id].InCart += 1;
        cartNumbers(cartItems[product_item.id], i);
        totalCost(cartItems[product_item.id]);
        // update the cartitem table when cart is not empty
        // item is in the table qty must change status = 1
        AddUpdate(product_item.id,parseInt(cartItems[product_item.id].InCart),1);

      } else {
        // console.log("out of range");
      }
    }
  } else {
    product_item.InCart = 1;
    // product_item.id = i;
    cartItems = {
      [product_item.id]: product_item,
    };
    cart_container.innerHTML += `
			<div class="cart-item">
      <div class="id">
      <input type="hidden" id="cart_item_id" value="${
        cartItems[product_item.id].id
      }">
    </div>
        <span class="fas fa-times" id="remove-btn"></span>
        <img src="${localhost}${product_item.image_path}" alt="">
        <div class="content">
          <h3>${product_item.name}</h3>
          <div class="price">Rs ${product_item.price}/-</div>
        </div>
      </div>	`;
    cartNumbers(cartItems[product_item.id], i);
    totalCost(cartItems[product_item.id]);

    // update the cartitem table when cart is empty
    // item is not in the table status = 2
    AddUpdate(product_item.id,1,2);

  }
  localStorage.setItem("productInCart", JSON.stringify(cartItems));
  // console.log("in setitems ");
  return;
}

// ******************************************************* totalCost(product) ****************************************************************************

function totalCost(product) {
  let cartCost = localStorage.getItem("totalCost");
  if (cartCost != null) {
    cartCost = parseFloat(cartCost);
    localStorage.setItem("totalCost", (cartCost + parseFloat(product.price)).toFixed(2));
  } else {
    localStorage.setItem("totalCost", parseFloat(product.price));
  }
  return;
}

// ******************************************************* removeItem() **********************************************************************************

function removeItem() {
  // console.log("in remove items function 1 ");
  let removebtns = document.querySelectorAll("#remove-btn");
  let table_remover = document.querySelectorAll("#rd-4");

  let productInCart = localStorage.getItem("productInCart");
  let noOfItems = localStorage.getItem("cartNumbers");
  let cartCost = localStorage.getItem("totalCost");

  productInCart = JSON.parse(productInCart);

  for (let i = 0; i < removebtns.length; i++) {
    removebtns[i].addEventListener("click", () => {
      itemToRemove =
        removebtns[i].parentElement.childNodes[1].firstElementChild.value;
      itemToRemove = parseInt(itemToRemove);
      // console.log("deleting....", i, " id ", itemToRemove);

      for (var j in productInCart) {
        if (productInCart[j].id == itemToRemove) {
          noOfItems = parseInt(noOfItems);
          noOfItems = noOfItems - productInCart[j].InCart;
          localStorage.setItem("cartNumbers", noOfItems);
          document.querySelector(".fa-shopping-cart-span").textContent =
            noOfItems;
          // console.log(noOfItems, cartCost);

          cartCost = parseInt(cartCost);
          cartCost -= productInCart[j].InCart * productInCart[j].price;
          if (cartCost < 1) {
            cartCost = 0;
          }
          localStorage.setItem("totalCost", cartCost);

          // console.log(cartCost);

          // console.log("items id: ", productInCart[j].id, i, "in cart :", productInCart[j].InCart, " id: ", productInCart[j].id);
          if (productInCart[j].id == itemToRemove) {
            // console.log("deletetion process...:", productInCart[j].id);
            delete productInCart[j];
            localStorage.setItem(
              "productInCart",
              JSON.stringify(productInCart)
            );
            removebtns[i].parentElement.style.display = "none";
            if (table_remover.length > 0) {
              // console.log(table_remover);
              for (let k = 0; k < table_remover.length; k++) {
                if (
                  table_remover[k].childNodes[1].childNodes[1].value ==
                  itemToRemove
                ) {
                  table_remover[k].style.display = "none";
                }
              }
            }
            // console.log("deletetion complete...");
            DeleteUpdate(itemToRemove);
          }
        }
      }
    });
  }
  return;
}

function DeleteUpdate(itemID) {
  var data = new FormData();
  data.append("data", parseInt(itemID));
  // console.log(itemID,data);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Checkout/Delete");
  // xhr.onload = function () {
  //   console.log(this.response);
  // };
  xhr.send(data);
  return;
}

function AddUpdate(itemID,qty,status) {
  var data = new FormData();
  data.append("itemID", parseInt(itemID));
  data.append("qty", parseInt(qty));
  data.append("status",parseInt(status));
  // console.log(itemID,data);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Checkout/Add");
  // xhr.onload = function () {
  //   console.log(this.response);
  // };
  xhr.send(data);
  return;
}

onloadCart();
