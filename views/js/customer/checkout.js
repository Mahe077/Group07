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
  