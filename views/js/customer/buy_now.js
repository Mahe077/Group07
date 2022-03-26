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
      amount.value = ((amount.value * 10) / 100).toFixed(2);
      if (amount.value < 30 || count > 1) {
        amount.value = parseFloat(advance).toFixed(2);
      }
    } else {
      amount.value = advance;
    }
  } else {
    confirm("No more reductions");
  }
  // console.log("payment", (parseFloat(amount.value) * 10), count);
}

function changeprice(cout, np_Of_Items_To_Buy) {
  let amount = document.querySelector(".amount");
  let total_amount = 0;

  for (let index = 1; index <= np_Of_Items_To_Buy; index++) {
    let quantity = document.querySelector(".quantity_" + index);
    let amount_ = document.querySelector(".amount_" + index);
    let unit_price = document.querySelector(".unit_price_" + index);
    console.log(np_Of_Items_To_Buy,index);
    console.log(
        amount_.value,
        quantity.value,
        unit_price.value,
        parseFloat(amount.value)
      );
    if (parseInt(quantity.value) > 0) {
      total_amount += (quantity.value * unit_price.value)
    }
  }
  console.log(total_amount)
  amount.value = parseFloat(total_amount).toFixed(2)
}

function renderPage(itemId) {
  cartItems = localStorage.getItem("productInCart");
  cartItems = JSON.parse(cartItems);
  //console.log(cartItems);
  if (cartItems != null) {
    if (cartItems[itemId] != undefined) {
      // console.log(cartItems[itemId]);
      let itemName = document.querySelector("#item_name_1");
      itemName.value = cartItems[itemId].name;
      let inCart = document.querySelector(".quantity_1");
      inCart.value = cartItems[itemId].InCart;
      let amount_1 = document.querySelector(".amount_1");
      amount_1.value = cartItems[itemId].price;
      let unit_price_1 = document.querySelector(".unit_price_1");
      unit_price_1.value = cartItems[itemId].price;
      let amount = document.querySelector(".amount");
      amount.value = (
        cartItems[itemId].InCart * cartItems[itemId].price
      ).toFixed(2);
      inCart.max = parseInt(cartItems[itemId].amount);
      console.log(inCart.max);
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
  // console.log(cartItems);
  if (cartItems != null) {
    // console.log(cartItems[itemId]);
    cout = 0;
    let item_info = document.querySelector(".item_info");
    let amount = document.querySelector(".amount");
    var total = 0;
    let np_Of_Items_To_Buy = Object.values(cartItems).length;
    Object.values(cartItems).map((item) => {
      cout += 1;
      item_info.innerHTML += `<div class="inputBox">
                                <input type="hidden" id="item_id_${cout}" name="item_id_${cout}" value="${item.id}">
                                <input type="text" id="item_name_${cout}" name="item_name_${cout}" value="${item.name} " readonly="readonly">
                                <input type="number" class="quantity_${cout}" name="quantity_${cout}" value="${item.InCart}" min="1" max="${item.amount}" placeholder=" Enter quntity" onchange="changeprice(${cout},${np_Of_Items_To_Buy})">
                                <input class="amount_${cout}" type="text" name="amount_${cout}" placeholder="Enter the amount" value="${item.price}" readonly="readonly" >
                                <input class="unit_price_${cout}" type="hidden" name="unit_price_${cout}" value="${item.price}">
                              </div>`;
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
    console.log(item[0]);

    let itemName = document.querySelector("#item_name_1");
    itemName.value = item[0]["name"];
    let amount_1 = document.querySelector(".amount_1");
    amount_1.value = parseFloat(item[0]["price"]);
    let amount = document.querySelector(".amount");
    amount.value = parseFloat(item[0]["price"]);
    let unit_price = document.querySelector(".unit_price_1");
    unit_price.value = parseFloat(item[0]["price"]);
    let inCart = document.querySelector(".quantity_1");
    inCart.max = item[0]["amount"];
    // console.log(typeof item[0]["amount"], parseInt(item[0]),inCart);
  };
  xhr.send(data);
  return;
}
