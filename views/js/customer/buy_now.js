var count = 0;
var localhost = "http://localhost/G7/Group07/";
function paymethod() {
  let amount = document.querySelector(".amount");

  var advance = amount.value;
  if (count < 1) {
    if (
      confirm(
        "Your advance is : Rs" +
          ((amount.value * 10) / 100).toFixed(2) +
          "\nDo your wish to pay the advance"
      )
    ) {
      count += 1;
      amount.value = (amount.value * 10) / 100;
      if (amount.value < 30 || count > 1) {
        amount.value = advance.toFixed(2);
      }
    } else {
      amount.value = advance;
    }
  } else {
    confirm("No more reductions");
  }
  // console.log("payment", (parseFloat(amount.value) * 10), count);
}

function changeprice() {
  let amount = document.querySelector(".amount");
  let quantity = document.querySelector(".quantity");
  let amount_1 = document.querySelector(".amount_1");

  // console.log(amount_1.value, quantity.value);

  amount.value = (amount_1.value * quantity.value).toFixed(2);
}
function renderPage(itemId) {
  cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);
  console.log(cartItems);
  if (cartItems != null) {
    if (cartItems[itemId] != undefined) {
      // console.log(cartItems[itemId]);
      let itemName = document.querySelector("#item_name_1");
      itemName.value = cartItems[itemId].name;
      let inCart = document.querySelector(".quantity");
      inCart.value = cartItems[itemId].InCart;
      let amount_1 = document.querySelector(".amount_1");
      amount_1.value = cartItems[itemId].price;
      let amount = document.querySelector(".amount");
      amount.value = (
        cartItems[itemId].InCart * cartItems[itemId].price
      ).toFixed(2);
    } else {
      getdata(itemId);
    }
  } else {
    getdata(itemId);
  }
  return;
}

function renderPageALL() {
  cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);
  console.log(cartItems);
  if (cartItems != null) {
    // console.log(cartItems[itemId]);
    cout = 0;
    let item_info = document.querySelector(".item_info");
    let amount = document.querySelector(".amount");
    var total = 0;
    Object.values(cartItems).map((item) => {
      cout += 1;
      item_info.innerHTML += `<div class="inputBox"><input type="hidden" id="item_id_${cout}" name="item_id_${cout}" value="${item.id}"><input type="text" id="item_name_${cout}" name="item_name_${cout}" value="${item.name}">
                              <input type="number" class="quantity" name="quantity_${cout}" value="${item.InCart}" min="1" max="5" placeholder=" Enter quntity" onchange="changeprice()">
                              <input class="amount_${cout}" type="text" name="amount_${cout}" placeholder="Enter the amount" value="${item.price}"></div>`;
      total += parseFloat(item.InCart * item.price);
    });
    amount.value = total.toFixed(2);
  }
  return;
}

function getdata(itemId) {
  var data = new FormData();
  data.append("PID", itemId);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/G7/Group07/Payment/RenderBuy3");
  xhr.onload = function () {
    var item = JSON.parse(this.response);
    console.log(item[0], parseInt(item[0]["amount"]));
    let itemName = document.querySelector("#item_name_1");
    itemName.value = item[0]["name"];
    let amount_1 = document.querySelector(".amount_1");
    amount_1.value = parseFloat(item[0]["price"]);
    let amount = document.querySelector(".amount");
    amount.value = parseFloat(item[0]["price"]);
  };
  xhr.send(data);
  return;
}
