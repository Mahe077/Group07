var localhost = "http://localhost/G7/Group07/";
function display_orders(id, orderType) {
  buttons = document.querySelectorAll(".order_typr_links")
  for (let btn = 0; btn < buttons.length; btn++) {
    buttons[btn].style.background = "#228693";
  }
  if (orderType == 0) {
    button = document.querySelector("#pending");
  } else if (orderType == 1) {
    button = document.querySelector("#to_deliver");
  } else if (orderType == 2) {
    button = document.querySelector("#cancel");
  } else if (orderType == 6) {
    button = document.querySelector("#preorder_req");
  } else if (orderType == 7) {
    button = document.querySelector("#preorder_acc");
  } else if (orderType == 8) {
    button = document.querySelector("#to_review");
  }
  // console.log(button);
  button.style.background = "red";
  var data = new FormData();
  data.append("search", id);
  data.append("orderType", orderType);
  // console.log(id,data);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Order/loadAll");
  xhr.onload = function () {
    Total = 0;
    let products = document.querySelector(".table-body");

    let noOfItems = localStorage.getItem("cartNumbers");
    let cartCost = localStorage.getItem("totalCost");

    var search = JSON.parse(this.response);
    // console.log(search);
    products.innerHTML = "";
    if (search !== null) {
      let count = 0;
      for (let s of search) {
        if (s.status == 0 || s.status == 6) {
          cartItems = localStorage.getItem("productInCart");
          cartItems = JSON.parse(cartItems)
          if (cartItems != null) {
            if (cartItems[s.item_id] != undefined) {
              //  remove the item on cart from here
              noOfItems = parseInt(noOfItems);
              // console.log(noOfItems, cartItems[s.item_id].InCart,s.item_id);
              noOfItems = noOfItems - parseInt(cartItems[s.item_id].InCart);
              // console.log(noOfItems, cartCost);
              localStorage.setItem("cartNumbers", noOfItems);
              document.querySelector(".fa-shopping-cart-span").textContent = noOfItems;
              // console.log(noOfItems, cartCost);
              cartCost = parseInt(cartCost);
              cartCost -=
                cartItems[s.item_id].InCart * cartItems[s.item_id].price;
              if (cartCost < 1) {
                cartCost = 0;
              }
              localStorage.setItem("totalCost", cartCost);
              // console.log(cartItems[s.item_id])
              delete cartItems[s.item_id];
              localStorage.setItem(
                "productInCart",
                JSON.stringify(cartItems)
              );
              DeleteUpdate(s.item_id);
            }
          }
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count}">
                </div>
                <div class="Item_id">
                    <input type="hidden" id="cart_item_id" value="${s.order_id
            }">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                ${s.qty
            }
                </div>
                <div class="col col-3">
                    <div class="col col-4">Rs:<span>${parseFloat(
              s.total_payment
            ).toFixed(2)}</span>
                    </div>
                    <div class="col col-5"> 
                        <i class="fas remove fa-trash-alt" onclick="item_remover(${count++})"></i>
                    </div>
                </div>
            </div>`;
          Total = Total + parseFloat(s.total_payment);
        } else {
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count++}">
                </div>
                <div class="Item_id">
                    <input type="hidden" id="cart_item_id" value="${s.order_id
            }">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                   ${s.qty
            }
                </div>
                <div class="col col-3">
                <div class="col col-4">Rs:<span>${parseFloat(
              s.total_payment
            ).toFixed(2)}</span>
                    </div>
                    <div class="col col-5">
                    ${s.status == 2 ? `<i class='fas fa-check-circle' style='color:red'>` : s.status == 8 ? `<a href='Review/loadpage/${s.order_id}'><i class='fas fa-comment'></i></a>` :"<i class='fas fa-check-circle'>"}</i>
                    </div>
                </div>
            </div>`;
          Total = Total + parseFloat(s.total_payment);
        }
      }
    }
    let total = document.querySelector("#stotal");
    total.innerHTML = `${parseFloat(Total).toFixed(2)}`;
  };
  xhr.send(data);

  return false;
}
