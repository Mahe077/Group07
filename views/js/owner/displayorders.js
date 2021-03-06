// function doSearch() {
//     var data = new FormData();
//     data.append("search", document.getElementById("search-box").value);
    
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "Orderdisplay_Model/orders");
//     xhr.onload = function () {
//       let orders = document.querySelector(".orders");
  
//       var search = JSON.parse(this.response);
  
//       orders.innerHTML = "";
//       if (search !== null) {
//         for (let s of search) {
//           orders.innerHTML += `<div class="product">
//                                                 <div class = "product-content">
//                                                     <div class = "product-img">
//                                                         <img src = "" alt = "product image">
//                                                     </div>
//                                     <div class = "product-btns">
//                                         <button type = "button" class = "btn-cart"> add to cart
//                                             <span><i class = "fas fa-plus"></i></span>
//                                         </button>
//                                        <form action="buy-now.php" method="post">
//                                                     <button type = "submit" class = "btn-buy"> buy now
//                                                         <span><i class = "fas fa-shopping-cart"></i></span>
//                                                     </button>
//                                                 </form>
                                        
//                                     </div>
//                                 </div>
//                                 <div class = "product-info">
//                                     <div class = "product-info-top">
//                                         <h2 class = "sm-title"></h2>
//                                         <h2 class="sm-title">Available: ${s.order_date}</h2>
//                                     </div>
//                                     <a href = "Product/itemRender/" class = "product-name"></a>
//                                     <p class = "product-price">Rs.</p>
//                                 </div>
//                                 <div class = "off-info">
//                                     <h2 class = "sm-title"></h2>
//                                    </div>
//                             </div>`;
//         }
//       } else {
//         orders.innerHTML = `<div class="product">
//                                         <form action="quotation.php">
//                                                <button type = "submit" class = "btn-cart" >
//                                                    Add quatation
//                                                </button>
//                                              <h2 class="sm-title">Sorry,We don't have such a product,plaese requesrt a quotation </h2>
//                                          </form>
//                                     </div>`;
//       }
//     };
//     xhr.send(data);
//     return false;
//   }
  
  function productload() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "Orderdisplay_Model/orders");
    xhr.onload = function () {
      let orders = document.querySelector(".orders");
      var search = JSON.parse(this.response);
  
      orders.innerHTML = "";
      if (search !== null) {
        for (let s of search) {
          orders.innerHTML += ` <div class="product">
                                        <div class = "product-content">
                                            <div class = "product-img">
                                                <img src = "${s.order_date}" alt = "product image">
                                            </div>
                                            <div class = "product-btns">
                                                <button type = "button" class = "btn-cart"> add to cart
                                                    <span><i class = "fas fa-plus"></i></span>
                                                </button>
                                                <form action="buy-now.php" method="post">
                                                    <button type = "submit" class = "btn-buy"> buy now
                                                        <span><i class = "fas fa-shopping-cart"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                           </div>
                                        <div class = "product-info">
                                            <div class = "product-info-top">
                                                <h2 class = "sm-title"></h2>
                                                <h2 class="sm-title">Available: </h2>
                                            </div>
                                            <a href = "Product/itemRender/" class = "product-name"></a>
                                            <p class = "product-price">Rs.</p>
                                        </div>
                                        <div class = "off-info">
                                            <h2 class = "sm-title"></h2>
                                        </div>
                                    </div>`;
        }
      } else {
        orders.innerHTML = `<div class="product">
                                       <button type = "button" class = "btn-cart" >
                                           Add quatation
                                       </button>
                                    <h2 class="sm-title">Sorry,We don't have such a product,plaese requesrt a quatation <h2>
                                </div>`;
      }
      loadItemOptions(search);
    };
  
    xhr.send();
    return false;
  }
  