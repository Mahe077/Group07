function orderload(id) {
  var data = new FormData();
  data.append("search", id);
  console.log(id,data);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Order/loadAll");
  xhr.onload = function () {
    let products = document.querySelector(".table-body");

    var search = JSON.parse(this.response);
    console.log(search);
    products.innerHTML = "";
    if (search !== null) {
      let count = 0;
      for (let s of search) {
        if (s.accepted === 0) {
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count++}">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                    <input type="number" min="1" max="${
                      s.amount
                    }" name="amount" value="${s.InCart}" />
                </div>
                <div class="col col-3">
                    <div class="col col-4">Rs: ${parseInt(s.total_payment)}.00
                    </div>
                    <div class="col col-5"> 
                        <i class="fas remove fa-trash-alt"></i>
                    </div>
                </div>
            </div>`;
        } else {
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count++}">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                    <input type="number" min="1" max="${
                      s.amount
                    }" name="amount" value="${s.InCart}" />
                </div>
                <div class="col col-3">
                    <div class="col col-4">Rs: ${parseInt(s.total_payment)}.00
                    </div>
                    <div class="col col-5">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>`;
        }
      }
    }
  };
  xhr.send(data);
  return false;
}
