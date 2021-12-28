var count = 0;
function paymethod() {
	let amount = document.querySelector(".amount");
	
	var advance = amount.value;
	if(count < 1){
		if (confirm("Your advance is : Rs" + ((amount.value*10)/100).toFixed(2) + "\nDo your wish to pay the advance")) {
			count +=1;
			amount.value = (amount.value*10)/100;
			if (amount.value < 30 || count >1) {
				amount.value = advance.toFixed(2);
			}
		}else{
			amount.value = advance;
		}
	}
	else{
		confirm("No more reductions");
	}
	console.log("payment",amount.value,count);
}

function changeprice() {
    let amount = document.querySelector(".amount");
    let quantity = document.querySelector(".quantity");
    let amount_1 = document.querySelector(".amount_1");

    console.log(amount_1.value, quantity.value)

    amount.value = amount_1.value * quantity.value;
}
function renderPage(itemId) {
	cartItems = localStorage.getItem("productInCart");
	cartItems = JSON.parse(cartItems);
	console.log(cartItems[itemId]);
	let itemName = document.querySelector("#item_name_1");
	itemName.value = cartItems[itemId].name;
	let inCart = document.querySelector(".quantity");
	inCart.value = cartItems[itemId].InCart;
	let amount_1 = document.querySelector(".amount_1");
	amount_1.value = (cartItems[itemId].price);
	let amount = document.querySelector(".amount");
	amount.value = (cartItems[itemId].InCart * cartItems[itemId].price).toFixed(2);
}
