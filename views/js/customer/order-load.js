var localhost = "http://localhost/G7/Group07/";
function orderload(id) {
  var data = new FormData();
  data.append("search", id);
  // console.log(id,data);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Order/loadAll");
  xhr.onload = function () {
    Total = 0;
    let products = document.querySelector(".table-body");

    let noOfItems = localStorage.getItem("cartNumbers");
    let cartCost = localStorage.getItem("totalCost");

    var search = JSON.parse(this.response);
    console.log(search);
    products.innerHTML = "";
    if (search !== null) {
      let count = 0;
      for (let s of search) {
        if (s.status == 0 || s.status == 6) {
          cartItems = localStorage.getItem("productInCart");
          cartItems = JSON.parse(cartItems)
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
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count}">
                </div>
                <div class="Item_id">
                    <input type="hidden" id="cart_item_id" value="${
                      s.order_id
                    }">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                ${
                  s.qty
                }
                </div>
                <div class="col col-3">
                    <div class="col col-4">Rs:<span>${parseInt(
                      s.total_payment
                    )}</span>.00
                    </div>
                    <div class="col col-6">${s.status == 0 ? "Pending" : "PreOrder Req"}</div>
                    <div class="col col-5"> 
                        <i class="fas remove fa-trash-alt" onclick="item_remover(${count++})"></i>
                    </div>
                </div>
            </div>`;
          Total = Total + parseInt(s.total_payment);
        } else{
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count++}">
                </div>
                <div class="Item_id">
                    <input type="hidden" id="cart_item_id" value="${
                      s.order_id
                    }">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                   ${
                      s.qty
                    }
                </div>
                <div class="col col-3">
                    <div class="col col-4">Rs: <span>${parseInt(
                      s.total_payment
                    )}</span>.00
                    </div>
                    <div class="col col-6">${s.status == 1 ? "Accepted" : s.status == 3 ? "Pickup" : s.status == 4 ? "Done" : s.status == 7 ? "PreOrder Acc" : "Return"}</div>
                    <div class="col col-5">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>`;
          Total = Total + parseInt(s.total_payment);
        }
      }
    }
    let total = document.querySelector("#stotal");
    total.innerHTML += `${parseInt(Total)}`;
  };
  xhr.send(data);

  return false;
}
