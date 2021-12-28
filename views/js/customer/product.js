function doSearch() {
  var data = new FormData();
  data.append("search", document.getElementById("search-box").value);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Product/searchAll");
  xhr.onload = function () {
    let products = document.querySelector(".product-items");

    var search = JSON.parse(this.response);

    products.innerHTML = "";
    if (search !== null) {
      for (let s of search) {
        products.innerHTML += `<div class="product">
                                              <div class = "product-content">
                                                  <div class = "product-img">
                                                      <img src = "${s.image_path}" alt = "product image">
                                                  </div>
                                  <div class = "product-btns">
                                      <button type = "button" class = "btn-cart"> add to cart
                                          <span><i class = "fas fa-plus"></i></span>
                                      </button>
                                     <form action="buy_now" method="post">
                                                  <button type = "submit" class = "btn-buy"> buy now
                                                      <span><i class = "fas fa-shopping-cart"></i></span>
                                                  </button>
                                              </form>
                                      
                                  </div>
                              </div>
                              <div class = "product-info">
                                  <div class = "product-info-top">
                                      <h2 class = "sm-title">${s.type}</h2>
                                      <h2 class="sm-title">Available: ${s.amount}</h2>
                                  </div>
                                  <a href = "Product/itemRender/${s.id}" class = "product-name">${s.name}</a>
                                  <p class = "product-price">Rs.${s.price}</p>
                              </div>
                              <div class = "off-info">
                                  <h2 class = "sm-title">${s.genuine}</h2>
                                 </div>
                          </div>`;
      }
    } else {
      products.innerHTML = `<div class="product">
                                      <form action="Quotation">
                                             <button type = "submit" class = "btn-cart" >
                                                 Add quatation
                                             </button>
                                           <h2 class="sm-title">Sorry,We don't have such a product,plaese requesrt a quotation </h2>
                                       </form>
                                  </div>`;
    }
  };
  xhr.send(data);
  return false;
}

function productload() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Product/loadAll");
  xhr.onload = function () {
    let products = document.querySelector(".product-items");
    var search = JSON.parse(this.response);
    // console.log(search);
    products.innerHTML = "";
    if (search !== null) {
      for (let s of search) {
        products.innerHTML += ` <div class="product">
                                      <div class = "product-content">
                                          <div class = "product-img">
                                              <img src = "${s.image_path}" alt = "product image">
                                          </div>
                                          <div class = "product-btns">
                                              <button type = "button" class = "btn-cart"> add to cart
                                                  <span><i class = "fas fa-plus"></i></span>
                                              </button>
                                              <form action="Buy-now" method="post">
                                                  <button type = "submit" class = "btn-buy"> buy now
                                                      <span><i class = "fas fa-shopping-cart"></i></span>
                                                  </button>
                                              </form>
                                          </div>
                                         </div>
                                      <div class = "product-info">
                                          <div class = "product-info-top">
                                              <h2 class = "sm-title">${s.type}</h2>
                                              <h2 class="sm-title">Available: ${s.amount}</h2>
                                          </div>
                                          <a href = "Product/itemRender/${s.id}" class = "product-name">${s.name}</a>
                                          <p class = "product-price">Rs.${s.price}</p>
                                      </div>
                                      <div class = "off-info">
                                          <h2 class = "sm-title">${s.genuine}</h2>
                                      </div>
                                  </div>`;
      }
    } else {
      products.innerHTML = `<div class="product">
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
