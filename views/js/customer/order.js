function tableItemsRemomver() {
    // console.log("in tableItemsRemomver items function 1 ");
    let trash_alt = document.querySelectorAll(".fa-trash-alt");
    let total = document.querySelector("#stotal");
    
  
    let productInCart = localStorage.getItem("productInCart");
    let noOfItems = localStorage.getItem("cartNumbers");
    let cartCost = localStorage.getItem("totalCost");
  
    productInCart = JSON.parse(productInCart);
  
  
    for (let i = 0; i < trash_alt.length; i++) {
      trash_alt[i].addEventListener("click", () => {
        cartIdToRemove = trash_alt[i].parentElement.parentElement.parentElement.childNodes[1].childNodes[1].value;
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
                    total.innerHTML = `Rs ${cartCost}.00`;
                    // console.log(cartCost);
  
  
            // console.log("items id: ", productInCart[j].id, i, "in cart :", productInCart[j].InCart, " cartId: ", productInCart[j].cartId);
            if (productInCart[j].cartId == cartIdToRemove) {
              // console.log("deletetion process...:", productInCart[j].cartId);
              delete productInCart[j];
              localStorage.setItem("productInCart", JSON.stringify(productInCart));
              trash_alt[i].parentElement.parentElement.parentElement.style.display = "none";
  
              // console.log("deletetion complete...");
            }
          }
        }
      });
    }
    // return;
  }
function displayCheckout() {
  let cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);
  cartTableBody = document.querySelector(".table-body");

  if (cartItems && cartTableBody) {
    cartTableBody.innerHTML = "";
    Object.values(cartItems).map((item) => {
      cartTableBody.innerHTML += `
            <div class="row row-data" id="rd-4">
            <div class="id">
            <input type="hidden" id="cart_item_id" value="${item.cartId}">
        </div>
              <div class="col col-1">
                  ${item.name}
                 
              </div>
              <div class="col col-2">
                  <input type="number" min="1" max="${item.amount}" name="amount" value="${item.InCart}" />
              </div>
              <div class="col col-3">
                <div class="col col-4">Rs: ${parseInt(item.price) * parseInt(item.InCart)}.00</div>
                  <div class="col col-5" style="display: flex;justify-content:space-around;align-items: center;"> <i class="fas remove fa-trash-alt"></i>
                      <a href="buy-now.php"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            `;
    });

    let total = document.querySelector("#stotal");
    let totalCost = localStorage.getItem("totalCost");
    total.innerHTML = `Rs ${parseInt(totalCost)}.00`;

    // console.log("running");
    // tableItemsRemomver();
  }
}

displayCheckout();
