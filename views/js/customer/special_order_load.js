var localhost = "http://localhost/G7/Group07/";
function special_orderload(id) {
  var data = new FormData();
  data.append("search", id);
  // console.log(id,data);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Special_order/loadAllSpecial");
  xhr.onload = function () {
    Total = 0;
    let products = document.querySelector(".table-body");
    var search = JSON.parse(this.response);
    console.log(search);
    products.innerHTML = "";
    if (search !== null) {
      let count = 0;
      for (let s of search) {
        if (s.status == 0 || s.status == 6) {
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count}">
                </div>
                <div class="Item_id">
                    <input type="hidden" id="cart_item_id" value="${s.id}">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                ${s.amount}
                </div>
                <div class="col col-3">
                    <div class="col col-4">Rs:<span>${parseFloat(
                      s.approximated_price
                    ).toFixed(2)}</span>
                    </div>
                    <div class="col col-6">${
                      s.status == 0 ? "Pending" : "PreOrder Req"
                    }</div>
                    <div class="col col-5"> 
                        <i class="fas remove fa-trash-alt" onclick="item_remover(${count++})"></i>
                    </div>
                </div>
            </div>`;
          Total = Total + parseFloat(s.approximated_price);
        } else {
          products.innerHTML += ` 
            <div class="row row-data" id="rd-4">
                <div class="id">
                    <input type="hidden" id="cart_item_id" value="${count++}">
                </div>
                <div class="Item_id">
                    <input type="hidden" id="cart_item_id" value="${s.id}">
                </div>
                <div class="col col-1">
                    ${s.name}
                </div>
                <div class="col col-2">
                   ${s.amount}
                </div>
                <div class="col col-3">
                <div class="col col-4">Rs:<span>${parseFloat(
                  s.approximated_price
                ).toFixed(2)}</span>
                    </div>
                    <div class="col col-6">${
                      s.status == 1
                        ? "Accepted"
                        : s.status == 3
                        ? "Pickup"
                        : s.status == 4
                        ? "Done"
                        : s.status == 7
                        ? "PreOrder Acc"
                        : s.status == 2
                        ? "Cancel"
                        : "Return"
                    }</div>
                    <div class="col col-5">
                        ${s.status == 2 ?"<i class='fas fa-check-circle' style='color:red'>":"<i class='fas fa-check-circle'>"}</i>
                    </div>
                </div>
            </div>`;
          Total = Total + parseFloat(s.approximated_price);
        }
      }
    }
    let total = document.querySelector("#stotal");
    total.innerHTML += `${parseFloat(Total).toFixed(2)}`;
  };
  xhr.send(data);

  return false;
}

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
      xhr.open("POST", "Special_order/Remove");
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
