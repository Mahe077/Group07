var localhost = "http://localhost/G7/Group07/";
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
                                     <form action="${localhost}Payment/RenderBuy/${s.id}" method="post">
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
                                  <p class = "product-price">Rs.${s.price}</p></br>
                                  <a class="btn" href = "Product/itemRender/${s.id}">VIEW</a>
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
                                              <form action="Payment/RenderBuy/${s.id}" method="post">
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
                                          <p class = "product-price">Rs.${s.price}</p></br>
                                          <a class="btn" href = "Product/itemRender/${s.id}">VIEW</a>
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

function filterItems() {

    let product_type = localStorage.getItem("type");
    let product_condition = localStorage.getItem("gen");



    if (product_type == undefined) {
        product_type = null;
    } else {
        localStorage.removeItem("type");
    }
    if (product_condition == undefined) {
        product_condition = null;
    } else {
        localStorage.removeItem("gen");
    }

    var data = new FormData();
    data.append("product-type", product_type);
    data.append("product-genuiness", product_condition);

    console.log(product_type, product_condition);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "Product/Filter");
    xhr.onload = function () {
        let products = document.querySelector(".product-items");
        var filterItems = JSON.parse(this.response);
        // console.log(filterItems);
        products.innerHTML = "";
        if (filterItems !== null) {
            for (let s of filterItems) {
                products.innerHTML += ` <div class="product">
                                      <div class = "product-content">
                                          <div class = "product-img">
                                              <img src = "${s.image_path}" alt = "product image">
                                          </div>
                                          <div class = "product-btns">
                                              <button type = "button" class = "btn-cart"> add to cart
                                                  <span><i class = "fas fa-plus"></i></span>
                                              </button>
                                              <form action="Payment/RenderBuy/${s.id}" method="post">
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
                                          <p class = "product-price">Rs.${s.price}</p></br>
                                          <a class="btn" href = "Product/itemRender/${s.id}">VIEW</a>
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
        loadItemOptions(filterItems);
    };
    xhr.send(data);
    return;
}

function filterclicked(type) {
    localStorage.setItem("type", type);
    return;
}

function filterGenlicked(gen) {
    localStorage.setItem("gen", gen);
    return;
}
