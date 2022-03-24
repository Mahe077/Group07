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
      if (confirm("Are you sure you want to remove the item from your cart")) {
        cartIdToRemove =
          trash_alt[i].parentElement.parentElement.parentElement.childNodes[1]
            .childNodes[1].value;
        cartIdToRemove = parseInt(cartIdToRemove);
        // console.log("deleting....", i, " id ", cartIdToRemove);

        for (var j in productInCart) {
          if (productInCart[j].id == cartIdToRemove) {
            noOfItems = parseInt(noOfItems);
            noOfItems = noOfItems - productInCart[j].InCart;
            localStorage.setItem("cartNumbers", noOfItems);
            document.querySelector(".fa-shopping-cart-span").textContent =
              noOfItems;
            // console.log(noOfItems, cartCost);

            cartCost = parseFloat(cartCost);
            cartCost -= productInCart[j].InCart * productInCart[j].price;
            if (cartCost < 1) {
              cartCost = 0;
            }
            localStorage.setItem("totalCost", cartCost);
            total.innerHTML = `${parseFloat(cartCost).toFixed(2)}`;
            // console.log(cartCost);

            // buy_all button render start
            buy_all = document.querySelector("#buy_all");
            cartCout = Object.keys(productInCart).length;
            cartCout -= 1;
            // console.log(cartCout, buy_all);
            if (cartCout > 1) {
              buy_all.innerHTML =
                "<a href='Payment/RenderBuyAll/" +
                cartCout +
                "' class='btn'>Buy All</a>";
              // console.log(cartCout, buy_all);
            }
            //  buy_all button render end

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
              ].parentElement.parentElement.parentElement.style.display =
                "none";
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
                  }" name="amount" id="amount" value="${
        item.InCart
      }" onchange="changeInCart(${item.id},${item.price})"/>
              </div>
              <div class="col col-3">
                <div class="col col-4">Rs: ${(
                  parseFloat(item.price) * parseFloat(item.InCart)
                ).toFixed(2)}</div>
                  <div class="col col-6"></div>
                  <div class="col col-5" style="display: flex;justify-content:space-around;align-items: center;"> <i class="fas remove fa-trash-alt"></i>
                      <a href="${localhost}Payment/RenderBuy/${
        item.id
      }"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            `;
    });

    let total = document.querySelector("#stotal");
    let totalCost = localStorage.getItem("totalCost");
    total.innerHTML = `${parseFloat(totalCost).toFixed(2)}`;

    buy_all = document.querySelector("#buy_all");
    // console.log(Object.keys(cartItems).length, buy_all);

    buy_all.innerHTML =
      `<form action='Payment/RenderBuyAll/` +
      Object.keys(cartItems).length +
      `' method='post' class="buy_all_body">`;

    buy_all_body = document.querySelector(".buy_all_body");
    buy_all_body.innerHTML = "";

    cout = 0;
    Object.values(cartItems).map((item) => {
      cout += 1;
      buy_all_body.innerHTML += `<input type='hidden' name='item_${cout}' id='item_${cout}' value='${item.id}'>`;
    });
    buy_all_body.innerHTML += `<input type='submit' class='btn' value='Buy All'>`;
    buy_all.innerHTML += `</form>`;
  }
}

// displayCheckout();
function item_remover(id) {
  if (confirm("Are sure you want to remove the item")) {
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

        trash_alt[k].parentElement.parentElement.parentElement.style.display =
          "none";
        let total = document.querySelector("#stotal");
        // console.log(total.textContent);
        Total = parseFloat(total.textContent);
        Total =
          Total -
          parseFloat(
            trash_alt[k].parentElement.parentElement.parentElement
              .childNodes[11].childNodes[1].childNodes[1].textContent
          );
        total.innerHTML = `${parseFloat(Total).toFixed(2)}`;
        DeleteUpdate(id);
      }
    }
  }
}

function ClearAll() {
  // console.log("hello")
  localStorage.clear("productInCart");
  let table_body = document.querySelector(".table-body");
  table_body.innerHTML = "";
  document.querySelector(".fa-shopping-cart-span").textContent = 0;
  let total = document.querySelector("#stotal");
  total.innerHTML = `0`;

  document.querySelector("#buy_all").style.display = "none";
  DeleteUpdate(-1);
}

function changeInCart(id, Unitprice) {
  // console.log("Incart need to change");
  let qtyField = document.querySelectorAll("#amount");
  // console.log(qtyField[1].parentElement.parentElement.childNodes[1].childNodes[1].value);
  for (let index = 0; index < qtyField.length; index++) {
    if (
      id ==
      qtyField[index].parentElement.parentElement.childNodes[1].childNodes[1]
        .value
    ) {
      // console.log(qtyField[index],parseInt(qtyField[index].value)*Unitprice);
      newqty = qtyField[index].value;
      qtyField[
        index
      ].parentElement.parentElement.childNodes[7].childNodes[1].textContent =
        "Rs. " + (parseInt(newqty) * Unitprice).toFixed(2);
      let buttonArea =
        qtyField[index].parentElement.parentElement.childNodes[7].childNodes[3];
      qtyField[
        index
      ].parentElement.parentElement.childNodes[7].childNodes[3].innerHTML = `<button class = "btn" onclick="updateCart(${id},${newqty},1)" style="width:30px"><i class="fas fa-cloud-upload-alt"></i></button>`;
    }
  }
}
