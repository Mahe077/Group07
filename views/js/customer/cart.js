var localhost = "http://localhost/G7/Group07/";
function loadItemOptions(product_items) {
  let carts = document.querySelectorAll(".btn-cart");

  for (let i = 0; i < carts.length; i += 1) {
    carts[i].addEventListener("click", () => {
      setItems(product_items[i], i);
      // console.log("after setitems ");
      removeItem();
    });
    // console.log("after event listners ");
  }
  // console.log("in loadoprtion next call reove items");

}

function onloadCartNumbers() {
  let productNumbers = localStorage.getItem("cartNumbers");
  if (productNumbers) {
    if (productNumbers > 9) {
      document.querySelector(".fa-shopping-cart-span").textContent = "+9";
    } else {
      document.querySelector(".fa-shopping-cart-span").textContent =
        productNumbers;
    }
  }
  // console.log("in onloadCartNumbers ");
  return;
}

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

function onloadCart() {
  let cartItems = localStorage.getItem("productInCart");
  let cart_container = document.querySelector(".cart-body");
  cartItems = JSON.parse(cartItems);

  cart_container.innerHTML = "";
  if (cartItems != null) {
    for (var i in cartItems) {
      cart_container.innerHTML += `
			<div class="cart-item">
				<div class="id">
					<input type="hidden" id="cart_item_id" value="${cartItems[i].cartId}">
        </div>
        <span class="fas fa-times" id="remove-btn"></span>
				
				<img src="${localhost}${cartItems[i].image_path}" alt="">
          <div class="content">
            <h3>${cartItems[i].name}</h3>
            <div class="price">Rs ${cartItems[i].price * cartItems[i].InCart}/-
            </div>
          </div>    
      </div>`;
    }
  }
  // console.log("in onloadcart ***");
  onloadCartNumbers();
  return;
}

function setItems(product_item, i) {
  let cart_container = document.querySelector(".cart-body");
  let cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);

  if (cartItems != null) {
    if (cartItems[i] == undefined) {
      cartItems = {
        ...cartItems,
        [i]: product_item,
      };
      product_item.InCart = 1;
      product_item.cartId = i;
      cart_container.innerHTML += `
			<div class="cart-item">
      <div class="id">
      <input type="hidden" id="cart_item_id" value="${cartItems[i].cartId}">
    </div>
        <span class="fas fa-times" id="remove-btn"></span>
        <img src="${localhost}${product_item.image_path}" alt="">
        <div class="content">
            <h3>${product_item.name}</h3>
            <div class="price">Rs ${product_item.price}/-</div>
        </div>
      </div>	`;
      cartNumbers(cartItems[i], i);
      totalCost(cartItems[i]);
    } else {
      if (cartItems[i].amount > cartItems[i].InCart) {
        cartItems[i].InCart += 1;
        cartNumbers(cartItems[i], i);
        totalCost(cartItems[i]);
      } else {
        // console.log("out of range");
      }
    }
  } else {
    product_item.InCart = 1;
    product_item.cartId = i;
    cartItems = {
      [i]: product_item,
    };
    cart_container.innerHTML += `
			<div class="cart-item">
      <div class="id">
      <input type="hidden" id="cart_item_id" value="${cartItems[i].cartId}">
    </div>
        <span class="fas fa-times" id="remove-btn"></span>
        <img src="${localhost}${product_item.image_path}" alt="">
        <div class="content">
          <h3>${product_item.name}</h3>
          <div class="price">Rs ${product_item.price}/-</div>
        </div>
      </div>	`;
    cartNumbers(cartItems[i], i);
    totalCost(cartItems[i]);
  }
  localStorage.setItem("productInCart", JSON.stringify(cartItems));
  // console.log("in setitems ");
  return;
}

function totalCost(product) {
  let cartCost = localStorage.getItem("totalCost");
  if (cartCost != null) {
    cartCost = parseInt(cartCost);
    localStorage.setItem("totalCost",parseInt(cartCost + parseInt(product.price)));
  } else {
    localStorage.setItem("totalCost", parseInt(product.price));
  }
  return;
}

function removeItem() {
  // console.log("in remove items function 1 ");
  let removebtns = document.querySelectorAll("#remove-btn");
  let table_remover =document.querySelectorAll("#rd-4");

  let productInCart = localStorage.getItem("productInCart");
  let noOfItems = localStorage.getItem("cartNumbers");
  let cartCost = localStorage.getItem("totalCost");

  productInCart = JSON.parse(productInCart);


  for (let i = 0; i < removebtns.length; i++) {
    removebtns[i].addEventListener("click", () => {
      cartIdToRemove =
        removebtns[i].parentElement.childNodes[1].firstElementChild.value;
      cartIdToRemove = parseInt(cartIdToRemove);
      // console.log("deleting....", i, " id ", cartIdToRemove);

      for (var j in productInCart) {
        if (productInCart[j].cartId == cartIdToRemove) {

                  noOfItems = parseInt(noOfItems);
                  noOfItems = noOfItems - productInCart[j].InCart;
                  localStorage.setItem("cartNumbers", noOfItems);
                  document.querySelector(".fa-shopping-cart-span").textContent = noOfItems;
                  // console.log(noOfItems, cartCost);

                  cartCost = parseInt(cartCost);
                  cartCost -= productInCart[j].InCart * productInCart[j].price;
                  if(cartCost < 1){
                    cartCost = 0 ;
                  }
                  localStorage.setItem("totalCost", cartCost);
      
                  // console.log(cartCost);


          // console.log("items id: ", productInCart[j].id, i, "in cart :", productInCart[j].InCart, " cartId: ", productInCart[j].cartId);
          if (productInCart[j].cartId == cartIdToRemove) {
            // console.log("deletetion process...:", productInCart[j].cartId);
            delete productInCart[j];
            localStorage.setItem("productInCart", JSON.stringify(productInCart));
            removebtns[i].parentElement.style.display = "none";
            if(table_remover.length > 0){
              // console.log(table_remover);
              for (let k = 0; k < table_remover.length; k++) {
                if (table_remover[k].childNodes[1].childNodes[1].value == cartIdToRemove) {
                  table_remover[k].style.display = "none";
                }
              }
            }
            // console.log("deletetion complete...");
          }
        }
      }
    });
  }
  return;
}

onloadCart();
