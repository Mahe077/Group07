var localhost = "http://localhost/G7/Group07/";
function tableItemsRemomver() {
  // console.log("in tableItemsRemomver items function 1 ");
  let trash_alt = document.querySelectorAll(".fa-trash-alt");
  let total = document.querySelector("#stotal");

  let productInCart = localStorage.getItem("productInCart");
  let noOfItems = localStorage.getItem("cartNumbers");
  let cartCost = localStorage.getItem("totalCost");

  productInCart = JSON.parse(productInCart);

  // console.log(trash_alt);
  for (let i = 0; i < trash_alt.length; i++) {
    trash_alt[i].addEventListener("click", () => {
      cartIdToRemove =
        trash_alt[i].parentElement.parentElement.parentElement.childNodes[1]
          .childNodes[1].value;
      cartIdToRemove = parseInt(cartIdToRemove);
      //console.log("deleting....", i, " id ", cartIdToRemove);

      for (var j in productInCart) {
        if (productInCart[j].id == cartIdToRemove) {
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
          total.innerHTML = `${parseInt(cartCost)}`;
          // console.log(cartCost);

          // console.log("items id: ", productInCart[j].id, i, "in cart :", productInCart[j].InCart, " cartId: ", productInCart[j].cartId);
          if (productInCart[j].id == cartIdToRemove) {
            // console.log("deletetion process...:", productInCart[j].cartId);
            delete productInCart[j];
            localStorage.setItem(
              "productInCart",
              JSON.stringify(productInCart)
            );
            trash_alt[
              i
            ].parentElement.parentElement.parentElement.style.display = "none";
            cart_items = document.querySelectorAll(".cart-item");
            if (cart_items.length > 0) {
              // console.log(cart_items);
              for (let k = 0; k < cart_items.length; k++) {
                if (
                  cart_items[k].childNodes[1].childNodes[1].value ==
                  cartIdToRemove
                ) {
                  cart_items[k].style.display = "none";
                }
              }
            }
            // console.log("deletetion complete...");
            DeleteUpdate(cartIdToRemove);
          }
        }
      }
    });
  }
  // return;
  // onloadCart();
}
function displayCheckout() {
  let cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);
  cartTableBody = document.querySelector(".checkout");

  if (cartItems && cartTableBody) {
    cartTableBody.innerHTML = "";
    Object.values(cartItems).map((item) => {
      // console.log(item);
      cartTableBody.innerHTML += `
            <div class="row row-data" id="rd-4">
              <div class="id">
              <input type="hidden" id="cart_item_id" value="${item.id}">
              </div>
              <div class="col col-1">
                  ${item.name}
                 
              </div>
              <div class="col col-2">
                  <input type="number" min="1" max="${
                    item.amount
                  }" name="amount" value="${item.InCart}" />
              </div>
              <div class="col col-3">
                <div class="col col-4">Rs: ${
                  (parseFloat(item.price) * parseFloat(item.InCart)).toFixed(2)
                }</div>
                  <div class="col col-5" style="display: flex;justify-content:space-around;align-items: center;"> <i class="fas remove fa-trash-alt"></i>
                      <a href="${localhost}Payment/RenderBuy/${item.id}"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            `;
    });

    let total = document.querySelector("#stotal");
    let totalCost = localStorage.getItem("totalCost");
    total.innerHTML = `${parseFloat(totalCost).toFixed(2)}`;
  }
}

// displayCheckout();
function item_remover(id) {
  // console.log("hello", id);
  let trash_alt = document.querySelectorAll(".fa-trash-alt");
  // console.log(trash_alt);
  for (let k = 0; k < trash_alt.length; k++) {
    if (
      trash_alt[k].parentElement.parentElement.parentElement.childNodes[1]
        .childNodes[1].value == id
    ) {
      // send request to remove the items from here
      var itemToRemove = new FormData();
      itemToRemove.append(
        "itemToRemove",
        trash_alt[k].parentElement.parentElement.parentElement.childNodes[3]
          .childNodes[1].value
      );
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "Order/Remove");
      xhr.send(itemToRemove);
      // console.log(
      //   typeof parseInt(
      //     trash_alt[k].parentElement.parentElement.parentElement.childNodes[9]
      //       .childNodes[1].childNodes[1].textContent
      //   )
      // );
      trash_alt[k].parentElement.parentElement.parentElement.style.display =
        "none";
      let total = document.querySelector("#stotal");
      // console.log(total.textContent);
      Total = parseInt(total.textContent);
      Total =
        Total -
        parseInt(
          trash_alt[k].parentElement.parentElement.parentElement.childNodes[9]
            .childNodes[1].childNodes[1].textContent
        );
      total.innerHTML = `${parseInt(Total)}`;
      DeleteUpdate(id);
    }
  }
}

function ClearAll(){
  // console.log("hello")
  localStorage.clear("productInCart");
  let table_body = document.querySelector(".table-body");
  table_body.innerHTML = "";
  document.querySelector(".fa-shopping-cart-span").textContent = 0;
  let total = document.querySelector("#stotal");
  total.innerHTML = `0`;
  DeleteUpdate(-1);
}

